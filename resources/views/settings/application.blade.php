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
    <table class=" table view-post">
        <tr class="sub-texts">
            <th>Applied Date</th>
            <th>No Of Applications</th>
            <!-- <th>Closing Date</th>
            <th>Actions</th> -->
        </tr>
        @foreach($results as $result)
        <tr class="view-post">
            <td class="td-text">{{$result->date}}</td>
            <td><a href="" class=""><button class="number-view">{{$num}}</button></a><td>
        @endforeach
                <table id="more-text"><tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>NIC Number</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>A/L</th></th>
                    <th>Actions</th></tr>
                    @foreach($results as $result)
                    <tr>
                        <td>{{$result->fname}}</td>
                        <td>{{$result->lname}}</td>
                        <td>{{$result->nic}}</td>
                        <td>{{$result->mobile}}</td>
                        <td>{{$result->address}}</td>
                        <td>{{$result->advance_level}}</td>
                        <td>
                            <a class="btn button">Suggest</a>
                            <a class="btn btn-danger">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                        

        </tr>
    </table>
    @endif

    
</div>
@stop