<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ContentPageController extends Controller
{
    public function index($slug){
        $articles=Article::where('status', 1)->where('slug', $slug)->first();

        $articles->view_count = $articles->view_count+1;
        $articles->save();

        $related_articles = Article::where('status', 1)->where('id','!=', $articles->id)
                                                        ->where('category_id', $articles->category_id)
                                                        ->latest()->limit(4)->get();
        return view('content', compact('articles', 'related_articles'));
    }
}
