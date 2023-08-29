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
        $date = Carbon::now();
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

        $currentTime = Carbon::createFromFormat("Y-m-d H:i:s", date($date));

        $carouselItem = CarouselItem::orderBy('created_at', 'desc')->get();
        $cardiff = array();
        
        foreach($carouselItem as $carouselitem){
            
            $anchorTimecar[$carouselitem->id] = Carbon::createFromFormat("Y-m-d H:i:s",$carouselitem->created_at);
            $secondDiff = $anchorTimecar[$carouselitem->id]->diffInSeconds($currentTime);
            $minuteDiff = $anchorTimecar[$carouselitem->id]->diffInMinutes($currentTime);
            $hourDiff = $anchorTimecar[$carouselitem->id]->diffInHours($currentTime);
            $dayDiff = $anchorTimecar[$carouselitem->id]->diffInDays($currentTime);
            $cardiff[$carouselitem->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);

        }

        $eventItem = Event::orderBy('created_at', 'desc')->get();
        $eventdiff = array();

        foreach($eventItem as $eventitem){
            
            $anchorTimeeve[$eventitem->id] = Carbon::createFromFormat("Y-m-d H:i:s",$eventitem->created_at);
            $secondDiff = $anchorTimeeve[$eventitem->id]->diffInSeconds($currentTime);
            $minuteDiff = $anchorTimeeve[$eventitem->id]->diffInMinutes($currentTime);
            $hourDiff = $anchorTimeeve[$eventitem->id]->diffInHours($currentTime);
            $dayDiff = $anchorTimeeve[$eventitem->id]->diffInDays($currentTime);
            $eventdiff[$eventitem->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);

        }

        $newsItem = News::orderBy('created_at', 'desc')->get();
        $newsdiff = array();

        foreach($newsItem as $newsitem){
            
            $anchorTimenew[$newsitem->id] = Carbon::createFromFormat("Y-m-d H:i:s",$newsitem->created_at);
            $secondDiff = $anchorTimenew[$newsitem->id]->diffInSeconds($currentTime);
            $minuteDiff = $anchorTimenew[$newsitem->id]->diffInMinutes($currentTime);
            $hourDiff = $anchorTimenew[$newsitem->id]->diffInHours($currentTime);
            $dayDiff = $anchorTimenew[$newsitem->id]->diffInDays($currentTime);
            $newsdiff[$newsitem->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);

        }

        $announcementItem = Announcement::orderBy('created_at', 'desc')->get();
        $announcementdiff = array();

        foreach($announcementItem as $announcementitem){
            
            $anchorTimeann[$announcementitem->id] = Carbon::createFromFormat("Y-m-d H:i:s",$announcementitem->created_at);
            $secondDiff = $anchorTimeann[$announcementitem->id]->diffInSeconds($currentTime);
            $minuteDiff = $anchorTimeann[$announcementitem->id]->diffInMinutes($currentTime);
            $hourDiff = $anchorTimeann[$announcementitem->id]->diffInHours($currentTime);
            $dayDiff = $anchorTimeann[$announcementitem->id]->diffInDays($currentTime);
            $announcementdiff[$announcementitem->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);

        }

    //    $carouselItem = CarouselItem::whereMonth('created_at', $month)->get();
    //    $eventItem = Event::whereMonth('created_at', $month)->get();
    //    $newsItem = News::whereMonth('created_at', $month)->get();
    //    $announcementItem = Announcement::whereMonth('created_at', $month)->get();


        return view('dashboard',compact('totalVisits','todayVisits','monthVisits','yearVisits','totalNews','totalAnnouncement','totalEvents','newscount','announcementcount','eventscount',
                    'carouselItem','eventItem','newsItem','announcementItem','month','currentTime','today','date','cardiff','eventdiff','newsdiff','announcementdiff',
                    'anchorTimecar','anchorTimeann','anchorTimeeve','anchorTimenew'
    ));

    }
}
