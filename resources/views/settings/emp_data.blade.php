@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div class="page-title">Applicant Details</div></br>
<table class="table">
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
        @foreach($apps as $app)
            <tr>
                <td><?php echo $n; ?></td>
                <td>{{$app->date}}</td>
                <td>{{$app->fname}}</td>
                <td>{{$app->lname}}</td>
                <td>{{$app->nic}}</td>
                <td>{{$app->mobile}}</td>
                <td>{{$app->address}}</td>
                
                <td><a href="{{url('myaccount/applicant/quali',$app->emp_id)}}" class="view-button btn btn-primary">View</a></td>
                
                <td>
                <table><tr><td>
                    <a class="show-detail" href=""><img src="{{url('images/check-tick.png')}}" style="width:40px;height:40px"><i >call to interview</i></a></td><td>
                    <a class="show-detail" href="{{url('myaccount/applications/remove')}}"><img src="{{url('images/wrong-tick.png')}}" style="width:40px;height:40px"><i>Remove/Reject</i></a></td></tr></table>
                </td>
            </tr>
            <?php $n+=1; ?>
        @endforeach
        
        @foreach($apps as $app)
        @foreach($quali as $qua)
        @if($app->emp_id==$qua->emp_id)
        {{$qua->field}}
        @endif
        @endforeach
        @endforeach
         
    </table>
    @foreach($emps as $emp)
    @foreach($apps as $app)
        @foreach($quali as $qua)
        @if($app->emp_id==$qua->emp_id)
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
    @endif
    @endforeach
    @endforeach
    @endforeach
    </div>
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