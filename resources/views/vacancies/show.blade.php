@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Job Details</h1></div></br></br>
<?php 
$i=2;
?>
@foreach($posts as $post)
{{$post->closing_date}}

@endforeach
</div>
              
@stop

