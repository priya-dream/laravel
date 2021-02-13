<nav class="sidebar sidebar-offcanvas" id="sidebar">
<div class="text-center sidebar-brand-wrapperr">
    <a class="" href="#"><table><tr><td><img class="sidebar-image-admin" src="{{ asset('images/admin.png') }}"></td><td><img class="sidebar-image-job" src="{{ asset('images/job.png') }}"; height="25px"; width="25px";></td></tr></table></a>
   </div>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link"  href="{{url('/post')}}">
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
      <a class="nav-link" href="">
        <i class="mdi mdi-contacts menu-icon"></i>
        <span class="menu-title">Login Users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        <span class="menu-title">Company</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="">
        <i class="mdi mdi-chart-bar menu-icon"></i>
        <span class="menu-title">Employee</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/vacancies">
        <i class="mdi mdi-table-large menu-icon"></i>
        <span class="menu-title">Job Types</span>
      </a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link" href="https://www.bootstrapdash.com/demo/breeze-free/documentation/documentation.html">
        <i class="mdi mdi-file-document-box menu-icon"></i>
        <span class="menu-title">About</span>
      </a>
    </li>
    <li class="nav-item sidebar-actions">
      <div class="nav-link">
        <div class="mt-4">
          <div class="border-none">
            <p class="text-black">Notification</p>
          </div>
          <ul class="mt-4 pl-0">
            <li>Sign Out</li>
          </ul>
        </div>
      </div>
    </li>
  </ul>
  </nav>