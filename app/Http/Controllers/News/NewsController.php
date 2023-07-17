<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use App\Queries\NewsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class NewsController extends Controller 
{ 
    
    
    public function index(NewsQueryBuilder $newsQueryBuilder,  string $categoryId): View
    {
        $category  = Category::find($categoryId);
        $user = User::find($categoryId);
        $newsList =  $newsQueryBuilder->getNewsByCategory($categoryId);   
        
        return view('news.news', compact('newsList', 'category', 'user'));
    }



    public function show(NewsQueryBuilder $newsQueryBuilder, News $news):View
    {    $user = User::find($news);
        return view('news.newsShow',  ['newsList' => $newsQueryBuilder->getAll(), $user]);
    }

    

    public function showArticle(News $news): View
    {   
        $category  = Category::find($news);
        $user = User::find($news);

        return view('news.article', ['article' => $news, $category, $user]);
    }  
    
}

