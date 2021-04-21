
@extends('admin')
@section('content')
<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.css">

   @if ($message = Session::get('success'))  
       <div class="alert alert-success">
            <p style="width:200px;height:40px">{{ $message }}</p>
        </div>
    @endif
<div class="page-title">Job Types</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{url('/vacancy/add')}}" method="POST">
      {{ csrf_field() }}
        <div class="modal-body">   
            <div class="mb-3">
                <label  class="form-label">Type New Vacancy Type</label>
                <input type="text" placeholder="type here" name="title" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Choose Image Logo</label>
                <input type="file" placeholder="choose" name="img" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Add</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
        </div>
       </form>
    </div>
  </div>
</div>
<button style="font-size:15px;margin-top:50px;margin-left:100px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New Job Type
</button>
</br></br>
<div class="table-responsive" style="margin-top:20px">
    <table class="table table-striped tr-odd" >
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                
            @foreach($results as $result)
                <tr>
                    <th>{{ ++$i }}</th>
                    <td>{{$result->title}}</td>
                    <td><img src="{{asset('images/'.$result->img)}}"></td>
                    <td>
                        <div>
                            <form action="{{url('vacancy_type/update',$result->id)}}" method="POST" id="form">
                                {{csrf_field()}}
                                <div class="file" style="display:none"><input type="file" name="image" value="change" class="btn btn-primary" >
                                <input type="submit" value="change" class="btn button" style="background-color:green;color:#fff"></div>
                                <input class="btn btn-primary change" value="change" style="width:100px" >
                            
                                <button type="button" class="btn btn-danger">Delete</button>  
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- {!! ($results->currentpage()-1)* $results->perpage() !!} -->
{!! $results->links() !!}
</div><script type="text/javascript"  src="{{asset('js/app.js')}}"></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>

<script>
$('.change').click(function(event) {
    $('.file').css('display','inline');
    $('.change').css('display','none');
});

</script>
<script>
$('.choose-image').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
    Swal.fire({
    title: 'Select image',
    input: 'file'
  
}).then((result) => {
            if (result.isConfirmed){
                Swal.fire(
            'Changed!',
            'success'
            ).then((result) => {
                form.submit();
            
        });
            }
            });

});
</script>
@stop