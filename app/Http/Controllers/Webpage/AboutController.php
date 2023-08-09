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
use App\Models\CampusOfficialInfo;
use App\Models\ContactInfo;
use App\Models\Contact;

use App\Models\CarouselItem;


class AboutController extends Controller
{

    public function campus_history(){

        $totalVisits=views(CarouselItem::class)->count();

        $campus_history = CampusHistory::all();
        return view('pages.campus_history',compact('campus_history','totalVisits'));
    }

    public function mvgs(){

        $totalVisits=views(CarouselItem::class)->count();

        $mvgs = MVG::all();
        return view('pages.mvg',compact('mvgs','totalVisits'));
    }

    public function uni_seals(){

        $totalVisits=views(CarouselItem::class)->count();

        $uni_seals = UniversitySeal::all();
        return view('pages.uni_seal', compact('uni_seals','totalVisits'));
    }

    public function uni_officials(){

        $totalVisits=views(CarouselItem::class)->count();

        $uni_officials = UniversityOfficial::all();
        return view('pages.uni_officials', compact('uni_officials','totalVisits'));
    }

    public function campus_officials(){

        $totalVisits=views(CarouselItem::class)->count();

        $campus_officials = CampusOfficial::all();
        $campus_official_infos= CampusOfficialInfo::all();
        return view('pages.campus_officials', compact('campus_officials','campus_official_infos','totalVisits'));
    }

    public function contact_infos(){

        $totalVisits=views(CarouselItem::class)->count();

        $contact_infos = ContactInfo::all();
        return view('pages.contact_info', compact('contact_infos','totalVisits'));
    }

   public function contact(){

    $totalVisits=views(CarouselItem::class)->count();

        $contacts = Contact::all();
        return view('pages.contact_info');
   }

}
