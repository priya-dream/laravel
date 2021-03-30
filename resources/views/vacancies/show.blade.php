@extends('layouts.master.page')
<body>
@section('content')
<div class="main-panel">
<div><h2>Job Details</h2></div></br>
<?php 
$i=2;
?>


@foreach($lists as $list)
@if($posts->id==$list->vacancy_id)
<div><h2 style="color:#C71585">{{$posts->title}}</h2></div>
<div class="card-main" style="background-image:url('/images/IT.png')">
<div class="card-sub">
      <div><h4 class="sub-text">Company : {{$list->name}}</h4></div>
      <div><h4 class="sub-text">Gender preference : {{$list->gender}}</h4></div>   
      <div><h4 class="sub-text">Age Limit : {{$list->age}}</h4></div>
      <div><h4 class="sub-text">Salary : {{$list->salary}}</h4></div>
      <!-- <a class="read-more" href="javascript:void();">Read More</a> -->

       <!-- <div class ="more-text"> -->
            <div><h4 class="sub-text"> Designation : {{$posts->title}}</h4></div>
            <div><h4 class="sub-text"> No of needed employees : {{$list->need}}</h4></div> 
            <div><h4 class="sub-text">Closing Date : {{$list->closing_date}}</h4></div>
            <div><h4 >Required educational qualifications</h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">G.C.E(Advance Level)completion  :{{$list->advance_level}}</span></h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">Stream :{{$list->stream}}</span></h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">Graduation :{{$list->graduate}}</span></h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">Field :{{$list->field}}</span></h4></div> 
            <div><h4 style="padding-top:10px; padding-bottom:10px" >Required other qualifications</h4></div>
            <div><h4 style="padding-left:40px"><span class="sub-text">Experience :{{$list->experience}}</span></h4></div>
            <div><h4 class="sub-text" style="padding-left:40px">Should have clear knowledge in PHP,MYSQL.</h4></div>
            <div><h4 class="sub-text" style="padding-left:40px">Should have team work.</h4></div>
            <div><h4 class="sub-text" style="padding-left:40px">Should be as self motivator.</h4></div>
            
</div>

</div>
@endif
@endforeach
</div>
      <!-- <script>
            const readMore=document.querySelector('.read-more');
            const topText = document.querySelector('.card-sub');
            readMore.addEventListener('click',function(){
                  topText.classList.toggle('show-more');
                  if(readMore.innerText==='Read More'){
                        readMore.innerText='Read less';}
                  else{
                        readMore.innerText='Read More';}
            })
      </script> -->
@stop     
</body>
              

