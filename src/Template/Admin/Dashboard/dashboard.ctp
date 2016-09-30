<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
<?php include LAYOUT_DIR . 'css.ctp'; ?>
<base href="/">
</head>


<body ng-app= "admin" ng-controller= "DashboardController" class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <a data-toggle="tooltip" data-placement="bottom" title="Go To Store" href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="/img/hanger.gif" style="height:25px"></span>
      <!-- logo for regular state and mobile devices -->
       <span class="logo-lg"><img src="/img/logo-wstroke.png" style="height:40px;"></span>
    </a>

    <!-- Header Navbar--> 
    <nav class="navbar navbar-static-top" role="navigation">

     <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu" style="width: 10px;">
                  <center><button style = "border-radius:0px;" ng-click= "logout()" class="btn btn-default btn-flat col-xs-12">Archives &nbsp &nbsp <i class= "fa fa-trash"></i></button></center>
                  <center><button style = "border-radius:0px;" ng-click= "logout()" class="btn btn-default btn-flat col-xs-12">Log out &nbsp &nbsp <i class= "fa fa-sign-out"></i></button></center>


              
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">




 <?php include LAYOUT_DIR . 'navbar.ctp'; ?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="#"><i class="#"></i> Dashboard</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
        <div ng-click = "order()" class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span><h4>Orders</h4></span>

              <span class="info-box-number">{{count.orders}} <small><i>New Orders</i></small></span> 
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div ng-click = "inquiry()" class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-envelope"></i></span>

            <div class="info-box-content">
              <span><h4>Inquiries</h4></span>
              <span class="info-box-number">{{count.inquiries}}  <small><i>Unread Inquiries</i></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
        <div ng-click = "account()" class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span><h4>Users</h4></span>
              <span class="info-box-number">{{count.accounts}} <small><i>Verified Accounts</i></small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    <section class="content-header">
    </section>
              <!-- Page Content -->
    </section>



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
     
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 | Fashionology </strong> <br>All rights reserved.
  </footer>

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<?php include LAYOUT_DIR . 'script.ctp'; ?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
