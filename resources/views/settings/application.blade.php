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
            <th>Closing Date</th>
            <th>No Of Applications</th>
        </tr>
        @foreach($vacancy as $vac)
        <tr class="sub-texts">
            <td>{{$vac->title}}</td>
            <td>{{$vac->closing_date}}</td>
            <?php $x=0; ?>
            @foreach($data as $da)
            @if($vac->id==$da->post_id)
            <?php $x=$x+1; ?>
            @endif
            @endforeach 
            <td><a href="{{url('myaccount/applicant/data',$vac->id)}}" class="number-view"><?php echo $x; ?></button><td>   
        </tr>
        @endforeach
        
        
    
    </table>
    
@endif  
</div>
<?php $x=4; ?>
   
    
    

@stop