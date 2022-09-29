<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class DashboardController extends Controller
{

    public function index(){

        $users = User::where('status', '1')->count();
        $articles = Article::count();
        $categories = Category::count();
        $comments = Comment::count();
        $articleviews = Article::sum('view_count');

        return view('admin.dashboard', compact('users', 'articles', 'categories', 'comments', 'articleviews'));
    }
}
