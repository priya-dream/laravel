@extends('layouts.master.page')
@section('content')
<div class="main-panel">
    <form action="{{url('/vacancy/add')}}" method="post" class="forms-sample">
        <div class="error">* required field</div>
        <div class="form-group">
            <label class=col><h5 class="error">*</h5>First Name</label>
            <input type="text" placeholder="firstname" name="fname" class="form-control">
        </div>
        <div class="form-group">
            <label class=col><span class="error">*</span>Last Name</label>
            <input type="text" placeholder="lastname" name="lname" class="form-control">
        </div>
    </form>
</div>



@stop