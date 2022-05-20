<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class NewsPageController extends Controller
{
    public function index(){
        $articles=Article::where('status',1)->latest()->paginate(5);
        return view('articles',compact('articles'));
    }
    public function listing($id){
        
        $articles = Article::with('category')->where('status', 1)->where('category_id', $id)->latest()->paginate(5);

        return view('articles', compact('articles'));
    }
}
