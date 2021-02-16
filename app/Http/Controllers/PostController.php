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
        $results=DB::table('posts')->get();
        $company=DB::table('companies')->select('name','id','image')->get(); 
        $vacancy=DB::table('vacancies')->select('title','id')->get();
      return view('vacancies.index')->with(compact('results','company','vacancy'));
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
        
        DB::Insert('insert into vacancy_qualification(id,vacancy_id,company_id,advance_level,stream,graduate,field,gender,age,experience) values(?,?,?,?,?,?,?,?,?,?)',[
            null,$vacancy_id->id,$company_id->id,$advance,$stream,$graduate,$field,$gender,$age,$exp
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
    public function show(Request $request)
    {
        $posts=DB::table('vacancies')->first();
        $lists=DB::table('vacancy_qualification')
        ->join('posts','posts.vacancy_id','=','vacancy_qualification.vacancy_id')
        ->join('vacancies','vacancies.id','=','vacancy_qualification.vacancy_id')
        ->join('companies','companies.id','=','vacancy_qualification.company_id')
        ->select('posts.*','companies.*','vacancy_qualification.*')
        ->get();
        // ->where('posts.vacancy_id',$vac->id)->get(); 
      //return $posts->id;
    //$lists = Post::with('vacancy_quali')->get();
       return view('vacancies.show',compact('posts','lists'));
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
