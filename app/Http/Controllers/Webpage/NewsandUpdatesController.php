<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\News;

use App\Models\CarouselItem;
use App\Models\SocialMediaLinks;
use App\Models\QuickLinks;
use App\Models\OtherLinks;
use App\Models\ContactInfo;

use Illuminate\Http\Request;

class NewsandUpdatesController extends Controller
{
    public function news(News $new){

    views($new)
    ->cooldown($minutes = 3)
    ->record();

    $totalViews = views($new)->count();

    $totalVisits=views(CarouselItem::class)->count();

    $quicks = QuickLinks::all();
    $others = OtherLinks::all();
    $socialmedias = SocialMediaLinks::all();
    $contact_infos = ContactInfo::all();

    $news = News::all();
    return view('pages.news.news', compact('contact_infos','news','totalViews','totalVisits','quicks','others','socialmedias'), ['new' => $new]);
    }

}
