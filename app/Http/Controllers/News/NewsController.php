<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class NewsController extends Controller 
{
    public function index(int $idCategory)
    {
        $categoryClass= app(Category::class);
        $category = $categoryClass->getCategoryById($idCategory);
        
        $model = app( News::class );        
        $newsList = $model->getNewsByCategory($idCategory);   
        // dd($newsList);
        return view('news.news', compact('newsList', 'category'));
    }

    public function show()
    { 
        $model = app( News::class );   
        $newsList = $model->getNews();

        return view('news.newsShow', compact('newsList'));
    }

    public function showArticle(int $id): View
    {
        $model = app( News::class ); 
        $article = $model->getNewsById($id);
    // dd($article);
        return view('news.article', compact('article'));
    }
    
}

