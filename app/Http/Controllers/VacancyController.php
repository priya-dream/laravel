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
        //return view('vacancies.index');
        // $vacancies = Vacancy::all();
        // return view('vacancies.index',compact('vacancies'));
        
            $vacancies = Vacancy::latest()->paginate(4);
            return view('vacancies.index',compact('vacancies'))
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
        //$company=$request->input('company');
        $qualification=$request->input('qualification');
        $need=$request->input('need');
        $age_limit=$request->input('age_limit');
        $gender=$request->input('gender');
        $closing_date=$request->input('closing_date');
        $company=DB::table('companies')
            ->join('vacancies', 'companies.id', '=', 'vacancies.company')
            ->join('users', 'users.name', '=', 'companies.username')
            ->join('posts','posts.company','=','companies.id')
            ->select('companies.name')
            ->get();
        return $title;
            

        // DB::Insert('Insert into posts (id,date,title,qualification,need,age_limit,gender,closing_date) values (?,?,?,?,?,?,?,?)',[null,$date,$title,$qualification,$need,$age_limit,$gender,$closing_date]);
        // DB::Insert('Insert into vacancies (id,title,closing_date) values (?,?,?)',[null,$title,$closing_date]);
        // return redirect('/vacancy')->with('success','vacancy published successfully.');
    }

    public function view(Request $request)
    {
        //$vacancy=Vacancy::all();
        $title=$request->input('title');
        $qualification=$request->input('qualification');
        $gender=$request->input('gender');
        $age=$request->input('age');
        $need=$request->input('need');
        $closing_date=$request->input('closing_date');
        
        //return $title;
        return view('vacancies.show',compact('request'));
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
