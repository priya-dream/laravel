@extends('layouts.master.page')
@section('content')
<div class="main-panel">
  <div><h1 class="page-title">Company Details</h1>
  </div><br/><br/>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
      <p>{{ $message }}</p>
    </div>
@endif
  <form action="{{route('company.store')}}" method="post" class="forms-sample" id="form">
          {{csrf_field()}}
  <div class="row" style="margin-left:50px">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Default Details</h4><br/>
              <div class="form-group">
                <label class="col">Company Name</label>
                  <input type="text" class="form-control" name="name" placeholder="Company Name" required />
              </div>
              <div class="form-group">
                <label class="col">Address</label>
                <input type="text" class="form-control" name="address" placeholder="Address" required />
              </div>
              <div class="form-group">
                <label class="col">CEO Name</label>
                <input type="text" class="form-control" name="ceo" placeholder="CEO" required />
              </div>
              <div class="form-group">
                <label class="col">Contact Number</label>
                <input type="text" class="form-control" maxlength="10" name="mobile" placeholder="Mobile" required />
              </div>
              <div class="form-group">
                <label class=col>Email Address</label>
                <input type="text" class="form-control" name="email" placeholder="Email" required />
              </div>
              <div class="form-group">
                <label class=col>Upload the company logo</label></br>
                <input style="font-size:20px"type="file"class="form-control" name="logo" required />
              </div>
        </div>
      </div>
    
    <div class="col-md-9 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Login Details</h4></br>
          <div class="form-group">
            <label class=col>Username</label>
            <input type="text" class="form-control" name="username" placeholder="username" required />
          </div>
          <div class="form-group">
            <label class=col>Password</label>
            <input type="password" class="form-control" name="password" placeholder="password" required />
          </div>
          <!-- <div class="form-group">
            <label class=col>Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="confirm password" required />
          </div> -->
          <div><button type="submit" class="btn btn-primary"> Create </button></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.js"></script>
<script>
document.querySelector('#form').addEventListener('submit', function(e) {
  var form = this;
  e.preventDefault();
    Swal.fire({
                title:'Good Job',
                text: 'Account created successfully. Now you can login',
                icon: 'success'
            }).then((result) => {
            if (result.isConfirmed){
                form.submit();
            }
            });
});         
</script>
@stop