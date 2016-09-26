
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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

<body ng-app="admin" ng-controller="BrandController" class="hold-transition skin-black-light sidebar-mini">
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
        Brands 
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tag"></i> Admin</a></li>
        <li><a href="#">Catalog</a></li>
        <li><a href="/admin/catalog/item"><i class="#"></i> Brands</a></li>
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
       
              <h2 class="box-title">Brand List</h2>
      
              </div>
              
              <div class="col-xs-4"></div>
              <div class="col-xs-4">
                <form name="actionButtons" method="post" action= "product.php" enctype="multipart/form-data">
                  <div class="btn-group" id="alignright">  
                   <button type="button" class="btn btn-flat" data-toggle="modal"  data-target="#addbrand"><i class="fa fa-plus"></i></button>
                  </div>
                </form>
              </div>
              </div>
            </div>
            

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table">
                <thead>
                <tr>
                  <th width= 40%>Brand Name </th>
                  <th width= 40%>Prefix</th>
                  <th width= 10%>Status</th>
                  <th colspan= "2">Action</th>
                </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="brand in brands">
                    <td>{{brand.brand_name}}</td>
                    <td>{{brand.brand_prefix}}</td>
                    <!--<td>{{brand.status==1 ? 'Active' : 'Inactive'}}</td>-->
                    <td><input
                          bs-switch
                          ng-model="brand.status"
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
                          switch-change="toggle(brand.brand_id, brand.status)"></td>
                    <td><button type="submit" class="btn bg-primary btn-flat" data-toggle="modal" data-target="#editbrand" ng-click="editBrand(brand.brand_id, brand.brand_name, brand.brand_prefix)"><i class="fa fa-pencil"> </i></button></td>
                    <td><button type="submit" ng-click="deleteBrand(brand.brand_id)" class= "btn bg-red btn-flat" name=""><i class="fa fa-trash"> </i></button></td>
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
        <div class="modal fade" id="addbrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Brand</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group row">
                      <label for="name" class="col-xs-3 col-form-label">Brand Name</label>
                       <div class="col-xs-9">
                            <input type="text" class="form-control" placeholder="Category Name" aria-describedby="name"
                            name="name" id="brand_name">
                        </div>
                  </div>
                  <div class="form-group row">
                      <label for="prefix" class="col-xs-3 col-form-label">Brand Prefix</label>
                       <div class="col-xs-9">
                            <input type="text" class="form-control" placeholder="Prefix" aria-describedby="prefix" name="prefix" id="brand_prefix">
                        </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="modal-close">Close</button>
                <button type="submit" class="btn btn-primary" style="border-radius:0px;" ng-click="add()"> Add</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="editbrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit Brand</h4>
              </div>
              <div class="modal-body">
                  <div class="form-group row">
                      <label for="name" class="col-xs-3 col-form-label">Brand Name</label>
                       <div class="col-xs-9">
                            <input type="text" class="form-control" placeholder="Category Name" aria-describedby="name"
                            name="name" id="brand_name" ng-model="brand_name" value="{{brand_name}}">
                        </div>
                  </div>
                  <div class="form-group row">
                      <label for="prefix" class="col-xs-3 col-form-label">Brand Prefix</label>
                       <div class="col-xs-9">
                            <input type="text" class="form-control" placeholder="Prefix" aria-describedby="prefix" name="prefix" id="brand_prefix" ng-model="brand_prefix" value="{{brand_prefix}}">
                        </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="update-modal-close">Close</button>
                <button type="submit" class="btn btn-primary" style="border-radius:0px;" ng-click="update()"> Update</button>
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
<!-- jQuery 2.2.3 -->

<?php include LAYOUT_DIR . 'script.ctp'; ?>
 
<!-- page script -->


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
