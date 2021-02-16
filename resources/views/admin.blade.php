
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
<div class="admin-header">
  <span>DFC JOBS</span>
  <span style="margin-left:150px" class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      English
    </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">English</a></li>
        <li><a class="dropdown-item" href="/post">Tamil</a></li>
        <li><a class="dropdown-item" href="#">Sinhala</a></li>
      </ul>
  </span>
  <a style="margin-left:150px;font-size:28px;" href="{{ url('/company/login') }}" class="btn btn-success"> POST JOB </a>
  <span style="margin-left:200px" class="mdi mdi-account-star"><button style="background-color:white;font-size:35px" class="modal-btn">Admin</button></span>
</div>

    


    <div class="container-scroller">
    @include('layouts.master.sidebar')
        
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
          <form action="{{url('/login/verify')}}" method="POST">
          {{csrf_field()}}
            <div class="close-admin">+</div>
            <img src="{{asset('images/admin-login.png')}}" width="120px" height="120px"></br><br>
            username: <input class="form-group" type="text" placeholder="username" name=username></br>
            password: <input class="form-group" type="text" placeholder="password" name="password"></br>
            <button type="submit" class="btn btn-primary">login</button>
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
    
    @section('content')
    <div class="main-panel">
        <h1>Hi!</h1>
    </div>
    @stop



    </body>
</html>



