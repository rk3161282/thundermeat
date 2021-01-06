@php
        $generalsetting = \App\Models\GeneralSettings::first();
        $color = (@$generalsetting->admin_login_background?@$generalsetting->admin_login_background:'#d2d6de');
        $site_name = (@$generalsetting->site_name?@$generalsetting->site_name:'ADMIN');
        $admin_navbar_color = (@$generalsetting->admin_navbar_color?@$generalsetting->admin_navbar_color:'#3c8dbc');
        $admin_sidebar_color = (@$generalsetting->admin_sidebar_color?@$generalsetting->admin_sidebar_color:'#222d32');
    @endphp
<header class="main-header" style="background-color:{{ $admin_navbar_color}}">
  
<!-- Logo -->
<a href="" class="logo" style="background-color:{{ $admin_navbar_color}}">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini">{{$site_name}}</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>{{$site_name}}</b></span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" style="background-color:{{ $admin_navbar_color}}">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
     
  
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{  URL::asset('dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
          <span class="hidden-xs">Alexander Pierce</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header" style="background-color:{{ $admin_navbar_color}}">
            <img src="{{  URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

            <p>
              Alexander Pierce - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>
         
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
              <a href="#" class="btn btn-default btn-flat">Sign out</a>
            </div>
          </li>
        </ul>
      </li>
   
    </ul>
  </div>

</nav>
</header>