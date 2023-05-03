<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgramsOffered;

class AdmissionPageController extends Controller
{
    public function programs_offered(){

        $programs_offers = ProgramsOffered::all();
        return view('pages.programs_offered', compact('programs_offers'));
    }


}
