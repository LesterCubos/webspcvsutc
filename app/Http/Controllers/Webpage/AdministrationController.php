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

use App\Models\QuickLinks;
use App\Models\OtherLinks;
use App\Models\SocialMediaLinks;
use App\Models\ContactInfo;

use App\Models\CarouselItem;



class AdministrationController extends Controller
{
    public function office_registrars(){
        // $mvgs = MVG::all();
        // return view('pages.mvg',compact('mvgs'));
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();

        $office_registrars = OfficeRegistrar::all();
        return view('pages.office_registrar', compact('contact_infos','office_registrars','totalVisits','quicks','others','socialmedias'));
    }

    public function clinics(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $clinics = Clinic::all();
        return view('pages.clinic', compact('contact_infos','clinics','totalVisits','quicks','others','socialmedias'));
    }

    public function cashiers(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $cashiers = Cashier::all();
        return view('pages.cashier', compact('contact_infos','cashiers','totalVisits','quicks','others','socialmedias'));
    }

    public function osass(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $osass = Osas::all();
        return view('pages.osas', compact('contact_infos','osass','totalVisits','quicks','others','socialmedias'));
    }

    public function hrs(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $hrs = HumanResource::all();
        return view('pages.hr', compact('contact_infos','hrs','totalVisits','quicks','others','socialmedias'));
    }

    public function mis(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $mis = MIS::all();
        return view('pages.mis', compact('contact_infos','mis','totalVisits','quicks','others','socialmedias'));
    }

    public function researchs(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $researchs = Research::all();
        return view('pages.research', compact('contact_infos','researchs','totalVisits','quicks','others','socialmedias'));
    }

    public function libs(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $libs = Library::all();
        return view('pages.library', compact('contact_infos','libs','totalVisits','quicks','others','socialmedias'));
    }

    public function dits(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $dits = DIT::all();
        return view('pages.dep_it', compact('contact_infos','dits','totalVisits','quicks','others','socialmedias'));
    }

    public function teds(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $teds = TED::all();
        return view('pages.teacher_dep', compact('contact_infos','teds','totalVisits','quicks','others','socialmedias'));
    }

    public function dass(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $dass = DAS::all();
        return view('pages.dep_artscience', compact('contact_infos','dass','totalVisits','quicks','others','socialmedias'));
    }

    public function doms(){
        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $doms = DoM::all();
        return view('pages.dep_management', compact('contact_infos','doms','totalVisits','quicks','others','socialmedias'));
    }

    public function departments(){

        $quicks = QuickLinks::all();
        $others = OtherLinks::all();
        $socialmedias = SocialMediaLinks::all();
        $contact_infos = ContactInfo::all();
        $totalVisits=views(CarouselItem::class)->count();
        $doms = DoM::all();
        $dass = DAS::all();
        $teds = TED::all();
        $dits = DIT::all();

        return view('pages.departments', compact('contact_infos','doms','dass','teds','dits','totalVisits','quicks','others','socialmedias'));
    }
}
