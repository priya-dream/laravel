<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>DFC-JOB BANK</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" /> 
    <link rel="stylesheet" href="{{asset('vendors/mdi/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.16.3/sweetalert2.min.css">
   </head>
  <body> 

  <div class="header">
    <span><img class="logo-image" src="{{asset('/images/dfc-logo.png')}}"><span> JOBS</span></span>
    <!-- <span style="margin-left:100px">
      <select class="btn btn-secondary">
          <option><a href="#">English</a></option>
          <option><a class="btn btn-success" href='/post'>Tamil</a></option>
          <option><a href="#">Sinhala</a></option>
      </select>
    </span> -->
    <a style="margin-left:120px;font-size:20px;" href="{{ url('/company/login') }}" class="btn btn-success">POST JOB</a>
    <span class="login mdi mdi-account"><a class="login-btn"style="text-decoration:none;" href="{{url('/myaccount')}}">MyAccount</button></a></span>
    <span style="margin-left:60px" class="mdi mdi-account-star"><button class="modal-btn">Admin</button></span>
  </div>

      <div class="container-scroller">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              @yield('content')
            </div>
          </div> 
          @yield('scripts')  
      </div>
    <div class="modal-bg">
      <div class="modal-admin">
          <form action="{{url('/admin/verify')}}" method="POST">
          {{csrf_field()}}
            <div class="close-admin">+</div>
            <img src="{{asset('images/admin-login.png')}}" width="100px" height="100px" style="margin:10px 50px 10px 140px"></br>
              <lable style="color:#6f2674;margin-left:50px">username</label></br>
              <input class="form-control admin-login" type="text" placeholder="username" name=username style="width:350px" required/>
              <lable style="color:#6f2674;margin-left:50px">password</label></br>
              <input class="form-control admin-login" type="text" placeholder="password" name="password" style="width:350px" required/></br>
              <button type="submit" class="btn btn-primary" style="margin-left:150px">login</button>
              
           
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
        });
      </script>
      <!-- <script type="text/javascript"  src="{{asset('js/app.js')}}"></script> 
      <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script> -->

    </body>
    @include('layouts.master.footer')
</html>



