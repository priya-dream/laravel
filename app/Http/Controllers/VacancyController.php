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
      return view ('vacancies.add_new');
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
        $date=date('Y-m-d');
        $title=$request->input('title');
        $company=$request->input('company');
        $qualification=$request->input('qualification');
        $other_quali=$request->input('other_quali');
        $exp=$request->input('experience');
        $need=$request->input('need');
        $age_limit=$request->input('age_limit');
        $gender=$request->input('gender');
        $closing_date=$request->input('closing_date');
        $company_id=DB::table('companies')
            ->select('name','id')
            ->where('name',$company)
            ->first();  
        DB::Insert('Insert into vacancies (id,title,company,closing_date) values (?,?,?,?)',[null,$title,$company_id->id,$closing_date]);
        $vacancy_id=DB::table('vacancies')
                ->select('id')
                ->where('title','=', $title)
                ->where('company','=',$company_id->id)
                ->where('closing_date','=',$closing_date)
                ->first();
        //return $vacancy_id->id;
         DB::Insert('Insert into posts (id,date,vacancy_id,title,company,qualification,other_quali,experience,need,age_limit,gender,closing_date) values (?,?,?,?,?,?,?,?,?,?,?,?)',[null,$date,$vacancy_id->id,$title,$company_id->id,$qualification,$other_quali,$exp,$need,$age_limit,$gender,$closing_date]);
         return redirect('/vacancy')->with('success','vacancy published successfully.');
    }

    public function show(Vacancy $vacancy)
    {
        //return view('vacancies.show');
    }

    public function edit(Vacancy $vacancy)
    {
        return view('vacancies.edit');
    }

    public function apply(Vacancy $vacancy)
    {
        
        return view('vacancies.apply');
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
        //$vacancy->delete();
        $vacancy = Vacancy::where('id', $id)->first();
  
        return redirect('/vacancy')->with('success','vacancy deleted successfully.');
    }
  
}
