
<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>JOB BANK</title>
    @include('layouts.master.head')
    
    <script src="{{asset('js/dashboard.js')}}"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
  </head>
  <body>
<div class="header">
  <span>DFC JOBS</span>
  <span style="margin-left:200px" class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
      English
    </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="#">English</a></li>
        <li><a class="dropdown-item" href="/post">Tamil</a></li>
        <li><a class="dropdown-item" href="#">Sinhala</a></li>
      </ul>
  </span>
  <a style="margin-left:300px;font-size:25px" href="{{ url('/company/login') }}" class="btn btn-success"> POST JOB </a>
  <button style="margin-left:250px; font-size:35px" class="modal-btn">Admin</button>
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
    <div class="modal">
          <form action="">
            <div class="close">+</div>
            <img src="{{asset('images/admin-login.png')}}" width="100px" height="100px"></br>
            username: <input type="text" placeholder="username"></br>
            password: <input type="text" placeholder="password"></br>
            <button type="submit">login</button>
          </form>
      </div>
    </div>
  </div>
    @include('layouts.master.footer') 
    
    </body>
</html>



