<?php

namespace App\Http\Controllers\Publication\Writer;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function index(){
        $drafts = Article::where('created_by', Auth()->id())->where('publication_status', 'writer')->latest()->get();
        return view('publication.writer.drafts.show', compact('drafts'));
    }

    public function edit($id)
    {
        $categories = Category::where('status', 1)->pluck('name', 'id');
        $article = Article::find($id);
        return view('publication.writer.drafts.edit', compact('article', 'categories'));
    }
    public function update(Request $request, $id)
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
        $article->publication_status = "section";
        
        
        $article->save();

        return redirect('publication/writer/drafts')->with('success', 'Article submitted');
    }
}
