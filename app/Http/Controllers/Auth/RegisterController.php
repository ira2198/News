<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ACCOUNT;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
        
                'name'=> ['required', 'string', 'min:2', 'max:150'],
                'password'=> ['required', 'string', 'min:4'],
                'current_password'=> ['nullable', 'string', 'current_password'],
                'email'=>['required', 'string','email', 'unique:users,email'],
                'phone'=>['required', 'string'],
                'avatar'=>['nullable', 'file', 'img', 'max:1024'],
           
        ]);
    }

    public function showRegistrationForm():View
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data):User
    {
        return User::create([

            'name' => $data['name'],
            'phone'=> $data['phone'],
            'email' => $data['email'],
            //'avatar' => $data['avatar'],
            //'status' => $data['status'],
            'password' => Hash::make($data['password']),
       ]);
    }

    
}
