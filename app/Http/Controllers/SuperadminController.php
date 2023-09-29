<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CarouselItem;
use App\Models\News;
use App\Models\Announcement;
use App\Models\UniversitySeal;
use Latfur\Event\Models\Event;
use App\Models\Superadmin;
use App\Models\User;
use CyrildeWit\EloquentViewable\Support\Period;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;


class SuperadminController extends Controller
{
    public function Index(){
        return view('superadmin.superadmin_login');
    }

    public function dashboard(){
        // Total Visitors. Comment totalvisits before live
        $totalVisits = views(CarouselItem::class)->count();
        //Today
        $today = Carbon::today();
        $date = Carbon::now();
        $todayVisits = views (CarouselItem::class)
        ->period(Period::since(Carbon::create($today)))
        ->count();
        //Month
        $month = Carbon::now()->month;
        $startMonth = Carbon::now()->startOfMonth();
        $endMonth = Carbon::now()->endOfMonth();
        $monthVisits = views (CarouselItem::class)
        ->period(Period::create($startMonth,$endMonth))
        ->remember()
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

        if ($carouselItem->isEmpty()) {
            $anchorTimecar = 0;
        } else {
            foreach($carouselItem as $carouselitem){
            
                $anchorTimecar[$carouselitem->id] = Carbon::createFromFormat("Y-m-d H:i:s",$carouselitem->created_at);
                $secondDiff = $anchorTimecar[$carouselitem->id]->diffInSeconds($currentTime);
                $minuteDiff = $anchorTimecar[$carouselitem->id]->diffInMinutes($currentTime);
                $hourDiff = $anchorTimecar[$carouselitem->id]->diffInHours($currentTime);
                $dayDiff = $anchorTimecar[$carouselitem->id]->diffInDays($currentTime);
                $cardiff[$carouselitem->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);
    
            }
        }

        $eventItem = Event::orderBy('created_at', 'desc')->get();
        $eventdiff = array();

        if ($eventItem->isEmpty()) {
            $anchorTimeeve = 0;
        } else {
            foreach($eventItem as $eventitem){
            
                $anchorTimeeve[$eventitem->id] = Carbon::createFromFormat("Y-m-d H:i:s",$eventitem->created_at);
                $secondDiff = $anchorTimeeve[$eventitem->id]->diffInSeconds($currentTime);
                $minuteDiff = $anchorTimeeve[$eventitem->id]->diffInMinutes($currentTime);
                $hourDiff = $anchorTimeeve[$eventitem->id]->diffInHours($currentTime);
                $dayDiff = $anchorTimeeve[$eventitem->id]->diffInDays($currentTime);
                $eventdiff[$eventitem->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);
    
            }
        }

        $newsItem = News::orderBy('created_at', 'desc')->get();
        $newsdiff = array();

        if ($newsItem->isEmpty()) {
            $anchorTimenew = 0;
        } else {
            foreach($newsItem as $newsitem){
            
                $anchorTimenew[$newsitem->id] = Carbon::createFromFormat("Y-m-d H:i:s",$newsitem->created_at);
                $secondDiff = $anchorTimenew[$newsitem->id]->diffInSeconds($currentTime);
                $minuteDiff = $anchorTimenew[$newsitem->id]->diffInMinutes($currentTime);
                $hourDiff = $anchorTimenew[$newsitem->id]->diffInHours($currentTime);
                $dayDiff = $anchorTimenew[$newsitem->id]->diffInDays($currentTime);
                $newsdiff[$newsitem->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);
    
            }
        }

        $announcementItem = Announcement::orderBy('created_at', 'desc')->get();
        $announcementdiff = array();
        
        if ($announcementItem->isEmpty()) {
            $anchorTimeann = 0;
        } else {
            foreach($announcementItem as $announcementitem){
            
                $anchorTimeann[$announcementitem->id] = Carbon::createFromFormat("Y-m-d H:i:s",$announcementitem->created_at);
                $secondDiff = $anchorTimeann[$announcementitem->id]->diffInSeconds($currentTime);
                $minuteDiff = $anchorTimeann[$announcementitem->id]->diffInMinutes($currentTime);
                $hourDiff = $anchorTimeann[$announcementitem->id]->diffInHours($currentTime);
                $dayDiff = $anchorTimeann[$announcementitem->id]->diffInDays($currentTime);
                $announcementdiff[$announcementitem->id] = array($secondDiff, $minuteDiff, $hourDiff, $dayDiff);
    
            }    
        }

        //'totalVisits',
        return view('superadmin.superadmin_dashboard',compact('totalVisits','todayVisits','monthVisits','yearVisits','totalNews','totalAnnouncement','totalEvents','newscount','announcementcount','eventscount',
        'carouselItem','eventItem','newsItem','announcementItem','month','startMonth','endMonth','currentTime','today','date','cardiff','eventdiff','newsdiff','announcementdiff',
        'anchorTimecar','anchorTimeann','anchorTimeeve','anchorTimenew'
        ));
    }

    public function SPDashboard(){
        return view('superadmin.sp.sp_superadmin_dashboard');
    }
    public function Login(Request $request){
        // dd($request->all());
        $check = $request->all();
        if (Auth::guard('superadmin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){
            return redirect()->route('superadmin.dashboard')->with('error','Superadmin Login Successfully');
        }else {
            return back()->with('error','Invalid email or password!');
        }
    }

    public function SuperadminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('error','Logout Successfully');
    }
    
    // public function SuperadminRegister(){
    //     return view('superadmin.superadmin_register');
    // }

    // public function SuperadminRegisterCreate(Request $request){
    //     // dd($request->all());
    //     Superadmin::insert([
    //         'name'=> $request->name,
    //         'email'=> $request->email,
    //         'password'=> Hash::make($request->password),
    //         'created_at'=> Carbon::now(),
    //     ]);
    //     return redirect()->route('login_from')->with('error','Superadmin Created Successfully');

    // }
}
