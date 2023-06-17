<?php

namespace App\Http\Controllers\ForEveryone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function index()
    {
        return view('general.authorization');
    }
}
