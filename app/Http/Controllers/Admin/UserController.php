<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\Update;
use App\Models\User;
use App\Queries\UserQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends Controller
{

    public function show(UserQueryBuilder $userQueryBuilder, User $user):View
    {
        return view('admin.users.show',  ['users' => $userQueryBuilder->getAll()]);
    }

    // public function create(UserQueryBuilder $userQueryBuilder)
    // {
    //     return view('general.registration', ['sources' => $userQueryBuilder->getAll(),]);
    // }

    
    // public function store(Store $request)
    // {
    //     $validated = $request->validated();  
    //     $source= User::create($validated);
        
    //     if( $source ) {                   
    //         return (\redirect()->route('admin.user.show')-> with ('success', __("The user has been successfully created!")));
    //     }     
    //     return (\back()->with('error',  __('User creation error!')));
    // }    
    

    
    public function edit(User $user): View    
    {  
        return view ('profileRedact', ['user'=> $user]);
    }



    public function update(Update $request, User $user): RedirectResponse
    { 
        
        $user = $user->fill($request->validated());  

        if($user->save()) {           
            return (\redirect()->route('admin.news.show')
            ->with('success', __('The account has been successfully updated!')));
        }
        return (\back()->with('error', __('Error updating the account!')));
    }


    
    public function destroy(User $user)
    {
        try {            
            $user->delete();   
            return (response()->with('success', __("User deleted!"))->json(('User deleted!')));

        }catch(Throwable $exception) {
            Log::error($exception->getMessage(), $exception->getTrace());
            return \response()->json('error', 400);
        }
    }

}
