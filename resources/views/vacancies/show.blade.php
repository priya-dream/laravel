@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h2>Job Details</h2></div></br>
<?php 
$i=2;
?>


@foreach($lists as $list)
@if($posts->id==$list->vacancy_id)
<div><h2 style="color:#C71585">{{$posts->title}}</h2></div>
<div><img src="{{ asset('images/IT.png') }}" width="1000px" height="500px" style="align:center"></div></br>
<div>
       <table><tr><td style="padding-left:80px">
       <div><h4 class="main-text"> Designation :</h4><ul><h4 class="sub-text">{{$posts->title}}</h4></ul></div>
       <div><h4 class="main-text">Company :</h4><ul><h4 class="sub-text">{{$list->name}}<h4></ul></div>
       <div><h4 class="main-text">Gender preference :</h4><ul><h4 class="sub-text">{{$list->gender}}</h4></ul></div>
       <div><h4 class="main-text">Age Limit :</h4><ul><h4 class="sub-text">{{$list->age}}</h4></ul></div>
       <div><h4 class="main-text"> No of needed employees :</h4><ul><h4 class="sub-text">{{$list->need}}</h4></ul></div> 
       <div><h4 class="main-text">Closing Date :</h4><ul><h4 class="sub-text">{{$list->closing_date}}</h4></ul></div>
       </td><td class="main-text" style="padding-left:270px"><br/>
       <div><h4 >Required educational qualifications</h4></div>
       <div><h4 style="padding-left:40px">G.C.E(Advance Level)completion  :<span class="sub-text">{{$list->advance_level}}</span></h4></div>
       <div><h4 style="padding-left:40px">Stream :<span class="sub-text">{{$list->stream}}</span></h4></div>
       <div><h4 style="padding-left:40px">Graduation :<span class="sub-text">{{$list->graduate}}</span></h4></div>
       <div><h4 style="padding-left:40px">Field :<span class="sub-text">{{$list->field}}</span></h4></div>
       
       <div><h4 style="padding-top:10px; padding-bottom:10px" >Required other qualifications</h4></div>
       <div><h4 style="padding-left:40px">Experience :<span class="sub-text">{{$list->experience}}</span></h4></div>
       <div><h4 style="padding-left:40px">Should have clear knowledge in PHP,MYSQL.</h4></div>
       <div><h4 style="padding-left:40px">Should have team work.</h4></div>
       <div><h4 style="padding-left:40px">Should be as self motivator.</h4></div>
       </td></tr></table>
      </div>
@endif




@endforeach
</div>
              
@stop

