<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Webpage\HomeController;
use App\Http\Controllers\Webpage\AboutController;
use App\Http\Controllers\Webpage\AdmissionPageController;
use App\Http\Controllers\Webpage\AdministrationController;
use App\Http\Controllers\Webpage\ServicesController;
use App\Http\Controllers\Webpage\SettingsController;


//Homepage Controllers
use App\Http\Controllers\Webpage\CarouselController;
use App\Http\Controllers\Webpage\FeaturedServicesController;
use App\Http\Controllers\Webpage\DiscoverTanzaInfosController;
use App\Http\Controllers\Webpage\CountsController;
use App\Http\Controllers\Webpage\ProgramsController;
use App\Http\Controllers\Webpage\AdmissionController;
use App\Http\Controllers\Webpage\NewsController;
use App\Http\Controllers\Webpage\AnnouncementController;


use App\Http\Controllers\Webpage\SwitchController;

//Dashboard
use App\Http\Controllers\Webpage\DashboardController;

//About Controllers
use App\Http\Controllers\Webpage\CampusHistoryController;
use App\Http\Controllers\Webpage\MVGController;
use App\Http\Controllers\Webpage\UniversitySealsController;
use App\Http\Controllers\Webpage\UniversityOfficialsController;
use App\Http\Controllers\Webpage\CampusOfficialsController;
use App\Http\Controllers\Webpage\CampusOfficialInfosController;
use App\Http\Controllers\Webpage\ContactInfoController;
use App\Http\Controllers\Webpage\ContactController;


//Admission
use App\Http\Controllers\Webpage\ProgramsOfferedController;
use App\Http\Controllers\Webpage\RequirementsProcedureController;
use App\Http\Controllers\Webpage\AdmissionResultController;


//Administration Controllers
use App\Http\Controllers\Webpage\OfficeRegistrarController;
use App\Http\Controllers\Webpage\ClinicController;
use App\Http\Controllers\Webpage\CashierController;
use App\Http\Controllers\Webpage\OsasController;
use App\Http\Controllers\Webpage\HumanResourceController;
use App\Http\Controllers\Webpage\MISController;
use App\Http\Controllers\Webpage\QAACController;
use App\Http\Controllers\Webpage\ResearchController;
use App\Http\Controllers\Webpage\LibraryController;
use App\Http\Controllers\Webpage\DITController;
use App\Http\Controllers\Webpage\TEDController;
use App\Http\Controllers\Webpage\DASController;
use App\Http\Controllers\Webpage\DoMController;

//Services
use App\Http\Controllers\Webpage\CSGController;
use App\Http\Controllers\Webpage\AboutOrgsController;

//Services
use App\Http\Controllers\Webpage\NewsandUpdatesController;
use App\Http\Controllers\Webpage\AnnouncementsController;
use App\Http\Controllers\Webpage\JobVacanciesController;
// use App\Http\Controllers\CalenderController;
// use App\Http\Livewire\ShowHideComponent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

//Search
use App\Http\Controllers\Webpage\SearchController;

//Settings
use App\Http\Controllers\Webpage\QuickLinksController;
use App\Http\Controllers\Webpage\OtherLinksController;
use App\Http\Controllers\Webpage\SocialMediaController;

//Controllers for Role
use App\Http\Controllers\SuperadminController;



//Home
Route::get('/', [HomeController::class, 'homepage'])->name('pages.homepage');
//About
Route::get('about_campus_history', [AboutController::class, 'campus_history'])->name('pages.campus_history');
Route::get('about_mvg', [AboutController::class, 'mvgs'])->name('pages.mvg');
Route::get('about_uni_seal', [AboutController::class, 'uni_seals'])->name('pages.uni_seal');
Route::get('about_uni_officials', [AboutController::class, 'uni_officials'])->name('pages.uni_officials');
Route::get('about_campus_officials', [AboutController::class, 'campus_officials'])->name('pages.campus_officials');
Route::get('about_contact_info', [AboutController::class, 'contact_infos'])->name('pages.contact_info');

//Admission Pages
Route::get('admission_programs_offered', [AdmissionPageController::class, 'programs_offered'])->name('pages.programs_offered');
Route::get('admission_requirements_procedure', [AdmissionPageController::class, 'requirements_procedure'])->name('pages.admission_requirements');
Route::get('admission_result', [AdmissionPageController::class, 'result'])->name('pages.admission_results');


