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

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="row">
              <div class="col-xs-4">       
            <h2 class="box-title">Deliveries</h2>
              </div>
              
              <div class="col-xs-4">

              </div>
              <div class="col-xs-4">
              </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12"> 

                </div>
              </div>

                <div class="box-body">
              <table id="example2" class="table">
                 <table id="example2" class="table">
                <thead>
                <tr>
                  <th width= "10%">Transaction Number</th>
                  <th width= "10%">Customer Name</th>
                  <th width= "10%">Total Amount</th>
                  <th>Order Placed</th>
                  <th>Delivery Date</th>
                  <th>Location</th>
                  <th>Landmark</th>
                  <th width= "20%" colspan= "4">Action</th>

                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="order in orders">
                <td>{{order.order_reference_number}}</td>
                <td>{{order.account.account_fname}} &nbsp {{order.account.account_lname}}</td>
                <td>{{order.order_subtotal}}.00</td>
                <td>{{order.order_placed_date}}</td>
                <td>{{order.delivery.delivery_date}}</td>
                <td>{{order.shipping.shipping_address}} {{order.shipping.shipping_city}}, {{order.shipping.shipping_zipcode}}</td>
                <td>{{order.shipping.shipping_landmark}}</td>
               <!--  <td> <md-datepicker ng-model="myDate" md-placeholder="Enter date"
                          md-min-date=0 md-max-date="maxDate"></md-datepicker></td>  -->
                <td><span><button data-toggle="tooltip" data-placement="bottom" ng-click= "generatePDF(order.order_reference_number, order.order_id, order.account.account_email)" title="Generate PDF" type="submit" class= "btn btn-success btn-flat" name="" ><i class="fa fa-file-pdf-o"> </i></button></span></td>


                <td><button data-toggle="tooltip" data-placement="bottom" ng-click= "updateAsDelivered(order.order_id)" title="Mark as Delivered" type="submit" class= "btn btn-success btn-flat" name="" ng-disabled="{{order.markdelivered}}"><i class="fa fa-check-square-o"> </i></button></td>


                </tr>
                </tbody>

              </table>
              </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
              <!-- Page Content -->
    </section>



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div class='receipt-wrap' id='content' style='width:74%; display:none;'>

      <div class='header-receipt'>
        <div class='header-flex'>
          <div>
            <img src='/front/public/img/logo-black.png' />
          </div>
          <div>
            <p>Delivery Date: {{datepicker}} <span  id='date'></span></p>
          </div>
        </div>
      </div>

      <div class='address-wrap'>
        <div class='address-flex-wrap'>
          <div class='address-sec'>
            <p class='light-text'>From</p>
            <p class='light-text'><b>Fashionology Boutique Molino</b></p>
            <p class='light-text'>Espeleta. 9072 Molino Rd.</p>
            <p class='light-text'>Espeleta, Bacoor, Cavite</p>
            <p class='light-text'>Phone: (804) 123-5432</p>
            <p class='light-text'>Email: jab.j16@gmail.com</p>
          </div>
          <div class='address-sec'>

            <p class='light-text'>To</p>
            <p class='light-text'>{{orderdetails.shipping.shipping_fname}} {{orderdetails.shipping.shipping_lname}}<b></b></p>
            <p class='light-text'>{{orderdetails.shipping.shipping_address}}</p>
            <p class='light-text'>{{orderdetails.shipping.shipping_city}} {{orderdetails.shipping.zipcode}}</p>
            <p class='light-text'>Phone: {{orderdetails.account.account_contact}}</p>
            <p class='light-text'>Email: {{orderdetails.account.account_email}}</p>

          </div>
          <div class='address-sec'>
            <p class='light-text'><b>Transaction # {{orderdetails.order_reference_number}} </b></p>
            <p class='light-text'><b>Payment Method:</b> Cash on Delivery</p>  
            <p class='light-text' id='delivery'><b>Delivery Status:</b>TO BE DELIVERED</p>
          </div>
        </div>


      </div>

      <div class='account-table'>
        <div class='accounts-header'>
          <div class='accounts-header-flex'>
            <div class='qty-top'><p class='header-bold'>Qty</p></div>
            <div class='accounts-top'><p class='header-bold'>Product</p></div>
            <div class='serial-top'><p class='header-bold'>Item Code</p></div>
            <div class='desc-top'><p class='header-bold'>Description</p></div>
            <div class='subtotal-top'><p class='header-bold'>Subtotal</p></div>
          </div>
        </div>

        <div class='accounts-content' ng-repeat = "ordereditem in ordereditems">

          <div class='accounts-content-flex' >
            <div class='qty-top'><p class='content-bold'>{{ordereditem.quantity}}</p></div>
            <div class='accounts-top'><p class='content-bold'>{{ordereditem.item.item_name}}</p></div>
            <div class='serial-top'><p class='content-bold'>{{ordereditem.item.item_code}}</p></div>
            <div class='desc-top'><p class='content-bold'>{{ordereditem.item.item_description}}</p></div>
            <div class='subtotal-top'><p class='content-bold'></p>{{ordereditem.quantity}} * {{ordereditem.item.item_srp}}</div>


          </div>

        </div>

        <div class='additional'>
          <!--  <p><b><span style='color:#ababab;'>Additional Details</span> &nbsp; I really like your products!</b></p> -->
        </div>




      </div>



      <div class='accounts-below' style='border:none;'>
        <div class='accounts-flex-below' style='border:none;border-top:1px solid #cdcdcd;'>
          <div class='accounts-a'>
            <div style='position: relative;top:40px;'>
              <div style='width:90%;'>
                <p style='font-family: Moon;font-size: 18px;font-weight: bold;'>Fashionology PH Receiving Form</p>
              </div>

              <div style='width: 88%;'>
                <p style='font-family: Coves;font-size: 18px;'>Thank you for trusting Fashionology Botique. This form is only for receiving orders. Kindly sign the fields below. <br>
                </p>
                </div>

              </div>
            </div>

            <div class='accounts-b'>

              <div class='accounts-b-under'>
                <p class='t-amount' style='margin: 0;font-size: 20px;'>SUBTOTAL: {{subtotal}}&nbsp; PHP </p>
                <p class='t-amount' style='margin: 0;font-size: 20px;'>VAT: {{vat}} &nbsp; PHP </p>
                <!-- <p class='t-amount' style='margin: 0;font-size: 20px;'>SHIPPING FEE: &nbsp; PHP 0.00</p> -->
                <p class='t-amount' style='margin: 0;margin-top: 20px;color:#d42740;'>Grand Total: &nbsp; PHP {{total}}.00</p>


              </div>


              <div style="border:1px black solid; position: relative; top:200px;">
             
              </div>
              <p style="position: relative; top:210px; left:180px;">Signature</p>
               <p style="position: relative; top:210px;">Receiver's Name :</p>
               <p style="position: relative; top:220px;">Date Today:</p>

        <!--  <p class='due-p'>Amount Due 2/22/2016</p>
      -->
      <div class='button-make'>
        <div class='button-flex'>

        </div>

      </div>

    </div>
  </div>


</div>

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
