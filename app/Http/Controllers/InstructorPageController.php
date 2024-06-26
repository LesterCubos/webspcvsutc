<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use App\Models\Course;
use App\Models\Grade;
use App\Models\AcademicYear;

class InstructorPageController extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        Session::put('schedcode', $request->input('schedcode'));

        $courses = Course::where('schedcode', $request->input('schedcode'))->get();
        

        if ($courses->isEmpty()) {
            session()->flash('notif.danger','No Course found with this SCHEDCODE.');
            return redirect()->back();
        }
        
        foreach ($courses as $course) {
            if ($request->input('pincode') == $course->pincode) {
                session()->flash('notif.success', 'Login Successfully!');
                return redirect()->route('grades.index');
            } 
        }
        
        session()->flash('notif.danger','The PINCODE is incorrect.');
        return redirect()->back();
    }

    public function login()
    {
        return view('instructor_page.login');
    }

    public function logout(Request $request)
    {
        $schedcode = Session::get('schedcode');
        $courses = Course::where('schedcode', $schedcode)->get();
        foreach ($courses as $course) {
            $course->generatePinCode();
            $course->save();
        }
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/instructor_page_login')->with('error','Logout Successfully');
        
    }
}
