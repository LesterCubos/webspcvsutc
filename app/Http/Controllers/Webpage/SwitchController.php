<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\SwitchSection;
use App\Models\InstructorPageSwitch;
use App\Models\AcademicYear;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Legend;


class SwitchController extends Controller
{
    public function index()
    {
        return view('superadmin.website_admin_panel.homepage_section.section_switch.index',[
                    'switchs' => SwitchSection::all()
                ]);
    
    }

    public function instructorpage()
    {
        return view('admin.instructor_page_switch.index',[
                    'switchs' => InstructorPageSwitch::all(), 'acadyears'=> AcademicYear::where('isActive', '1')->get(),
                    'legends' => Legend::all()
                ]);
    
    }

    
}
