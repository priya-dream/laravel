<!-- <link rel="stylesheet" href="{{asset('css/style.css')}}" /> -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
<div class="text-center sidebar-brand-wrapperr">
    <a class="" href="#"><table><tr><td><img class="sidebar-image-admin" src="{{ asset('images/admin.png') }}"></td><td><img class="sidebar-image-job" src="{{ asset('images/job.png') }}"; height="25px"; width="25px";></td></tr></table></a>
   </div>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link"  href="{{url('/admin/dashboard')}}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="{{url('/admin/for_publish')}}">
        <i class="mdi mdi-arrow-right-bold-circle menu-icon"></i>
        <span class="menu-title">For Publish</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="{{url('/post')}}" >
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        <span class="menu-title">Available Vacancies</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/company/data">
        <i class="mdi mdi-city menu-icon"></i>
        <span class="menu-title">Company</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/admin/job_seeker">
        <i class="mdi mdi-account-card-details menu-icon"></i>
        <span class="menu-title">Job Seekers</span>
        
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/vacancies">
        <i class="mdi mdi-briefcase menu-icon"></i>
        <span class="menu-title">Job types</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="/application_report">
        <i class="mdi mdi-file-document-box menu-icon"></i>
        <span class="menu-title">Reports</span>
        
      </a>
      
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/post">
        <i class="mdi mdi-logout menu-icon"></i>
        <span>Sign Out</span>
      </a>
    </li>
  </ul>
  </nav>
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>