<?php

namespace App\Http\Controllers;
use DB;
use App\application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $results1=array(DB::table('posts')->select('id')->where('company_id',$id)->get());
        $i = 0;
        foreach($results1 as $res=>$key){
            $new[$i]=$key;
            $i=$i+1;}
            return $new[0];
             
        $test=DB::table('applications')
        ->join('employees','employees.id','applications.emp_id')
        ->select('applications.*','employees.*')
        // ->where('applications.post_id',$res->id)
        ->get();
        
       
        $data=DB::table('posts')
        ->join('applications','applications.post_id','=','posts.id')
        ->join('companies','companies.id','=','posts.company_id')
        ->select('applications.*')
        ->get();
        
        $results=DB::table('applications')
        ->join('posts','posts.id','=','applications.post_id')
        ->join('employee_qualification','employee_qualification.emp_id','=','applications.emp_id')
        ->join('employees','employees.id','=','applications.emp_id')
        ->select('employees.*','applications.*','employee_qualification.*')
        ->where('posts.company_id',$id)
        ->get();
        
        $vacancy=DB::table('vacancies')
        ->join('posts','posts.vacancy_id','=','vacancies.id')
        ->select('vacancies.title','posts.*')
        ->where('posts.company_id',$id)
        ->get();
        $num=count($results);
        $applications=DB::table('applications')->select('*')->get();
        $quali=DB::table('employee_qualification')->select('*')->get();
        $emps=DB::table('employees')->select('*')->get();

        
        //return $applications;
        return view('settings.application',compact('results','num','vacancy','applications','emps','quali','data','results1','test'));
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
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(application $application, $id)
    {
        $com=DB::table('posts')->select('company_id')->where('id',$id)->first();
        $apps=DB::table('applications')
        ->join('employees','employees.id','=','applications.emp_id')
        ->select('employees.*','applications.*')
        ->where('post_id',$id)
        ->get();
        // foreach($apps as $app){
        //     $emps=DB::table('employees')
        //     ->join('applications','applications.emp_id','=','employees.id')
        //     ->where('applications.id',$app->id)
        //     ->select('employees.id')->get();
        // }
        // foreach($apps as $app){
        //     $quali=DB::table('employee_qualification')
        //     ->join('employees','employees.id','=','employee_qualification.emp_id')
        //     ->join('applications','applications.emp_id','=','employee_qualification.emp_id')
        //     ->select('employees.*')
        //     ->where('applications.id',$app->id)
        //     ->get();
        //}
        return view('settings.emp_data',compact('apps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(application $application, $id)
    {
        //
    }
}
