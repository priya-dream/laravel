@extends('layouts.master.page')
<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('content')
<div class="main-panel">
    <div style="font-size:22px;color:#1547df;margin-top:20px">
        <a style="color:blue" class="navigate" onclick="history.back()">My Account</a>--><a href="">Company Details</a>
    </div>
    <div class="page-title1">Company Details</div></br>
    <table class="hi" style="margin-left:140px"><tr>
    @foreach($company as $com)
    <td>Company Name : </td>
    <td><a href="#" id="name" data-type="text" data-pk="{{$com->id}}" data-url="/company/detail/update">{{$com->name}}</a></td></tr><tr>
    <td>Address : </td>
    <td><a href="#" id="address" data-type="text" data-pk="{{$com->id}}" data-url="/company/detail/update">{{$com->address}}</a></td></tr><tr>
    <td>CEO Of The Company : </td>
    <td><a href="#" id="CEO" data-type="text" data-pk="{{$com->id}}" data-url="/company/detail/update">{{$com->CEO}}</a></td></tr><tr>
    <td>Contact Number : </td>
    <td><a href="#" id="mobile" data-type="text" data-pk="{{$com->id}}" data-url="/company/detail/update">{{$com->mobile}}</a></td></tr><tr>
    <td>Email Address : </td>
    <td><a href="#" id="email" data-type="text" data-pk="{{$com->id}}" data-url="/company/detail/update">{{$com->email}}</a></td></tr><tr>
    <td>Company Logo : </td>
    <td><a href="#" id="logo" data-type="text" data-pk="{{$com->id}}" data-url="/company/detail/update"><img src="{{asset('images/'.$com->logo)}}"></a>
      <td style="margin-right:500px">  <form action="{{url('company/logo/update',$com->id)}}" method="POST">
                {{csrf_field()}}
            <div class="file" style="display:none"><input type="file" name="logo" class="btn btn-primary" style="width:250px" required/ >
                <input type="submit" value="change" class="btn button" style="background-color:green;color:#fff" ></div>
            </div>
            <input class="btn btn-primary change" value="change" style="width:100px" >
        </form></td>
    </td></tr>
    @endforeach
    </table>
    
</div>
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script> 
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<script>
$('.change').click(function() {
    $('.file').css('display','block');
    $('.change').css('display','none');
});
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	$.fn.editable.defaults.mode = 'inline';
    $(document).ready(function() {
    $('#name').editable();
    $('#address').editable();
    $('#CEO').editable();
    $('#mobile').editable();
    $('#email').editable();
    });

</script>
@stop