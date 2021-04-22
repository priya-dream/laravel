<?php

namespace App\Http\Controllers;
use App\Vacancy;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    { 
        $results= DB::table('vacancies')->orderby('title')->paginate(10);   
        return view ('vacancies.add_new',compact('results'))
        ->with('i', (request()->input('page', 1) - 1) * 10);
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
        return  redirect('/vacancies');
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
        $advances=['Qualified','Not Qualified'];
        $streams=['Physical Science(Maths)','Biological Science(Bio)','Commerce','Arts','Technology','Any'];
        $graduations=['Diploma','Higher Diploma','Degree','Master Degree'];
        $fields=['Engineering','Accounting','Teaching','Law','Electrical','Nursing','Media','Human Resource Management','Marketing','Management','Architecture','Infomation Technology','Computer Science','English','Software Engineering','Physical Science','Bio Science','Agriculture'];
        $gender=['Male','Female','Any'];
        return view('vacancies.apply',compact('posts','advances','streams','graduations','fields','gender'));
    }

    public function change_vacancy_type(Request $request,$id){
        $image=$request->input('image');
        $title=$request->input('title');
        DB::update('update vacancies set title=? where id=?',[$title,$id] );
        if($image!=null){
        DB::update('update vacancies set img=? where id=?',[$image,$id] );}
        return redirect('/vacancies');
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
        DB::table('vacancies')->whereId($id)->delete();;
        return redirect('/vacancies');
    }
  
}
