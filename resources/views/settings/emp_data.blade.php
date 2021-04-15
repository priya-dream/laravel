@extends('layouts.master.page')
@section('content')
<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
               
                    <div class="modal fade" id="exampleModal-{{$app->emp_id}}" tabindex="-1" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel" style="color:#3b4c9d;font-size:25px">Qualifications</h5>
                                </div>
                                <div class="modal-body" style="color: #6e83ab;font-size:18px;font-weight: bold">
                                @foreach($quali as $qua) 
                                @if($app->emp_id==$qua->emp_id)
                                <div>A/L  =>  {{$qua->advance_level}}
                                    <ul style="font-size:18px">Stream : {{$qua->stream}}</ul></div>
                                <div>Graduation  =>  {{$qua->graduate}}<ul>
                                @if($qua->field!==null)
                                    <li>Field/Subject : {{$qua->field}}</li>
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
                   
                <td><button class=" btn btn-primary" data-id="{{ $app->emp_id }}" data-toggle="modal" data-target="#exampleModal-{{$app->emp_id}}">View</button></td>
                
                    
                <td>
                <table><tr><td>
                    <a class="show-detail" href=""><img src="{{url('images/check-tick.png')}}" style="width:40px;height:40px"><i >call to interview</i></a></td><td>
                    <a class="show-detail" onclick="return confirm('Are you sure want to remove this application?')" href="{{url('myaccount/applications/remove',$app->emp_id)}}"><img src="{{url('images/wrong-tick.png')}}" style="width:40px;height:40px"><i>Remove/Reject</i></a></td></tr></table>
                </td>
            </tr>
            <?php $n+=1; ?>
        @endforeach 
    </table>


    
    </div>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>
   function ShowModal(id)
{
  var modal = document.getElementById(id);
  modal.style.display = "block";
}
}
</script>
    @stop