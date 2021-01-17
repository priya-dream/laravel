@extends('layouts.master.page')
@section('content')


<div  class="alert alert-success">
<p>Hi! 
{{$request->username}}</p>
@foreach($company as $com)
Company : {{$com->name}}
@endforeach
</div>
<ul class="navbar-nav">
<li class="nav-item nav-profile dropdown border-0">
    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" href="" class="btn btn-success">
        <img class="login-image" src="{{ asset('images/login.png') }}">
        <span class="profile-name">{{$request->username}}</span>
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
<div><h1 class="page-title">Post New Vacancy</h1></div><br/><br/>

  <form action="{{url('/vacancy/add')}}" method="post" class="forms-sample">
          {{csrf_field()}}

    <div class="form-group">
        <input type="text" class="form-control" name="company" value="{{$com->name}}"    />
    </div>
    <div class="form-group">
    <label class=col>Title</label>
        <select class="form-control" name="title">
            <option>Select vacancy type.... </option>
            <option>Trainee IT Executive</option>
            <option>Management Assistant</option>
            <option>Sales Executive</option>
            <option>Customer Care Assistant</option>
            <option>General Manager</option>
        </select>
    </div>
    <div class="form-group">
    <label class=col>Required Qualification</label>
        <select class="form-control" name="qualification">
            <option>Select Qualification...</option>
            <option>A/L Qualified(Any stream)</option>
            <option>A/L Qualified(Commerce stream)</option>
            <option>A/L Qualified(Science stream)</option>
            <option>Degree Holder(Any field)</option>
            <option>Bsc(computer science)</option>
            <option>IT degree(any field)</option>
        </select>
    </div>
    <div class="form-group">
        <label class=col>Gender preference</label>
        <select class="form-control" id="exampleSelectGender" name="gender">
            <option>Male</option>
            <option>Female</option>
            <option>Any</option>
        </select>
    </div>
    <div class="form-group">
        <label class=col>Age Limit</label>
        <input type="text" class="form-control" name="age_limit" placeholder="Type age limit eg:22-30" />
    </div>
    <div class="form-group">
    <label class=col>Needed Employee</label>
        <input type="number" min="1" placeholder="select needed No of employee" name="need" class="form-control">
    </div>
    <div class="form-group">
    <label class=col>Closing Date</label>
        <input type="date" placeholder="choose the closing date" name="closing_date" class="form-control">
    </div>
    
    </br></br>
 <input type="submit" value="Add" class="btn btn-primary">
 </form>
</div>
</div>
@stop