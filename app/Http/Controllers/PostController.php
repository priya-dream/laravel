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
    public function index(Post $post)
    {
        $results= DB::table('posts')->get();
        $company=DB::table('companies')->select('name')->where('id',$results->company_id)->first();
       //$vacancy = Vacancy::latest()->paginate(4); //$posts = Post::all();
      return view('vacancies.index')->with(compact('results','company'));
    //   ->with('i', (request()->input('page', 1) - 1) * 5);


       
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
        $vacancy_id=DB::table('vacancies')->select('id')->where('title',$title)->first();
        $company_id=DB::table('companies')->select('id')->where('name',$company)->first();
        $quali_id=DB::table('vacancy_qualification')->select('id')->where('vacancy_id',$vacancy_id->id)->first();
        return $quali_id->id;
        // DB::table('vacancy_qualification')
        //         ->where('vacancy_id',3)
        //         ->update(['stream' => 'Arts']);
        // DB::Insert('insert into vacancy_qualification(id,vacancy_id,company_id,advance_level,stream,graduate,field,gender,age,experience) values(?,?,?,?,?,?,?,?,?,?)',[
        //     null,$vacancy_id->id,$company_id->id,$advance,$stream,$graduate,$field,$gender,$age,$exp
        // ]);
        // $posts = new Post;
        // $posts->need = $request->need;
        // $posts->closing_date = $request->closing_date;
        // $posts->date=$date;
        // $posts->vacancy_id=$vacancy_id;
        // $posts->qualification_id=$quali_id->id;
        // $posts->save();
        // return  redirect('/post')->with('success','Account created successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $vacancy=Post::all();
        $vac=DB::table('vacancies')->first();
        $lists=DB::table('posts')
        ->join('companies','posts.company','=','companies.id')
        ->select('posts.*','companies.*')
        ->where('posts.vacancy_id',$vac->id)->get(); 
       // return $vacancy->title;
        return view('vacancies.show',compact('lists'));
        //return view('vacancies.show',compact('post'));
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
