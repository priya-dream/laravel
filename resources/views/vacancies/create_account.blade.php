@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Company Details</h1></div><br/><br/>
  <form action="{{ route('vacancies.store') }}" method="POST" class="forms-sample">
     @csrf
        <div class="form-group">
          <label class=col>Company Name</label>
          <input type="text" class="form-control" name="id"placeholder="Company Name" />
        </div>
        <div class="form-group">
          <label class=col>Address</label>
          <input type="text" class="form-control" name="address"placeholder="address" />
        </div>
        <div class="form-group">
          <label class=col>CEO Name</label>
          <input type="text" class="form-control" name="ceo"placeholder="CEO" />
        </div>
        <div class="form-group">
          <label class=col>Mobile Number</label>
          <input type="text" class="form-control" name="moblie"placeholder="Mobile" />
        </div>
        <div><button type="submit" class="btn btn-primary"> Create </button></div>
  </form> 
</div>
@stop