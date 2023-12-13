<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;
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
        $studentNumber = Session::get('studentNumber');
        return view ('student.student_information.index',['acadyears'=> AcademicYear::where('isActive', '1')->get(), 'users' => User::where('studentNumber', $studentNumber)->get(), 'legends' => Legend::all()]);
    }

    public function student_grade(){
        $studentNumber = Session::get('studentNumber');
        $user = User::where('studentNumber', $studentNumber)->first();
        $studentNum = $user->student_number;
        
        return view ('student.student_grade.index',['acadyears'=> AcademicYear::where('isActive', '1')->get(), 'grades' => Grade::where('student_number', $studentNum)->get(), 'legends' => Legend::all(), 'no' => $studentNum]);
    }
    public function downloadable_forms(){
        return view ('student.downloadable_forms.index',['acadyears'=> AcademicYear::where('isActive', '1')->get(), 'files' => File::orderby('updated_at','desc')->get(), 'legends' => Legend::all()]);
    }

    public function edit(Request $request): View
    {
        $acadyears = AcademicYear::where('isActive', '1')->get();
        $legends = Legend::all();
        
       
        return view('student.profile.edit', [
            'user' => $request->user(),
        ],compact('acadyears', 'legends'));
    }
}
