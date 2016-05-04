<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		@yield('title')
	</title>

	<!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
	{{ HTML::style('bootstrap/css/bootstrap.min.css') }}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    {{ HTML::style('dist/css/AdminLTE.min.css') }}
    {{ HTML::style('dist/css/skins/_all-skins.min.css') }}
    {{ HTML::style('dist/css/bootstrap-colorpicker.min.css') }}
    {{ HTML::style('dist/css/custom.css') }}
    {{ HTML::style('plugins/datatables/dataTables.bootstrap.css') }}

    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{URL('/')}}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>C</b>S</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Customer</b>Support</span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-fixed-top" role="navigation">
              <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
              <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <!-- =========================================User Notifications===================================== -->
                    <li class="dropdown notifications-menu">
                        @if (Auth::user()->role == 0)
                        <a href="{{ route('showNotifications', ['role' => 'admin', 'id' => Auth::user()->id]) }}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        @elseif(Auth::user()->role == 1)
                        <a href="{{ route('showNotifications', ['role' => 'supervisor', 'id' => Auth::user()->id]) }}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        @elseif(Auth::user()->role == 2)
                        <a href="{{ route('showNotifications', ['role' => 'agent', 'id' => Auth::user()->id]) }}" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        @endif   
                            <i class="fa fa-bell-o"></i>
                            @if ($notifications_count != 0)
                                <span class="label label-warning">{{ $notifications_count }}</span>
                            @endif
                        </a>
                        <ul class="dropdown-menu menu-scroll" style="width:500px;">
                            <li class="header">You have {{ $notifications_count }} new notifications</li>
                            <li>
                                <ul class="menu" style="overflow: hidden; width: 100%; height: 400px;">
                                    @foreach($notifications as $notification)
                                        <li>
                                        <a href="#">
                                         <h5>
                                            <i class="fa fa-ticket text-aqua"></i> 
                                            {{ $notification->subject }} 
                                            @if($notification->is_read == 0)
                                                <span class="label bg-yellow pull-right" style="border-radius: 10px; width: 0px; height: 13px;">&nbsp</span>
                                            @endif
                                        </h5>
                                        {{ $notification->body }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- =============================================================================================== -->

                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <p>
                                    @if(Auth::user()->role == 0)
                                        {{ Auth::user()->name }} - Admin
                                    @elseif (Auth::user()->role == 1)
                                        {{ Auth::user()->name }} - Support Supervisor
                                    @else
                                        {{ Auth::user()->name }} - Support Agent
                                    @endif
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    {{-- <a href="{{ URL('logout') }}" class="btn btn-default btn-flat">Log out</a> --}}
                                    <a href="{{ Route('logoutNew') }}" class="btn btn-default btn-flat">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                  <!-- Control Sidebar Toggle Button -->
                </ul>
              </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">

                        <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <!-- Status -->
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                @if(Auth::user()->role == 0)  
                    <li class="header">ADMIN</li>
                    <li class="active"><a href="#"><i class="fa fa-rss"></i> <span>Feed</span></a></li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-optin-monster"></i> <span>Employees</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('indexSupervisors')}}">Supervisors</a></li>
                            <li><a href="{{route('indexAgents')}}">Agents</a></li>
                        </ul>
                    </li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="{{route('createCustomerAdmin')}}"><i class="fa fa-group"></i> <span>Customers</span></a></li>
                    <li><a href="#"><i class="fa fa-ticket"></i> <span>Tickets</span></a></li>
                    <li><a href="{{ URL::route('admin.department.index') }}"><i class="fa fa-puzzle-piece"></i> <span>Departments</span></a></li>
                    <li><a href="#"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{route('adminSettings')}}"><i class="fa fa-cogs"></i> <span>Settings</span></a></li>
                @elseif (Auth::user()->role == 1)
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                    <li class="header">SUPPORT SUPERVISOR</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active"><a href="#"><i class="fa fa-feed"></i> <span>Feed</span></a></li>
                    <li class="treeview">
                      <a href="#"><i class="fa fa-optin-monster"></i> <span>Team Activity</span> <i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                        <li><a href="{{ route('supervisorTeamAgents', Auth::user()->id) }}"><i class="fa fa-user"></i> <span>Support Agents</span></a></li>
                        <li><a href="#"><i class="fa fa-ticket"></i> <span>Tickets History</span></a></li>
                      </ul>
                    </li>
                    <li><a href="{{route('createCustomerSupervisor')}}"><i class="fa fa-group"></i> <span>Customers</span></a></li>
                @else 
                    <li class="header"> SUPPORT AGENT</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class="active">
                      <a href="#"><i class="fa fa-ticket"></i> <span>Tickets Feed</span></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-history"></i> <span>Tickets History</span></a>
                    </li>
                    <li>
                      <a href="{{route('createCustomerAgent')}}"><i class="fa fa-group"></i> <span>Cutomers</span></a>
                    </li>
                @endif
                <li class="header">TWITTER ACCOUNT</li>
                @if (Session::has('account_id'))
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="{{ Session::get('account_avatar') }}" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><span>@</span>{{ Session::get('account_screen_name') }}</p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Connected</a>
                        </div>
                    </div>
                @else 
                    <li><button id="twitterButton" data-link="{{ Route('twitterAuthentication') }}" class="twitter-conn-btn btn btn-sm btn-info">
                        <i class="fa fa-twitter"></i>&nbsp&nbsp
                        <span>Connect to Twitter</span></button>
                    </li> 
                @endif   
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span></i>Home</a></li>
                    <li class="active">Feed</li>
                </ol>
            </section>
            <br>

            <section class="content clearfix">
                @yield('content')
            </section>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2015 </strong><a href="#"><strong>Team</strong>Four</a>. All rights reserved.
        </footer>

    </div>    
    <!-- jQuery 2.1.4 -->
    {{ HTML::script('plugins/jQuery/jQuery-2.1.4.min.js') }}

    {{ HTML::script('plugins/slimScroll/jquery.slimscroll.min.js') }}

    {{ HTML::script('plugins/fastclick/fastclick.min.js') }}

    <!-- Bootstrap 3.3.5 -->
    {{ HTML::script('bootstrap/js/bootstrap.min.js') }}
    <!-- AdminLTE App -->
    {{ HTML::script('dist/js/app.min.js') }}
    
    {{ HTML::script('dist/js/agentTicket.js') }}  

    {{ HTML::script('dist/js/bootstrap-colorpicker.min.js') }}

    <script type="text/javascript">
        document.getElementById("twitterButton").onclick = function () {
            var url = $(this).data('link');
            location.href = url;
        };

        $('li.dropdown').on('click', function() {
            var $el = $(this);
            if ($el.hasClass('open')) {
                var $a = $el.children('a.dropdown-toggle');
                
                if ($a.length && $a.attr('href')) {
                    location.href = $a.attr('href');
                }
            }
        });
    </script>

    @yield('scripts') 
</body>
</html>

