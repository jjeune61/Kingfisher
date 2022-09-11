<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuditController;
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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Publication\Associate\DashboardController as AssociateDashboardController;
use App\Http\Controllers\Publication\Associate\PendingController as AssociatePendingController;
use App\Http\Controllers\Publication\Copy\DashboardController as CopyDashboardController;
use App\Http\Controllers\Publication\Copy\PendingController as CopyPendingController;
use App\Http\Controllers\Publication\EIC\ArticleController as EICArticleController;
use App\Http\Controllers\Publication\EIC\CategoryController as EICCategoryController;
use App\Http\Controllers\Publication\EIC\DashboardController as EICDashboardController;
use App\Http\Controllers\Publication\EIC\PendingController as EICPendingController;
use App\Http\Controllers\Publication\Section\DashboardController as SectionDashboardController;
use App\Http\Controllers\Publication\Section\PendingController;
use App\Http\Controllers\Publication\Writer\ArticleController as WriterArticleController;
use App\Http\Controllers\Publication\Writer\DashboardController as WriterDashboardController;
use App\Http\Controllers\Publication\Writer\DraftController;
use App\Models\Article;
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
|TODO: implement rate limiting before deploy / add guards/authentication per route
*/

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//WEBSITE
Route::get('/',[HomePageController::class, 'index'])->name('landing');//landing page

Route::get('/articles',[NewsPageController::class, 'index'])->name('articles');//article section
Route::get('/articles/{id}',[NewsPageController::class, 'listing']);//article section category

Route::get('/content/{slug}',[ContentPageController::class, 'index']);//article auth content
Route::group(['prefix'=>'', 'middleware'=>'auth'], function(){
    Route::get('/comments', [CommentPageController::class, 'index'])->name('comments');
    Route::post('/comments', [CommentPageController::class, 'store']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

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

    
    Route::get('/audits', [AuditController::class, 'index'])->name('audit');

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

    Route::get('/audits', [AuditController::class, 'index'])->name('audits');

    Route::get('/audit', function(){
        return Article::with('audits')->get();
        return view('admin.audit.audit');
    });

});
    //PUBLICATION SIDE
    Route::group(['prefix'=>'/publication', 'middleware'=>'auth'], function(){

        Route::group(['prefix'=>'/writer', 'middleware'=>'auth'], function(){
        Route::get('/', [WriterDashboardController::class, 'index'])->name('writerDashboard');

        Route::get('/articles', [WriterArticleController::class, 'index'])->name('writerArticles');
        Route::get('/articles/create', [WriterArticleController::class, 'create']);
        Route::post('/articles/store', [WriterArticleController::class, 'store']);

        
        Route::get('/drafts', [DraftController::class, 'index'])->name('writerArticleDrafts');
        Route::get('/drafts/edit/{id}', [DraftController::class, 'edit'])->name('draft-edit');
        Route::put('/drafts/edit/{id}', [DraftController::class, 'update'])->name('draft-update');

        });

        Route::group(['prefix'=>'/section', 'middleware'=>'auth'], function(){
        Route::get('/', [SectionDashboardController::class, 'index'])->name('sectionDashboard');

        Route::get('/pendings', [PendingController::class, 'index'])->name('sectionPendings');
        Route::get('/pendings/edit/{id}', [PendingController::class, 'edit'])->name('sectionPending-edit');
        Route::put('/pendings/approve/{id}', [PendingController::class, 'approve'])->name('sectionPending-approve');
        Route::post('/pendings/disapprove/{id}', [PendingController::class, 'disapprove'])->name('sectionPending-disapprove');

        });

        Route::group(['prefix'=>'/copy', 'middleware'=>'auth'], function(){
        Route::get('/', [CopyDashboardController::class, 'index'])->name('copyDashboard');
    
        Route::get('/pendings', [CopyPendingController::class, 'index'])->name('copyPendings');
        Route::get('/pendings/edit/{id}', [CopyPendingController::class, 'edit'])->name('copyPending-edit');
        Route::put('/pendings/approve/{id}', [CopyPendingController::class, 'approve'])->name('copyPending-approve');
        Route::post('/pendings/disapprove/{id}', [CopyPendingController::class, 'disapprove'])->name('copyPending-disapprove');
    
            });

        Route::group(['prefix'=>'/associate', 'middleware'=>'auth'], function(){
        Route::get('/', [AssociateDashboardController::class, 'index'])->name('associateDashboard');
    
        Route::get('/pendings', [AssociatePendingController::class, 'index'])->name('associatePendings');
        Route::get('/pendings/edit/{id}', [AssociatePendingController::class, 'edit'])->name('associatePending-edit');
        Route::put('/pendings/approve/{id}', [AssociatePendingController::class, 'approve'])->name('associatePending-approve');
        Route::post('/pendings/disapprove/{id}', [AssociatePendingController::class, 'disapprove'])->name('associatePending-disapprove');

            });

        Route::group(['prefix'=>'/eic', 'middleware'=>'auth'], function(){
        Route::get('/', [EICDashboardController::class, 'index'])->name('eicDashboard');
        
        Route::get('/articles', [EICArticleController::class, 'index'])->name('eicArticle');
        Route::get('/articles/create', [EICArticleController::class, 'create']);
        Route::post('/articles/store', [EICArticleController::class, 'store']);
        Route::put('/articles/status/{id}', [EICArticleController::class, 'status']);
        Route::put('/articles/hot/news/{id}', [EICArticleController::class, 'hot_news']);
        Route::get('/articles/edit/{id}', [EICArticleController::class, 'edit'])->name('eicArticle-edit');
        Route::put('/articles/edit/{id}', [EICArticleController::class, 'update'])->name('eicArticle-update');
        Route::delete('/articles/delete/{id}', [EICArticleController::class, 'destroy']);
    
        Route::get('/category', [EICCategoryController::class, 'index'])->name('eicCategory');
        Route::get('/category/create', [EICCategoryController::class, 'create']);
        Route::post('/category/store', [EICCategoryController::class, 'store']);
        Route::put('/category/status/{id}', [EICCategoryController::class, 'status']);
        Route::get('/category/edit/{id}', [EICCategoryController::class, 'edit'])->name('eicCategory-edit');
        Route::put('/category/edit/{id}', [EICCategoryController::class, 'update'])->name('eicCategory-update');
        Route::delete('/category/delete/{id}', [EICCategoryController::class, 'destroy']);

        Route::get('/pendings', [EICPendingController::class, 'index'])->name('eicPendings');
        Route::get('/pendings/edit/{id}', [EICPendingController::class, 'edit'])->name('eicPending-edit');
        Route::put('/pendings/approve/{id}', [EICPendingController::class, 'approve'])->name('eicPending-approve');
        Route::post('/pendings/disapprove/{id}', [EICPendingController::class, 'disapprove'])->name('eicPending-disapprove');
    
            });

    });