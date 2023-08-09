<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\AboutOrgs;
use App\Models\News;
use App\Models\Announcement;
use App\Models\UniversitySeal;
// use Latfur\Event\Models\Event;

use App\Models\CarouselItem;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function csgs(){

        $totalVisits=views(CarouselItem::class)->count();

        $about_orgs = AboutOrgs::all();
       
        return view('pages.csg', compact('about_orgs','totalVisits'));
    }

    public function acadorgs(){

        $totalVisits=views(CarouselItem::class)->count();

        $about_orgs = AboutOrgs::all();
        
        return view('pages.academic_orgs', compact('about_orgs','totalVisits'));
    }
    public function nonacadorgs(){

        $totalVisits=views(CarouselItem::class)->count();

        $about_orgs = AboutOrgs::all();
        
        return view('pages.nonacademic_orgs', compact('about_orgs','totalVisits'));
    }

    public function newsandupdates(){

        $totalVisits=views(CarouselItem::class)->count();

        $news = News::all();

        return view('pages.news&updates', compact('news','totalVisits'));
    }

    public function announcements(){

        $totalVisits=views(CarouselItem::class)->count();

        $announcements = Announcement::all();

        return view('pages.announcement', compact('announcements','totalVisits'));
    }

    public function campuscalendar(){

        $views = UniversitySeal::find(1);
        
        views($views)
        ->cooldown($minutes = 3)
        ->record();

        $totalViews = views($views)->count();
        
        $totalVisits=views(CarouselItem::class)->count();

        return view('event::campuscalendar', compact('totalVisits','totalViews'));
    }
}
