<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $model = app( Category::class );
        $categories = $model->getCategory();        

        return view('news.categoyries', compact('categories'));
    }

    

}
