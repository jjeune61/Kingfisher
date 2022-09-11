<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentPageController extends Controller
{
    public function index(){
        $comments = Comment::where('status', 1)->latest()->paginate(10);
        return view('comments', compact('comments'));
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'comment'=>'required',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth()->user()->id;
        $comment->name = Auth()->user()->name;
        $comment->comment = $request->comment;
        $comment->status = 0;
        $comment->save();

        return redirect('/comments');
    }
}
