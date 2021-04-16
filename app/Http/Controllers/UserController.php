<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use View;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    public function show()
    {
        //
    }

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
            return redirect('/vacancy');
        }
        return back()->with('error', "Invalid Login Details"); 
    }

    public function successlogin()
    {
        return view('companies.test');
    }

    public function log($id)
    {
        alert ($id);
       // return view('users.log');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/join');
    }

    public function store(Request $request)
    {
        //print_r($request->input());
        $name=$request->input('name');
        $address=$request->input('address');
        $ceo=$request->input('ceo');
        $mobile=$request->input('mobile');
        $email=$request->input('email');
        $username=$request->input('username');
        $password=$request->input('password');
        $image=$request->input('image');
        

        $result=DB::Insert('Insert into users(id,name,email,password) values (?,?,?,?)',[null,$username,$email,$password] );
        DB::Insert('Insert into companies(id,name,address,ceo,mobile,email,username,password,image) values (?,?,?,?,?,?,?,?,?)',[null,$name,$address,$ceo,$mobile,$email,$username,$password,$image]);
        if(count(array($result)))
        {
            return redirect('/join')->with('success','you are created an account successfully. Now you can login.');
        }
        else
        echo 'Sorry, something error';
    }

    


    public function verify(Request $request)
    {
        // //print_r($request->input());
        $username=$request->input('username');
        $password=$request->input('password');
        $company=DB::table('companies')
            ->join('users', 'users.name', '=', 'companies.username')
            ->select('companies.name','companies.id')
            ->where('users.name','=',$username)
            ->get();
        $data=DB::Select('Select id from users where name=? and password=?',[$username,$password]);
        //print_r($data);
        if(count($data)){
        $user = auth()->user();
        return View('vacancies.add',compact('request'),compact('company'));
        }
        else
        return redirect('/join')->with('error','Invalid login details !!');

    }
    public function update(Request $request,$id){
        // $data = $request->all();
        // $this->validate($request, [
        //     'password'     => 'required',
        //     'new_pw'     => 'required|min:6',
        //     'confirm_pw' => 'required|same:new_pw',
        // ]);
        $result=DB::table('companies')->select('password')->where('id',$id)->first();
        $username=$request->input('username');
        $pw=$request->input('password');
        $new_pw=$request->input('new_pw');
        $confirm_pw=$request->input('confirm_pw');
        if($pw==$result->password){
        DB::update('update companies set username=?,password=? where id=?',[$username,$confirm_pw,$id]);
        return redirect("/company/log/$id")->with('success','password is changed.');
        }else{
            return redirect("/company/log/$id")->with('error','current password is wrong !');
        }
    }










}
