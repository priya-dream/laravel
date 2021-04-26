@extends('admin')
@section('content')
<div class="main-panel" style="width:880px">
    <table class="table table-bordered" style="overflow-x: scroll">
        <tr>
            <th>No</th>
            <th>Date</th>
            <th>Company Name</th>
            <th>Contact Number</th>
            <th>Job Title</th>
            <th>Details</th>
            <th>Payment</th>
            <th>Staus</th>
        </tr>
        <?php $i=1; ?>
        @foreach($result as $res)
            <tr>
                <td>{{$i}}</td>
                <td>{{$res->date}}</td>
                <td>{{$res->name}}</td>
                <td>{{$res->mobile}}</td>
                <td>{{$res->title}}</td>
                <td><a data-toggle="modal" data-id="{{ $res->id }}" data-target="#view-{{$res->id}}" class="viewBtn"><input type="submit" value="View" class="btn btn-primary"></a></td>
                <!-- Modal -->
                <div class="modal fade" id="view-{{$res->id}}" tabindex="-1" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5><u class="modal-title" id="exampleModalLabel" style="color:#3b4c9d;font-size:25px">Needed Qualifications</u></h5>
                            </div>
                            <div class="modal-body" style="margin-left:50px;color: #6e83ab;font-size:18px;font-weight: bold">
                                @foreach($quali as $qua) 
                                @if($res->quali_id==$qua->id)
                                    <div>O/L Pass  =>  {{$qua->o_level}}</div></br>
                                    <div>A/L pass  =>  {{$qua->advance_level}}
                                        <ul style="font-size:18px">Wanted Stream : {{$qua->stream}}</ul></div>
                                @if($qua->graduate!==null)
                                    <div>Graduation  =>  {{$qua->graduate}}<ul>
                                        <ul>Field/Subject : {{$qua->field}}</ul>
                                @endif
                                </ul></div>
                                @if($qua->other_quali!==null)
                                    <div>Other Qualifications/Skills  =></div>
                                        <ul class="points-format" style="font-size:16px"> {{$qua->other_quali}}</ul>
                                @endif
                                    <div>Closing Date => {{$res->closing_date}}</div>
                               @endif
                               @endforeach
                            </div>
                        </div>
                    <div>
                </div>
                <td><button type="submit" class="payment publish" style="cursor:pointer" data-name="{{$res->id}}"><img src="{{url('images/payment.jpg')}}" style="width:40px;height:40px"></button></td>
                <form action="{{ url('admin/publish',$res->id) }}" method="post" id="form">
                @csrf
                <td><button type="submit" class="publish" style="cursor:pointer" data-name="{{$res->id}}"><img src="{{url('images/check-tick.jpg')}}" style="width:40px;height:40px"></button></td>
                </form>
                <?php $i+=1; ?>
            </tr>
        @endforeach
    </table>
</div>
    <script type="text/javascript"  src="{{asset('js/app.js')}}"></script>
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script>
document.querySelector('#form').addEventListener('submit', function(e) {
      var form =  $(this).closest("form");
      event.preventDefault();
    Swal.fire({
        title: 'Publish!',
        text: "Do you want to pulish this job on your web?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, publish it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Published!',
            'Job has been published.',
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