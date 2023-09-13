<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\SwitchSection;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class SwitchController extends Controller
{
    public function index()
    {
        return view('superadmin.website_admin_panel.homepage_section.section_switch.index',[
                    'switchs' => SwitchSection::all()
                ]);
    
    }

    
}
