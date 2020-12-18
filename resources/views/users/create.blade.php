@extends('layouts.master.page')
@section('content')
<div class="main-panel">
<div><h1 class="page-title">User Details</h1></div><br/><br/>
@if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
  @endif

  <form action="{{route('user.store')}}" method="post" class="forms-sample">
          {{csrf_field()}}
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Default Details</h4><br/>
              <div class="form-group">
                <label class=col>Name</label>
                <input type="text" class="form-control" name="name" placeholder="Company Name" required />
              </div>
              <div class="form-group">
                <label class=col>Email Address</label>
                <input type="text" class="form-control" name="email" placeholder="Email" required />
              </div>
          <div class="form-group">
            <label class=col>Username</label>
            <input type="text" class="form-control" name="username" placeholder="username" required />
          </div>
          <div class="form-group">
            <label class=col>Password</label>
            <input type="password" class="form-control" name="password" placeholder="password" required />
          </div>
          <div><button type="submit" class="btn btn-primary"> Create </button></div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </form>
</div>
</div>
@stop