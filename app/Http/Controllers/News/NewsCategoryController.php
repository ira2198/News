<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getCategory();        

        return view('news.categoyries', compact('categories'));
    }

}
