<?php

namespace App\Http\Controllers;

use App\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $file=Resume::all();
        // return view('settings.job_seeker_resume_view',compact('file'));
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
        $data=new Resume;
        if($request->file('file')){
            $file=$request->file('file');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $request->file->store('/public',$filename);
            $data->cv=$filename;
        }
        //return $filename;
        $data->title=$request->title;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data=Resume::find($id);
        // return view('settings.job_seeker_resume_view',compact('data'));
    }
    public function download(){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function edit(resume $resume)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, resume $resume)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function destroy(resume $resume)
    {
        //
    }
}
