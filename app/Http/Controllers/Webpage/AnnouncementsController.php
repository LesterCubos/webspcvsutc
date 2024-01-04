<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

use App\Models\CarouselItem;

use App\Models\SocialMediaLinks;
use App\Models\QuickLinks;
use App\Models\OtherLinks;
use App\Models\ContactInfo;

class AnnouncementsController extends Controller
{

    public function announcements(Announcement $announce){



        views($announce)
        ->cooldown($minutes = 3)
        ->record();

        $totalViews = views($announce)->count();

        // $totala=views(Announcement::class)->count();

        $totalVisits=views(CarouselItem::class)->count();

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $announcements = Announcement::all();
        return view('pages.announcements.announcements', compact('contact_infos','announcements','totalViews','totalVisits','quicks','others','socialmedias'), ['announce' => $announce]);
        }
}
