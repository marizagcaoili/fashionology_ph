  <header class="main-header" ng-app="admin" ng-controller= "DashboardController">

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