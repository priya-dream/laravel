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
      <a class="nav-link"  href="{{url('/post')}}" >
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        <span class="menu-title">Available Vacancies</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="">Jaffna</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Colombo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Others</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/company/data">
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        <span class="menu-title">Company</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/employee">
        <i class="mdi mdi-chart-bar menu-icon"></i>
        <span class="menu-title">Job Seekers</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/vacancies">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Job types</span>
      </a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-file-document-box menu-icon"></i>
        <span class="menu-title">Reports</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/myaccount">
        <i class="mdi mdi-logout menu-icon"></i>
        <span>Sign Out</span>
      </a>
    </li>
  </ul>
  </nav>