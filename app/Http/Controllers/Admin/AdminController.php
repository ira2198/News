<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index():View
    {
        return view('admin.index');
    }

    public function show()
    {
        $model = app( News::class );   
        $newsList = $model->getNews();

        return view('admin.newsShow', compact('newsList'));
    }
}
