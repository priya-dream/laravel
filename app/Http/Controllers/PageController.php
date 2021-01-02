<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use validator;

class PageController extends Controller
{
    public function checkLogin(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|username',
            'password' =>'required|password',
        ]);
        $user_data=array(
            'username' => $request->get('username'),
            'password' =>$request->get('password'), 
        );
        if(Auth::attempt($user_data)){
            return redirect('/successLogin');
        }
        return back()->with('error', "Invalid Login Details"); 
    }

    public function successlogin()
    {
        return view('companies.test');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('join');
    }

}
