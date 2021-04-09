@extends('layouts.master.page')
<html>
<body>
@section('content')
<div class="main-panel">
<h1 class="page-title" >Post New Vacancy</h1>
@foreach($data as $com)
@endforeach
<form action="{{url('/list')}}" method="post" class="forms-sample">
        {{csrf_field()}}
    <div class="row">
    <div class="col-lg-24 grid-margin">
    <div class="shadow card">
        <div class="form-group row" style="margin-top:30px"> 
        <table><tr><td>       
		    <div class="col-md-6">
                <label class="col">Company Name</label>
                <input type="text" class="form-control input1" name="company" value="{{$com->name}}" size="50px" />
            </div></td><td>
            <div class="col-md-6">
                <label class="col">Branch Name</label>
                <input type="text" class="form-control input1" name="branch" size="50px" placeholder="Eg: jaffna" />
            </div></td></tr></table>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="col">Title Of Job</label>
                <select class="js-example-basic-single form-control dropdown-selection1" name="title" required/>
                    <option value="">Select vacancy type.... </option>
                        @foreach ($vacancies as $list) 
                            {
                                <option value="{{ $list->title }}">{{ $list->title }}</option>
                            }
                        @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <h5>Required Educational Qualification</h5>
                <div class="col-md-9 grid-margin stretch-card">
                    <table><tr><td>
                    <label class=col onkeyup="stoppedTyping()">A/L Qualified</label>
                        <select class="form-control dropdown-selection2" name="advance_level" id="advance_level" required/>
                            <option value="">Select.. </option>
                            <option>Not Necessary</option>
                            <option>Need</option>
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Stream</label>
                        <select class="form-control dropdown-selection2" name="stream" id="stream" required/ >
                            <option value="">Select stream...</option>
                            <option>Physical Science(Maths)</option>
                            <option>Biological Science</option>
                            <option>Commerce</option>
                            <option>Arts</option>
                            <option>Technology</option>
                            <option>Any</option>
                        </select></td></tr></table>
                        
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="col-md-9 grid-margin stretch-card">
                    <div class="form-group">
                        <table><tr><td>
                        <label class=col>Graduation</label>
                        <select class="form-control dropdown-selection2"  name="grad" required/>
                            <option value="">Wanted graduation...</option>
                            <option>Diploma</option>
                            <option>Higher Diploma</option>
                            <option>Degree</option>
                            <option>Master Degree</option>
                        </select></td><td></td><td></td><td></td><td></td><td>
                        <label class=col>Field</label>
                        <select class="form-control dropdown-selection2" name="field" required/>
                            <option value="">Select the subject/field...</option>
                            <option>Infomation Technology</option>
                            <option>Computer Science</option>
                            <option>English</option>
                            <option>Software Engineering</option>
                            <option>Physical Science</option>
                            <option>Bio Science</option>
                            <option>Agriculture</option>
                            <option>Any</option>
                        </select></td></tr></table>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class=col>Required Other Qualification</label>
                <textarea class="form-control textarea1" name="other_quali" placeholder="Type here" required/></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class=col>Gender preference</label>
                        <select class="form-control dropdown-selection2" id="exampleSelectGender" name="gender" required/>
                            <option value="">Select gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Any</option>
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Age Limit</label>
                    <input type="text" class="form-control dropdown-selection2" name="age_limit" placeholder="Type age limit eg:22-30" required/>
                    </td></tr></table>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class="col">Needed Employee</label>
                        <input type="number" min="1" placeholder="select needed No of employee" name="need" class="form-control dropdown-selection2" required/>
                        </td><td></td><td></td><td></td><td></td><td>
                    <label class="col">Experience</label>
                        <input type="text" placeholder="experience" name="experience" class="form-control dropdown-selection2" required/>
                        </td></tr></table>
                </div>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
                <label class="col">Salary (monthly)</label>
                <input type="text" placeholder="Eg: 15000-20000" name="sal-from" class="form-control input1" required/>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
                <label class="col">Closing Date</label>
                <input type="date" placeholder="choose the closing date" name="closing_date" class="form-control dropdown-selection2" required/>
            </div>
        </div></br></br>
        <div class="form-group row">        
		    <div class="col-md-6">
                <input type="submit" value="Add" class="btn btn-primary"></br></br>
            </div>
        </div>
    </div>
    </div>
    </div>
 </form>
</div>
<script src="{{asset('js/app.js')}}"></script> 
@stop
</body>
</html>