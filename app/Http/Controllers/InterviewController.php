<?php

namespace App\Http\Controllers;

use App\Interview;
use Illuminate\Http\Request;
use DB;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $date=$request->input('date');
        $data=DB::table('applications')->select('post_id','job_seeker_id')->where('id',$id)->first();
        $data1=DB::table('posts')->select('company_id')->where('id',$data->post_id)->first();
        $com=DB::table('posts')->select('company_id')->where('id',$data->post_id)->first();
        $result=DB::table('interviews')->select('id')
        ->where('company_id',$com->company_id)
        ->where('post_id',$data->post_id)
        ->where('job_seeker_id',$data->job_seeker_id)
        ->count();
        // return $result;
        if($result==0){
            DB::Insert('insert into interviews (id,date,company_id,post_id,job_seeker_id) values(?,?,?,?,?)',[
                null,$date,$data1->company_id,$data->post_id,$data->job_seeker_id
            ]);
            DB::Update('update job_seekers set type=? where id=?',[1,$data->job_seeker_id]);
            return redirect("/myaccount/applicant/data/$data->post_id");
        }else{
            return redirect("/myaccount/applicant/data/$data->post_id")->with('error','this applicant added already into interview list');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show(Interview $interview, $id)
    {
        $results=DB::table('interviews')
        ->join('job_seekers','job_seekers.id','=','interviews.job_seeker_id')
        ->select('interviews.*','job_seekers.*')
        ->where('company_id',$id)->orderby('date','ASC')
        ->get();
        $vac=DB::table('posts')->join('vacancies','vacancies.id','=','posts.vacancy_id')
        ->select('vacancies.title')->where('posts.company_id',$id)->first();
        $emps=DB::table('job_seekers')->select('*')->get();
        $quali=DB::table('job_seekers_qualification')->select('*')->get();
        return view('settings.interview_list',compact('results','quali','emps','vac'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function edit(Interview $interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interview $interview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interview $interview)
    {
        //
    }
}
