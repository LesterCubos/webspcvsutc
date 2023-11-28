<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\user;
use App\Models\AdminAnnounce;
use App\Models\AcademicYear;
use App\Models\Grade;
use App\Models\Legend;
use App\Models\File;

class StudentController extends Controller
{
    public function Dashboard(){
        $admin_announces = AdminAnnounce::all();
        return view ('student.student_dashboard',['acadyears'=> AcademicYear::where('isActive', '1')->get(), 'legends' => Legend::all()],compact('admin_announces'));
    }

    public function student_information(){
        $email = Session::get('email');
        return view ('student.student_information.index',['acadyears'=> AcademicYear::where('isActive', '1')->get(), 'users' => User::where('email', $email)->get(), 'legends' => Legend::all()]);
    }

    public function student_grade(){
        $email = Session::get('email');
        $users = User::where('email', $email)->get();
        foreach ($users as $user) {
            $student_number = $user->student_number;
        }
        return view ('student.student_grade.index',['acadyears'=> AcademicYear::where('isActive', '1')->get(), 'grades' => Grade::where('student_number', $student_number)->get(), 'legends' => Legend::all()]);
    }
    public function downloadable_forms(){
        return view ('student.downloadable_forms.index',['acadyears'=> AcademicYear::where('isActive', '1')->get(), 'files' => File::orderby('updated_at','desc')->get(), 'legends' => Legend::all()]);
    }
}
