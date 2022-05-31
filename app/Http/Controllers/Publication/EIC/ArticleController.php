<?php

namespace App\Http\Controllers\Publication\EIC;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;


class ArticleController extends Controller
{
    public function index()
    {
        // if(Auth::user()->type === 1 || Auth::user()->hasRole(['Editor','Writer'])){
        //     $articles = Article::with(['creator'])->latest()->get();
        // }else{
        //     $articles = Article::with(['creator'])->where('created_by', Auth::user()->id)->latest()->get();
        // }
        $articles = Article::where('publication_status', 'ready')->latest()->get();
        return view('publication.eic.articles.show', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 1)->pluck('name', 'id');
        return view('publication.eic.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'img'=>'required',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = str_slug($request->title,'-');
        $article->short_description = $request->short_description;;
        $article->description = $request->description;
        $article->category_id = $request->category_id;; 
        $article->status = 1;
        $article->hot_news = 0;
        $article->view_count = 0;
        $article->main_image = "";
        $article->thumb_image = "";
        $article->list_image = "";
        $article->created_by = Auth::id();
        $article->save();
        
        $file = $request->file('img');
        $extension = $file->getClientOriginalExtension();
        $main_image = 'article_main'.'_'.$article->id.'.'.$extension;
        $thumb_image = 'article_thumb'.'_'.$article->id.'.'.$extension;
        $list_image = 'article_list'.'_'.$article->id.'.'.$extension;
        Image::make($file)->resize(653,569)->save(public_path('/article/'.$main_image));
        Image::make($file)->resize(360,309)->save(public_path('/article/'.$thumb_image));
        Image::make($file)->resize(122,122)->save(public_path('/article/'.$list_image));
        $article->main_image = "$main_image";
        $article->thumb_image = "$thumb_image";
        $article->list_image = "$list_image";
        $article->save();

        return redirect('/publication/eic/articles')->with('success', 'Article created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('status', 1)->pluck('name', 'id');
        $article = Article::find($id);
        return view('publication.eic.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'category_id'=>'required',
        ]);

        $article = Article::find($id);

        if($request->file('img')){
            
            @unlink(public_path('/article/'.$article->$main_image));
            @unlink(public_path('/article/'.$article->$thumb_image));
            @unlink(public_path('/article/'.$article->$list_image));
        
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $main_image = 'article_main'.'_'.$article->id.'.'.$extension;
            $thumb_image = 'article_thumb'.'_'.$article->id.'.'.$extension;
            $list_image = 'article_list'.'_'.$article->id.'.'.$extension;
            Image::make($file)->resize(653,569)->save(public_path('/article/'.$main_image));
            Image::make($file)->resize(360,309)->save(public_path('/article/'.$thumb_image));
            Image::make($file)->resize(122,122)->save(public_path('/article/'.$list_image));
            $article->main_image = "$main_image";
            $article->thumb_image = "$thumb_image";
            $article->list_image = "$list_image";
        }
        
        
        $article->save();

        return redirect('/publication/eic/articles')->with('success', 'Article updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        @unlink(public_path('/article/'.$article->$main_image));
        @unlink(public_path('/article/'.$article->$thumb_image));
        @unlink(public_path('/article/'.$article->$list_image));
        $article->delete();

        return redirect('/publication/eic/articles')->with('success', "article deleted"); 
    }

    public function status($id){
        $article = Article::find($id);
        if($article->status === 1){
            $article->status = 0;
        }else{
            $article->status = 1;
        }
        $article->save();

        return redirect('/publication/eic/articles')->with('success', 'article status changed');
    }

    public function hot_news($id){
        $article = Article::find($id);
        if($article->hot_news === 1){
            $article->hot_news = 0;
        }else{
            $article->hot_news = 1;
        }
        $article->save();

        return redirect('/publication/eic/articles')->with('success', 'article set as featured news changed');
    }
}
