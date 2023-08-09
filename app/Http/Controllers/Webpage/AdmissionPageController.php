<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramsOffered;
use App\Models\RequirementsProcedure;
use App\Models\AdmissionResult;

use App\Models\CarouselItem;

class AdmissionPageController extends Controller
{
    public function programs_offered(){

        $totalVisits=views(CarouselItem::class)->count();

        $programs_offers = ProgramsOffered::all();
        return view('pages.programs_offered', compact('programs_offers','totalVisits'));
    }
    public function requirements_procedure(){

        $totalVisits=views(CarouselItem::class)->count();

        $requirements_procedures = RequirementsProcedure::all();
        return view('pages.admission_requirements', compact('requirements_procedures','totalVisits'));
    }

    public function result(){

        $totalVisits=views(CarouselItem::class)->count();

        $admission_results = AdmissionResult::all();
        return view('pages.admission_results', compact('admission_results','totalVisits'));
    }
}
