@extends('layouts.master.page')
@section('content')
<div class="main-panel" style="margin-left:300px">
<div><h1 style="color:#4B0082">Login</h1></div></br>
<div class="px-xl-5">
<div><img class="login-image" src="{{asset('images/dfc-logo.png')}}"></div></br>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif
    @if ($error = Session::get('error'))
      <div class="alert alert-danger">
          <p>{{ $error }}</p>
      </div>
    @endif
  <div class="position">
    <form method="post" action="{{url('/account/verify')}}">
    {{csrf_field()}}
        <div class="form-group">
            <label class=col>Username</label>
            <input type="text" class="form-control" name="username"placeholder="enter username" />
          </div>
          <div class="form-group">
            <label class=col>Password</label>
            <input type="password" class="form-control" name="password"placeholder="enter password" />
          </div>
          <div><button type="submit" class="btn btn-primary" style="margin:10px 0px 0px 100px; color:#140b63" > Login </a></div>
    </form></br>
  </div>
</div>
</div>
@stop