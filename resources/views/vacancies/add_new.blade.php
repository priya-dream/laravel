@extends('layouts.master.page')
@section('content')
<link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
       </form>
    </div>
  </div>
</div>
<div class="container">
<h1>Job Types</h1>
</br></br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Add New Job Type
</button>
</br></br>
<table class="table table-striped tr-odd">
<thead>
<tr style="color:#00008B">
    <th>No</th>
    <th>Title</th>
    <th>Image</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
    @foreach($results as $result)
    <tr>
        <th>{{$i}}</th>
        <td>{{$result->title}}</td>
        <td>{{$result->img}}</td>
        <td>
        <div>
            <form action="" method="POST">
                <a class="btn btn-primary"  href="">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>  
            </form>
        </div>
        </td>
    </tr>
<?php $i++; ?>
    @endforeach
</tbody>
</table>
{!! $pages->links() !!}
</div>


<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



@stop