<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resources\Store;
use App\Models\Resource;
use App\Queries\ResourcesQueryBilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function create(ResourcesQueryBilder $resourcesQueryBilder): View
    {
       // dd($resourcesQueryBilder);

        return view('admin.resources', ['resources' => $resourcesQueryBilder->getAll()]);
    }

    public function store(Store $request)
    {
        $validated = $request->validated();  
        $resource= Resource::create($validated);
        
        if( $resource ) {                   
            return (\back()-> with ('success', __("The resource has been successfully created!")));
        }     
        return (\back()->with('error',  __('Resource creation error!')));
    }    


}
