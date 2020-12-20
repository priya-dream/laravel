@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Login</h1></div><br/><br/>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@if(isset(Auth::user()->email))
  <script>windows.location="/join/successlogin";</script>
@endif

@if(count($errors)>0)
  <div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    </ul>
  </div>
@endif

  <form method="post" action="{{url('/join/verify')}}">
  {{csrf_field()}}
      <div class="form-group">
          <label class=col>Username</label>
          <input type="text" class="form-control" name="email"placeholder="enter username" />
        </div>
        <div class="form-group">
          <label class=col>Password</label>
          <input type="password" class="form-control" name="password"placeholder="enter password" />
        </div>
        <div><button type="submit" class="btn btn-primary" > Login </a></div>
  </form></br>
  
  <div><a class="btn button" href="{{url('/join/create')}}">Create New Account</a></div>
        
   
</div>
@stop