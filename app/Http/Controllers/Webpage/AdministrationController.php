<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\OfficeRegistrar;

class AdministrationController extends Controller
{
    public function office_registrars(){
        // $mvgs = MVG::all();
        // return view('pages.mvg',compact('mvgs'));
        //$office_registrars = OfficeRegistrar::all();
        return view('pages.office_registrar');
    }
}
