@extends('layouts.master.page')
@section('content')
<h1>Hi!</h1>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<a href="/company/login">POST JOB</a>

@stop