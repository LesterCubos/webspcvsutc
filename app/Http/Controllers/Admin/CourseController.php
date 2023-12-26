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
use App\Models\EnrollSchedule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $scheds = EnrollSchedule::all();
        foreach ($scheds as $sched) {
            if (Course::where('schedcode', $sched->schedcode)->exists()) {
                    
            } else {
                $create = Course::create([
                    'course_name' => $sched->subjectCode,
                    'instructor_name' => $sched->instructor,
                    'section' => $sched->section,
                    'units' => $sched->units,
                ]);
                $create->generateSpecialCode();
                $create->acadyear = $sched->schoolyear;
                $create->sem = $sched->semester;
                $create->generatePinCode();
                $create->save();
                if (isset($sched->schedcode)) {
                    $code = Session::get('code');
                    $sched->schedcode = $code;
                    $sched->save();
                } else {
                    $code = Session::get('code');
                    $sched->schedcode = $code;
                    $sched->save();
                }
            }
        }

        return response()->view('admin.course.index', [
            'courses' => Course::orderBy('updated_at', 'desc')->paginate(10), 
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
            'course' => Course::findOrFail($id), 
            // 'course' => EnrollSchedule::findOrFail($id),
            'acadyears'=> AcademicYear::where('isActive', '1')->get(),
            'legends' => Legend::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $courses = Course::findOrFail($id);
        $ecourses = EnrollSchedule::where('schedcode', $courses->schedcode)->get();
            foreach ($ecourses as $ecourse) {
                $eid = $ecourse->id;
            }
        $scheds = EnrollSchedule::findOrFail($eid);
        $update = $scheds->update([
            'subjectCode' => $request->course_name,
            'instructor' => $request->instructor_name,
            'section' => $request->section,
            'units' => $request->units,
        ]);

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
                // $ecourses = EnrollSchedule::where('schedcode', $course->schedcode)->get();
                // foreach ($ecourses as $ecourse) {
                //     $eid = $ecourse->id;
                // }
                // $delete = $course->delete($id);
                // $delete = $ecourse->delete($eid);
                // Redirect to the users index page with a success message
                if ($course) {
                    session()->flash('notif.pin', 'Course Pincode: '. $course->pincode);
                    return redirect()->route('courses.index');
                }
            }
        }
        // Return an error message indicating that the password is incorrect
        session()->flash('notif.danger', 'The password is incorrect.');
        return redirect()->back();
    }
}
