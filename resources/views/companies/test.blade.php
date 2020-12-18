@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Login</h1></div><br/><br/>
@if(isset(Auth::user()->email))
    <div class="alert alert-danger success-block">
        <strong>
        welcome{{ Auth::user()->email}}
        </strong></br>
        <a href="{{url('/join/logout')}}">Logout</a>
    </div>
    else
    <script>window.location="/join";</script>
    
@endif

</div>
</div>