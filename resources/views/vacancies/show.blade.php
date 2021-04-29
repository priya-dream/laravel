@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h2>Job Details</h2></div></br>
@foreach($datas as $data)
   <div><h2 style="color:#C71585">{{$data->title}}</h2></div>
   <div class="card-main" style="background-image:url('{{asset('images/'.$data->img)}}');background-size:900px 650px;">
      <div id="common">
         <div id="card-sub" >
            <div ><span style="color:#5c4be9">Company  : </span>{{$data->name}}</div>
            <div ><span style="color:#5c4be9">Location  : </span>{{$data->branch}}</div>
            <div><span style="color:#5c4be9">Gender preference  : </span>{{$data->gender}}</div>
            <div><span style="color:#5c4be9">Age Limit  : </span>{{$data->age}}</div>
            <div><span style="color:#5c4be9">Salary  : </span>{{$data->salary}}</div>
            <div id="more-text">
            <div><span style="color:#5c4be9">No of needed employees  : </span>{{$data->need}}</div>
            <div><span style="color:#5c4be9">Job Type  : </span>{{$data->type}}</div></br>
               <div style="color:#5c4be9">Required educational qualifications  =></div>
               <div style="margin-left:10px;margin-top:10px">
                  @if($data->o_level!=='' and $data->o_level=='Need' )
                     <div>Should Passed in G.C.E(O/L)</div>
                  @endif
                  @if($data->o_level!=='' and $data->advance_level=='Need' )
                     <div>Should Passed in G.C.E(A/L) in {{$data->stream}} stream</div>
                  @endif
                  @if($data->graduate!==''and $data->field!=='' )
                     <div>{{$data->graduate}} in {{$data->field}} field</div> 
                  @endif
                  @if($data->experience!=='')
                     <div>Experience -  {{$data->experience}}</div></br>
                  @endif
               </div>
                  @if($data->other_quali!=="null")
                     <div style="color:#5c4be9">Required other qualifications  =></div>
                     <div style="margin-left:10px;margin-top:10px">
                        <div class="points-format">{{$data->other_quali}}</div>
                     </div></br>
                  @endif
            </div></br>
            <button id="read-more" onclick="read()">Read More--></button>
            <script type="text/javascript"  src="{{asset('js/app.js')}}"></script>
         </div>
      </div>
   </div>
@endforeach

</div>
<script>
window.onload = function (){ 
    var header  =document.querySelector(".points-format");
    var headerText = header.innerText;
    var a = headerText .split(".");
    a.pop();
    var toAppend = "";
    a.forEach(function (t, i){
        toAppend += t + ".<br>";   
    });
    header .innerHTML = toAppend ;
}
</script>
<script>
var i=0;
	function read(){
		if(!i){
			document.getElementById("card-sub").style.height="550px";
			document.getElementById("more-text").style.display="inline";
			document.getElementById("read-more").innerHTML="Read less";
			i=1;
		}
		else{
			document.getElementById("card-sub").style.height="200px";
			document.getElementById("more-text").style.display="none";
			document.getElementById("read-more").innerHTML="Read More-->";
			i=0;
		}
	}
</script> 
@stop     

              

