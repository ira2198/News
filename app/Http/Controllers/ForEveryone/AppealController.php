<?php

namespace App\Http\Controllers\ForEveryone;

use App\Http\Controllers\Controller;
use Dotenv\Validator;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AppealController extends Controller
{
    public function create() : View
    {

        return view('general.appeal');
        
    }

    public function store(Request $request)
    {  
        
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $description = $request->input('description');


       if ($name!==null & $email!==null & $phone!==null & $description!==null) {
            return response()->download('img/planet.jpg');  

       }
        else {

            return redirect()->back()->withInput()->withErrors('Please fill in all the fields!'); 
        }       
       
    }

}
