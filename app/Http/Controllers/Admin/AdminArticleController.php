<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
   
    public function create():View
    {
        $categories = $this->getCategory();
        
        return view('admin.createArticle', compact('categories'));
    }

    public function store(Request $request)
        {

        $article= $request->only('title', 'category', 'text', 'author',);

    // dd($article);
       return view('news.article', compact('article'));
    }

}
