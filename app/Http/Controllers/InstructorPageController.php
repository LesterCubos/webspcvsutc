<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class InstructorPageController extends Controller
{
    public function index()
    {
        return view('instructor_page.login');
    }

    public function login()
    {
        return view('instructor_page.login');
    }

    public function loginrequest(Request $request)
    {
        $courses = Course::where('schedcode', $request->input('schedcode'))->get();
        

        if ($courses->isEmpty()) {
            session()->flash('notif.danger','No Course found with this SCHEDCODE.');
            return redirect()->back();
        }
        
        foreach ($courses as $course) {
            if ($request->input('pincode') == $course->pincode) {
                return view('instructor_page.index');
            } 
        }
        
        session()->flash('notif.danger','The PINCODE is incorrect.');
        return redirect()->back();
        
    }
}
