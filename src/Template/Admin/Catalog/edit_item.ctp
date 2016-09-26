<!DOCTYPE html>

<html>
<head>
<?php include LAYOUT_DIR . 'css.ctp'; ?>
  <base href="/">

</head>

<body ng-app='admin' ng-controller="EditItemController" class="hold-transition skin-black-light sidebar-mini">
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
        Add Item
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-tag"></i> Admin</a></li>
           <li><a href="#"><i class="#"></i> Catalog</a></li>
        <li><a href='/admin/catalog/items'><i class="#"></i> Items</a></li>
        <li><a href='/admin/catalog/item/add'><i class="#"></i> Add Item</a></li>
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
                <form>
                <div class="row">
                  <div class="col-xs-11">
                    
                    <ul class="nav nav-tabs responsive" id="myTab">

                    <li class="test-class active"><a class="deco-none red-class" href="#resp-tab1"><span class="glyphicon glyphicon-cog"></span> General</a></li>
                    <li class="test-class"><a class="deco-none red-class" href="#resp-tab2"><span class="glyphicon glyphicon-cog"></span> Images</a></li>
                  </ul>
                  </div>
                  <div class="col-xs-1">
                    <button type="submit" ng-click="addItem()" class= "btn bg-primary btn-flat" name=""><i class="fa fa-save"> </i></button>
                  </div>
                </div>

                
                  <div class="tab-content responsive">

                    <div class="tab-pane active" id="resp-tab1">
                    <br>

                    <div class="box-body">

                                             <fieldset>
                          <legend><h4>Details</h4></legend>
                     <div class="row">
                     <div class="col-xs-6">

                    <div class="form-group">
                     <div class="form-group row">
                        <label for="item-code" class="col-xs-3 col-form-label">Item Code</label>
                      
                         <div class="input-group col-xs-9">
                              <input type="hidden" name="brand_prefix" id="brandPrefix" ng-repeat="prefix in prefixes" class="form-control" value='brand_prefix'>

                              <span class="input-group-addon">{{brand_prefix}}</span>
                              <input type="text" name="item_code" id="itemCode" class="form-control" placeholder="Item Code" value= '{{item_code}}' aria-describedby="item-code" >
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="brand" class="col-xs-3 col-form-label">Brand</label>
                           <div class="input-group col-xs-9">
                               <select name= "brand" id="brand" ng-model="selectedBrand" ng-options="brand as brand.brand_name for brand in brands track by brand.brand_id" class="form-control" ng-change="getPrefix()" placeholder="Brand"  aria-describedby="brand">
                                </select>
                            </div>
                      </div>
                      </div>
                    
                      </div> <!-- column1 -->

                         <div class="col-xs-6">

                                <div class="form-group row">
                                    <label for="category" class="col-xs-3 col-form-label">Category</label>
                                       <div class="input-group col-xs-9">
                                          <select id="category1" class="form-control" ng-model="selectedCategory" ng-options="parent as parent.category_name for parent in parents track by parent.category_id" ng-change="secondCategory()"  aria-describedby="category">
                                            </select><BR></BR>
                                          
                                             <select id="category2" class="form-control" ng-model="selectedCategory2" ng-options="category as category.category_name for category in categories track by category.category_id" aria-describedby="category">
                                            </select> <BR></BR>
                                        </div>
                                </div>

                       </div> <!-- column2 -->

                      </div><!-- row1 -->

                          <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group row">
                                  <label for="item-name" class="col-xs-3 col-form-label">Item Name</label>   
                                   <div class="input-group col-xs-9">
            
                                        <input value= {{details.item_name}} name="item_name" id="itemName" type="text" class="form-control" placeholder="Item Name" aria-describedby="item-code">
                                    </div>
                                </div>

                                  <div class="form-group row">
                                    <label for="brand" class="col-xs-3 col-form-label">SRP</label>
                                     <div class="input-group col-xs-9">
                                          <span class="input-group-addon" id="double">PHP</span>
                                          <input name= "srp" id="srp" value= {{details.item_srp}} type="number" class="form-control" placeholder="SRP" aria-describedby="double">
                                          <span class="input-group-addon" id="double">.00</span>
                                      </div>
                                </div>
                              </div>

                              <div class="col-xs-6">
                                <div class="form-group row">
                               <label class="col-xs-3 col-form-label">Gender</label>
                                       <div class="input-group col-xs-9">
                                            <select id="gender" class="form-control" ng-model="selectedGender" ng-options="gender as gender.gender_name for gender in genders track by gender.gender_id" ng-change="getGender()"  aria-describedby="category">
                                            </select><BR></BR>
                                        </div>
                              </div>
                            </div>

                          </fieldset>
                      
                        <fieldset class="form-group">
                          <legend><h4>Description</h4></legend>

                              <div class="row">
                                  
                                  <label for="item-name" class="col-xs-2 col-form-label">Item Description</label>   
                                    <div class="col-xs-10">
                                     <textarea name="description" id="summernote"></textarea>
                                    </div>
                                </div>


                                <div class="form-group row">
                                  
                                  <label class="col-xs-2 col-form-label">Sizes</label>   
                                    <div ng-repeat ="size in sizes" class="col-xs-2">
                                       <input style= "display:inline-block; margin-right: 2%;" type="checkbox" checklist-model="selected.sizes" checklist-value="size.size_id"><strong>{{size.size_key}}</strong> 
                                    </div>
                                </div>


                             
                        </fieldset>

                      </div> <!-- box body -->
                    </div> <!-- tab1-->
                                      </form>


                                             <div class="tab-pane" id="resp-tab2">
                         <div ng-app="admin" ng-controller="AddItemController">

                            <div class="box-body">
        

                             <div class="row">
                             <fieldset>

                               <legend><h4>Item Image</h4></legend>
                                  <form name="myForm">
                                    <div class="table-responsive">
                                  <table id="images" class="table table-striped table-bordered table-hover">
                                      <thead>
                                        <tr>
                                              <td class="text-left">Thumbnail</td>
                                              <td></td>
                                              <td></td>
 
                                              <td colspan="20%" class="text-left">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                          Photo
                                      <input type="file" ngf-select ng-model="picFile" id="picFile" name="file"    
                                             accept="image/*" ngf-max-size="2MB" required
                                             ngf-model-invalid="errorFile">
                                      <i ng-show="myForm.file.$error.required">*required</i><br></td>
                                    
                                          <td>
                                          <i ng-show="myForm.userName.$error.required">*required</i>
                                          Description <br>
                                          <input type="text" name="userName" ng-model="username" id ="image_desc" size="31" required></td>

                                          <td>
                                          <img ng-show="myForm.file.$valid" ngf-thumbnail="picFile" class="thumb"> 

                                          </td>

                                          <td colspan="20%"> 
                                          <button ng-click="picFile = null" ng-show="picFile"  data-toggle="tooltip" data-placement="bottom" title="Remove Image" class="btn btn-flat"><i class="fa fa-trash-o"></i></button>
                                            <button style="display: none;" id="uploadButton" ng-click="uploadPic(picFile)" data-toggle="tooltip" title="Upload Image" data-placement="bottom" class="btn btn-flat "><i class="fa fa-upload"></i>
                                            </button>
                                            <span class="progress" ng-show="picFile.progress >= 0">
                                            <div style="width:{{picFile.progress}}%" 
                                            ng-bind="picFile.progress + '%'"></div>
                                            </span> 
                                          </td>
                                        </tr>
                                        <tr><i ng-show="myForm.file.$error.maxSize">File too large 
                                          {{errorFile.size / 1000000|number:1}}MB: max 2M</i>

                                      <span ng-show="picFile.result">Upload Successful</span>
                                      <span class="err" ng-show="errorMsg">{{errorMsg}}</span></tr>
                                      </tbody>
                                      </table>
                                      </div>
                                      
                                    
    
                                  </form>

                                    </fieldset>
                                
                              
                              
                              </div>
                              </div>
                              </div>
                              </div>
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
