@extends('layouts.master.page')
@section('content')
<div class="main-panel">
    <div style="font-size:22px;color:#1547df;margin-top:20px">
        <a style="color:blue" class="navigate" onclick="history.back()">My Account</a>--><a href="">Applications</a>
    </div>
    <div style="margin-left:170px">
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
                    <th>No</th>
                    <th>Job Title</th>
                    <th>Closing Date</th>
                    <th>No Of Applications</th>
                </tr>
                <?php $i=1; ?>
                @foreach($vacancy as $vac)
                <tr class="sub-texts">
                    <td>{{$i}}</td>
                    <td>{{$vac->title}}</td>
                    <td>{{$vac->closing_date}}</td>
                    <?php $x=0; ?>
                    @foreach($data as $da)
                    @if($vac->id==$da->post_id and $da->company_id==$vac->company_id)
                    <?php $x=$x+1; ?>
                    @endif
                    @endforeach 
                    <td><a href="{{url('myaccount/applicant/data',$vac->id)}}"><div class="number-view"><?php echo $x; ?></div></a></td>   
                </tr>
                <?php $i+=1; ?>
                @endforeach
            </table>  
        @endif
    </div> </br></br>
    <!-- <div class="other">May need you these Applications<a style="margin-left:10px;" href="">Click here</a></div>
    @foreach($resume as $cv)
    <div>{{$cv->cv}}</div>
    @endforeach -->
</div>
<?php $x=4; ?>
@stop