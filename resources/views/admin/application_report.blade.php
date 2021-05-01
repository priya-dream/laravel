@extends('admin')
@section('content')
<div class="main-panel">
<h3 style="color:blue">Last month report</h3>
<h3 style="color:#000008">Appliations By Job type</h3></br>
    <table class="table" style="width:800px">
        <tr>
            <th>Job Title</th>
            <th>No of Applications</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->title}}</td>
            <td>{{$post->number}}</td>
        </tr>
        @endforeach
    </table>
    </br>
    <h3 style="color:#000008">Posts By Job type</h3></br>
    <table class="table" style="width:800px">
        <tr>
            <th>Job Title</th>
            <th>No of Posts</th>
        </tr>
        @foreach($datas as $data)
        <tr>
            <td>{{$data->title}}</td>
            <td>{{$data->number}}</td>
        </tr>
        @endforeach
    </table>

</div>

@stop