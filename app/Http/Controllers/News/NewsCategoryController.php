<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    public function index():View  
    {          

        return view('news.categoyries', ['categories' => Category::all()]);
    }

    public function show(CategoriesQueryBuilder $categoriesQueryBuilder):View  
    {          

        return view('admin.showCategories', ['categories' => $categoriesQueryBuilder->getAll()]);
    }

    public function create(): View
    {
        return view('admin.createCategory', ['categories' => Category::all()]);
    }


    public function store(Request $request)
    {
        $category = $request->only(['category_name', 'description']);
        $category= Category::create($category);

        if( $category !== false ) {
                   
            return (\redirect()->route('categories')-> with ('success', "OK"));
        }   
    
    return (\back()->with('error', 'News has not been create'));
    } 
    
    
    public function edit(Category $category): View
    {
       
        return view ('admin.updateCategory', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->only(['category_name', 'description']));
        
        if($category->save()) {
            return (\redirect()->route('admin.categories.show')->with('success', "OK"));
        }
        return (\back()->with('error', 'Category has not been update'));
    }
    

}
