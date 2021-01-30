
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>JOB BANK</title>
    @include('layouts.master.head')
  </head>
  <body>
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
    @include('layouts.master.footer') 
  </body>
</html>



