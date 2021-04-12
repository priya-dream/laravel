@extends('layouts.master.page')
@section('content')
<div class="main-panel">
    <div class="page-title">Applications</div></br>
    @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif
    <?php $i=0; ?>
    @foreach($results as $result)
        <?php $i=$i+1; ?> 
    @endforeach
    @if($i==0)
        <div class="nothing">
            <p class="info">You don't receive any applications yet.</p>
        </div>
    @else
    <table class=" table">
        <tr class="sub-texts">
            <th>Job Title</th>
            <th>No Of Applications</th>
        </tr>
        @foreach($vacancy as $vac)
        <tr class="sub-texts">
            <td>{{$vac->title}}</td>
            <?php $x=0; ?>
            @foreach($data as $da)
            @if($vac->id==$da->post_id)
            <?php $x=$x+1; ?>
            @endif
            @endforeach 
            <td><button onclick='view(" {{$vac->id}} ")' class="number-view"><?php echo $x; ?></button><td>   
        </tr>
        @endforeach
        
        <table class="table" id="more-detail">
        <tr>
            <th>No</th>
            <th>Applied Date</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>NIC Number</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Qualification</th>
            <th>Actions</th>
        </tr>
        <?php $n=1; ?>

        
        @foreach($test as $app)
            <tr>
                <td><?php echo $n; ?></td>
                <td>{{$app->date}}</td>
                <td>{{$app->fname}}</td>
                <td>{{$app->lname}}</td>
                <td>{{$app->nic}}</td>
                <td>{{$app->mobile}}</td>
                <td>{{$app->address}}</td>
                <td><button class="view-button btn btn-primary">View</button></td>
                <td>
                <table><tr><td>
                    <a class="show-detail" href=""><img src="{{url('images/check-tick.png')}}" style="width:40px;height:40px"><i >call to interview</i></a></td><td>
                    <a class="show-detail" href="{{url('myaccount/applications/remove',$result->id)}}"><img src="{{url('images/wrong-tick.png')}}" style="width:40px;height:40px"><i>Remove/Reject</i></a></td></tr></table>
                </td>
            </tr>
            <?php $n+=1; ?>
        @endforeach
    </table>
    
    </table>
    
@endif  
</div>
<?php $x=4; ?>
   
    @foreach($quali as $qua)
    <div class="quali">
        <div class="emp-data">
            <div class="close-data">x</div>
            <div>A/L  ->  {{$qua->advance_level}}
                <ul>Stream : {{$qua->stream}}</ul></div>
            <div>Graduation  ->  {{$qua->graduate}}
                <ul>Field/Subject : {{$qua->field}}</ul>
                <ul>University : {{$qua->uni}}</ul></div>
            <div>Other Qualifications/Skills  ->  {{$qua->other_quali}}</div>
        </div>
    </div> 
    @endforeach
    
<script>
    var Btn=document.querySelector('.view-button');
    var Quali=document.querySelector('.quali');
    var Close=document.querySelector('.close-data');
    if(Btn){
    Btn.addEventListener('click',function(){               
        Quali.classList.add('active');
    });}
    if(Btn){
    Close.addEventListener('click',function(){
        Quali.classList.remove('active');
	});}
</script>
@stop