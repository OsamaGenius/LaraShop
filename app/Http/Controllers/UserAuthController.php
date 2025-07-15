<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    
    public function loginView()
    {
        return view('login.index');
    }
    
    public function RegView()
    {
        return view('reg.index');
    }
    
}
