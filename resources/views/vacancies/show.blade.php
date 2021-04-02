@extends('layouts.master.page')
<body>
@section('content')
<div class="main-panel">
<div><h2>Job Details</h2></div></br>
<?php 
$i=2;
?>



@foreach($datas as $data)
      <div><h2 style="color:#C71585">{{$data->title}}</h2></div>
      <div class="card-main" style="background-image:url('{{asset('images/'.$data->img)}}');background-size:900px 650px;">
         <div id="card-sub" >
            <div><h4 class="sub-text">Company : {{$data->name}}</h4></div>
            <div><h4 class="sub-text">Gender preference : {{$data->gender}}</h4></div>
            <div><h4 class="sub-text">Age Limit : {{$data->age}}</h4></div>
            <div><h4 class="sub-text">Salary : {{$data->salary}}</h4></div>   
         <div id="more-text">
            <div><h4 class="sub-text"> No of needed employees : {{$data->need}}</h4></div>
            <div><h4 >Required educational qualifications</h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">G.C.E(Advance Level)completion  :{{$data->advance_level}}</span></h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">Stream :{{$data->stream}}</span></h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">Graduation :{{$data->graduate}}</span></h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">Field :{{$data->field}}</span></h4></div> 
            <div><h4 style="padding-top:10px; padding-bottom:10px" >Required other qualifications</h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">Experience :{{$data->experience}}</span></h4></div>
            <div><h4 class="sub-text" style="padding-left:40px">{{$data->other_quali}}</h4></div>     
         </div>
         <button id="read-more" onclick="read()">Read More--></button>
         </div>
      </div>
      
      

@endforeach

</div>
<script src="{{asset('js/app.js')}}"></script> 
@stop     
</body>
              

