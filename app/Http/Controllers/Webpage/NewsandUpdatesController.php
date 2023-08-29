<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\News;

use App\Models\CarouselItem;
use App\Models\SocialMediaLinks;
use App\Models\QuickLinks;
use App\Models\OtherLinks;

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

    $news = News::all();
    return view('pages.news.news', compact('news','totalViews','totalVisits','quicks','others','socialmedias'), ['new' => $new]);
    }

}
