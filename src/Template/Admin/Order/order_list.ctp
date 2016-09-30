
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>

<?php include LAYOUT_DIR . 'css.ctp'; ?>
 

  <base href="/">
<style type="text/css">
  #alignright
  {
    margin-left:90%;
  }
</style>
</head>

<body ng-app="admin" ng-controller="OrderController" class="hold-transition skin-black-light sidebar-mini">
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
        Orders
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tag"></i> Admin</a></li>
        <li><a href="/admin/order"><i class="#"></i> Orders</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="row">
              <div class="col-xs-3">
       
              <h2 class="box-title">Order List</h2>
      
              </div>
              
      

            <div class="box-body">
              <table id="example2" class="table">
                <thead>
                <tr>
                  <th width= "10%">Reference Number</th>
                  <th width= "10%">Status</th>
                  <th width= "10%">Customer Name</th>
                  <th width= "10%">Total Amount</th>
                  <th width= "10%">Call Time</th>
                  <th width= "20%"><center>Comments</center></th>
                  <th width= "20%" colspan= "4">Action</th>

                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="order in orders">
                <td>{{order.order_reference_number}}</td>
                <td>{{order.order_status}}</td>
                <td>{{order.account.account_fname}} &nbsp {{order.account.account_lname}}</td>
                <td>{{order.order_subtotal}}.00</td>
                <td>{{order.delivery.call_time}}</td>
                <td></td>
               <!--  <td> <md-datepicker ng-model="myDate" md-placeholder="Enter date"
                          md-min-date=0 md-max-date="maxDate"></md-datepicker></td>  -->
                <td><span data-toggle="modal"  data-target="#confirmOrder"><button data-toggle="tooltip" data-placement="bottom" ng-click= "confirmModal(order.order_reference_number, order.order_id, order.account.account_email)" title="Confirm Order" type="submit" class= "btn btn-success btn-flat" name="" ng-disabled="{{order.confirm}}"><small>CONFIRM</small></button></span></td>

                <td><button data-toggle="tooltip" data-placement="bottom" ng-click= "updateAsDelivered(order.order_id)" title="Mark as Delivered" type="submit" class= "btn btn-success btn-flat" name="" ng-disabled="{{order.markdelivered}}"><i class="fa fa-check-square-o"> </i></button></td>

                <td><a href="/admin/order/view_order?order_id={{order.order_id}}"><button data-toggle="tooltip" data-placement="bottom" title="View Order" type="submit" class= "btn bg-primary btn-flat" name=""><i class="fa fa-eye"> </i></button></a></td> 

                <td><button data-toggle="tooltip" data-placement="bottom" title="Delete Order" type="submit" class= "btn bg-red btn-flat" name="" ng-click= "archive(order.order_id)" ng-disabled="{{order.cancel}}"><i class="fa fa-trash"> </i></button></td>
                </tr>
                </tbody>

              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
<div class="modal" id="confirmOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Confirm Order</h4>
        <h5  style="text-align:left;"><i ">Reference No. </i><span style="color:red">{{reference_number}}</span></h5>
      </div>
      <div class="modal-body">
            <div class="form-group row">
                <div class="col-xs-1"></div>
                <label for="brand" class="col-xs-3 col-form-label">Delivery Date</label>
                  <div class='col-sm-6'>
                      <ng-datepicker ng-model="datepicker" >
                      </ng-datepicker>
                      <span ng-bind="ctrl.date1" style="display: block; margin-top: 5px;"></span>
  
                  </div>
            </div>
          
            <div class="form-group row">
                <div class="col-xs-1"></div>
                <div class="col-xs-3">
                    <label for="brand" class="col-form-label">Note to User</label><br>
                    <small><i>(Optional)</i></small>
                </div>
                 <div class="col-xs-7">
                     <textarea style="width:80%;" type="date" id="note" ng-model="delivery_note"></textarea><br>
                    <small><i>*An email will be sent to {{email_add}} regarding with the confirmation of order. This note will be included to the mail.</i></small> 
                  </div>

            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" ng-click="cancel()" style="border-radius:0px;" data-dismiss="modal" id="modal-close" >Cancel</button>
          <button type="button" class="btn btn-primary" ng-click="confirmOrder()" style="border-radius:0px;"> Confirm Order</button>
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

 
  <div class="control-sidebar-bg"></div>

<!-- jQuery 2.2.3 -->

<!-- page script -->

<?php include LAYOUT_DIR . 'script.ctp'; ?>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
