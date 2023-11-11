<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\user;
use App\Models\AdminAnnounce;
use App\Models\AcademicYear;

class StudentController extends Controller
{
    public function Dashboard(){
        $admin_announces = AdminAnnounce::all();
        return view ('student.student_dashboard',['acadyears'=> AcademicYear::where('isActive', '1')->get()],compact('admin_announces'));
    }

    public function student_information(){
        $email = Session::get('email');
        return view ('student.student_information.index',['acadyears'=> AcademicYear::where('isActive', '1')->get(), 'users' => User::where('email', $email)->get(),]);
    }

}
