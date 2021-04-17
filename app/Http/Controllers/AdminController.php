<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin');
    }
    public function dashboard()
    {
        $data1 = DB::table('posts')
            ->join('companies','companies.id','=','posts.company_id')
           ->select(
            DB::raw('name as name'),
            DB::raw('count(*) as num'))
            ->where('posts.status',1)
           ->groupBy('name')
           ->get();
           $array1[] = ['Name', 'Num'];
           foreach($data1 as $ke => $val)
        {
          $array1[++$ke] = [$val->name, $val->num];
        }
        $data = DB::table('posts')
            ->join('vacancies','vacancies.id','=','posts.vacancy_id')
           ->select(
            DB::raw('title as title'),
            DB::raw('count(*) as number'))
            ->where('status',1)
           ->groupBy('title')
           ->get();
        $array[] = ['Title', 'Number'];
        foreach($data as $key => $value)
        {
          $array[++$key] = [$value->title, $value->number];
        }
        return view('admin.dashboard')->with('title',json_encode($array));
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
    public function verify(Request $request)
    {
        $username=$request->input('username');
        $password=$request->input('password');
        if($request->username=="admin" and $request->password=="789123" )
            return View('admin');
        else
            return redirect('/post')->with('error','Sorry,Admin login details are wrong !!');
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
