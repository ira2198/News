<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ForEveryone\AppealController;
use App\Http\Controllers\ForEveryone\AuthorizationController;
use App\Http\Controllers\ForEveryone\IndexController;
use App\Http\Controllers\News\NewsCategoryController;
use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\Route;

 

// For everyone

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('auth', [AuthorizationController::class, 'index'])->name('authorization');
Route::any('appeal', [AppealController::class, 'create'])->name('appeal.create');
Route::any('appeal/check', [AppealController::class, 'store'])->name('appeal.check.store');


// News 
Route::get('categories', [NewsCategoryController::class, 'index'])->name('categories');
Route::get('news/{category}', [NewsController::class, 'index'])->name('news.category');
Route::get('news', [NewsController::class, 'show'])->name('news.show');
Route::get('article/{category?}/{id?}', [NewsController::class, 'showArticle'])->name('article');

//  Admin 

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function(){
    
    Route::get('index', [AdminController::class, 'index'])->name('index');
    Route::get('news', [AdminController::class, 'show'])->name('news.show');
    Route::any('article/create', [AdminArticleController::class, 'create'])->name('article.create');
    Route::any('article/store', [AdminArticleController::class, 'store'])->name('article.store');
});