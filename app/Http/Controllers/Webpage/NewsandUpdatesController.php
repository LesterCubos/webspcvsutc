<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\News;

use App\Models\CarouselItem;

use Illuminate\Http\Request;

class NewsandUpdatesController extends Controller
{
    public function news(News $new){

    views($new)
    ->cooldown($minutes = 3)
    ->record();

    $totalViews = views($new)->count();

    $totalVisits=views(CarouselItem::class)->count();

    $news = News::all();
    return view('pages.news.news', compact('news','totalViews','totalVisits'), ['new' => $new]);
    }

}
