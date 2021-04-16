@extends('layouts.master.page')
<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>

<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="main-panel">
    <div class="page-title">Company Details</div></br>
    @foreach($company as $com)
    <table><tr>
    <td>Name : </td>
    <td><a href="#" id="name" data-type="text" data-pk="{{$com->id}}" data-url="/company/detail/update" data-title="Enter username">{{$com->name}}</a></td></tr>
    </table>
    @endforeach
</div>
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.fn.editable.defaults.mode = 'inline';
    $(document).ready(function() {
    $('#name').editable();
    });

</script>
@stop