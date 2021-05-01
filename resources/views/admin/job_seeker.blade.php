@extends('admin')
@section('content')
<div class="main-panel">
    <table class="table">
        <tr>
            <th>No</th>
            <th>First name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>NIC</th>
            <th>Mobile</th>
            <th>Email</th>
        </tr>
        <?php $i=1; ?>
        @foreach($datas as $data)
        <tr>
            <td>{{$i}}</td>
            <td>{{$data->fname}}</td>
            <td>{{$data->lname}}</td>
            <td>{{$data->address}}</td>
            <td>{{$data->nic}}</td>
            <td>{{$data->mobile}}</td>
            <td>{{$data->email}}</td>
        </tr>
        <?php $i+=1; ?>
        @endforeach

    </table>
</div></br>
{!! $datas->links() !!}
@stop