//Administration
Route::get('admin_office_registrar', [AdministrationController::class, 'office_registrars'])->name('pages.office_registrar');
Route::get('admin_clinic',[AdministrationController::class, 'clinics'])->name('pages.clinic');
Route::get('admin_cashier', [AdministrationController::class, 'cashiers'])->name('pages.cashier');
Route::get('admin_osas', [AdministrationController::class, 'osass'])->name('pages.osas');
Route::get('admin_hr', [AdministrationController::class, 'hrs'])->name('pages.hr');
Route::get('admin_mis', [AdministrationController::class, 'mis'])->name('pages.mis');
Route::get('admin_qaac', [AdministrationController::class, 'qaacs'])->name('pages.qaac');
Route::get('admin_research', [AdministrationController::class, 'researchs'])->name('pages.research');
Route::get('admin_library', [AdministrationController::class, 'libs'])->name('pages.library');
Route::get('admin_dit', [AdministrationController::class, 'dits'])->name('pages.dep_it');
Route::get('admin_ted', [AdministrationController::class, 'teds'])->name('pages.teacher_dep');
Route::get('admin_das', [AdministrationController::class, 'dass'])->name('pages.dep_artscience');
Route::get('admin_dom', [AdministrationController::class, 'doms'])->name('pages.dep_management');

//Services
Route::get('services_csg', [ServicesController::class, 'csgs'])->name('pages.csg');
Route::get('services_acadorgs', [ServicesController::class, 'acadorgs']);
Route::get('services_nonacadorgs', [ServicesController::class, 'nonacadorgs']);
Route::get('services_newsandupdates', [ServicesController::class, 'newsandupdates']);
Route::get('services_announcements', [ServicesController::class, 'announcements']);
Route::get('services_campuscalendar', [ServicesController::class, 'campuscalendar']);
Route::get('services_jobvacancies', [ServicesController::class, 'jobvacancies']);
// Route::get('services_campuscalendar', function () {
//     return view('event::campuscalendar');
//  });

//Student route from show
Route::get('student_login', function () {
    return view('student.student_login');
 })->name('student_login');;


// News
Route::get('newsandupdates_news{new}', [NewsandUpdatesController::class, 'news']);

// Announcements
Route::get('announcements{announce}', [AnnouncementsController::class, 'announcements']);

// Job Vacancies
Route::get('jobvacancies{job}', [JobVacanciesController::class, 'jobvacancies']);

//Search
Route::get('search', [SearchController::class, 'search']);

// Route::post('/switches', 'HomeController@update')->name('switches.update');


// Route::get('/', 'HomeController@index')->name('home');
// Route::post('/switch', 'HomeController@update')->name('switch.update');


