<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Webpage\HomeController;
use App\Http\Controllers\Webpage\AboutController;

use App\Http\Controllers\Webpage\CarouselController;
use App\Http\Controllers\Webpage\FeaturedServicesController;
use App\Http\Controllers\Webpage\DiscoverTanzaInfosController;
use App\Http\Controllers\Webpage\CountsController;
use App\Http\Controllers\Webpage\ProgramsController;
use App\Http\Controllers\Webpage\AdmissionController;
use App\Http\Controllers\Webpage\NewsController;
use App\Http\Controllers\Webpage\AnnouncementController;
use App\Http\Controllers\Webpage\EventController;

use App\Http\Controllers\Webpage\SwitchController;


use App\Http\Controllers\Webpage\CampusHistoryController;
use App\Http\Controllers\Webpage\MVGController;
use App\Http\Controllers\Webpage\UniversitySealsController;
use App\Http\Controllers\Webpage\UniversityOfficialsController;
use App\Http\Controllers\Webpage\CampusOfficialsController;
use App\Http\Controllers\Webpage\ContactInfoController;

// use App\Http\Livewire\ShowHideComponent;
use Illuminate\Support\Facades\Route;


//Home
Route::get('/', [HomeController::class, 'homepage'])->name('pages.homepage');
//About
Route::get('about_campus_history', [AboutController::class, 'campus_history'])->name('pages.campus_history');
Route::get('about_mvg', [AboutController::class, 'mvgs'])->name('pages.mvg');
Route::get('about_uni_seal', [AboutController::class, 'uni_seals'])->name('pages.uni_seal');
Route::get('about_uni_officials', [AboutController::class, 'uni_officials'])->name('pages.uni_officials');
Route::get('about_campus_officials', [AboutController::class, 'campus_officials'])->name('pages.campus_officials');
Route::get('about_contact_info', [AboutController::class, 'contact_infos'])->name('pages.contact_info');


// Route::post('/switches', 'HomeController@update')->name('switches.update');


// Route::get('/', 'HomeController@index')->name('home');
// Route::post('/switch', 'HomeController@update')->name('switch.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//route for admin pages
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'store'])->name('user.profile.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add the following route to the existing routes because we want the posts route accessible to authenticated users only.
    // We'll use a resource route because it contains all the exact routes we need for a typical CRUD application.
    //homepage
    Route::resource('carousel_items',CarouselController::class);
    Route::resource('featured_services',FeaturedServicesController::class);
    Route::resource('discover_tanza_infos',DiscoverTanzaInfosController::class);
    Route::resource('counts',CountsController::class);
    Route::resource('programs',ProgramsController::class);
    // Route::resource('admissions',AdmissionController::class);
    Route::resource('admissions', AdmissionController::class);
    Route::resource('news',NewsController::class);
    Route::resource('announcements',AnnouncementController::class);
    Route::resource('events',EventController::class);
    // Route::get('livewire',ShowHideComponent::class);
    // Route::get('/livewire/show-hide-component', ShowHideComponent::class)->name('show_hide');
    // Route::get('/livewire/show-hide-component', function () {
    //     return view('livewire.show-hide-component', ShowHideComponent::class);
    // });

    // Route::post('/livewire/show-hide-component', 'AdmissionController@toggleSection')->name('show_hide');
    Route::resource('switch',SwitchController::class);

    //about
    Route::resource('campus_history',CampusHistoryController::class);
    Route::resource('mvgs',MVGController::class);
    Route::resource('uni_seals',UniversitySealsController::class);
    Route::resource('uni_officials', UniversityOfficialsController::class);
    Route::resource('campus_officials',CampusOfficialsController::class);
    Route::resource('contact_infos',ContactInfoController::class);

});

require __DIR__.'/auth.php';
