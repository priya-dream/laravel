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
        $results1=DB::table('posts')->select('id')->where('company_id',$id)->get();
        //return number_format($results1);
        $new=array();
        $new1=array();
        $new2=array();
        $i=0;
        $x=0;
        $z=0;
        foreach($results1 as $res){
            $collects=DB::table('applications')
            ->join('posts','posts.id','=','applications.post_id')
            ->select('applications.*')
            ->where('posts.id',$res->id)
            ->get();
                $new[$i]=$res->id;
                $i=$i+1;  
        }
        for($i=0;$i<count($new);$i++){
        $res=DB::table('applications')
        ->join('employee_qualification','employee_qualification.emp_id','=','applications.emp_id')
        ->select('applications.*','employee_qualification.*')->where('applications.post_id',$new[$i])->get();
        // foreach($res as $re ){
        //     $y=0;
        //     if($i==$y){
        //     $new1[$x]=$re->id;
        //         $x=$x+1;
        //         $y=$y+1;}
        //     else{
        //         $new2[$z]=$re->id;
        //         $z=$z+1;
        //     }}
        }
        // return $collects;

        $test=DB::table('applications')
        ->join('employees','employees.id','applications.emp_id')
        ->select('applications.*','employees.*')
         //->where('applications.post_id',$res->id)
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

        
        // return $applications;
        return view('settings.application',compact('results','num','vacancy','applications','emps','quali','data','results1','collects','res'));
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
    public function show($id)
    {
        $com=DB::table('posts')->select('company_id')->where('id',$id)->first();
        $apps=DB::table('applications')
        ->join('employees','employees.id','=','applications.emp_id')
        ->select('employees.*','applications.*')
        ->where('post_id',$id)
        ->get();
        $quali=DB::table('employee_qualification')->select('*')->get();
        $emps=DB::table('employees')->select('*')->get();
        foreach($apps as $app){
            $emps=DB::table('employees')
            ->join('applications','applications.emp_id','=','employees.id')
            ->select('employees.id')
            ->where('applications.id',$app->id)->get();
        }
        //return $apps;
        // foreach($apps as $app){
        //     $quali=DB::table('employee_qualification')
        //     ->join('employees','employees.id','=','employee_qualification.emp_id')
        //     ->join('applications','applications.emp_id','=','employee_qualification.emp_id')
        //     ->select('employees.*')
        //     ->where('applications.id',$app->id)
        //     ->get();
        //}
        return view('settings.emp_data',compact('apps','quali','emps'));
    }
    public function quali($id)
    {
        $results=DB::table('employees')
        ->join('employee_qualification','employee_qualification.emp_id','=','employees.id')
        ->select('employee_qualification.*')
        ->where('employees.id',$id)
        ->get();
        $data=DB::table('applications')
        ->join('employees','employees.id','=','applications.emp_id')
        ->select('applications.post_id')
        ->where('applications.emp_id',$id)
        ->first();
        // return redirect("/myaccount/applicant/data/$data->post_id",compact('results'));
        return redirect("/myaccount/applicant/data/$data->post_id")->with( ['results' => $results] );
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
