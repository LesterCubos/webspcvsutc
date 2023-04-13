<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\Webpage\HomeController;
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

// use App\Http\Livewire\ShowHideComponent;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'homepage'])->name('pages.homepage');
// Route::post('/switches', 'HomeController@update')->name('switches.update');


// Route::get('/', 'HomeController@index')->name('home');
// Route::post('/switch', 'HomeController@update')->name('switch.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'store'])->name('user.profile.store');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Add the following route to the existing routes because we want the posts route accessible to authenticated users only.
    // We'll use a resource route because it contains all the exact routes we need for a typical CRUD application.
    Route::resource('carousel_items',CarouselController::class);
    Route::resource('featured_services',FeaturedServicesController::class);
    Route::resource('discover_tanza_infos',DiscoverTanzaInfosController::class);
    Route::resource('counts',CountsController::class);
    Route::resource('programs',ProgramsController::class);
    Route::resource('admissions',AdmissionController::class);
    Route::resource('news',NewsController::class);
    Route::resource('announcements',AnnouncementController::class);
    Route::resource('events',EventController::class);
    Route::resource('events',EventController::class);
    // Route::get('livewire',ShowHideComponent::class);
    // Route::get('/livewire/show-hide-component', ShowHideComponent::class)->name('show_hide');
    // Route::get('/livewire/show-hide-component', function () {
    //     return view('livewire.show-hide-component', ShowHideComponent::class);
    // });

    // Route::post('/livewire/show-hide-component', 'AdmissionController@toggleSection')->name('show_hide');
    Route::resource('switch',SwitchController::class);
});

require __DIR__.'/auth.php';
