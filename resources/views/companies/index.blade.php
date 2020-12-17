@extends('layouts.master.page')
@section('content')
<table class="table table-bordered"  style="align:center">
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
        </tr>
        @foreach ($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->address }}</td>
            <td>{{ $company->email }}</td>
        </tr>
        @endforeach
</table>

@endsection