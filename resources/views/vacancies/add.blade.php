@extends('layouts.master.page')
<html>
<body>
@section('content')

<!-- <div class='name'>Hi! {{$request->username}}</div> -->

@foreach($data as $com)
@endforeach
<ul class="navbar-nav">
    <li class="nav-item nav-profile dropdown border-0" style="margin-top:30px">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" href="" class="btn btn-success">
            <img class="login-image" src="{{ asset('images/login.png') }}">
            <span class="profile-name sub-texts">{{$request->username}}</span>
        </a>
        <div style="align-items:right">
        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{url('/user/log')}}">
                <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
            <a class="dropdown-item" href="{{url('/join/logout')}}">
                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
        </div>
        <div>
    </li>
</ul>



<div class="main-panel">
<h1 class="page-title" >Post New Vacancy</h1>
<form action="{{url('/list')}}" method="post" class="forms-sample">
        {{csrf_field()}}
    <div class="row">
    <div class="col-lg-13 grid-margin">
    <div class="card">
        <div class="form-group row" style="margin-top:30px">        
		    <div class="col-md-6">
                <label class="col">Company Name</label>
                <input type="text" class="form-control input1" name="company" value="{{$com->name}}" size="50px" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <label class="col">Title Of Job</label>
                <select class="js-example-basic-single form-control dropdown-selection1" name="title">
                    <option>Select vacancy type.... </option>
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
                        <select class="form-control dropdown-selection2" name="advance_level" id="advance_level">
                            <option>Not Necessary</option>
                            <option>Need</option>
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Stream</label>
                        <select class="form-control dropdown-selection2" name="stream" id="stream"  >
                            <option>Select stream...</option>
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
                        <select class="form-control dropdown-selection2"  name="grad">
                            <option>Wanted graduation...</option>
                            <option>Diploma</option>
                            <option>Higher Diploma</option>
                            <option>Degree</option>
                            <option>Master Degree</option>
                        </select></td><td></td><td></td><td></td><td></td><td>
                        <label class=col>Field</label>
                        <select class="form-control dropdown-selection2" name="field">
                            <option>Select the subject/field...</option>
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
                <textarea class="form-control textarea1" name="other_quali" placeholder="Type here" /></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class=col>Gender preference</label>
                        <select class="form-control dropdown-selection2" id="exampleSelectGender" name="gender">
                            <option>Male</option>
                            <option>Female</option>
                            <option>Any</option>
                        </select></td><td></td><td></td><td></td><td></td><td>
                    <label class=col>Age Limit</label>
                    <input type="text" class="form-control dropdown-selection2" name="age_limit" placeholder="Type age limit eg:22-30" />
                    </td></tr></table>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-6">
                <div class="form-group">
                    <table><tr><td>
                    <label class="col">Needed Employee</label>
                        <input type="number" min="1" placeholder="select needed No of employee" name="need" class="form-control dropdown-selection2">
                        </td><td></td><td></td><td></td><td></td><td>
                    <label class="col">Experience</label>
                        <input type="text" placeholder="experience" name="experience" class="form-control dropdown-selection2">
                        </td></tr></table>
                </div>
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
                <label class="col">Salary (monthly)</label>
                <input type="text" placeholder="salary" name="salary" class="form-control input1">
            </div>
        </div>
        <div class="form-group row">        
		    <div class="col-md-6">
                <label class="col">Closing Date</label>
                <input type="date" placeholder="choose the closing date" name="closing_date" class="form-control dropdown-selection2">
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