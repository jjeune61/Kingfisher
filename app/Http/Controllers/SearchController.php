<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        $search = Article::query()
            ->when(request('search'), function($query){
                $query->where('title', 'LIKE', '%' . request('search'). '%');
            })
            ->simplePaginate(5);

        return view('search', compact('search'));
    }
}
