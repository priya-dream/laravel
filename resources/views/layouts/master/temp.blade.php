<html><head>
    <style>
    
    </style>
</head>
<body>
<div class="header">
    <span><img class="logo-image" src="{{asset('/images/dfc-logo.png')}}"><span> JOBS</span></span>
    </span> -->
    <a style="margin-left:120px;font-size:19px;font-weight:bold" href="{{ url('/company/login') }}" class="btn btn-success">POST JOB</a>
    <span class="login mdi mdi-account"><a class="login-btn" href="{{url('/myaccount')}}">MyAccount</button></a></span>
    <span style="margin-left:60px" class="mdi mdi-account-star"><button style="background-color:white;font-size:25px" class="modal-btn">Admin</button></span>
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
      <script type="text/javascript"  src="{{asset('js/app.js')}}"></script> 
      <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    </body>
    @include('layouts.master.footer')