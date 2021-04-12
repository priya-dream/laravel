@extends('layouts.master.page')
@section('content')
<link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<div class="main-panel">
    <div class="page-title">Company Details</div></br>
    @foreach($company as $com)
    <table class='table'><tr>
        <th>Name</th>
        <td><a href="#" class="xedit" data-pk="{{$com->id}}" data-name="name">{{$com->name}}</a></td></tr><tr>
        <th>Address</th>
        <td>{{$com->address}}</td>
        <td><a href="" class="btn button">Change</a></td></tr><tr>
        <th>CEO of the company</th>
        <td>{{$com->CEO}}</td>
        <td><a href="" class="btn button">Change</a></td></tr><tr>
        <th>Contact Number</th>
        <td>{{$com->mobile}}</td>
        <td><a href="" class="btn button">Change</a></td></tr><tr>
        <th>Email Address</th>
        <td>{{$com->email}}</td>
        <td><a href="" class="btn button">Change</a></td></tr><tr>
        <th>Company Logo</th>
        <td><img src="{{asset('images/'.$com->logo)}}" width="150px" height="150px"></td>
        <td><a href="" class="btn button">Change</a></td></tr>
    </table>
    @endforeach
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
		$(document).ready(function () {
	            $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': '{{csrf_token()}}'
	                }
	            });

	            $('.xedit').editable({
	                url: '{{url("company/detail/update")}}',
	                title: 'Update',
	                success: function (response, newValue) {
	                    console.log('Updated', response)
	                }
	            });

	    })
</script>
@stop