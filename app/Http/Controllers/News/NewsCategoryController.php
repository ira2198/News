<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\Store;
use App\Http\Requests\Categories\Update;
use App\Models\Category;
use App\Queries\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

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


    public function store(Store $request)
    {
        $validated = $request->validated(); 
        $category= Category::create($validated);

        if( $category ) {                   
            return (\redirect()->route('admin.categories.show')->with('success', 'The category has been successfully created!'));
        }      
    return (\back()->with('error', 'Category creation error!'));
    } 
    
    
    public function edit(Category $category): View
    {       
        return view ('admin.updateCategory', [
            'category' => $category
        ]);
    }

    public function update(Update $request, Category $category): RedirectResponse
    {
        $category = $category->fill($request->validated());
        
        if($category->save()) {
            return (\redirect()->route('admin.categories.show')->with('success', 'The category has been successfully updated!'));
        }
        return (\back()->with('error', 'Error updating the category!'));
    }
    
    public function destroy(Category $category)
    {
        try {            
            $category->delete();   
            return (response()->with('success', __("Record deleted!"))->json("Record deleted!"));

        }catch(Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return \response()->json('error', 400);
        }
    }
    

}
