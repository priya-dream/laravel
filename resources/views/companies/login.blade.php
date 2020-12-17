@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Login</h1></div><br/><br/>
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif



  <form>
  {{csrf_field()}}
      <div class="form-group">
          <label class=col>Username</label>
          <input type="text" class="form-control" name="id"placeholder="Company ID" />
        </div>
        <div class="form-group">
          <label class=col>Password</label>
          <input type="password" class="form-control" name="password"placeholder="password" />
        </div>
        <div><button class="btn btn-primary" href="{{url('/admin/company/test')}}" > Login </button></div>
        <div><button class="btn button" href="{{url('/admin/company/create')}}">Create New Account</button></div>
  </form><br/>
        
   
</div>
@stop