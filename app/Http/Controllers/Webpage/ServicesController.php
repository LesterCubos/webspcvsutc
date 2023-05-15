<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\AboutOrgs;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function csgs(){
        $about_orgs = AboutOrgs::all();
       
        return view('pages.csg', compact('about_orgs'));
    }

    public function acadorgs(){
        $about_orgs = AboutOrgs::all();
        
        
        return view('pages.csg', 
        compact('about_orgs'));
    }public function nonacadorgs(){
        $about_orgs = AboutOrgs::all();
        
        return view('pages.csg', 
        compact('about_orgs'));
    }
}
