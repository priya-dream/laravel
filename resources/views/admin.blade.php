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
    <div class="admin-header">
      <span><img class="logo-image" src="{{asset('/images/dfc-logo.png')}}"> JOBS</span>
      <a style="margin-left:150px;font-size:20px;" href="{{ url('/company/login') }}" class="btn btn-success"> POST JOB </a>
      <span class=" login mdi mdi-account"><a class="login-btn" href="{{url('/myaccount')}}">Login</button></a>
      </div>
    <div class="container-scroller">
    @include('layouts.master.sidebar')
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
          <lable style="color:#6f2674">username</label></br>
              <input class="form-control admin-login" type="text" placeholder="username" name=username required/>
          <lable style="color:#6f2674">password</label></br>
              <input class="form-control admin-login" type="text" placeholder="password" name="password" required/></br>
          <button type="submit" class="btn btn-primary">login</button>    
      </form>
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



