/**
 * Created by PhpStorm.
 * User: joseph-wahba
 * Date: 4/1/16
 * Time: 8:06 PM
 */
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agent | Ticket</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {{HTML::style("bootstrap/css/bootstrap.min.css")}}
    <!-- Font Awesome -->
   {{HTML::style("https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css")}}
    <!-- Ionicons -->
    {{HTML::style("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}
<!-- Theme style -->
{{HTML::style("dist/css/AdminLTE.min.css")}}
<!-- AdminLTE Skins. We have chosen the skin-blue for this starter
                                                      page. However, you can choose any other skin. Make sure you
      apply the skin class to the body tag so the changes take effect.
-->
{{HTML::style("dist/css/skins/_all-skins.min.css")}}

{{HTML::style("dist/css/custom.css")}}

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    {{ HTML::script("https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js")}}
{{ HTML::script("https://oss.maxcdn.com/respond/1.4.2/respond.min.js")}}
<![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<!-- Main Header -->
<header class="main-header">

<!-- Logo -->
<a href="index2.html" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>C</b>S</span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><img width="100" length="50" src={{asset('dist/img/logo.png')}}></span>
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

      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">Alexander Pierce</span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            <p>
              Alexander Pierce - Web Developer
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <!-- Menu Body -->

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
      <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p>Alexander Pierce</p>
      <!-- Status -->
      <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
  </div>

  <!-- search form (Optional) -->
  <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
      <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
    </div>
  </form>
  <!-- /.search form -->

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu">
    <li class="header">Agent</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active">
      <a href="#"><i class="fa fa-ticket"></i> <span>Tickets</span></a>
    </li>
    <li>
      <a href="AgentTicketHistory.html"><i class="fa fa-history"></i> <span>History</span></a>
    </li>
  </ul><!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="#"><span class="glyphicon glyphicon-home"></span></i>Home</a></li>
    <li class="active">Tickets</li>
  </ol>
</section>
<br>
<!-- Main content -->
<section class="content">
  <!-- FEED + TICKETS -->
  <div class="">
    <div class="feed">
    <div class="my-tickets">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-ticket"></i> &nbspMy Tickets</h3>
          </div>
          <div class="box-body">
            <div class="callout callout-default callout-ticket-bg clearfix">
              <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
              <div class="pull-right">
                <span class="label bg-yellow">Opened</span>
                <span class="label bg-red">High</span>
                <span class="label bg-aqua">3</span>
              </div>
            </div>
            <div class="callout callout-default callout-ticket-bg clearfix">
              <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
              <div class="pull-right">
                <span class="label bg-yellow">Opened</span>
                <span class="label bg-red">High</span>
                <span class="label bg-aqua">3</span>
              </div>
            </div>
            <div class="callout callout-default callout-ticket-bg clearfix">
              <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
              <div class="pull-right">
                <span class="label bg-yellow">Opened</span>
                <span class="label bg-red">High</span>
                <span class="label bg-aqua">3</span>
              </div>
            </div>
              <div class="callout callout-default callout-ticket-bg clearfix">
                <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                <div class="pull-right">
                  <span class="label bg-yellow">Opened</span>
                  <span class="label bg-red">High</span>
                  <span class="label bg-aqua">3</span>
                </div>
            </div>
               <div class="callout callout-default callout-ticket-bg clearfix">
                <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                <div class="pull-right">
                  <span class="label bg-yellow">Opened</span>
                  <span class="label bg-red">High</span>
                  <span class="label bg-aqua">3</span>
                </div>
            </div>
              <div class="callout callout-default callout-ticket-bg clearfix">
                <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                <div class="pull-right">
                  <span class="label bg-yellow">Opened</span>
                  <span class="label bg-red">High</span>
                  <span class="label bg-aqua">3</span>
                </div>
            </div>
              <div class="callout callout-default callout-ticket-bg clearfix">
                <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                <div class="pull-right">
                  <span class="label bg-yellow">Opened</span>
                  <span class="label bg-red">High</span>
                  <span class="label bg-aqua">3</span>
                </div>
            </div>
              <div class="callout callout-default callout-ticket-bg clearfix">
                <h5 class="pull-left"><a href="" data-toggle="modal" data-target="#ticket">#10 Ticket Title</a></h5>
                <div class="pull-right">
                  <span class="label bg-yellow">Opened</span>
                  <span class="label bg-red">High</span>
                  <span class="label bg-aqua">3</span>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
                  <!-- My Tickets -->

    <!-- Supervisor Tickets -->
    <div class="supervisor-tickets">
      <div class="unassigned-tickets">
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-ticket"></i> &nbspUnassigned Tickets</h3>
          </div>
          <div class="box-body">
            <!-- <div class="box box-danger">
              <div class="box-header with-border">
                <h3 class="box-title">Ticket #1</h3>
              </div>
            </div> -->
            <div class="callout callout-default callout-ticket-bg clearfix">
              <div class="col-md-6">
                <h5 class="pull-left">#11 Ticket Title</h5>
              </div>
              <div class="col-md-3">
                <span class="label bg-red">High</span>
              </div>
              <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim</button>
              </div>
            </div>
          <div class="callout callout-default callout-ticket-bg clearfix">
            <div class="col-md-6">
              <h5 class="pull-left">#11 Ticket Title</h5>
            </div>
            <div class="col-md-3">
              <span class="label bg-yellow">Medium</span>
            </div>
            <div class="col-md-3">
              <button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim</button>
            </div>
          </div>
          <div class="callout callout-default callout-ticket-bg clearfix">
            <div class="col-md-6">
              <h5 class="pull-left">#11 Ticket Title</h5>
            </div>
            <div class="col-md-3">
              <span class="label bg-yellow">Medium</span>
            </div>
            <div class="col-md-3">
              <button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim</button>
            </div>
          </div>
          <div class="callout callout-default callout-ticket-bg clearfix">
            <div class="col-md-6">
              <h5 class="pull-left">#11 Ticket Title</h5>
            </div>
            <div class="col-md-3">
              <span class="label bg-green">Low</span>
            </div>
            <div class="col-md-3">
              <button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim</button>
            </div>
          </div>
             <div class="callout callout-default callout-ticket-bg clearfix">
            <div class="col-md-6">
                <h5 class="pull-left">#11 Ticket Title</h5>
                </div>
                <div class="col-md-3">
                <span class="label bg-green">Low</span>
                 </div>
                 <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim</button>
               </div>
            </div>
            <div class="callout callout-default callout-ticket-bg clearfix">
            <div class="col-md-6">
                <h5 class="pull-left">#11 Ticket Title</h5>
                </div>
                <div class="col-md-3">
                <span class="label bg-yellow">Medium</span>
                 </div>
                 <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim</button>
               </div>
            </div>
            <div class="callout callout-default callout-ticket-bg clearfix">
            <div class="col-md-6">
                <h5 class="pull-left">#11 Ticket Title</h5>
                </div>
                <div class="col-md-3">
                <span class="label bg-green">Low</span>
                 </div>
                 <div class="col-md-3">
                <button type="button" class="btn btn-danger btn-sm pull-right"><i class="fa fa-medkit"></i> Claim</button>
               </div>
            </div>
          </div>
        </div>
      </div>

  </div>


  <!-- Button trigger modal -->
  <button type="button" class="btn bg-blue" data-toggle="modal" data-target="#addTicket">
    <i class="fa fa-plus"></i>  Add Ticket
  </button>

<div class="modal fade" id="addTicket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-blue">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add Ticket</h4>
          </div>
          <div class="modal-body">
                   <div id="AddNewCustomer">
             <div class="box box-primary" id>
        <div class="box-header with-border">
          <h3 class="box-title">New Customer</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form">

          <div class="box-body">
             <div class="form-group">
              <label for="CustomerName">Customer Name</label>
              <input type="text" class="form-control" id="CustomerName" placeholder="Enter Name">
            </div>
            <div class="form-group">
              <label for="CustomerEmail">Email address</label>
              <input type="email" class="form-control" id="CustomerEmail" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="CustomerMobile">Mobile</label>
              <input type="text" class="form-control" id="CustomerMobile" placeholder="Mobile Number">
            </div>
            <div class="form-group">
              <label for="CustomerTwitter">Twitter Username</label>
              <input type="text" class="form-control" id="CustomerTwitter" placeholder="Twitter Username">
            </div>
          </div><!-- /.box-body -->
          <a class="btn btn-block bg-blue" id="hideNewCustomer"><i class="fa fa-angle-double-up"></i></a>
        </form>
        <br>
      </div><!-- /.box -->

  </div>


<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">New Ticket</h3>
        </div><!-- /.box-header -->
        <!-- form start -->

        <form role="form">
          <div class="box-body">
<div id="CurrentUser">
            <div class="form-group">
              <label for="CustomerMobileTicket">Customer Mobile</label>

            <div class="input-group input-group-sm">
            <input type="text" class="form-control" id="CustomerMobileTicket" placeholder="Enter Mobile Number">
            <span class="input-group-btn">
              <button class="btn btn-primary bg-blue btn-flat" id="UserCheck" type="button">Check user</button>
            </span>
          </div>
          </div>
          <div id="UserData">
          <p><strong>Name: </strong> Foo Bar</p>
          <p><strong>Email: </strong> foo@bar.com</p>
          <p><strong>Twitter: </strong> @foo_bar</p>
          </div>


          <div class="form-group">
           <a class="btn btn-block bg-blue" id="showNewCustomer"><i class="fa fa-plus"></i> New Customer</a>
           </div>
  </div>
            <div class="form-group">
              <label for="ticketTitle">Ticket Title</label>
              <input type="text" class="form-control" id="ticketTitle" placeholder="Ticket Title">
            </div>
            <div class="form-group">
              <label for="ticketDescription">Ticket Description</label>
              <textarea id="ticketDescription" class="form-control"></textarea>

            </div>

            <div class="form-group">
              <label>Priority</label>
              <select class="form-control">
                <option>High</option>
                <option>Medium</option>
                <option>Low</option>

              </select>
            </div>

          </div><!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary bg-blue pull-right">Submit</button>
          </div>
        </form>
      </div><!-- /.box -->

          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



  <!-- Modal -->
  <div class="modal fade" id="ticket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-blue">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true" class="fa fa-times"></span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">
            <b>[#1] Ticket Title</b>
          </h4>
        </div>
        <!-- Modal Body -->
        <div class="modal-body clearfix">
          <!-- Ticket Description -->
          <div class="assigned-agents">
            <div class="box box-solid">
              <div class="box-header with-border">
                <i class="fa fa-ticket"></i>
                <h5 class="box-title"><strong>Description</strong></h5>
              </div><!-- /.box-header -->
              <div class="box-body">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
                </p>
              </div><!-- /.box-body -->
            </div>
          </div>
          <!-- Assigned Agents & Status & priority-->
          <div class="status-priorities clearfix">
            <div class="agents">
              <h5><b>Assigned Agents</b></h5>
              <img src="dist/img/user7-128x128.jpg" class="img-circle" alt="User Image">
              <img src="dist/img/user8-128x128.jpg" class="img-circle" alt="User Image">
            </div>
            <div>
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th>Status</th>
                    <th><span class="label bg-yellow">Opened</span></th>
                  </tr>
                  <tr>
                    <th>Priority</th>
                    <th><span class="label bg-red">High</span></th>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- <div class="status">
              <h5><b>Status</b></h5>
              <span class="label label-warning"><big>Opened</big></span>
            </div>
            <div class="priority">
              <h5><b>Priority</b></h5>
              <span class="label label-danger"><big>High</big></span>
            </div> -->
          </div>
          <!-- Conversational Tweets -->

          <div class="conv-timeline">
            <div class="scroll-timeline">
              <ul class="timeline">
                <!-- timeline time label -->
                <li class="time-label">
                    <span class="bg-blue">
                        24 Feb. 2016
                    </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-twitter bg-aqua"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 02:05</span>
                        <h3 class="timeline-header"><a href="#">Customer</a> ...</h3>
                        <div class="timeline-body">
                            Customer's tweet complain
                            ...
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-twitter bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 05:20</span>
                        <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
                        <div class="timeline-body">
Support Agent's reply
                            ...
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-twitter bg-aqua"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 10:00</span>
                        <h3 class="timeline-header"><a href="#">Customer</a> ...</h3>
                        <div class="timeline-body">
                            Customer's reply
                            ...
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                    <!-- timeline icon -->
                    <i class="fa fa-twitter bg-blue"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> 11:15</span>
                        <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>
                        <div class="timeline-body">
Support agent's reply
                            ...
                        </div>
                    </div>
                </li>
                <!-- END timeline item -->
                <li>
                 <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <div class="tweet-reply">
              <div class="input-group">
                <input class="form-control" placeholder="Type message...">
                <div class="input-group-btn">
                  <button class="btn bg-blue">reply</button>
                </div>
              </div>
            </div>
            <!-- <button type="button" class="btn btn-sm bg-blue pull-right"></button> -->
          </div>

          <!-- Tickets Action -->
          <div class="ticket-actions">
            <!-- Re-assign to Agent -->
            <div class="panel box box-success">
              <div class="box-header with-border">
                <div class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseZero" aria-expanded="true" class="">
                    Re-assign Ticket
                  </a>
                </div>
              </div>
              <div id="collapseZero" class="panel-collapse collapse" aria-expanded="true">
                <div class="box-body">
                   <form role="form">
                    <div class= "form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="one"> Team Agent 1
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="two"> Team Agent 2
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="three"> Team Agent 3
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios4" value="four"> Team Agent 4
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-xs btn-success btn-block">Re-assign</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- Invite Agent -->
            <div class="panel box box-danger">
              <div class="box-header with-border">
                <div class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">
                    Invite Agents
                  </a>
                </div>
              </div>
              <div id="collapseOne" class="panel-collapse collapse" aria-expanded="true">
                <div class="box-body">
                   <form role="form">
                    <div class= "form-group">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Team Agent 1
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Team Agent 2
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Team Agent 3
                        </label>
                      </div>
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> Team Supervisor
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-xs btn-danger btn-block">Invite</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- Change Status -->
            <div class="panel box box-primary">
              <div class="box-header with-border">
                <div class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" class="">
                    Change Status
                  </a>
                </div>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="true">
                <div class="box-body">
                  <form role="form">
                    <div class= "form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="one"> Status one
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="two"> Status two
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="three"> Status three
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="four"> Status four
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-xs btn-primary btn-block">Change</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- Change Priority -->
            <div class="panel box box-warning">
              <div class="box-header with-border">
                <div class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" class="">
                    Change Priority
                  </a>
                </div>
              </div>
              <div id="collapseThree" class="panel-collapse collapse" aria-expanded="true">
                <div class="box-body">
                  <form role="form">
                    <div class= "form-group">
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios1" value="low"> Low
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios2" value="medium"> Medium
                        </label>
                      </div>
                      <div class="radio">
                        <label>
                          <input type="radio" name="optionsRadios" id="optionsRadios3" value="high"> High
                        </label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-xs btn-warning btn-block">Change</button>
                  </form>
                </div>
              </div>
            </div>
            <button type="button" class="btn btn-block btn-xs bg-blue">
              <i class="fa fa-level-up"></i> &nbspEscalate </button>
            <!-- <button type="button" class="btn btn-block btn-xs btn-danger">Delete Ticket</button> -->
          </div>
        </div>
      </div>
    </div>
  </div>


</section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Main Footer -->
<footer class="main-footer">
<!-- To the right -->
<div class="pull-right hidden-xs">
  Anything you want
</div>
<!-- Default to the left -->
<strong>Copyright &copy; 2015 </strong><a href="#"><strong>Team</strong>Four</a>. All rights reserved.
</footer>

<!-- Control Sidebar -->




<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script type="text/javascript" src="dist/js/agentTicket.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
 Both of these plugins are recommended to enhance the
 user experience. Slimscroll is required when using the
 fixed layout. -->
</body>
</html>
