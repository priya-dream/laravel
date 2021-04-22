@extends('layouts.master.page')
<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.css">
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
                                    <h5><u class="modal-title" id="exampleModalLabel" style="color:#3b4c9d;font-size:25px">Qualifications</u></h5>
                                </div>
                                <div class="modal-body" style="margin-left:50px;color: #6e83ab;font-size:18px;font-weight: bold">
                                @foreach($quali as $qua) 
                                @if($app->emp_id==$qua->emp_id)
                                <div>O/L Result  =>  {{$qua->o_level}}</div></br>
                                <div>A/L Result  =>  {{$qua->advance_level}}
                                    <ul style="font-size:18px">Stream : {{$qua->stream}}</ul></div>
                                <div>Graduation  =>  {{$qua->graduate}}<ul>
                                    <li>Field/Subject : {{$qua->field}}</li>
                                @if($qua->uni!==null)
                                    <li>University : {{$qua->uni}}</span></li>
                                @endif
                                </ul></div>
                                @if($qua->other_quali!=='')
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
                @foreach($apps1 as $apps)
                    @if($apps->emp_id==$app->emp_id)  
                    {{$apps->id}}    
                    <button  data-bs-toggle="modal" data-bs-target="#exampleModal" class="show-detail modifyButton"><img src="{{url('images/check-tick.png')}}" style="width:40px;height:40px"><i >call to interview</i></button></td><td>

                    <form action="{{url('/myaccount/application/remove',$apps->id)}}" method="post" >
                    {{$apps->id}}
                        @csrf
                        <button class="show-detail delete-confirm"  data-name="{{$apps->id}}"><img src="{{url('images/wrong-tick.png')}}" style="width:40px;height:40px"><i>Remove/Reject</i></button></td></tr></table>
                    </form>
                    <div class="modal fade" id="exampleModal-{{$apps->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="model-content"> 
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Call to interview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                 
                                <form action="{{url('/add/interview-list',$apps->id)}}" method="post" id="form">
                                    @csrf
                                    <div class="modal-body">
                                    <label>Date</label>
                                    <input data-name="{{$apps->id}}" type="date" name="date" class="form-control" style="color:#00008B" required/></br>
                                    
                                    <div class="modal-footer"
                                    <input data-name="{{$apps->id}}" type="submit" value="Add" class="btn1 btn-success add" style="margin-left:100px">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div> 
                    @endif
                @endforeach
                </td>
            </tr>
            <?php $n+=1; ?>
           

   
        @endforeach 
    </table>
    
    {!! $list->links() !!}
     </div>
    <script type="text/javascript"  src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script>
    var Quali=document.querySelector('.quali');
    var Add=document.querySelector('.add');
    var Close=document.querySelector('.close-data');
    $(".modifyButton").click(function() {
        // alert($(this).data("fpid"));               
        Quali.classList.add('active');
            $(".add").click(function() {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            Swal.fire({
                title:'Done',
                text: 'Application is added to Interview list',
                icon: 'success'
            }).then((result) => {
            if (result.isConfirmed){
                form.submit();
            }
            });
            });
    Close.addEventListener('click',function(){
        Quali.classList.remove('active');
	});
	
        
	});
    
</script>
<script>
   $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to remove this application?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'rgb(214 63 48)',
        cancelButtonColor: 'rgb(51 127 221)',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Application has been removed.',
            'success'
            ).then((result) => {
            if (result.isConfirmed){
                form.submit();
            }
        });
        }
    });   
});
</script>
<script>
$(".save").click(function() {
  var form = this;
  e.preventDefault();
    Swal.fire({
                title:'Done',
                text: 'Application is added to Interview list',
                icon: 'success'
            }).then((result) => {
            if (result.isConfirmed){
                form.submit();
            }
            });
});     
</script>
    @stop