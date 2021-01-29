@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">Vacancy Details</h1></div></br></br>
<?php 
$i=2;
?>
@foreach($lists as $list)
      <!-- <div>{{$list->image}}></div> -->
      <div><h2 style="color:#C71585">{{$list->title}}</h2></div>
      <div><img src="{{ asset('images/IT.png') }}" width="1000px" height="500px" style="align:center"></div></br>
      <div>
       <table><tr><td>
       <div><h4 class="main-text"> Post :</h4><ul><h4 class="sub-text">{{$list->title}}</h4></ul></div>
       <div><h4 class="main-text">Company :</h4><ul><h4 class="sub-text">{{$list->name}}<h4></ul></div>
       <div><h4 class="main-text">Gender preference :</h4><ul><h4 class="sub-text">{{$list->gender}}</h4></ul></div>
       <div><h4 class="main-text"> No of needed employees :</h4><ul><h4 class="sub-text">{{$list->need}}</h4></ul></div> 
       <div><h4 class="main-text">Closing Date :</h4><ul><h4 class="sub-text">{{$list->closing_date}}</h4></ul></div>
       </td><td>
       <div><h4 class="main-text">Required educational qualifications :</h4><ul><h4 class="sub-text">{{$list->qualification}}</h4></ul></div>
       <div><h4 class="main-text">Required other qualifications :</h4><ul><h4 class="sub-text">{{$list->other_quali}}</h4></ul></div>
       <div><h4 class="main-text"> Experience :</h4><ul><h4 class="sub-text">{{$list->experience}}</h4></ul></div>
       </td></tr></table>
      </div>
@endforeach
</div>
              
@stop

