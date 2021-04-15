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
        $date=date('y-m-d');
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
        $other_quali=$request->input('other_quali');
        $emp_id=DB::table('employees')->select('id')->where('nic',$nic)->first();
        $result=DB::table('employees')->select('*')->where('nic',$nic)->count();
        //return $result;
        if($result==0){
            DB::Insert('insert into employees(id,fname,lname,nic,address,mobile,email) values(?,?,?,?,?,?,?)',[
                null,$fname,$lname,$nic,$address,$mobile,$email
            ]);
            $emp=DB::table('employees')->select('id')->where('nic',$nic)->first();
            DB::Insert('insert into employee_qualification(id,post_id,emp_id,advance_level,stream,graduate,field,uni,other_quali) values(?,?,?,?,?,?,?,?,?)',[
            null,$post_id,$emp->id,$al,$stream,$graduate,$subject,$uni,$other_quali
            ]);
        }
            $data=DB::table('employees')->select('id')->where('nic',$nic)->first();
            $emp1=DB::table('applications')->join('employees','employees.id','applications.emp_id')
            ->select('employees.id')
            ->where('applications.emp_id',$data->id)
            ->where('applications.post_id',$post_id)
            ->count();
        if($emp1==0){
            DB::Insert('insert into applications(id,date,emp_id,post_id) values(?,?,?,?)',[
                null,$date,$data->id,$post_id
            ]);
        }
        else{
            return redirect('/post')->with('alert','you applied already for this job');
        }
        
        return  redirect('/post')->with('success','Application is submitted succesfully');
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
