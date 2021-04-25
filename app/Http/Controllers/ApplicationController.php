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
        $data=DB::table('posts')
        ->join('applications','applications.post_id','=','posts.id')
        ->join('companies','companies.id','=','posts.company_id')
        ->select('applications.*')
        ->where('applications.status',1)
        ->get();
        
        $results=DB::table('applications')
        ->join('posts','posts.id','=','applications.post_id')
        ->join('job_seekers_qualification','job_seekers_qualification.job_seeker_id','=','applications.job_seeker_id')
        ->join('job_seekers','job_seekers.id','=','applications.job_seeker_id')
        ->select('job_seekers.*','applications.*','job_seekers_qualification.*')
        ->where('posts.company_id',$id)
        ->get();
        
        $vacancy=DB::table('vacancies')
        ->join('posts','posts.vacancy_id','=','vacancies.id')
        ->select('vacancies.title','posts.*')
        ->where('posts.company_id',$id)
        ->where('status',1)
        ->get();
        $num=count($results);
        return view('settings.application',compact('results','num','vacancy','data'));
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
        ->join('job_seekers_qualification','job_seekers_qualification.job_seeker_id','applications.job_seeker_id')
        ->join('job_seekers','job_seekers.id','=','applications.job_seeker_id')
        ->select('applications.*','job_seekers.*','job_seekers_qualification.*')
        ->where('applications.post_id',$id)
        ->where('applications.status',1)
        ->orderby('applications.date')
        ->get();
        $quali=DB::table('job_seekers_qualification')->select('*')->get();
         $emps=DB::table('job_seekers')->select('*')->get();
         $apps1=DB::table('applications')
        ->join('job_seekers','job_seekers.id','=','applications.job_seeker_id')
        ->select('applications.*')
        ->where('post_id',$id)
        ->get();
        $list=DB::table('applications')
        ->join('job_seekers','job_seekers.id','=','applications.job_seeker_id')
        ->select('job_seekers.*')
        ->where('post_id',$id)
        ->where('status',1)
        ->paginate(5);
            $quali=DB::table('job_seekers_qualification')->select('*')->get();
        return view('settings.emp_data',compact('apps','quali','emps','id','apps1','list'))->with('i', (request()->input('page', 1) - 1) * 10);
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
    public function accept($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=DB::table('applications')->select('post_id')->where('id',$id)->first();
        DB::update('update applications set status=? where id=?',[0,$id]);
        return redirect("myaccount/applicant/data/$post->post_id");
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
