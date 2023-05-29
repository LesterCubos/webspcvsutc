<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\AboutOrgs;
use App\Models\News;
use App\Models\CalendarEvent;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function csgs(){
        $about_orgs = AboutOrgs::all();
       
        return view('pages.csg', compact('about_orgs'));
    }

    public function acadorgs(){
        $about_orgs = AboutOrgs::all();
        
        return view('pages.academic_orgs', compact('about_orgs'));
    }
    public function nonacadorgs(){
        $about_orgs = AboutOrgs::all();
        
        return view('pages.nonacademic_orgs', compact('about_orgs'));
    }

    public function newsandupdates(){
        $news = News::all();

        return view('pages.news&updates', compact('news'));
    }

    public function fullcalendar(){
        // $news = News::all();

        // return view('pages.news&updates', compact('news'));
    }
}
