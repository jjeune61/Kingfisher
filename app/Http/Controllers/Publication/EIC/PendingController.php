<?php

namespace App\Http\Controllers\Publication\EIC;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PendingController extends Controller
{
    public function index(){
        $articles = Article::where('publication_status', 'eic')->latest()->get();
        return view('publication.eic.pendings.show', compact('articles'));
        }
    
        public function edit($id)
        {
            $categories = Category::where('status', 1)->pluck('name', 'id');
            $article = Article::find($id);
            return view('publication.eic.pendings.approval', compact('article', 'categories'));
        }
        public function approve(Request $request, $id)
        {
            $this->validate($request, [
                'title'=>'required',
                'short_description'=>'required',
                'description'=>'required',
                'category_id'=>'required',
            ]);
    
            $article = Article::find($id);
    
            $article->title = $request->title;
            $article->slug = str_slug($request->title,'-');
            $article->short_description = $request->short_description;;
            $article->description = $request->description;
            $article->category_id = $request->category_id;
            $article->publication_status = "ready";
            
            
            $article->save();
    
            return redirect('publication/eic/pendings')->with('success', 'Article approved');
        }
        public function disapprove($id)
        {
            $article = Article::find($id);
            $article->publication_status = "associate";
            $article->save();
    
            return redirect('publication/eic/pendings')->with('success', 'Article disapproved');
        }
}
