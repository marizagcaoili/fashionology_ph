
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
     margin-left: 80%;
  }
</style>
</head>

<body ng-app="admin" ng-controller="SizeController" class="hold-transition skin-black-light sidebar-mini">
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
        Sizes
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tag"></i> Admin</a></li>
        <li><a href="">Catalog</a></li>
        <li><a href="/admin/catalog/sizes"><i class="#"></i> Sizes</a></li>
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
       
              <h2 class="box-title">Size List</h2>
      
              </div>

              <div class="col-xs-6">
              </div>
              
              <div class="col-xs-3">
              <div class="btn-group" id="alignright">  
              <button type="button" class="btn btn-flat" data-toggle="modal" data-target="#addsize"><i class="fa fa-plus"></i></button>  
              </div>
              </div>
              
      

            <div class="box-body">
              <table id="example2" class="table">
                <thead>
                <tr>
                  <th width= "45%">Size</th>
                  <th width= "45%">Description</th>
                  <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="size in sizes">
                <td>{{size.size_key}}</td>
                <td>{{size.size_description}}</td>
                <td><button type="submit" data-toggle="modal" data-target= "#editsize" class= "btn bg-primary btn-flat" name="" ng-click= "editSize(size.size_id, size.size_key, size.size_description)"> <i class="fa fa-pencil"> </i> </button></td>
                <td><button type="submit" ng-click="deleteSize(size.size_id)" class= "btn bg-red btn-flat" name=""><i class="fa fa-trash"> </i></button></td>
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
<div class="modal fade" id="addsize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Size</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
                <label for="brand" class="col-xs-3 col-form-label">Size</label>
                 <div class="col-xs-9">
                      <input type="text" id="size_key" class="form-control" placeholder="Size" aria-describedby="item-code">                  <BR>
                  </div>
                  <label for="brand" class="col-xs-3 col-form-label">Description</label>
                  <div class="col-xs-9">
                  <input type="text" id="description" class="form-control" placeholder="Description" aria-describedby="item-code">
                  </div>
                
        </div> 
      </div> <!-- modal body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="modal-close" >Cancel</button>
          <button type="button" class="btn btn-primary" ng-click="addSize()" style="border-radius:0px;"> Add</button>
        </div>
      </div>

    </div>
  </div>

<div class="modal fade" id="editsize" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Size</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
                <label for="brand" class="col-xs-3 col-form-label">Size</label>
                 <div class="col-xs-9">
                      <input type="text" id="size" class="form-control" ng-model= "size_key" value="{{size_key}}" placeholder="Size" aria-describedby="item-code"><BR>
                  </div>
                  <label for="brand" class="col-xs-3 col-form-label">Description</label>
                 <div class="col-xs-9">
                      <input type="text" id="size" class="form-control" ng-model= "size_description" value="{{size_description}}" placeholder="Size" aria-describedby="item-code">
                  </div>
        </div> 
      </div> <!-- modal body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="update-modal-close" >Cancel</button>
          <button type="button" class="btn btn-primary" ng-click="updateSize()" style="border-radius:0px;"> Update</button>
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


<?php include LAYOUT_DIR . 'script.ctp'; ?>

</body>
</html>
