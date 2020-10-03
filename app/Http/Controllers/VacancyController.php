<?php

namespace App\Http\Controllers;
use App\vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    public function index()
    {
        //return view('vacancies.index');
        // $vacancies = vacancy::all();
        // return view('vacancies.index',compact('vacancies'));
        
            $vacancies = vacancy::latest()->paginate(4);
            return view('vacancies.index',compact('vacancies'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        
        return view('vacancies.create');
    }
    public function login()
    {
        
        return view('vacancies.login');
    }
    public function create_account()
    {
        
        return view('vacancies.create_account');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'closing_date' => 'required',
        ]);
  
        vacancy::create($request->all());
   
        return redirect()->route('vacancies.index')
                        ->with('success','vacancy published successfully.');
    }

    public function show(vacancy $vacancy)
    {
        return view('vacancies.show',compact('vacancy'));
    }

    public function edit(vacancy $vacancy)
    {
        return view('vacancies.edit',compact('vacancy'));
    }

    public function update(Request $request, vacancy $vacancy)
    {
        $request->validate([
            'title' => 'required',
            'closing_date' => 'required',
        ]);
  
        $vacancy->update($request->all());
  
        return redirect()->route('vacancies.index')
                        ->with('success','vacancy published successfully');
    }
    public function destroy(vacancy $vacancy)
    {
        $vacancy->delete();
  
        return redirect()->route('vacancies.index')
                        ->with('success','vacancy deleted successfully');
    }
  
}
