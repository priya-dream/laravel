@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Login</h1></div><br/><br/>
  <form action="{{ route('vacancies.store') }}" method="POST" class="forms-sample">
     @csrf
        <div class="form-group">
          <label class=col>Company ID</label>
          <input type="text" class="form-control" name="id"placeholder="Company ID" />
        </div>
        <div class="form-group">
          <label class=col>Password</label>
          <input type="text" class="form-control" name="password"placeholder="password" />
        </div>
        <div><button type="submit" class="btn btn-primary"> Login </button></div></br>
        <a href="/vacancies/create_account" class="btn button">Create New Account</a>
  </form> 
</div>
@stop