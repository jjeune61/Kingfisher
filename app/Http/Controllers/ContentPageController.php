<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;
use App\Models\User;
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

        $like=Like::where('article_id', $articles->id)->count();
        
        return view('content', compact('articles', 'related_articles', 'like'));

        
    }

}
