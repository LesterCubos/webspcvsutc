<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\Announcement;


class AnnouncementsController extends Controller
{

    public function announcements(Announcement $announce){
        $announcements = Announcement::all();
        return view('pages.announcements.announcements', compact('announcements'), ['announce' => $announce]);
        }
}
