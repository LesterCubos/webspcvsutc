<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\AboutOrgs;
use App\Models\News;
use App\Models\Announcement;
use App\Models\JobVacancies;

use App\Models\QuickLinks;
use App\Models\OtherLinks;
use App\Models\SocialMediaLinks;

use Latfur\Event\Models\Event;

use App\Models\CarouselItem;
use App\Models\UniversitySeal;
use App\Models\ContactInfo;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function studentorgs(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $about_orgs = AboutOrgs::all();
        $contact_infos = ContactInfo::all();
        return view('pages.orgs', compact('contact_infos','about_orgs','totalVisits','quicks','others','socialmedias'));
    }

    public function newsandupdates(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $news = News::all();
        $contact_infos = ContactInfo::all();
        return view('pages.news&updates', compact('contact_infos','news','totalVisits','quicks','others','socialmedias'));
    }

    public function announcements(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $announcements = Announcement::all();

        foreach ($announcements as $announcement) {
            if ($announcement->isActive == 1) {
                $annViews[$announcement->id] = views(Announcement::class::find($announcement->id))->count();
            }
        }
        $contact_infos = ContactInfo::all();
        return view('pages.announcement', compact('contact_infos','announcements','totalVisits','quicks','others','socialmedias','annViews'));
    }

    public function campuscalendar(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $events =  UniversitySeal::orderBy('created_at', 'desc')->get();

        if ($events->isEmpty()) {
            $totalViews = 0;
        } else {
            foreach ($events as $event) {
                $views = UniversitySeal::find($event->id);    
            }
            views($views)
            ->cooldown($minutes = 3)
            ->record();
    
            $totalViews = views(UniversitySeal::class)->count();
        }
        
        $totalVisits=views(CarouselItem::class)->count();
        //put here the 'totalViews', before living
        $contact_infos = ContactInfo::all();

        return view('event::campuscalendar', compact('contact_infos','totalVisits','totalViews','quicks','others','socialmedias'));
    }

    public function jobvacancies(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();

        $job_vacancies = JobVacancies::all();

        return view('pages.job_vacancies', compact('contact_infos','job_vacancies','totalVisits','quicks','others','socialmedias'));
    }
}
