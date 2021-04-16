@extends('layouts.master.page')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content')
<div class="main-panel">
    <div class="page-title">Login Details</div></br>
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
            <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
        @endif
    <div class="card" style="margin-left:150px;padding:0px 0px 30px 60px">
        <img src="{{ url('images/log.png')}}" class="log-image">
        <form action="{{url('/user/change',$id)}}" method="post">
            {{csrf_field()}}
            <label class="col">Username</label>
            <input value="{{old('username', $result->username)}}" name="username" type="text" class="form-control input1" required/></br></br>
            <a class="btn btn-secondary" onclick="btn()">Change Password</a></br></br>
                <div id="more-data">
                    <input type="password" name="password" class="form-control input1" placeholder="Current password" required/></br>
                    <input type="password" name="new_pw" id="new_pw" class="form-control input1" placeholder="New password" required/></br>
                    <input type="password" name="confirm_pw" id="confirm_pw" class="form-control input1" placeholder="Confirm new password"/>
                    <span id='message'></span></br>
                    <div><button onclick="change()" type="submit" class="btn btn-primary" style="margin-left:130px"><span id="loading_icon"><i class="fa fa-spinner fa-spin"></i></span>Change</button>
                    <span><a href="{{ url('/myaccount')}}" class="btn" style="background-color:red;color:#fff">Logout</a></span></div>
                </div>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $('#confirm_pw').on('keyup', function () {
    if ($('#new_pw').val() == $('#confirm_pw').val()) {
        $('#message').html('Matched.').css('color', 'green');
    } else 
        $('#message').html('Not Matching').css('color', 'red');
    });
</script>
@stop