@extends('layouts.master.page')
@section('content')
<div class="main-panel">
@foreach($results as $result)
<div>{{$result->title}}</div>
@endforeach
</div>
@stop