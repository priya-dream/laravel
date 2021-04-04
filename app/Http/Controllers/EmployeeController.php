<?php

namespace App\Http\Controllers;
use App\Employee;
use DB;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vacancies.index');
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
    public function store(request $request)
    {
        $post_id=$request->input('post_id');
        $fname=$request->input('fname');
        $lname=$request->input('lname');
        $nic=$request->input('nic');
        $address=$request->input('address');
        $mobile=$request->input('mobile');
        $email=$request->input('email');
        $al=$request->input('al');
        $stream=$request->input('stream');
        $graduate=$request->input('grad');
        $subject=$request->input('subj');
        $uni=$request->input('uni');
        // return $post_id;
        $result=DB::table('employees')->select('*')->where('nic',$nic)->count();
        if($result==0){
            DB::Insert('insert into employees(id,fname,lname,nic,address,mobile,email) values(?,?,?,?,?,?,?)',[
                null,$fname,$lname,$nic,$address,$mobile,$email
            ]);
        }
        $emp_id=DB::table('employees')->select('id')->where('nic',$nic)->first();
        DB::Insert('insert into employee_qualification(id,post_id,emp_id,advance_level,stream,graduate,field,uni) values(?,?,?,?,?,?,?,?)',[
            null,$post_id,$emp_id->id,$al,$stream,$graduate,$subject,$uni
        ]);
        return  redirect('/post')->with('success1','Application is submitted succesfully');
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
        //
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
        //
    }
}
