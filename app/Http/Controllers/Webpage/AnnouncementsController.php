<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

use App\Models\CarouselItem;


class AnnouncementsController extends Controller
{

    public function announcements(Announcement $announce){



        views($announce)
        ->cooldown($minutes = 3)
        ->record();

        $totalViews = views($announce)->count();

        // $totala=views(Announcement::class)->count();

        $totalVisits=views(CarouselItem::class)->count();

        $announcements = Announcement::all();
        return view('pages.announcements.announcements', compact('announcements','totalViews','totalVisits'), ['announce' => $announce]);
        }
}
