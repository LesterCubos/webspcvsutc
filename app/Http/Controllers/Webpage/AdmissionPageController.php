<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramsOffered;
use App\Models\RequirementsProcedure;
use App\Models\AdmissionResult;
class AdmissionPageController extends Controller
{
    public function programs_offered(){

        $programs_offers = ProgramsOffered::all();
        return view('pages.programs_offered', compact('programs_offers'));
    }
    public function requirements_procedure(){

        $requirements_procedures = RequirementsProcedure::all();
        return view('pages.admission_requirements', compact('requirements_procedures'));
    }

    public function result(){

        $admission_results = AdmissionResult::all();
        return view('pages.admission_results', compact('admission_results'));
    }
}
