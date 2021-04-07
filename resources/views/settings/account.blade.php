@extends('layouts.master.page')
@section('content')
@foreach($result as $com)
@endforeach


<div>
<ul class=" navbar-nav">
    <li class="nav-item nav-profile dropdown border-0" style="margin-top:30px">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" href="" class="btn btn-success">
            <img class="login-sign" src="{{ asset('images/login.png') }}">
            <span class="profile-name sub-texts">{{$request->username}}</span>
        </a>
        <div style="align-items:right">
        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{url('/user/log')}}">
                <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
            <a class="dropdown-item" href="{{url('/myaccount')}}">
                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
        </div>
        <div>
    </li>
</ul>
<h2 class="page-title">My Account</h2><br/>
<table><tr>
<td class="num-circle">
    <a href="{{ url('myaccount/posts',$com->id) }}"><img class="job-icon" src="{{asset('images/job-icon.png')}}"><p class="btn description">Posted Jobs</p></a></td>
<td class="num-circle">
    <a href=""><img class="job-icon" src="{{asset('images/application-icon.png')}}"><p class="btn description">Received Applications</p></a></td>
<td class="num-circle">
    <a href=""><img class="job-icon" src="{{asset('images/detail-icon.png')}}"><p class="btn description">Company Information</p></a></td>
</tr><tr>
<td class="gap">POSTED JOBS</td>
<td class="gap">RECEIVED APPLICATIONS</td>
<td class="gap">COMPANY DETAILS</td></tr>

</table>













</div>
@stop