<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NavigationController extends Controller
{
    
    public function myaccount(){
        return view('settings.account');
    }
}
