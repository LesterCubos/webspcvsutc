<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\CSG;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function csgs(){
        $csgs = CSG::all();
        // return view('pages.teacher_dep', compact('teds'));
        return view('pages.csg', compact('csgs'));
    }
}
