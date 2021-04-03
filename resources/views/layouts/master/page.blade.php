<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>DFC-JOB BANK</title>
    @include('layouts.master.head')
   </head>
  <body> 
<div class="header">
  <span>DFC JOBS</span>
  <span style="margin-left:100px">
    <select class="btn btn-secondary">
        <option><a href="#">English</a></option>
        <option><a class="btn btn-success" href='/post'>Tamil</a></option>
        <option><a href="#">Sinhala</a></option>
    </select>
  </span>
  <a style="margin-left:150px;font-size:20px;" href="{{ url('/company/login') }}" class="btn btn-success">POST JOB</a>
  <span style="margin-left:160px" class="mdi mdi-account-star"><button style="background-color:white;font-size:25px" class="modal-btn">Admin</button></span>
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
            <img src="{{asset('images/admin-login.png')}}" width="100px" height="100px" style="margin-top:20px"></br></br>
            <h5>username : <input class="form-group" type="text" placeholder="username" name=username></h5>
            <h5>password : <input class="form-group" type="text" placeholder="password" name="password"></h5>
            <h5><button type="submit" class="btn btn-primary">login</button></h5>
          </form>
      </div>
    </div>
  </div>
  
  <script>
      var modalBtn=document.querySelector('.modal-btn');
	var modalBg=document.querySelector('.modal-bg');
    var modalClose=document.querySelector('.close-admin');
        modalBtn.addEventListener('click',function(){               
          modalBg.classList.add('bg-active');
        });
        modalClose.addEventListener('click',function(){
          modalBg.classList.remove('bg-active');
        });
  </script>
  
    @include('layouts.master.footer')
     
    </body>
</html>



