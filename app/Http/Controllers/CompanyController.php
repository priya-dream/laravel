<?php

namespace App\Http\Controllers;
use App\Company;
use DB;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
        
        //return view ('companies.login');
    }
    public function login(Company $company)
    {
        // $companies = DB::table('companies')->get();
        // return view('companies.index',compact('companies'));
        return view ('companies.login');
    }
    public function test(Company $company)
    {
        $companies = DB::table('companies')->select('username', 'password')->get();
        return $companies;
        $row=DB::table('companies')->get();
        if($_POST['username']==$row['username'] AND $_POST['password']==$row['password']){
            return 'Correct';
        }else
        return 'Wrong';
        // return view('companies.test');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            //'name' => 'required',
            // 'address' => 'required'
            // 'ceo' => 'required',
            // 'mobile'=>'required',
            // 'email'=>'required',
            //'username'=>'required',
            //'password'=>'required',
            //'confirm_password'=>'required',
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->address = $request->address;
        $company->ceo = $request->ceo;
        $company->mobile = $request->mobile;
        $company->email = $request->email;
        $company->username = $request->username;
        $company->password = $request->password;

        $company->save();
        return  redirect()->route('company.index')->with('success','Account created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
       return view ('companies.test'); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company= Company::where('id',$id)->first();
        return view ('companies.edit');
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
        $this->validate($request,[
            'name' => 'required'
        ]);
            $company = Company::find($id);
           $company->name = $request->name;
           $company->save();

           return redirect()->route('company.index')->with('success','company successfully updated ');
        
    }

    public function delete(Company $company)
    {
      return view (company.delete,compact('company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Company::where('id',$id)->delete();
        return redirect()->back()->with('sucess','Company successfully deleted');
    }
}
