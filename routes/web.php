<?php

use App\Http\Controllers\Admin\AdminArticleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SourcesController;
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
Route::get('news/{news?}', [NewsController::class, 'show'])->name('news.show');
Route::get('article/{article?}', [NewsController::class, 'showArticle'])->name('article');



Route::get('source/{article}', [SourcesController::class, 'show'])->name('source.article.show');


//  Admin 

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function(){
    
    // categories
    Route::any('create/category', [NewsCategoryController::class, 'create'])->name('create.category');
    Route::post('category/store', [NewsCategoryController::class, 'store'])->name('category.store');
    Route::get('categories/show', [NewsCategoryController::class, 'show'])->name('categories.show');
    Route::any('category/edit/{category}', [NewsCategoryController::class, 'edit'])->name('edit.category');
    Route::post('category/update/{category}', [NewsCategoryController::class, 'update'])->name('update.category');

    // sources

    Route::get('source/index', [SourcesController::class, 'index'])->name('source.index');
    Route::any('source/create', [SourcesController::class, 'create'])->name('source.create');
    Route::post('source/store', [SourcesController::class, 'store'])->name('source.store');
    Route::any('source/edit/{source}', [SourcesController::class, 'edit'])->name('source.edit');
    Route::any('source/update{source}', [SourcesController::class, 'update'])->name('source.update');

    // index
    Route::get('index', [AdminController::class, 'index'])->name('index');
    Route::get('news/{news?}', [AdminArticleController::class, 'show'])->name('news.show');

    // articles
    Route::any('article/create', [AdminArticleController::class, 'create'])->name('article.create');
    Route::any('article/store', [AdminArticleController::class, 'store'])->name('article.store');
    Route::any('article/edit/{news}', [AdminArticleController::class, 'edit'])->name('article.edit');   
    Route::any('article/update/{news}', [AdminArticleController::class, 'update'])->name('article.update');

    
});