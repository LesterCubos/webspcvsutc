<?php

namespace App\Http\Controllers;

use App\Models\EnrollSchedule;
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
use App\Models\EnrollSubjectEnroll;
use App\Models\EnrollSubject;
use App\Models\Course;

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

    public function virtual_regform()
    {
        $studentNumber = Session::get('studentNumber');
        $subjenrolled = EnrollSubjectEnroll::where('studentnumber', $studentNumber)->get();
        $schedcodes = [];
        foreach ($subjenrolled as $subjenroll){
            $temp_schedcodes = Course::where('schedcode', $subjenroll->schedcode)->get();
            foreach ($temp_schedcodes as $temp_schedcode){
                array_push($schedcodes, $temp_schedcode);
            }
        }
        $subjects = [];
        foreach ($schedcodes as $schedcode){
            $temp_subjects = EnrollSubject::where('subjectcode', $schedcode->course_name)->get();
            foreach ($temp_subjects as $temp_subject){
                array_push($subjects, $temp_subject);
            }
        }
        return view ('student.virtual_regform.index',['users' => User::where('studentNumber', $studentNumber)->get(), 'legends' => Legend::all()], compact('schedcodes', 'subjects'));
    }
}
