<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthorController;//Users 
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\CommentPageController;
use App\Http\Controllers\ContentPageController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\NewsPageController;//Articles
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//WEBSITE
Route::get('/',[HomePageController::class, 'index'])->name('landing');//landing page

Route::get('/articles',[NewsPageController::class, 'index']);//article section
Route::get('/articles/{id}',[NewsPageController::class, 'listing']);//article section category

Route::get('/content/{slug}',[ContentPageController::class, 'index']);//article content

Route::get('/comments', [CommentPageController::class, 'index']);
Route::post('/comments', [CommentPageController::class, 'store']);

//ADMIN SIDE
Route::group(['prefix'=>'/admin', 'middleware'=>'auth'], function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');  
    
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
    Route::get('/authors/create', [AuthorController::class, 'create']);
    Route::post('/authors/store', [AuthorController::class, 'store']);
    Route::get('/authors/edit/{id}', [AuthorController::class, 'edit'])->name('author-edit');
    Route::put('/authors/edit/{id}', [AuthorController::class, 'update'])->name('author-update');
    Route::delete('/authors/delete/{id}', [AuthorController::class, 'destroy']);

    Route::get('/articles', [ArticleController::class, 'index'])->name('article');
    Route::get('/articles/create', [ArticleController::class, 'create']);
    Route::post('/articles/store', [ArticleController::class, 'store']);
    Route::put('/articles/status/{id}', [ArticleController::class, 'status']);
    Route::put('/articles/hot/news/{id}', [ArticleController::class, 'hot_news']);
    Route::get('/articles/edit/{id}', [ArticleController::class, 'edit'])->name('article-edit');
    Route::put('/articles/edit/{id}', [ArticleController::class, 'update'])->name('article-update');
    Route::delete('/articles/delete/{id}', [ArticleController::class, 'destroy']);

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::put('/category/status/{id}', [CategoryController::class, 'status']);
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category-edit');
    Route::put('/category/edit/{id}', [CategoryController::class, 'update'])->name('category-update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy']);

    Route::get('/comments', [CommentController::class, 'index'])->name('comment');
    // Route::post('/comments/store', [CommentController::class, 'store']);
    Route::put('/comments/status/{id}', [CommentController::class, 'status']);

    Route::get('/roles', [RoleController::class, 'index'])->name('roles');
    Route::get('/roles/create', [RoleController::class, 'create']);
    Route::post('/roles/store', [RoleController::class, 'store']);
    Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('role-edit');
    Route::put('/roles/edit/{id}', [RoleController::class, 'update'])->name('role-update');
    Route::delete('/roles/delete/{id}', [RoleController::class, 'destroy']);

    Route::get('/permission', [PermissionController::class, 'index'])->name('permissions');
    Route::get('/permission/create', [PermissionController::class, 'create']);
    Route::post('/permission/store', [PermissionController::class, 'store']);
    Route::get('/permission/edit/{id}', [PermissionController::class, 'edit'])->name('permission-edit');
    Route::put('/permission/edit/{id}', [PermissionController::class, 'update'])->name('permission-update');
    Route::delete('/permission/delete/{id}', [PermissionController::class, 'destroy']);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::put('/settings/update', [SettingController::class, 'update'])->name('settings-update');

    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
