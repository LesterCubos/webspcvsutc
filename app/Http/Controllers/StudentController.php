<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function Dashboard(){
        return view ('student.student_dashboard');
    }
}
