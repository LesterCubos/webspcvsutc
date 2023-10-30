<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorPageController extends Controller
{
    public function index()
    {
        return view('instructor_page.index');
    }
}
