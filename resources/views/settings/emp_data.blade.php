@extends('layouts.master.page')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.css">
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
                @foreach($apps1 as $apps)
                    @if($apps->emp_id==$app->emp_id)     
                    <button class="show-detail view-button"><img src="{{url('images/check-tick.png')}}" style="width:40px;height:40px"><i >call to interview</i></button></td><td>
                    <form action="{{url('/myaccount/application/remove',$apps->id)}}" method="post" >
                    @csrf
                    <a href="" class="show-detail delete-confirm"  data-name="{{$apps->id}}"><img src="{{url('images/wrong-tick.png')}}" style="width:40px;height:40px"><i>Remove/Reject</i></a></td></tr></table>
                    </form>
                    @endif
                @endforeach
                </td>
            </tr>
            <?php $n+=1; ?>
        @endforeach 
    </table>
    {!! $list->links() !!}
    <div class="quali">
        <div class="emp-data">
            <div class="close-data">x</div> 
            <div>date</div><input type="text">
            <button type="submit">send</button>
        </div>
    </div> 
    
    </div>
    <script type="text/javascript"  src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>

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
    @stop