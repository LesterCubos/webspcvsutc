<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\OfficeRegistrar;
use App\Models\Clinic;
use App\Models\Cashier;
use App\Models\Osas;
use App\Models\HumanResource;
use App\Models\MIS;
use App\Models\Research;
use App\Models\Library;

use App\Models\DIT;
use App\Models\TED;
use App\Models\DAS;
use App\Models\DoM;
use Illuminate\Http\Request;



class AdministrationController extends Controller
{
    public function office_registrars(){
        // $mvgs = MVG::all();
        // return view('pages.mvg',compact('mvgs'));
        $office_registrars = OfficeRegistrar::all();
        return view('pages.office_registrar', compact('office_registrars'));
    }

    public function clinics(){
        $clinics = Clinic::all();
        return view('pages.clinic', compact('clinics'));
    }

    public function cashiers(){
        $cashiers = Cashier::all();
        return view('pages.cashier', compact('cashiers'));
    }

    public function osass(){
        $osass = Osas::all();
        return view('pages.osas', compact('osass'));
    }

    public function hrs(){
        $hrs = HumanResource::all();
        return view('pages.hr', compact('hrs'));
    }

    public function mis(){
        $mis = MIS::all();
        return view('pages.mis', compact('mis'));
    }

    public function researchs(){
        $researchs = Research::all();
        return view('pages.research', compact('researchs'));
    }

    public function libs(){
        $libs = Library::all();
        return view('pages.library', compact('libs'));
    }

    public function dits(){
        $dits = DIT::all();
        return view('pages.dep_it', compact('dits'));
    }

    public function teds(){
        $teds = TED::all();
        return view('pages.teacher_dep', compact('teds'));
    }

    public function dass(){
        $dass = DAS::all();
        return view('pages.dep_artscience', compact('dass'));
    }

    public function doms(){
        $doms = DoM::all();
        return view('pages.dep_management', compact('doms'));
    }


}
