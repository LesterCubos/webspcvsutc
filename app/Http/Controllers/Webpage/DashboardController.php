<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Http\Request;

use App\Models\CarouselItem;
use App\Models\News;
use App\Models\Announcement;
use App\Models\UniversitySeal;
use Latfur\Event\Models\Event;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function dashboard() {

        // Total Visitors
        $totalVisits = views(CarouselItem::class)->count();
        //Today
        $today = Carbon::today();
        $todayVisits = views (CarouselItem::class)
        ->period(Period::since(Carbon::create($today)))
        ->count();
        //Month
        $month = Carbon::now()->format('m');
        $monthVisits = views (CarouselItem::class)
        ->period(Period::since(Carbon::create($month)))
        ->count();
        // Year
        $yeardate = Carbon::now()->format('Y');
        $yearVisits = views(CarouselItem::class)
        ->period(Period::since(Carbon::create($yeardate)))
        ->count();

        // Total Views
        $totalNews = views(News::class)->count();
        $totalAnnouncement = views(Announcement::class)->count();
        $totalEvents = views(UniversitySeal::class)->count();

        // Total Number
        $newscount  = DB::table('news')->count();
        $announcementcount  = DB::table('announcements')->count();
        $eventscount  = DB::table('events')->count();

       $carouselItem = CarouselItem::whereMonth('created_at', $month)->get();
       $eventItem = Event::whereMonth('created_at', $month)->get();
       $newsItem = News::whereMonth('created_at', $month)->get();
       $announcementItem = Announcement::whereMonth('created_at', $month)->get();


        return view('dashboard',compact('totalVisits','todayVisits','monthVisits','yearVisits','totalNews','totalAnnouncement','totalEvents','newscount','announcementcount','eventscount',
                    'carouselItem','eventItem','newsItem','announcementItem'
    ));

    }
}
