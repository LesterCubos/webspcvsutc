<?php

namespace App\Http\Controllers\Webpage;

use App\Http\Controllers\Controller;
use App\Models\News;

use Illuminate\Http\Request;

class NewsandUpdatesController extends Controller
{
    public function news1(){
        $news = News::all();
        return view('pages.news.news1', compact('news'));
    }

    public function news2(){
        $news = News::all();
        return view('pages.news.news2', compact('news'));
    }

    public function news3(){
        $news = News::all();
        return view('pages.news.news3', compact('news'));
    }

    public function news4(){
        $news = News::all();
        return view('pages.news.news4', compact('news'));
    }

    public function news5(){
        $news = News::all();
        return view('pages.news.news5', compact('news'));
    }
}
