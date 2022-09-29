<?php

namespace App\Http\Controllers\Publication\Writer;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use IntlChar;
use Symfony\Component\Console\Input\Input;

class ArticleController extends Controller
{
    
    public function index(){
        $articles = Article::where('created_by', Auth()->id())->latest()->get();
        return view('publication.writer.articles.show', compact('articles'));
    }

    public function create()
    {
        $categories = Category::where('status', 1)->pluck('name', 'id');
        return view('publication.writer.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'category_id'=>'required',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = str_slug($request->title,'-');
        $article->short_description = $request->short_description;;
        $article->description = $request->description;
        $article->category_id = $request->category_id;
        $article->status = 0;
        $article->hot_news = 0;
        $article->view_count = 0;
        $article->main_image = "";
        $article->thumb_image = "";
        $article->list_image = "";
        $article->created_by = Auth::id();


        switch ($request->input('action')) {
            case 'submit':
                $article->publication_status = "section";
                $article->save();
                return redirect('/publication/writer/articles')->with('success', 'Article created successfully and submitted to associate editor'); 
                break;

            case 'instant':
                $article->publication_status = "eic";
                $article->save();
                return redirect('/publication/writer/articles')->with('success', 'Article created successfully and submitted to EIC');
                break;

            case 'draft':
                $article->publication_status = "writer";
                $article->save();
                return redirect('/publication/writer/articles')->with('success', 'Article saved to drafts');
                break;
        }

    }
}
