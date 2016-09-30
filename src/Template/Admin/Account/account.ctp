

<!DOCTYPE html>
<html>
<head>

<?php include LAYOUT_DIR . 'css.ctp'; ?>
 


<style type="text/css">
  #alignright
  {
    margin-left:90%;
  }
</style>
</head>

<body ng-app="admin" ng-controller="AccountController" class="hold-transition skin-black-light sidebar-mini">
<div class="wrapper">
<?php include LAYOUT_DIR . 'header.ctp'; ?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->

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
        Items 
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tag"></i> Admin</a></li>
        <li><a href="">Catalog</a></li>
        <li><a href="/admin/catalog/items"><i class="#"></i> Items</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div class="row">
              <div class="col-xs-4">
       
              <h3 class="box-title">Item List</h3>
      
              </div>
              
              <div class="col-xs-4">

              </div>
              <div class="col-xs-4">

              </div>
              </div>
            </div>
            

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table">
                <thead>
                <tr>
                  <th width="10%">Account ID</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Address</th>
                  <th>Contact Number</th>
                  <th>Account Created</th>
<!--                   <th>Last Login</th>

                  <th width= 10% colspan="3">Accessibility</th> -->
                </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="account in accounts">
                    <td>{{account.account_id}}</td>
                    <td>{{account.account_fname}}{{account.account_lname}}</td>
                    <td>{{account.account_gender}}</td>  
                    <td>{{account.shipping.shipping_address}}{{account.shipping.shipping_city}}</td>
                    <td>{{account.account_contact}}</td>
                    <td>{{account.account_created}}</td>
  <!-- 
                    <td><input
                          bs-switch
                          ng-model="account.account_activated"
                          type="checkbox"
                          switch-active="{{ isActive }}"
                          switch-on-text="{{ onText }}"
                          switch-off-text="{{ offText }}"
                          switch-on-color="{{ onColor }}"
                          switch-off-color="{{ offColor }}"
                          switch-animate="{{ animate }}"
                          switch-size="{{ size }}"
                          switch-label="{{ label }}"
                          switch-icon="{{ icon }}"
                          switch-radio-off="{{ radioOff }}"
                          switch-label-width="{{ labelWidth }}"
                          switch-handle-width="{{ handleWidth }}"
                          switch-wrapper="{{ wrapper }}"
                          ng-true-value="1"
                          ng-false-value="0"
                          switch-change="toggle(item.item_id, item.featured_flag)"></td> -->

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

  <div class="modal fade" id="addStock" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Stock</h4>
      </div>
      <form>
      <div class="modal-body">
      <div id= "stockDiv" class= "row">
      <p style = "margin-left: 5%; font-size:15px;"> Current Stocks:</p>
    
      <div  ng-repeat= "stock in item_stock_details">
      <p class= "col-xs-3"></p>
        <p class= "col-xs-3"> {{stock.size.size_description}} </p>
         <p class= "col-xs-3"> {{stock.size.size_key}} </p>
        <p class= "col-xs-3"> {{stock.quantity}}</p> 

      </div>
      <p ng-show= "nostock"> Out of Stock </p>
      </div>
     
      <BR></BR>
        <div class="form-group row">
                <label for="brand" class="col-xs-3 col-form-label">Size</label>
                 <div class="col-xs-9">
                  <select id="group1" ng-change= "sizeChange()" class="form-control" ng-model="size" ng-options="size as size.size_key for size in sizes track by size.size_id">
                  </select>
                  </div>
        </div>
        <div class="form-group row">
                  <label for="brand" class="col-xs-3 col-form-label">Quantity</label>
                 <div class="col-xs-9">
                      <input type="number" id="quantity" class="form-control" ng-model= "size_description" placeholder="Quantity" aria-describedby="item-code">
                  </div>
        </div> 
      </div> <!-- modal body -->
      </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="update-stock-close" >Cancel</button>
          <button type="submit" class="btn btn-primary" ng-click="addStock()" style="border-radius:0px;"> Add</button>
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
