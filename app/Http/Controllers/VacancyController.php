<?php

namespace App\Http\Controllers;
use App\Vacancy;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        
        $results= DB::table('vacancies')->orderby('title')->paginate(10);

        
      return view ('vacancies.add_new',compact('results'));
    }
    public function type()
    { 
      return view ('vacancies.type');
    }

    public function create()
    {
        
        return view('vacancies.create');
    }
    
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'img'=>'required'
        ]);
        $vacancy= new Vacancy;
        $vacancy->title=$request->title;
        $vacancy->img=$request->img;
        $vacancy->save();
        //return $vacancy->img;
        return  redirect('/vacancies')->with('success','New job type Added :)');
    }

    public function show(Vacancy $vacancy)
    {
        //return view('vacancies.show');
    }

    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit');
    }

    public function apply($id)
    {
        $posts=DB::table('posts')->select('id')->where('id',$id)->get();
        return view('vacancies.apply',compact('posts'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            'title' => 'required',
            'closing_date' => 'required',
        ]);
  
        $vacancy->update($request->all());
  
        return redirect()->route('vacancies.index')
                        ->with('success','vacancy published successfully');
    }
    public function destroy($id)
    {
        //$vacancy->delete();
        Vacancy::where('id',$id)->delete();
        return redirect()->back()->with('sucess','Company successfully deleted');
    }
  
}
