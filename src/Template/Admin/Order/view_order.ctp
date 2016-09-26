<!DOCTYPE html>

<html>
<head>
<?php include LAYOUT_DIR . 'css.ctp'; ?>
  <base href="/">


</head>

<body ng-app='admin' ng-controller="ViewOrderController" class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
<?php include LAYOUT_DIR . 'header.ctp'; ?>
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
        Order Details
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a target="_self" href="#"><i class="fa fa-tag"></i> Admin</a></li>
        <li><a target="_self" href='/admin/order'><i class="#"></i> Orders </a></li>
        <li><a href='#'><i class="#"></i> Order Details </a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <div class="row">
              <div class="col-xs-12">
                <div class="box-body">           
                    <fieldset class="form-group col-xs-6">

                    <h4>Ordered Items</h4> <h5 style= "float:right">{{itemCount}} Item(s) </h5>
                    <BR>
                    <table class="table">
                      <tr>
                      <thead>
                      <th>Item Code</th>
                      <th>Item Name</th>
                      <th>Size</th>
                      <th>SRP</th>
                      <th>Quantity</th>
                      <th>Thumbnail</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr ng-repeat = "ordereditem in ordereditems">
                        <td>{{ordereditem.item.item_code}}</td>
                        <td>{{ordereditem.item.item_name}}</td>
                        <td>{{ordereditem.size.size_key}}</td>
                         <td>{{ordereditem.item.item_srp}}</td>
                        <td>{{ordereditem.quantity}}</td>
                        <td><img src={{ordereditem.item.image.file_key}} width="50px" height="50px"></td>
                      </tr>
                      </tbody>
                    </table>

                  </fieldset>
                 <div  ng-repeat= "orderdetail in orderdetails" class="form-group col-xs-6" >
                  <h4> Reference Number     : <p style= "float:right"><b> {{orderdetail.order_reference_number}}</b> </p></h4>
                  <h4>Delivery Date : <p style= "float:right"> Pending  </p></h4>
                  <h5><i>Total Amount  </i>   :  <p style= "float:right"> {{orderdetail.order_subtotal}} </p></h5>
                  <h5><i>Payment Method  </i>: <p style= "float:right"> {{orderdetail.order_payment_method}}  </p></h5><BR>
                  
                  <fieldset class="form-group">
                    <h4><b>Customer Details</b></h4>
                 

                  <h5> Customer Name    : <p style= "float:right"><b>  {{orderdetail.account.account_fname}} {{orderdetail.account.account_lname}} </b> </p></h5>
                  <h5>Contact Number: <p style= "float:right"> 09366788414  </p></h5><BR>
                   </fieldset>

                    <fieldset class="form-group">
                    <h4><b>Billing Details</b></h4>
                 

                  <h5> Receiver   : <p style= "float:right"><b> {{orderdetail.shipping.shipping_fname}} {{orderdetail.shipping.shipping_lname}} </b> </p></h5>
                  <h5> City    :  <p style= "float:right"> {{orderdetail.shipping.shipping_city}}  </p></h5>
                  <h5> Landmark : <p style= "float:right">  {{orderdetail.shipping.shipping_landmark}}  </p></h5>
                  <h5> Zip Code : <p style= "float:right">  {{orderdetail.shipping.shipping_zipcode}}   </p></h5><BR>
                   </fieldset>


                  </div>

                </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      </div>

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

 
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<?php include LAYOUT_DIR . 'script.ctp'; ?>





<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
