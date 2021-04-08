<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.index');
    }

    public function verify(request $request)
    {
        $username=$request->input('username');
        $password=$request->input('password');
        $result=DB::table('companies')
        ->select('name','username','id')
        ->where('username',$username)
        ->where('password',$password)
        ->get();
        $vacancies= DB::table('vacancies')->select('title')->orderBy('title')->get();
            if(count($result))
                return View('settings.account',compact('request','result','vacancies'));  
            else
                return redirect('/myaccount')->with('error','Invalid login details !!');     
    }

    public function post($id){
        $results=DB::table('posts')
        ->join('companies','companies.id','=','posts.company_id')
        ->join('vacancies','vacancies.id','=','posts.vacancy_id')
        ->select('posts.*','vacancies.title')
        ->where('companies.id',$id)
        ->get();
        return view('settings.post',compact('results'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results=DB::table('posts')
        ->join('vacancy_qualification','vacancy_qualification.id','=','posts.quali_id')
        ->select('posts.*','vacancy_qualification.*')
        ->where('posts.id',$id)
        ->get();
        $vacancies=DB::table('vacancies')->get();
        $advances=['Need','Not Necessary'];
        $streams=['Physical Science(Maths)','Biological Science','Commerce','Arts','Technology','Any'];
        return view('settings.edit',compact('results','vacancies','advances','streams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posts')->delete($id);
        return view('settings.post')
                    ->with('success','post deleted successfully');

        //return $id;
        //return redirect('/myaccount/posts');

    }
}
