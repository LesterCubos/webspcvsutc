<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Course\StoreRequest;
use App\Http\Requests\Course\UpdateRequest;

use App\Models\Course;
use App\Models\AcademicYear;
use App\Models\User;
use App\Models\Legend;
use App\Models\EnrollCourse;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response()->view('admin.course.index', [
            'courses' => Course::orderBy('updated_at', 'desc')->paginate(5), 
            'acadyears'=> AcademicYear::where('isActive', '1')->get(),
            'legends' => Legend::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return response()->view('admin.course.form', [
            'acadyears'=> AcademicYear::where('isActive', '1')->get(), 'legends' => Legend::all(), 'programs' => EnrollCourse::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Session::put('course_program', $request->input('program'));
        Session::put('course_section', $request->input('section'));

        $legends = Legend::all();

        // insert only requests that already validated in the StoreRequest
        $create = Course::create($validated);
        $create->generateSpecialCode();
        // $create->generatePinCode();
        foreach ($legends as $legend) {
            Session::put('course_year', $legend->schoolyear);
            Session::put('course_sem', $legend->semester);
            $create->acadyear = $legend->schoolyear;
            $create->sem = $legend->semester;
        }
        $create->save();

        if($create) {

            // add flash for the success notification
            session()->flash('notif.success', 'Course created successfully!');
            return redirect()->route('courses.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.courses.show', [
            'course' => Course::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        Session::put('course_id', $id);
        Session::put('sub_id', $id);
        return response()->view('admin.course.form', [
            'course' => Course::findOrFail($id), 'acadyears'=> AcademicYear::where('isActive', '1')->get(),
            'legends' => Legend::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $courses = Course::findOrFail($id);
        $validated = $request->validated();

        $update = $courses->update($validated);

        if($update) {
            session()->flash('notif.success', 'Course updated successfully!');
            return redirect()->route('courses.index');
        }

        return abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy (Request $request,string $id)
    {
        // Retrieve the superadmin user from the database
        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            // Check if the password provided by the superadmin user is valid
            if (Hash::check($request->input('password'), $admin->password)) {
                // Proceed with the deletion of the user
                $course = Course::findOrFail($id);

                $delete = $course->delete($id);
                // Redirect to the users index page with a success message
                if ($delete) {
                    session()->flash('notif.success', 'Courses deleted successfully!');
                    return redirect()->route('courses.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
