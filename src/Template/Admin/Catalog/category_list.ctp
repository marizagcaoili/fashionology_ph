
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

<body ng-app="admin" ng-controller="CategoryController" class="hold-transition skin-black-light sidebar-mini">
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
        Categories
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tag"></i> Admin</a></li>
        <li><a href="">Catalog</a></li>
        <li><a href="/admin/catalog/categories"><i class="#"></i> Categories</a></li>
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
       
              <h2 class="box-title">Category List</h2>
      
              </div>
              
              <div class="col-xs-6">
 
              </div>
              <div class="col-xs-3">
                <form name="actionButtons" method="post" action= "product.php" enctype="multipart/form-data">
                  <div class="btn-group" id="alignright">  
                   <button type="button" class="btn btn-flat" data-toggle="modal" ng-click= "addModal()" data-target="#addcategory"><i class="fa fa-plus"></i></button>  
                  </div>
                </form>
              </div>
              </div>
              <div class="row col-xs-10">
                   <fieldset class="form-group">
                        
                        <div class="col-xs-2">
                        <label for="category" class="form-label">Group By</label></div>
                           <div class="col-xs-3">
                            <select id="group1" class="form-control" ng-model="selectedParent" ng-options="parent as parent.category_name for parent in parents track by parent.category_id" ng-change="sortCateg()"  aria-describedby="category">
                            </select>

                           </div>

                           
                            <div class="col-xs-3">
                             <button type="button" class="btn btn-primary" ng-click="display()" style="border-radius:0px;">  Display All</button>  
                            </div>
                    </fieldset>
                </div>
            </div>
            

            <div class="box-body">
              <table id="example2" class="table">
                <thead>
                <tr>
                  <th>Category Name </th>
                  <th width= 20%>Status</th>
                  <th colspan="2" width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="category in categories">
                <td>{{category.category_name}}</td>
                <td><input
                      bs-switch
                      ng-model="category.status"
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
                      switch-change="toggle(category.category_id, category.status)"></td>
                <td><button type="submit" class="btn bg-primary btn-flat" data-toggle="modal" data-target="#editcategory" ng-click="editCategory(category.category_id, category.category_name, category.parent_id)"><i class="fa fa-pencil"> </i></button></td>
                <td><button type="submit" ng-click="deleteCategory(category.category_id)" class= "btn bg-red btn-flat" name=""><i class="fa fa-trash"> </i></button></td>
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
<div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Category</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <div class="col-xs-3">
           <label for="brand" class=" col-form-label">Parent</label>&nbsp&nbsp

            </div>
             <div class="col-xs-9">
                  <input type="hidden" name="categoryid1" id="category_parent">
                  <select id="category" type="text" class="form-control" placeholder="Parent" aria-describedby="parent" ng-model="parent" ng-options="parent as parent.category_name for parent in parents track by parent.category_id" ng-change="getparent()"></select> 
                              <a data-toggle="modal" data-target="#addParent" href= "#" style="border-radius:0px; font-size:12px; margin-left:350px;">Add Parent +</a>
              </div>
        </div>
            <div class="form-group row">
                <label for="brand" class="col-xs-3 col-form-label">Category Name <label style="color:red">*</label></label>
                 <div class="col-xs-9">
                      <input type="text" id="name" class="form-control" ng-model = "try" placeholder="Category Name" aria-describedby="item-code">
                  </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="modal-close" >Cancel</button>
          <button type="button" class="btn btn-primary" ng-click="addCategory()" style="border-radius:0px;"> Add</button>
        </div>
      </div>

    </div>
  </div>

  <div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
      </div>
      <div class="modal-body">
        <div  ng-show= "showParent" class="form-group row">
          
            <label for="brand" class="col-xs-3 col-form-label">Parent</label>
             <div class="col-xs-9">
                  <input type="hidden" name="categoryid1" id="category_parent">
                  <select id="category" type="text" class="form-control" placeholder="Parent" ng-model="editParent" ng-options="parent as parent.category_name for parent in parents track by parent.category_id"" ng-change="parentChange()"></select><br>
  
              </div>
        </div>
            <div class="form-group row">
                <label for="brand" class="col-xs-3 col-form-label">Category Name</label>
                 <div class="col-xs-9">
                      <input type="text" class="form-control" placeholder="Category Name" aria-describedby="item-code" value="{{ category_name }}" ng-model="category_name">
                  </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="update-modal-close" >Cancel</button>
          <button type="button" class="btn btn-primary" ng-click="updateCategory()" style="border-radius:0px;"> Update</button>
        </div>
      </div>

    </div>
  </div>


  <div class="modal fade" id="addParent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add Parent Category</h4>
      </div>
      <div class="modal-body">
            <div class="form-group row">
                <label for="brand" class="col-xs-3 col-form-label">Parent Name</label>
                 <div class="col-xs-9">
                      <input type="text" ng-model = "parent_name" class="form-control" placeholder="Category Name" aria-describedby="item-code" value="{{ category_name }}">
                  </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="parent-modal-close" >Cancel</button>
          <button type="button" class="btn btn-primary" ng-click="addParent()" style="border-radius:0px;"> Add</button>
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
