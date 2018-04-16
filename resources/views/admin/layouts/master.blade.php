<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Anh</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{ asset('admin_assets/bower_components/Ionicons/css/ionicons.min.css') }}">

  <!-- {{-- Toastr --}} -->
  <link rel="stylesheet" href="{{ asset('admin_assets/bower_components/toastr/build/toastr.min.css') }}">
  
  <!-- Datatables  -->
  {{-- <link rel="stylesheet" href="{{ asset('admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"> --}}
  <!-- sweeatalert -->
  {{-- <link rel="stylesheet" href="{{ asset('admin_assets/bower_components/sweetalert-master/src/sweetalert.css') }}"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

  <!-- dung ajax -->
  <meta name="csrf_token" content="{{ csrf_token() }}">

  <!-- {{-- Data Table --}} -->
  @yield('css.section')
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('admin_assets/dist/css/skins/_all-skins.min.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{{ asset('admin/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b><i class="glyphicon glyphicon-send"></i></b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b class="glyphicon glyphicon-send"><i>nh</i></b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <img src="" class="img-circle" alt="User Image">
                        </div>
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->                    
                  </ul>
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->
            <li class="dropdown tasks-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li><!-- Task item -->
                      <a href="#">
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                          aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->                  
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="@yield('user_avatar')" class="user-image" alt="User Image">
              <span class="hidden-xs">@yield('user_name')</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="" class="img-circle" alt="User Image">

                <p>
                  @yield('user_name')
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                 {{--  <a class="btn btn-default btn-flat" href="{{ route('admin.logout') }}">
                    {{ __('Logout') }}
                  </a> --}}
                  <a class="btn btn-default btn-flat" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>

                 {{--  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form> --}}
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="@yield('user_avatar')" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>@yield('user_name')</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>


      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->


      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="">
          <a href="{{ asset('admin/home') }}">
            <i class="fa fa-home"></i> <span>Home</span>
            {{-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> --}}
          </a>
          {{-- <ul class="treeview-menu">
            <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul> --}}
        </li>
        <li class="header">POST MANAGEMENT</li>
        <li class="">
          <a href="{{ asset('admin/posts') }}">
            <i class="fa fa-edit"></i>
            <span>PM - Post management</span>
          </a>
          {{-- <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul> --}}
        </li>
        <li>
          <a href="{{ asset('admin/categories') }}">
            <i class="fa fa-th"></i><span>CM - Category management</span>
          </a>
        </li>
        <li>
          <a href="{{ asset('admin/tags') }}">
            <i class="glyphicon glyphicon-tags"></i> <span>TM - Tag management</span>
          </a>
        </li>
        <li class="header">USER MANAGEMENT</li>
        <li class="">
          <a href="{{ asset('admin/users') }}">
            <i class="glyphicon glyphicon-user"></i> <span>UM - User management</span>
           {{--  <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> --}}
          </a>
          {{-- <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul> --}}
        </li>
        <li class="header">OTHER</li>
        <li><a href=""><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        {{-- <li class="header">LABELS</li> --}}
        {{-- <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li> --}}
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>


  @yield('content')



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      <i style="color: blue">Tử Đằng Kết Vỹ</i>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 - Design by <a href="#">Nguyen Trung Anh - anhngtrung@gmail.com</a>.</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset('admin_assets/bower_components/jquery/dist/jquery.min.js') }}"></script>

{{-- datatables --}}
<script src="{{ asset('admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

@yield('js.section')
<!-- AdminLTE App -->
<script src="{{ asset('admin_assets/dist/js/adminlte.min.js') }}"></script>

{{-- toastr  --}}
<script src="{{ asset('admin_assets/bower_components/toastr/build/toastr.min.js') }}"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins. Both of these plugins are recommended to enhance the user experience. -->
</body>
</html>