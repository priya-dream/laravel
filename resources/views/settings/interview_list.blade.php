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
        <a style="color:blue" class="navigate" onclick="history.back()">My Account</a>--><a href="">Interview List</a>
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
        @foreach($resu as $res)
            <tr>
                <td><?php echo $n; ?></td>
                <td>{{$res->date}}</td>
                @foreach($vac as $va)
                @if($res->post_id==$va->id)
                <td>{{$va->title}}</td>
                @endif
                @endforeach
                @foreach($emps as $emp) 
                @if($res->job_seeker_id==$emp->id)
                <td>{{$emp->fname}}</td>
                <td>{{$emp->lname}}</td>
                <td>{{$emp->nic}}</td>
                <td>{{$emp->mobile}}</td>
                <td>{{$emp->address}}</td>
                @endif
                @endforeach
                <td><button class=" btn btn-primary" data-id="{{$res->job_seeker_id}}" data-toggle="modal" data-target="#exampleModal-{{$res->job_seeker_id}}">View</button></td>
                <td><a class="recover" href="{{url('/shortlist/restore',$res->id)}}"><img src="{{asset('images/recover-icon.png')}}"style="width:40px;height:40px;"></a></td>
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
                
                
                    <?php $n+=1; ?>
                @endforeach 
        </table>
    
    

</div>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script>
$(".recover").click(function() {
    Swal.fire({
                title:'Done',
                text: 'Application is restored from Shortlist',
                icon: 'success'
            });
});     
</script>
@stop