<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>DFC-JOB BANK</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" /> 
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}" />
   </head>
  <body> 

  <div class="header">
    <span><img class="logo-image" src="{{asset('/images/dfc-logo.png')}}"> JOBS</span>
    <span style="margin-left:100px">
      <select class="btn btn-secondary">
          <option><a href="#">English</a></option>
          <option><a class="btn btn-success" href='/post'>Tamil</a></option>
          <option><a href="#">Sinhala</a></option>
      </select>
    </span>
    <a style="margin-left:150px;font-size:20px;" href="{{ url('/company/login') }}" class="btn btn-success">POST JOB</a>
    <span class=" login mdi mdi-account"><a class="login-btn" href="{{url('/myaccount')}}">Login</button></a>
    <span style="margin-left:100px" class="mdi mdi-account-star"><button style="background-color:white;font-size:25px" class="modal-btn">Admin</button></span>
  </div>

      <div class="container-scroller">
    <!-- @include('layouts.master.sidebar') -->
        
        <!-- <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
          </div>
        </nav> -->
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              @yield('content')
            </div>
          </div>   
      </div>
    <div class="modal-bg">
      <div class="modal-admin">
          <form action="{{url('/admin/verify')}}" method="POST">
          {{csrf_field()}}
            <div class="close-admin">+</div>
            <img src="{{asset('images/admin-login.png')}}" width="100px" height="100px" style="margin-top:10px"></br></br>
              <lable style="color:#6f2674">username</label></br>
              <input class="form-control input1 admin-login" type="text" placeholder="username" name=username required/>
              <lable style="color:#6f2674">password</label></br>
              <input class="form-control input1 admin-login" type="text" placeholder="password" name="password" required/></br>
              <button type="submit" class="btn btn-primary">login</button>
              
           
          </form>
      </div>
    </div>
    <!-- <div class="my-login">
      <div class="modal-admin">
        <form action="" method="POST">
          <h5>username : <input class="input" type="text" placeholder="username" name=username></h5>
          <h5>password : <input class="input" type="text" placeholder="password" name="password"></h5>
          <h5><button type="submit" class="btn btn-primary">login</button></h5>
        </form>
      </div>
    </div> -->
    <script>
      var modalBtn=document.querySelector('.modal-btn');
	    var modalBg=document.querySelector('.modal-bg');
      var modalClose=document.querySelector('.close-admin');
        modalBtn.addEventListener('click',function(){               
          modalBg.classList.add('bg-active');
        });
        modalClose.addEventListener('click',function(){
          modalBg.classList.remove('bg-active');
        });</script>

    </body>
    @include('layouts.master.footer')
</html>



