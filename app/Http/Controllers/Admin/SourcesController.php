<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Source;
use App\Queries\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;



class SourcesController extends Controller
{
    public function index(SourcesQueryBuilder $soursesQueryBuilder)
    {
        return view('admin.sources', ['sources' => $soursesQueryBuilder->getAll(),]);
    }

    
    public function create(SourcesQueryBuilder $soursesQueryBuilder)
    {
        return view('admin.sourcesCreate', ['sources' => $soursesQueryBuilder->getAll(),]);
    }

    
    public function store(Request $request)
    {
        $source = $request->only(['name_source','description','links']);
 
        $source= Source::create($source);
        
        if( $source !== false ) {                   
            return (\redirect()->route('admin.source.index')-> with ('success', "OK"));
        }     
        return (\back()->with('error', 'Source has not been create'));
    } 
    

    
    public function show(int $article):View
    {
        $sources = News::find($article);   
    //    dd($sources);            
        return view('news.sources', compact('sources'));
       
    }

    public function edit(Source $source): View
    {
     
        return view('admin.sourceUpdate', ['source' => $source] );
    }


    public function update(Request $request, Source $source): RedirectResponse
    {
        $source =  $source->fill($request->only(['name_source','description','links',]));
        
        if( $source->save()) {
            return (\redirect()->route('admin.source.index')->with('success', "OK"));
        }
        return (\back()->with('error', 'Category has not been update'));
    }
    
  
   
    public function destroy(string $id)
    {
        //
    }
}
