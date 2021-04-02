<?php

namespace App\Http\Controllers;
use View;
use DB;
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
        $date=date('y-m-d');
        DB::table('posts')->where('closing_date','<=',$date)->update(['status'=>0]);
        $results=DB::table('posts')->where('status',1)->get();
        $company=DB::table('companies')->select('name','id','image')->get(); 
        $vacancy=DB::table('vacancies')->select('title','id')->get();
        $data=DB::table('vacancy_qualification')->first();
        
        
      return view('vacancies.index')->with(compact('results','company','vacancy','data'));
    }

    public function search(){
        $search_text=$_GET['query'];
        $posts=DB::table('posts')
        ->join('vacancies','vacancies.id','=','posts.vacancy_id')
        ->join('companies','companies.id','=','posts.company_id')
        ->select('posts.*','vacancies.*','companies.*')
        ->where('vacancies.title','LIKE','%'.$search_text.'%')
        ->where('posts.status',1)
        ->get();
        return view('vacancies.search',compact('posts',));
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
        $closing_date=$request->input('closing_date');
        $vacancy_id=DB::table('vacancies')->select('id')->where('title',$title)->first();
        $company_id=DB::table('companies')->select('id')->where('name',$company)->first();
        //return $company_id->id;
        DB::Insert('insert into vacancy_qualification(id,vacancy_id,company_id,advance_level,stream,graduate,field,gender,age,experience,other_quali) values(?,?,?,?,?,?,?,?,?,?,?)',[
            null,$vacancy_id->id,$company_id->id,$advance,$stream,$graduate,$field,$gender,$age,$exp,$other_quali
        ]);
        $quali_id=DB::table('vacancy_qualification')->select('id')->where('vacancy_id',$vacancy_id->id)->first();
        
        DB::Insert('insert into posts(id,vacancy_id,date,company_id,qualification_id,need,closing_date) values(?,?,?,?,?,?,?)',[
            null,$vacancy_id->id,$date,$company_id->id,$quali_id->id,$need,$closing_date
        ]);
            
        
        $results=DB::table('posts')->get();
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
        ->get();
        $datas=DB::table('vacancy_qualification')
        ->join('posts','posts.qualification_id','=','vacancy_qualification.id')
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
