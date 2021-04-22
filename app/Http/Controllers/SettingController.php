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
        ->where('posts.status',1)
        ->orderby('posts.date','DESC')
        ->get();
        $results1=DB::table('posts')
        ->join('companies','companies.id','=','posts.company_id')
        ->join('vacancies','vacancies.id','=','posts.vacancy_id')
        ->select('posts.*','vacancies.title')
        ->where('companies.id',$id)
        ->where('posts.status',0)
        ->orderby('posts.date','DESC')
        ->get();
        return view('settings.post',compact('results','results1'));
    
    }

    public function detail($id)
    {
        $company=DB::table('companies')->select('*')->where('id',$id)->get();
        return view('settings.com_detail',compact('company'));
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
        $data=DB::table('posts')
        ->join('companies','companies.id','=','posts.company_id')
        ->select('posts.company_id')->where('posts.id',$id)->first();
        $result=DB::table('posts')
        ->join('vacancy_qualification','vacancy_qualification.id','=','posts.quali_id')
        ->select('vacancy_qualification.*')
        ->where('posts.id',$id)
        ->first();
        $result1=DB::table('posts')
        ->join('vacancy_qualification','vacancy_qualification.id','=','posts.quali_id')
        ->select('posts.*')
        ->where('posts.id',$id)
        ->first();
        //return $result1->id;
        $vacancies=DB::table('vacancies')->get();
        $advances=['Need','Not Necessary'];
        $streams=['Physical Science(Maths)','Biological Science(Bio)','Commerce','Arts','Technology','Any'];
        $graduations=['Diploma','Higher Diploma','Degree','Master Degree'];
        $fields=['Engineering','Accounting','Teaching','Law','Electrical','Nursing','Media','Human Resource Management','Marketing','Management','Architecture','Infomation Technology','Computer Science','English','Software Engineering','Physical Science','Bio Science','Agriculture','Any'];
        $gender=['Male','Female','Any'];
        return view('settings.edit',compact('data','result','result1','vacancies','advances','streams','graduations','fields','gender'));
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
        $title=$request->input('title');
        $advance_level=$request->input('advance_level');
        $stream=$request->input('stream');
        $grad=$request->input('grad');
        $field=$request->input('field');
        $other_quali=$request->input('other_quali');
        $gender=$request->input('gender');
        $age_limit=$request->input('age_limit');
        $need=$request->input('need');
        $experience=$request->input('experience');
        $salary=$request->input('salary');
        $closing_date=$request->input('closing_date');
        $post=DB::table('posts')->select('id','company_id')->where('quali_id',$id)->first();
        
        DB::update('update vacancy_qualification set advance_level=?,stream=?,graduate=?,field=?,other_quali=?,gender=?,age=?,experience=?,salary=? where id=?',
            [ $advance_level,$stream,$grad,$field,$other_quali,$gender,$age_limit,$experience,$salary,$id ]);
        
        DB::update('update posts set need=?,closing_date=? where id=?',[$need,$closing_date,$post->id]);
        return redirect("/myaccount/posts/$post->company_id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=DB::table('posts')->select('quali_id','company_id')->where('id',$id)->first();
        DB::table('vacancy_qualification')->where('id', $data->quali_id)->delete();
        DB::table('posts')->where('id',$id)->delete();
        
        return redirect("/myaccount/posts/$data->company_id");

        //return $id;
        //return redirect('/myaccount/posts');

    }
}
