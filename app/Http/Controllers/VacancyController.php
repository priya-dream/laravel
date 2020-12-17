<?php

namespace App\Http\Controllers;
use App\Vacancy;
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
        $request->validate([
            'title' => 'required',
            'closing_date' => 'required',
        ]);
  
        Vacancy::create($request->all());
   
        return redirect()->route('vacancies.index')
                        ->with('success','vacancy published successfully.');
    }

    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show');
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
  
        return redirect()->route('vacancies.index')
                        ->with('success','vacancy deleted successfully');
    }
  
}
