<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use Auth;
use Illuminate\Http\Request;
use validator;

class UserController extends Controller
{
    public function index()
    {
        return view('companies.join');
    }

    public function create()
    {
        return view('users.create');
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

    public function store(Request $request)
    {
        //print_r($request->input());
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $result=DB::Insert('Insert into users(id,name,email,password) values (?,?,?,?)',[null,$name,$email,$password] );
        if(count($result))
        echo 'you are created an account successfully';
        else
        echo 'Sorry, something error';
    }


    public function verify(Request $request)
    {
        //print_r($request->input());
        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');
        $data=DB::Select('Select id from users where name=? and password=?',[$name,$password]);
        //print_r($data);
        if(count($data)){
        //echo 'you are login successfully';
        return view('vacancies.add');
        }
        else
        echo 'Invalid login details';

    }










}
