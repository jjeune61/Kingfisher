<?php

namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    //
    public function like($article_id){
       $like=Like::where('article_id',$article_id)->where('user_id', Auth()->user()->id)->first();

       if($like){

            $like->delete();
            return back();
       }else{
           Like::create([
            'article_id'=>$article_id,
            'user_id'=> Auth()->user()->id
           ]);
           return back();
       }
    }

}