Route::get('/dashboard',[DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


//route for auth user pages
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::post('/profile', [ProfileController::class, 'store'])->name('user.profile.store');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//     // Add the following route to the existing routes because we want the posts route accessible to authenticated users only.
//     // We'll use a resource route because it contains all the exact routes we need for a typical CRUD application.
//     //homepage
//     // Route::resource('carousel_items',CarouselController::class);
//     // Route::resource('featured_services',FeaturedServicesController::class);
//     // Route::resource('discover_tanza_infos',DiscoverTanzaInfosController::class);
//     // Route::resource('counts',CountsController::class);
//     // Route::resource('programs',ProgramsController::class);
//     // Route::resource('admissions',AdmissionController::class);
//     // Route::resource('news',NewsController::class);
//     // Route::resource('announcements',AnnouncementController::class);
//     // Route::get('livewire',ShowHideComponent::class);
//     // Route::get('/livewire/show-hide-component', ShowHideComponent::class)->name('show_hide');
//     // Route::get('/livewire/show-hide-component', function () {
//     //     return view('livewire.show-hide-component', ShowHideComponent::class);
//     // });

//     // Route::post('/livewire/show-hide-component', 'AdmissionController@toggleSection')->name('show_hide');
//     // Route::resource('switch',SwitchController::class);

//     //about
//     // Route::resource('campus_history',CampusHistoryController::class);
//     // Route::resource('mvgs',MVGController::class);
//     // Route::resource('uni_seals',UniversitySealsController::class);
//     // Route::resource('uni_officials', UniversityOfficialsController::class);
//     // Route::resource('campus_officials',CampusOfficialsController::class);
//     // Route::resource('campus_official_infos',CampusOfficialInfosController::class);
//     // Route::resource('contact_infos',ContactInfoController::class);

//     //Admission
//     // Route::resource('programs_offers',ProgramsOfferedController::class);
//     // Route::resource('requirements_procedures',RequirementsProcedureController::class);
//     // Route::resource('admission_results',AdmissionResultController::class);

//     //Administration
//     // Route::resource('office_registrars',OfficeRegistrarController::class);
//     // Route::resource('clinics', ClinicController::class);
//     // Route::resource('cashiers', CashierController::class);
//     // Route::resource('osass', OsasController::class);
//     // Route::resource('hrs', HumanResourceController::class);
//     // Route::resource('mis', MISController::class);
//     // Route::resource('qaacs', QAACController::class);
//     // Route::resource('researchs', ResearchController::class);
//     // Route::resource('libs', LibraryController::class);
//     // Route::resource('dits', DITController::class);
//     // Route::resource('teds', TEDController::class);
//     // Route::resource('dass', DASController::class);
//     // Route::resource('doms', DoMController::class);

//     //Services
//     // Route::resource('csgs', CSGController::class);
//     // Route::resource('about_orgs', AboutOrgsController::class);
    
    
//     // Route::get('/events', function () {
//     //     return view('event::calendar');
//     //  });
//     // Route::resource('job_vacancies', JobVacanciesController::class);
 
//     //Settings
//     // Route::resource('quick_links', QuickLinksController::class);
//     // Route::resource('other_links', OtherLinksController::class);
//     // Route::resource('social_media', SocialMediaController::class);
    

// });

// superadmin route
Route::prefix('superadmin')->group(function(){
Route::get('/login',[SuperadminController::class, 'Index'])->name('login_from');
Route::post('/login/owner',[SuperadminController::class, 'Login'])->name('superadmin.login');
Route::get('/dashboard',[SuperadminController::class, 'Dashboard'])->name('superadmin.dashboard')->middleware('superadmin');
Route::get('/logout',[SuperadminController::class, 'SuperadminLogout'])->name('superadmin.logout')->middleware('superadmin');
Route::get('/register',[SuperadminController::class, 'SuperadminRegister'])->name('superadmin.register');
Route::post('/register/create',[SuperadminController::class, 'SuperadminRegisterCreate'])->name('superadmin.register.create');


//Student Portal management
Route::get('sp/dashboard', function () {
    return view('superadmin.sp.sp_superadmin_dashboard');
 })->name('sp/dashboard');;

//End Portal

// Website Management

//start homepage
Route::resource('carousel_items',CarouselController::class);
Route::resource('featured_services',FeaturedServicesController::class);
Route::resource('discover_tanza_infos',DiscoverTanzaInfosController::class);
Route::resource('counts',CountsController::class);
Route::resource('programs',ProgramsController::class);
Route::resource('admissions',AdmissionController::class);
Route::resource('news',NewsController::class);
Route::resource('announcements',AnnouncementController::class);   
Route::get('section_switch',[SwitchController::class, 'index'])->name('section_switch.index');
// End Homepage


//Start about
Route::resource('campus_history',CampusHistoryController::class);
Route::resource('mvgs',MVGController::class);
Route::resource('uni_seals',UniversitySealsController::class);
Route::resource('uni_officials', UniversityOfficialsController::class);
Route::resource('campus_officials',CampusOfficialsController::class);
Route::resource('campus_official_infos',CampusOfficialInfosController::class);
Route::resource('contact_infos',ContactInfoController::class);
// End About

//Start Admission
Route::resource('programs_offers',ProgramsOfferedController::class);
Route::resource('requirements_procedures',RequirementsProcedureController::class);
Route::resource('admission_results',AdmissionResultController::class);
// End Admission

//Start Administration
Route::resource('office_registrars',OfficeRegistrarController::class);
Route::resource('clinics', ClinicController::class);
Route::resource('cashiers', CashierController::class);
Route::resource('osass', OsasController::class);
Route::resource('hrs', HumanResourceController::class);
Route::resource('mis', MISController::class);
Route::resource('qaacs', QAACController::class);
Route::resource('researchs', ResearchController::class);
Route::resource('libs', LibraryController::class);
Route::resource('dits', DITController::class);
Route::resource('teds', TEDController::class);
Route::resource('dass', DASController::class);
Route::resource('doms', DoMController::class);
//End Administration

//Start Services
Route::resource('csgs', CSGController::class);
Route::resource('about_orgs', AboutOrgsController::class);

Route::get('superadmin/events', function () {
    return view('event::calendar');
 });
Route::resource('job_vacancies', JobVacanciesController::class);
//End Services

//Start Settings
Route::resource('quick_links', QuickLinksController::class);
Route::resource('other_links', OtherLinksController::class);
Route::resource('social_media', SocialMediaController::class);
//End Services

//Start Portal


});


require __DIR__.'/auth.php';