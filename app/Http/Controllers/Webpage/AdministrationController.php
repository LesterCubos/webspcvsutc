<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\OfficeRegistrar;
use App\Models\Clinic;
use App\Models\Cashier;
use App\Models\Osas;
use App\Models\HumanResource;
use App\Models\MIS;

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
}
