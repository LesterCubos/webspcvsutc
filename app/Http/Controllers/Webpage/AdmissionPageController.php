<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramsOffered;
use App\Models\RequirementsProcedure;
use App\Models\AdmissionResult;

use App\Models\QuickLinks;
use App\Models\OtherLinks;
use App\Models\SocialMediaLinks;

use App\Models\CarouselItem;

class AdmissionPageController extends Controller
{
    public function programs_offered(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $programs_offers = ProgramsOffered::all();
        return view('pages.programs_offered', compact('programs_offers','totalVisits','quicks','others','socialmedias'));
    }
    public function requirements_procedure(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $requirements_procedures = RequirementsProcedure::all();
        return view('pages.admission_requirements', compact('requirements_procedures','totalVisits','quicks','others','socialmedias'));
    }

    public function result(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();

        $totalVisits=views(CarouselItem::class)->count();

        $admission_results = AdmissionResult::all();
        return view('pages.admission_contact', compact('admission_results','totalVisits','quicks','others','socialmedias'));
    }
}
