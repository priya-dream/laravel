@extends('layouts.master.page')
@section('content')
<div class="jumbotron jumbotron-fluid">
@foreach ($posts as $post)
  <div class="container">
    {{$post->title}}
  </div>
  <div class="container">
    {{$post->gender}}
  </div>
  <div class="container">
    {{$post->need}}
  </div>
@endforeach
</div>
        <!-- @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->age_limit }}</td>
            <td>{{ $post->need }}</td>
        </tr>
        @endforeach -->
        
@endsection