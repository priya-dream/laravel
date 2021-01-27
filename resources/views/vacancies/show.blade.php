@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Vacancy Details</h1></div></br></br>
<?php 
$i=2;
?>
@foreach($lists as $list)
      <!-- <div>{{$list->image}}></div> -->
      <div><h2 style="color:#C71585">{{$list->title}}</h2>
      <div><img src="{{ asset('images/IT.png') }}" width="1000px" height="500px" style="align:center"></div></br></br>
      <div><h4 class="main-text"> Post : {{$list->title}}</h4></div>
      <div class="main-text">Company :  <p class="sub-text">{{$list->name}}</p></div>
      <div class="main-text">Required qualifications :  <p class="sub-text">{{$list->qualification}}</p></div>
      <div class="main-text"> No of needed employees :  <p class="sub-text">{{$list->need}}</p></div>
      <div class="main-text">Gender preference :  <p class="sub-text">{{$list->gender}}</p> </div> 
      <div class="main-text">Closing date : <p class="sub-text"> {{$list->closing_date}}</p></div>
@endforeach
</div>
              
@stop

