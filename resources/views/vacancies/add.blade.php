@extends('layouts.master.page')
@section('content')

<h1>Hi! {{$request->username}}</h1>


@foreach($data as $com)
@endforeach

<ul class="navbar-nav" style="padding-right:200px">
<li class="nav-item nav-profile dropdown border-0">
    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" href="" class="btn btn-success">
        <img class="login-image" src="{{ asset('images/login.png') }}">
        <span style="padding-right:90px font-size:7px"class="profile-name sub-texts">{{$request->username}}</span>
    </a>
        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{url('/user/log')}}">
                <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
            <a class="dropdown-item" href="{{url('/join/logout')}}">
                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
        </div>
    </li>
</ul>



 <div class="main-panel">
<div><h1 class="page-title" style="padding-left:200px">Post New Vacancy</h1></div><br/><br/>

  <form action="{{url('/list')}}" method="post" class="forms-sample">
          {{csrf_field()}}

    <div class="form-group">
        <label class=col>Company Name</label>
        <input type="text" class="form-control input" name="company" value="{{$com->name}}" size="50px"   />
    </div>
    <div class="form-group input">
    <label class=col>Title</label>
        <select class="js-example-basic-single form-control dropdown-selection" name="title">
            <option>Select vacancy type.... </option>
            @foreach ($vacancies as $list) 
          {
            <option value="{{ $list->title }}">{{ $list->title }}</option>
          }
          @endforeach
        </select>
    </div>
    <div class="form-group input">
    <h5>Required Educational Qualification</h5>
    <div class="col-md-9 grid-margin stretch-card">
    <table><tr><td>
    <label class=col>A/L Qualified</label>
        <select class="form-control dropdown-selection" name="advance_level">
            <option>Need</option>
            <option>Not Necessary</option>
        </select></td><td></td><td></td><td></td><td></td><td>
    <label class=col>Stream</label>
        <select class="form-control dropdown-selection" name="stream">
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
    <div class="col-md-9 grid-margin stretch-card">
            <div class="form-group">
                <table><tr><td>
                <label class=col>Graduation</label>
                <select class="form-control dropdown-selection"  name="grad">
                    <option>Select your top graduation...</option>
                    <option>Diploma</option>
                    <option>Higher Diploma</option>
                    <option>Degree</option>
                    <option>Master Degree</option>
                </select></td><td></td><td></td><td></td><td></td><td>
                <label class=col>Field</label>
                <select class="form-control dropdown-selection" name="field">
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
    <div class="form-group">
        <label class=col>Required Other Qualification</label>
        <textarea class="form-control textarea" name="other_quali" placeholder="Type here" /></textarea>
    </div>
    <div class="form-group">
        <label class=col>Gender preference</label>
        <select class="form-control dropdown-selection" id="exampleSelectGender" name="gender">
            <option>Male</option>
            <option>Female</option>
            <option>Any</option>
        </select>
    </div>
    <div class="form-group">
        <label class=col>Age Limit</label>
        <input type="text" class="form-control input" name="age_limit" placeholder="Type age limit eg:22-30" />
    </div>
    <div class="form-group">
    <label class=col>Needed Employee</label>
        <input type="number" min="1" placeholder="select needed No of employee" name="need" class="form-control input">
    </div>
    <div class="form-group">
    <label class=col>Experience</label>
        <input type="text" placeholder="exoerience" name="experience" class="form-control input">
    </div>
    <div class="form-group">
    <label class=col>Closing Date</label>
        <input type="date" placeholder="choose the closing date" name="closing_date" class="form-control input">
    </div>
    
    </br></br>
 <input type="submit" value="Add" class="btn btn-primary"></br>
 </form>
</div>
</div>
@stop