<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SourcesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ForEveryone\AppealController;
use App\Http\Controllers\ForEveryone\AuthorizationController;
use App\Http\Controllers\ForEveryone\IndexController;
use App\Http\Controllers\News\NewsCategoryController;
use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



  //account
  Route::group(['prefix' => 'account'], static function(){
    Route::get('/', AccountController::class)->name('account'); 
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::any('update/{user?}', [UserController::class, 'update'])->name('user.update');
});


// For everyone

Route::get('/', [IndexController::class, 'index'])->name('index');
//Route::get('ayth', [AuthorizationController::class, 'index'])->name('authorization');

Route::any('appeal', [AppealController::class, 'create'])->name('appeal.create');
Route::any('appeal/check', [AppealController::class, 'store'])->name('appeal.check.store');


// News 
Route::get('categories', [NewsCategoryController::class, 'index'])->name('categories');
Route::get('news/{category}', [NewsController::class, 'index'])->name('news.category');
Route::get('news/{news?}', [NewsController::class, 'show'])->name('news.show');
Route::get('article/{news?}', [NewsController::class, 'showArticle'])->name('article');
Route::get('source/{article}', [SourcesController::class, 'show'])->name('source.article.show');


//  Admin 

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware'=>'auth'], static function(){
    
     Route::group(['middleware'=>'admin'], static function(){

        //user
        // Route::get('user/login', [UserController::class, 'index'])->name('user.login');
        Route::get('user/show', [UserController::class, 'show'])->name('user.show');
 
        // Route::any('user/create', [UserController::class, 'create'])->name('user.create');
        // Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::delete('user/delete/{user}', [UserController::class, 'destroy'])->name('user.delete');

             
        // categories
        Route::any('create/category', [NewsCategoryController::class, 'create'])->name('create.category');
        Route::post('category/store', [NewsCategoryController::class, 'store'])->name('category.store');
        Route::any('category/edit/{category}', [NewsCategoryController::class, 'edit'])->name('edit.category');
        Route::post('category/update/{category}', [NewsCategoryController::class, 'update'])->name('update.category');
        Route::any('category/delete/{category}', [NewsCategoryController::class, 'destroy'])->name('categories.delete');


    });


    // sources
    Route::middleware(['userRemote'])->group(function () {
    
        Route::get('categories/show', [NewsCategoryController::class, 'show'])->name('categories.show');

        Route::get('source/index', [SourcesController::class, 'index'])->name('source.index');
        Route::any('source/create', [SourcesController::class, 'create'])->name('source.create');
        Route::post('source/store', [SourcesController::class, 'store'])->name('source.store');
        Route::any('source/edit/{source}', [SourcesController::class, 'edit'])->name('source.edit');
        Route::any('source/update/{source}', [SourcesController::class, 'update'])->name('source.update');
        Route::any('source/delete/{source}', [SourcesController::class, 'destroy'])->name('source.delete');    
    

        // index
        Route::get('index', [AdminController::class, 'index'])->name('index');
        Route::any('news/{news?}', [AdminArticleController::class, 'show'])->name('news.show');
        Route::any('news/delete/{news?}', [AdminArticleController::class, 'destroy'])->name('news.delete');

            // articles
        Route::any('article/create', [AdminArticleController::class, 'create'])->name('article.create');
        Route::any('article/store', [AdminArticleController::class, 'store'])->name('article.store');
        Route::any('article/edit/{news}', [AdminArticleController::class, 'edit'])->name('article.edit');   
        Route::any('article/update/{news}', [AdminArticleController::class, 'update'])->name('article.update');   
    
    });  

});



// sessions

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sessions' , function(){
    
    if(session()->has('mysession')){
        // dd(session()->all(),
        //     session()->get('mysession'));
        //session()->forget('mysession'); // удаление
    }
    session()->put('mysession', 'News session');
});




