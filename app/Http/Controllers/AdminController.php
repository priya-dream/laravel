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

    public function for_publish(){

        $result=DB::table('posts')->join('vacancies','vacancies.id','=','posts.vacancy_id')->join('companies','companies.id','=','posts.company_id')
        ->select('title','name','closing_date','date','posts.id','quali_id','mobile')->where('posts.status',0)->orderBy('posts.date','DESC')->get();
        $quali=DB::table('vacancy_qualification')->select('*')->get();
        return view('admin.for_publish',compact('result','quali'));
    }

    public function publish($id){
        DB::Update('update posts set status=? where id=?',[1,$id]);
        return redirect('/admin/for_publish');

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
        $result=DB::table('posts')
        ->join('applications','applications.post_id','posts.id')
        ->join('vacancies','posts.vacancy_id','=','vacancies.id')
        ->select(DB::raw('title as title'),DB::raw('count(job_seeker_id) as count'))
        ->groupBy(DB::raw('title'))->where('posts.status',1)->get();
        $test[] = ['Title', 'Count'];
        $result1=DB::table('applications')
        ->select(DB::raw('count(*) as count'))
        ->groupBy(DB::raw('job_seeker_id'))->pluck('count');
        $datas=array();
        foreach($result as $res=>$key){
            $test[++$res] = [$key->title, $key->count];
        }
        return json_encode($test);
        //return view('admin.dashboard',compact('datas'))->with('name',json_encode($array1))->with('title',json_encode($array));
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

    public function company_data(){
        $results=DB::table('companies')->select('*')->where('status',1)->get();
        // $vacancy=DB::table('vacancies')->join('posts','posts.vacancy_id','=','vacancies.id')
        // ->join('companies','companies.id','=','posts.company_id')
        // ->select('companies.name')->where('posts.status',1)->whereIn('posts.vacancy_id',[1,4])->get();
        // return view('companies.test',compact('vacancy'));
        return view('admin.com_data',compact('results'));
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
