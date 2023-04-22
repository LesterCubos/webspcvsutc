<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CampusHistory;
use App\Models\MVG;
use App\Models\UniversitySeal;
use App\Models\UniversityOfficial;
use App\Models\CampusOfficial;
use App\Models\ContactInfo;

class AboutController extends Controller
{

    public function campus_history(){

        $campus_history = CampusHistory::all();
        return view('pages.campus_history',compact('campus_history'));
    }

    public function mvgs(){

        $mvgs = MVG::all();
        return view('pages.mvg',compact('mvgs'));
    }

    public function uni_seals(){

        $uni_seals = UniversitySeal::all();
        return view('pages.uni_seal', compact('uni_seals'));
    }

    public function uni_officials(){

        $uni_officials = UniversityOfficial::all();
        return view('pages.uni_officials', compact('uni_officials'));
    }

    public function campus_officials(){

        $campus_officials = CampusOfficial::all();
        return view('pages.campus_officials', compact('campus_officials'));
    }

    public function contact_infos(){

        $contact_infos = ContactInfo::all();
        return view('pages.contact_info', compact('contact_infos'));
    }

    public function admissionrequirements(){
        return view('pages.admissionrequirements');
    }

}
