@extends('layouts.master.page')
<!-- <head>
<link href="{{ asset('/dist/css/sweetalert.css') }}" rel="stylesheet">
</head> -->
@section('content')
<div class="main-panel">
    <div class="page-title">Posts</div></br>
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
    <table class=" table view-post">
        <tr class="sub-texts">
            <th>Published Date</th>
            <th>Job Type</th>
            <th>Closing Date</th>
            <th>Actions</th>
        </tr>
        @foreach($results as $result)
        <tr class="view-post">
            <td>{{$result->date}}</td>
            <td>{{$result->title}}
            <td>{{$result->closing_date}}</td>
            <td>
                <a class="btn btn-primary" href="{{url('/post/edit',$result->id)}}">Edit</a>
                <a onclick="return confirm('Are you sure want to delete this post?')" href="{{url('/post/delete',$result->id)}}" class="btn btn-danger">Remove</a>
            </td>   
        </tr>
        @endforeach
    </table>
    @endif
</div>

@stop
<!-- <script src="{{ asset('/dist/js/sweetalert.min.js') }}"></script> -->

