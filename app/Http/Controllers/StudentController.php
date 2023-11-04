<?php

namespace App\Http\Controllers;

use App\Models\AdminAnnounce;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function Dashboard(){
        $admin_announces = AdminAnnounce::all();
        return view ('student.student_dashboard', compact('admin_announces'));
    }

}
