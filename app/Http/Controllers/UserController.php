<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use validator;

class UserController extends Controller
{
    public function index()
    {
        return view('companies.join');
    }

    public function checkLogin(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'password' =>'required|password',
        ]);
        $user_data=array(
            'email' => $request->get('email'),
            'password' =>$request->get('password'), 
        );
        if(Auth::attempt($user_data)){
            return redirect('join/successlogin');
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
