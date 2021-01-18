<?php

namespace App\Http\Controllers;
use App\Vacancy;
//use App\Models\Vacancy;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    { 
        $data= DB::table('vacancies')->select('company')->first();
        $vacancies = Vacancy::latest()->paginate(4);
        $company=DB::table('companies')->select('name')->where('id',$data->company)->first();
      // return $company;
            
       return view('vacancies.index',compact('vacancies','company'))
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        
        return view('vacancies.create');
    }
    
    public function store(Request $request)
    {
        $date=date('Y-m-d');
        $title=$request->input('title');
        $company=$request->input('company');
        $qualification=$request->input('qualification');
        $need=$request->input('need');
        $age_limit=$request->input('age_limit');
        $gender=$request->input('gender');
        $closing_date=$request->input('closing_date');
        $company_id=DB::table('companies')
            ->select('name','id')
            ->where('name',$company)
            ->first();
    //        $vacancy_id= DB::table('posts')
    //         // ->join('vacancies','vacancies.id','=','posts.vacancy_id')
    //         // ->select('vacancies.title')
    //         ->first();        
    //    return $vacancy_id;

         DB::Insert('Insert into posts (id,date,title,company,qualification,need,age_limit,gender,closing_date) values (?,?,?,?,?,?,?,?,?)',[null,$date,$title,$company_id->id,$qualification,$need,$age_limit,$gender,$closing_date]);
         DB::Insert('Insert into vacancies (id,title,company,closing_date) values (?,?,?,?)',[null,$title,$company_id->id,$closing_date]);
         return redirect('/vacancy')->with('success','vacancy published successfully.')->with(compact('company'));
    }

    public function show(Vacancy $vacancy)
    {
       $posts = DB::table('posts')
            ->select('title','gender','age_limit','need','qualification')
            ->where('id',$vacancy->id)
            ->get();
        return view::make('vacancies.show',compact('posts'));
    }

    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit');
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
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
  
        return redirect('/vacancy')->with('success','vacancy deleted successfully.');
    }
  
}
