<?php

namespace App\Http\Controllers;
use App\Company;
use DB;
use Auth;
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
        
        return view ('companies.login');
    }
    public function log(Company $company, $id)
    {
        $result=DB::table('companies')->select('*')->where('id',$id)->first();
        
        return view ('companies.log',compact('result','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
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
        // $this->validate($request, [
        //     'username' => 'required|min:3|max:50',
        //     'email' => 'email',
        //     'password' => 'required|confirmed|min:6',
        // ]);

        $company = new Company;
        $company->name = $request->name;
        $company->address = $request->address;
        $company->ceo = $request->ceo;
        $company->mobile = $request->mobile;
        $company->email = $request->email;
        $company->username = $request->username;
        $company->password = $request->password;
        $company->logo=$request->logo;

        $company->save();
        return  redirect('/company/login')->with('success','Account created successfully, Now you can login');
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

    public function verify(Request $request)
    {
        // //print_r($request->input());
        $username=$request->input('username');
        $password=$request->input('password');
        $data=DB::table('companies')
        ->select('name','username')
        ->where('username',$username)
        ->where('password',$password)
        ->get();
        $advances=['Need','Not Necessary'];
        $streams=['Physical Science(Maths)','Biological Science','Commerce','Arts','Technology','Any'];
        $graduations=['Diploma','Higher Diploma','Degree','Master Degree'];
        $fields=['Engineering','Accounting','Teaching','Law','Electrical','Nursing','Media','Human Resource Management','Marketing','Management','Architecture','Infomation Technology','Computer Science','English','Software Engineering','Physical Science','Bio Science','Agriculture','Any'];
        $gender=['Male','Female','Any'];
        $vacancies= DB::table('vacancies')->select('title')->orderBy('title')->get();
        
            if(count($data))
                return View('vacancies.add',compact('request','data','vacancies','advances','streams','graduations','fields','gender'));  
            else
                return redirect('/company/login')->with('error','Invalid login details !!');
        
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         //return 'hi';
        if($request->ajax()){
            Company::find($request->input('pk'))->update([$request->input('name') => $request->input('value')]);
         return response()->json(['success' => true]);
     }
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
