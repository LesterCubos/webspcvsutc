<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CampusHistory;
use App\Models\MVG;
use App\Models\UniversitySeal;
use App\Models\UniversityOfficial;
use App\Models\CampusOfficial;
use App\Models\CampusOfficialInfo;
use App\Models\ContactInfo;
use App\Models\Contact;

use App\Models\QuickLinks;
use App\Models\OtherLinks;
use App\Models\SocialMediaLinks;

use App\Models\CarouselItem;


class AboutController extends Controller
{

    public function campus_history(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $campus_history = CampusHistory::all();
        return view('pages.campus_history',compact('campus_history','totalVisits','quicks','others','socialmedias'));
    }

    public function mvgs(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $mvgs = MVG::all();
        return view('pages.mvg',compact('mvgs','totalVisits','quicks','others','socialmedias'));
    }

    public function uni_seals(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $uni_seals = UniversitySeal::all();
        return view('pages.uni_seal', compact('uni_seals','totalVisits','quicks','others','socialmedias'));
    }

    public function uni_officials(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $uni_officials = UniversityOfficial::all();
        return view('pages.uni_officials', compact('uni_officials','totalVisits','quicks','others','socialmedias'));
    }

    public function campus_officials(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $campus_officials = CampusOfficial::all();
        $campus_official_infos= CampusOfficialInfo::all();
        return view('pages.campus_officials', compact('campus_officials','campus_official_infos','totalVisits','quicks','others','socialmedias'));
    }

    public function contact_infos(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $contact_infos = ContactInfo::all();
        return view('pages.contact_info', compact('contact_infos','totalVisits','quicks','others','socialmedias'));
    }

   public function contact(){

    $quicks = QuickLinks::all();
    $others = OtherLinks::all();
    $socialmedias = SocialMediaLinks::all();

    $totalVisits=views(CarouselItem::class)->count();

        $contacts = Contact::all();
        return view('pages.contact_info');
   }

}
