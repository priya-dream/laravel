@extends('admin')
@section('content')
<div class="main-panel" style="width:880px">
    <table class="table table-striped tr-odd"  style="overflow-x: scroll">
        <tr>
            <th>No</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>CEO</th>
            <th>Contact Number</th>
            <th>Email Address</th>
            <th>Logo</th>
        </tr>
        <?php $i=1; ?>
        @foreach($results as $res)
        <tr>
            <td>{{$i}}</td>
            <td>{{$res->name}}</td>
            <td>{{$res->address}}</td>
            <td>{{$res->CEO}}</td>
            <td>{{$res->mobile}}</td>
            <td>{{$res->email}}</td>
            <td><img src="{{ asset('images/'.$res->logo)}}"></td>
        </tr>
        <?php $i+=1; ?>
        @endforeach
    </table>

</div>
@stop