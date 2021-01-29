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
        $data= DB::table('posts')->get();
       //$vacancy = Vacancy::latest()->paginate(4);
        //$posts = Post::all();
        // $results=DB::table('posts')
        //     ->join('posts','posts.company_id','=','companies.id')
        //      ->select('posts.*','companies.*')
            //->where('companies.id','=',$data->company)
            // ->get();
             echo'<a href="/company/login">POST JOB</a>';
      //return view('vacancies.index')->with(compact('results','data','posts'));
      // ->with('i', (request()->input('page', 1) - 1) * 5);


       
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
