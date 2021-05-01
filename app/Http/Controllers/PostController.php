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
        // $datas=['rrr','sss','iii','uuuu'];
         //return view ('companies.test');
        $date=date('y-m-d h:i:s');
        $today=date('Y-m-d');
        DB::table('posts')->where('closing_date','<',$today)->update(['status'=>0]);
        $results=DB::table('posts')->where('status',1)->orderby('updated_at','DESC')->get();
        $company=DB::table('companies')->select('name','id','logo')->get(); 
        $vacancy=DB::table('vacancies')->select('title','id')->get();
        $data=DB::table('vacancy_qualification')->first();
        $emps=DB::table('applications')->select('*')->where('status',1)->get();
        $now = Carbon::now();
        // $start=Carbon::parse($date)->diffInHours(Carbon::parse($now));
        // date box,change,reports,dashboard,com detail
        $location=DB::table('vacancy_qualification')->select('branch')->whereNotNull('branch')->distinct()->get();
      return view('vacancies.index')->with(compact('results','company','vacancy','data','emps','now','location'));
    
    }

    public function search(){
        $apps=DB::table('applications')->select('*')->where('status',1)->get();
        $search_text=$_GET['query'];
        $posts=DB::table('posts')
        ->join('vacancies','vacancies.id','=','posts.vacancy_id')
        ->join('vacancy_qualification','vacancy_qualification.id','=','posts.quali_id')
        ->join('companies','companies.id','=','posts.company_id')
        ->select('posts.*','vacancies.title','companies.name','companies.logo')
        ->orwhere('vacancies.title','LIKE','%'.$search_text.'%')
        ->orwhere('branch','LIKE','%'.$search_text.'%')
        ->where('posts.status',1)
        ->get();
        $count=count($posts);
        $location=DB::table('vacancy_qualification')->select('branch')->whereNotNull('branch')->distinct()->get();
      
        
        return view('vacancies.search',compact('posts','apps','count','location'));
    
    }
    public function type_search(Request $request){
        $apps=DB::table('applications')->select('*')->where('status',1)->get();
        $search=$request->input('type');
        $loc=$request->input('location');
            $result=DB::table('posts')
            ->join('vacancies','vacancies.id','=','posts.vacancy_id')
            ->join('companies','companies.id','=','posts.company_id')
            ->join('vacancy_qualification','vacancy_qualification.id','=','posts.quali_id')
            ->select('posts.*','vacancies.title','companies.name','companies.logo')
            ->where('vacancy_qualification.type','Like','%'.$search.'%')
            ->where('vacancy_qualification.branch','Like','%'.$loc.'%')
            ->where('posts.status',1)
            ->get();
        $count=count($result);
        $location=DB::table('vacancy_qualification')->select('branch')->whereNotNull('branch')->distinct()->get();
      
        //return $search;
        return view('vacancies.type_search',compact('result','apps','count','location'));
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
        $ol=$request->input('ol');
        $advance=$request->input('advance_level');
        $stream=$request->input('stream');
        $graduate=$request->input('grad');
        $field=$request->input('field');
        $other_quali=$request->input('other_quali');
        $gender=$request->input('gender');
        $age=$request->input('age_limit');
        $need=$request->input('need');
        $exp=$request->input('experience');
        $type=$request->input('type');
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
         DB::Insert('insert into vacancy_qualification(id,vacancy_id,company_id,o_level,type,advance_level,stream,graduate,field,gender,age,experience,salary,branch,other_quali) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[
             null,$vacancy_id->id,$company_id->id,$ol,$type,$advance,$stream,$graduate,$field,$gender,$age,$exp,$salary,$branch,$other_quali
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
        return  redirect('/post');
    
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
        $vac=DB::table('posts')
        ->join('vacancies','vacancies.id','=','posts.vacancy_id')
        ->select('title','img')->where('posts.id',$id)->first();
        return view('vacancies.show',compact('datas','posts','vac'));
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
