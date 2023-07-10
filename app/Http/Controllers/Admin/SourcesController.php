<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sources\Store;
use App\Http\Requests\Sources\Update;
use App\Models\News;
use App\Models\Source;
use App\Queries\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

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

    
    public function store(Store $request)
    {
        $validated = $request->validated();  
        $source= Source::create($validated);
        
        if( $source ) {                   
            return (\redirect()->route('admin.source.index')-> with ('success', __("The source has been successfully created!")));
        }     
        return (\back()->with('error',  __('Source creation error!')));
    }     

    
    public function show(int $article):View
    {
        $sources = News::find($article);  
        return view('news.sources', compact('sources'));       
    }

    public function edit(Source $source): View
    {     
        return view('admin.sourceUpdate', ['source' => $source] );
    }


    public function update(Update $request, Source $source): RedirectResponse
    {
        $source =  $source->fill($request->validated());
        
        if( $source->save()) {
            return (\redirect()->route('admin.source.index')->with('success', __( "The source has been successfully updated")));
        }
        return (\back()->with('error', __('Error updating the sources!')));
    }
    
  
   
    public function destroy(Source $source)
    {     
        try {            
            $source->delete();   
            return (response()->with('success', __("Record deleted!"))->json('Record deleted!'));

        }catch(Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return \response()->json('error', 400);
        }
    }
}
