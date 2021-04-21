@extends('layouts.master.page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.css">
@section('content')
<div class="main-panel">
    <div style="font-size:22px;color:#1547df;margin-top:20px">
        <a href="{{ url('account')}}">My Account</a>--><a href="">Posts</a>
    </div>
    <div style="margin-left:170px">
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
            <p class="info">You don't publish any jobs yet.</p>
            <i class="arrows-alt-v"></i>
            <a href="{{url('company/login')}}" class="btn btn-primary" style="margin:0px 100px 0px 250px;">Publish Jobs</a>
        </div>
    
    @else
    <div class="page-title">Posts</div></br>
    <table class=" table view-post">
        <tr class="sub-texts">
            <th>No</th>
            <th>Published Date</th>
            <th>Job Type</th>
            <th>Closing Date</th>
            <th>Actions</th>
        </tr>
        <?php $i=1; ?>
        @foreach($results as $result)
        <tr class="view-post">
            <td>{{$i}}</td>
            <td>{{$result->date}}</td>
            <td>{{$result->title}}
            <td>{{$result->closing_date}}</td>
            <td>
                <form action="{{url('/post/delete',$result->id)}}" method="post"> 
                        @csrf  
                    <a class="btn btn-primary" href="{{url('/post/edit',$result->id)}}">Edit</a>
                    <a href="" data-name="{{$result->id}}" class="btn btn-danger delete-confirm">Remove</a>
                </form>
            </td>   
        </tr>
        <?php $i+=1; ?>
        @endforeach
    </table></br></br>
    <button class="old-post-btn" onclick="old_post()">Older posts</button></br></br>
        <div id="old-post">
            <table class=" table view-post">
                <tr class="sub-texts">
                    <th>No</th>
                    <th>Published Date</th>
                    <th>Job Type</th>
                    <th>Closing Date</th>
                    <th></th>
                </tr>
                <?php $i=1; ?>
                @foreach($results1 as $result1)
                <tr class="view-post">
                    <td>{{$i}}</td>
                    <td>{{$result1->date}}</td>
                    <td>{{$result1->title}}
                    <td>{{$result1->closing_date}}</td>
                    <td>
                        <form action="" method="post"> 
                                @csrf  
                            <button class="btn btn-primary view">View</button>
                        </form>
                    </td>   
                </tr>
                <?php $i+=1; ?>
                @endforeach
            </table>
        </div>
            @endif
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>
<script>
function old_post(){
			document.getElementById("old-post").style.display="inline";	
	}
</script>
<script>
   $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to delete this post?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: 'rgb(214 63 48)',
        cancelButtonColor: 'rgb(51 127 221)',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your post has been removed.',
            'success'
            ).then((result) => {
                form.submit();
            
        });
        }
    });   
});
</script>
@stop
<!-- <script src="{{ asset('/dist/js/sweetalert.min.js') }}"></script> -->

