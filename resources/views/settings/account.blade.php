@extends('layouts.master.page')
@section('content')
@foreach($result as $com)
@endforeach

<div>
<ul class=" navbar-nav">
    <li class="nav-item nav-profile dropdown border-0" style="margin-top:30px">
        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" class="btn btn-success">
            <img class="login-sign" src="{{ asset('images/login.png') }}">
            <span class="profile-name sub-texts">{{$request->username}}</span>
        </a>
        <div style="align-items:right">
        <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{url('/company/log',$com->id)}}">
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
    <a href="{{ url('myaccount/posts',$com->id) }}"><img class="job-icon" src="{{asset('images/job-icon.png')}}"></a></td>
<td class="num-circle">
    <a href="{{url('myaccount/applications',$com->id)}}"><img class="job-icon" src="{{asset('images/application-icon.png')}}"></p></a></td>
<td class="num-circle">
    <a href="{{url('myaccount/details',$com->id)}}"><img class="job-icon" src="{{asset('images/detail-icon.png')}}"></a></td>
</tr><tr>
<td class="gap">POSTED JOBS</td>
<td class="gap">RECEIVED APPLICATIONS</td>
<td class="gap">COMPANY DETAILS</td></tr>

</table>













</div>
@stop