  <!-- Left side column. contains the logo and sidebar -->
  @php
        $generalsetting = \App\Models\GeneralSettings::first();
        $color = (@$generalsetting->admin_login_background?@$generalsetting->admin_login_background:'#d2d6de');
        $site_name = (@$generalsetting->site_name?@$generalsetting->site_name:'ADMIN');
        $admin_sidebar_color = (@$generalsetting->admin_sidebar_color?@$generalsetting->admin_sidebar_color:'#222d32');
    @endphp
  <aside class="main-sidebar" style="background-color:{{ $admin_sidebar_color}}">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{  URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>{{__('Dashboard')}}</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>{{__('Roles & Permissions')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> {{__('Add Role')}}</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> {{__('Add Module')}}</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>{{__('Sub Admin Management')}}</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> {{__('All Admin User')}}</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> {{__('Add Admin User')}}</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> {{__('User Permissions')}}</a></li>
          </ul>
        </li>
     
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>