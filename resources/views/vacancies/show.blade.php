@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h2>Job Details</h2></div></br>
@foreach($datas as $data)
   <div><h2 style="color:#C71585">{{$data->title}}</h2></div>
   <div class="card-main" style="background-image:url('{{asset('images/'.$data->img)}}');background-size:900px 650px;">
      <div id="common">
         <div id="card-sub" >
            <div><h6>Company : {{$data->name}}</h6></div>
            <div><h6>Gender preference : {{$data->gender}}</h6></div>
            <div><h6>Age Limit : {{$data->age}}</h6></div>
            <div><h6>Salary : {{$data->salary}}</h6></div>   
         <div id="more-text">
            <div><h6> No of needed employees : {{$data->need}}</h6></div>
            <div><h4 >Required educational qualifications</h4></div>
            <div><ul><h6>G.C.E(Advance Level)completion  :{{$data->advance_level}}</h6>
                  <ul><h6>Stream :{{$data->stream}}</h6></ul></ul></div>
            <div><ul><h6>Graduation :{{$data->graduate}}</h6>
                  <ul><h6>Field :{{$data->field}}</h6></ul></ul></div> 
            <div><h4>Required other qualifications</h4>
                  <ul><h6>Experience :{{$data->experience}}</h6></ul>
                  <ul><h6>{{$data->other_quali}}</h6></ul></div>     
         </div>
         <button id="read-more" onclick="read()">Read More--></button>
         <script type="text/javascript"  src="{{asset('js/app.js')}}"></script>
         </div>
      </div>
   </div>
@endforeach
</div>

<script>
var i=0;
	function read(){
		if(!i){
			document.getElementById("card-sub").style.height="450px";
			document.getElementById("more-text").style.display="inline";
			document.getElementById("read-more").innerHTML="Read less";
			i=1;
		}
		else{
			document.getElementById("card-sub").style.height="170px";
			document.getElementById("more-text").style.display="none";
			document.getElementById("read-more").innerHTML="Read More-->";
			i=0;
		}
	}
</script> 
@stop     

              

