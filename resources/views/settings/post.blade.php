@extends('layouts.master.page')
<!-- <head>
<link href="{{ asset('/dist/css/sweetalert.css') }}" rel="stylesheet">
</head> -->
@section('content')
<div class="main-panel">
<div class="page-title">Posts</div></br>
    <table class=" table view-post">
        <tr class="sub-texts">
            <th>Date</th>
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
                <a class="btn btn-primary" href="">View</a>
                <a onclick="return confirm('Are you sure want to delete this post?')" href="{{url('/post/delete',$result->id)}}" class="btn btn-danger">Remove</a>
                
        </tr>
        @endforeach
    </table>
</div>
</div>

@stop
<!-- <script src="{{ asset('/dist/js/sweetalert.min.js') }}"></script> -->

