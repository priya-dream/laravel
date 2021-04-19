<?php

namespace App\Http\Controllers;
use View;
use DB;
use Carbon\Carbon;
use Session;
use RealRashid\SweetAlert\Facades\Alert;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view ('companies.test');
        $date=date('y-m-d h:i:s');
        DB::table('posts')->where('closing_date','<=',$date)->update(['status'=>0]);
        $results=DB::table('posts')->where('status',1)->orderby('id','DESC')->get();
        $company=DB::table('companies')->select('name','id','logo')->get(); 
        $vacancy=DB::table('vacancies')->select('title','id')->get();
        $data=DB::table('vacancy_qualification')->first();
        $emps=DB::table('applications')->select('*')->where('status',1)->get();
        $now = Carbon::now();
        // $start=Carbon::parse($date)->diffInHours(Carbon::parse($now));
        
      return view('vacancies.index')->with(compact('results','company','vacancy','data','emps','now'));
    
    }

    public function search(){
        $apps=DB::table('applications')->select('*')->where('status',1)->get();
        $search_text=$_GET['query'];
        $posts=DB::table('posts')
        ->join('vacancies','vacancies.id','=','posts.vacancy_id')
        ->join('companies','companies.id','=','posts.company_id')
        ->select('posts.*','vacancies.title','companies.name','companies.logo')
        ->where('vacancies.title','LIKE','%'.$search_text.'%')
        ->where('posts.status',1)
        ->get();
        if(count($posts) === 0){
            return view('vacancies.search',compact('posts'))->with('nothing','No results');
        }else{
        return view('vacancies.search',compact('posts','apps'));}
    
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
        $date=date('y-m-d');
        $company=$request->input('company');
        $branch=$request->input('branch');
        $title=$request->input('title');
        $advance=$request->input('advance_level');
        $stream=$request->input('stream');
        $graduate=$request->input('grad');
        $field=$request->input('field');
        $other_quali=$request->input('other_quali');
        $gender=$request->input('gender');
        $age=$request->input('age_limit');
        $need=$request->input('need');
        $exp=$request->input('experience');
        $salary=$request->input('salary');
        $closing_date=$request->input('closing_date');
        $vacancy_id=DB::table('vacancies')->select('id')->where('title',$title)->first();
        $company_id=DB::table('companies')->select('id','address')->where('name',$company)->first();
        //return $company_id->id;
        $post=DB::table('posts')
        ->join('vacancy_qualification','vacancy_qualification.id','posts.quali_id')
        ->select('posts.*')
        ->where('posts.company_id',$company_id->id)
        ->where('posts.vacancy_id',$vacancy_id->id)
        ->where('vacancy_qualification.branch',$branch)
        ->count();
        if($post==0){
         DB::Insert('insert into vacancy_qualification(id,vacancy_id,company_id,advance_level,stream,graduate,field,gender,age,experience,salary,branch,other_quali) values(?,?,?,?,?,?,?,?,?,?,?,?,?)',[
             null,$vacancy_id->id,$company_id->id,$advance,$stream,$graduate,$field,$gender,$age,$exp,$salary,$branch,$other_quali
        ]);
        $quali_id=DB::table('vacancy_qualification')->select('id')
        ->where('vacancy_id',$vacancy_id->id)
        ->where('company_id',$company_id->id)
        ->first();
        DB::Insert('insert into posts(id,vacancy_id,date,company_id,quali_id,need,closing_date) values(?,?,?,?,?,?,?)',[
            null,$vacancy_id->id,$date,$company_id->id,$quali_id->id,$need,$closing_date
        ]);
        }
        else{
            return redirect('/post')->with('suggestion','this type of job is already published by you under this branch');
        }
        
        
        
            
        // $results=DB::table('posts')->get();
        return  redirect('/post')->with('success','Vacancy Published Successfully :)');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=DB::table('posts')
        ->join('vacancies','vacancies.id','=','posts.vacancy_id')
        ->join('companies','companies.id','=','posts.company_id')
        ->select('posts.*','vacancies.*','companies.*')
        ->where('posts.id',$id)
        ->get();
        $datas=DB::table('vacancy_qualification')
        ->join('posts','posts.quali_id','=','vacancy_qualification.id')
        ->join('vacancies','vacancies.id','=','vacancy_qualification.vacancy_id')
        ->join('companies','companies.id','=','vacancy_qualification.company_id')
        ->select('vacancy_qualification.*','vacancies.*','companies.*','posts.*')
        ->where('posts.id',$id)
        ->get();
        return view('vacancies.show',compact('datas','posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'date' => 'required',
            'title' => 'required',
            'company' => 'required',
            'qualification' => 'required',
            'need' => 'required',
            'gender' => 'required',
            'age_limit' => 'required',
            'closing_date' => 'required',
        ]);
        $post->update($request->all());
  
        return redirect()->route('vacancies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/vacancy');
    }
}
