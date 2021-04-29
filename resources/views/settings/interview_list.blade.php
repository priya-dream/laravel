@extends('layouts.master.page')
<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

@section('content')
<div class="main-panel" style="overflow-x: auto">
    @if ($message = Session::get('error'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
    @endif
    <div style="font-size:22px;color:#1547df;margin-top:20px">
        <a style="color:blue" class="navigate" onclick="history.back()">My Account</a>--><a class="navigate"href="">Interview List</a>
    </div>
<div class="page-title">Applicant details to interview</div></br>
<table class="table">
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Post</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>NIC Number</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Qualification</th>
            <th>Actions</th>
        </tr>
        <?php $n=1; ?>
        @foreach($results as $res)
            <tr>
                <td><?php echo $n; ?></td>
                <td>{{$res->date}}</td>
                <td>{{$vac->title}}</td>
                <td>{{$res->fname}}</td>
                <td>{{$res->lname}}</td>
                <td>{{$res->nic}}</td>
                <td>{{$res->mobile}}</td>
                <td>{{$res->address}}</td>
                <td><button class=" btn btn-primary" data-id="{{$res->job_seeker_id}}" data-toggle="modal" data-target="#exampleModal-{{$res->job_seeker_id}}">View</button></td>
                    <div class="modal fade" id="exampleModal-{{$res->job_seeker_id}}" tabindex="-1" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5><u class="modal-title" id="exampleModalLabel" style="color:#3b4c9d;font-size:25px">Qualifications</u></h5>
                                </div>
                                <div class="modal-body" style="margin-left:50px;color: #6e83ab;font-size:18px;font-weight: bold">
                                @foreach($quali as $qua) 
                                @if($res->job_seeker_id==$qua->job_seeker_id)
                                    <div>O/L Result  =>  {{$qua->o_level}}</div></br>
                                    <div>A/L Result  =>  {{$qua->advance_level}}
                                        <ul style="font-size:18px">Stream : {{$qua->stream}}</ul></div>
                                    <div>Graduation  =>  {{$qua->graduate}}<ul>
                                        <li>Field/Subject : {{$qua->field}}</li>
                                    @if($qua->uni!==null)
                                        <li>University : {{$qua->uni}}</span></li>
                                    @endif
                                    </ul></div>
                                    @if($qua->other_quali!==null)
                                    <div>Other Qualifications/Skills  => 
                                    <ul style="font-size:16px"> {{$qua->other_quali}}</ul></div>
                                    @endif
                                @endif
                                @endforeach
                                </div>
                            </div>
                        <div>
                    </div>
                 
                <td>
                
                    <?php $n+=1; ?>
                @endforeach 
        </table>
    
    

</div>
@stop