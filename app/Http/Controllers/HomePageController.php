<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(Request $request){
        $featured = Article::where('hot_news',1)->where('status',1)->limit(1)->get();
        $top_viewed = Article::where('status',1)->orderBy('view_count','DESC')->limit(2)->get();
        $latest_article=Article::where('status',1)->latest()->limit(5)->get();
        
        return view('welcome',compact('featured', 'top_viewed', 'latest_article'));
    }
}
