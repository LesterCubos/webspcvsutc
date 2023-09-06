<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\AboutOrgs;
use App\Models\News;
use App\Models\Announcement;
use App\Models\UniversitySeal;
use App\Models\JobVacancies;

use App\Models\QuickLinks;
use App\Models\OtherLinks;
use App\Models\SocialMediaLinks;

// use Latfur\Event\Models\Event;

use App\Models\CarouselItem;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function csgs(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $about_orgs = AboutOrgs::all();
       
        return view('pages.csg', compact('about_orgs','totalVisits','quicks','others','socialmedias'));
    }

    public function acadorgs(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $about_orgs = AboutOrgs::all();
        
        return view('pages.academic_orgs', compact('about_orgs','totalVisits','quicks','others','socialmedias'));
    }
    public function nonacadorgs(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $about_orgs = AboutOrgs::all();
        
        return view('pages.nonacademic_orgs', compact('about_orgs','totalVisits','quicks','others','socialmedias'));
    }

    public function newsandupdates(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $news = News::all();

        return view('pages.news&updates', compact('news','totalVisits','quicks','others','socialmedias'));
    }

    public function announcements(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $announcements = Announcement::all();

        return view('pages.announcement', compact('announcements','totalVisits','quicks','others','socialmedias'));
    }

    public function campuscalendar(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $views = UniversitySeal::find(1);
        
        views($views)
        ->cooldown($minutes = 3)
        ->record();

        $totalViews = views($views)->count();
        
        $totalVisits=views(CarouselItem::class)->count();

        return view('event::campuscalendar', compact('totalVisits','totalViews','quicks','others','socialmedias'));
    }

    public function jobvacancies(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $job_vacancies = JobVacancies::all();

        return view('pages.job_vacancies', compact('job_vacancies','totalVisits','quicks','others','socialmedias'));
    }
}
