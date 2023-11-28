<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
// We will use Form Request to validate incoming requests from our store and update method
use App\Http\Requests\Grade\StoreRequest;
use App\Http\Requests\Grade\UpdateRequest;

use App\Models\Grade;
use App\Models\AcademicYear;
use App\Models\Semester;
use App\Models\Course;
use App\Models\User;
use App\Models\Legend;
use App\Models\EnrollGradeChoices;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        // $routeName = \Route::current()->getName();
        // $viewName = ($routeName == 'admin_grades.index') ? 'admin.grades.index' : 'instructor_page.index';

        $schedcode = Session::get('schedcode');

        return response()->view('instructor_page.index', [
            'grades' => Grade::orderBy('updated_at', 'desc')->paginate(5), 
            'acadyears'=> AcademicYear::where('isActive', '1')->get(),
            'courses' => Course::where('schedcode', $schedcode)->get(),
            'legends' => Legend::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        
        return response()->view('instructor_page.form', [
            'acadyears'=> AcademicYear::where('isActive', '1')->get(), 'legends' => Legend::all(), 'gchoices' => EnrollGradeChoices::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $schedcode = Session::get('schedcode');

        $courses = Course::where('schedcode', $schedcode)->get();
        $sems = Semester::where('isActive', '1')->get();

        // insert only requests that already validated in the StoreRequest
        $create = Grade::create($validated);
        foreach ($courses as $course) {
            $create->program = $course->program;
            $create->course_name = $course->course_name;
            $create->instructor_name = $course->instructor_name;
        }
        foreach ($sems as $sem) {
            $create->academic_year = $sem->academic_year ." ". $sem->semester_name;
        }
        $create->save();

        if($create) {

            // add flash for the success notification
            session()->flash('notif.success', 'grade created successfully!');
            return redirect()->route('grades.index');
        }

        return abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        return response()->view('admin.grades.show', [
            'grade' => Grade::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        return response()->view('instructor_page.form', [
            'grade' => Grade::findOrFail($id), 'acadyears'=> AcademicYear::where('isActive', '1')->get(), 'legends' => Legend::all(), 'gchoices' => EnrollGradeChoices::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id): RedirectResponse
    {
        $grades = Grade::findOrFail($id);
        $validated = $request->validated();

        $update = $grades->update($validated);

        if($update) {
            session()->flash('notif.success', 'grade updated successfully!');
            return redirect()->route('grades.index');
        }

        return abort(500);
    }
    
    public function destroy(string $id): RedirectResponse
    {
        $grade = Grade::findOrFail($id);

        $delete = $grade->delete($id);

        if($delete) {
            session()->flash('notif.success', 'Grade has been deleted successfully!');
            return redirect()->route('grades.index');
        }

        return abort(500);
    }
}
