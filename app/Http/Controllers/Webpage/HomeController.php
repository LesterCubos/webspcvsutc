<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\CarouselItem;
use App\Models\FeaturedService;
use App\Models\DiscoverTanzaInfo;
use App\Models\Count;
use App\Models\Program;
use App\Models\Admission;
use App\Models\News;
use App\Models\Announcement;
use Latfur\Event\Models\Event;
use App\Models\QuickLinks;
use App\Models\OtherLinks;
use App\Models\SocialMediaLinks;




use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function homepage()
    {
        /* Views */
        $views = CarouselItem::find(1);
        
        views($views)
        ->cooldown($minutes = 3)
        ->record();
        $totalVisits = views($views)->count();


        // $showSection = DB::table('section_switch')->pluck('show_section')->first();
        $carousel_items = CarouselItem::all();
        $featured_services = FeaturedService::all();
        $discover_tanza_infos = DiscoverTanzaInfo::all();
        $counts = Count::all();
        $programs = Program::all();
        $admissions = Admission::all();
        $news = News::all();
        $announcements = Announcement::all();
        $events = Event::all();
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();


        return view('pages.homepage',
            compact(
                    'carousel_items',
                    'featured_services',
                    'discover_tanza_infos',
                    'counts',
                    'programs',
                    'admissions',
                    'news',
                    'announcements',
                    'events',
                    'quicks',
                    'others',
                    'socialmedias',
                    'totalVisits'
                    ));
    }
}
