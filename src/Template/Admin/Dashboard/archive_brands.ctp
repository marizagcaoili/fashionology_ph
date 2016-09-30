

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

<body ng-app= "admin" ng-controller="InquiryController" class="hold-transition skin-black-light sidebar-mini">
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
        Brands
       <!--  <small>Optional description</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/dashboard"><i class="fa fa-tag"></i> Admin</a></li>
        <li><a href="">Catalog</a></li>
        <li><a href="/admin/inquiry"><i class="#"></i> Inquiries</a></li>
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
      
              </div>
              
              <div class="col-xs-4">

              </div>
              <div class="col-xs-4">
              </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-body">
              <table id="example2" class="table">
                <thead>
                <tr>
                  <th>Sender Name</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th width="23%">Contact No.</th>
                  <th width= 10% colspan="3">Actions</th>
                </tr>
                </thead>
                <tbody>
                  <tr ng-repeat = "inquiry in inquiries">
                  <td>{{inquiry.inquiry_sender_name}}</td>
                  <td>{{inquiry.inquiry_subject}}</td>
                  <td>{{inquiry.inquiry_message}}</td>
                  <td>{{inquiry.inquiry_contact_no}}</td>
                    <td> <span data-toggle= "modal" data-target="#addStock"><button data-toggle="tooltip" data-placement="bottom" title="Reply" type="submit" class= "btn bg-primary btn-flat" ng-click="replyModal(inquiry.inquiry_id, inquiry.inquiry_subject, inquiry.inquiry_email_add, inquiry.inquiry_sender_name)" name=""><i class="fa fa-reply"> </i></button></span></td>
                     <td><button type="submit" ng-click="archiveInquiry(inquiry.inquiry_id)" class= "btn bg-red btn-flat" name=""><i class="fa fa-trash"> </i></button></td>
                    
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
        <h4 class="modal-title" id="myModalLabel">Reply to an Inquiry</h4>
      </div>
      <form>
      <div class="modal-body">
        <div class="form-group row">
                <label class="col-xs-3 col-form-label">To:</label> 
                <label class="col-xs-4 col-form-label">{{sender}} <h5><i>{{inquiry_email}}</i></h5></label> 
               
        </div> 
        <div class="form-group row">
                <label for="brand" class="col-xs-3 col-form-label">Subject</label>
                 <div class="col-xs-9">
                    <input value=  name="item_name" ng-model= "subject" id="subject" type="text" class="form-control" placeholder="Item Name" aria-describedby="item-code">
                  </div>
        </div>
        <div class="form-group row">
                  <label for="brand" class="col-xs-3 col-form-label">Message</label>
                 <div class="col-xs-9">
                      <textarea id="message" class="form-control" ng-model= "inquiry_message" placeholder="Message" aria-describedby="item-code"> </textarea>
                  </div>
        </div> 
      </div> <!-- modal body -->
      </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="border-radius:0px;" data-dismiss="modal" id="update-stock-close" >Cancel</button>
          <button type="submit" class="btn btn-primary" ng-click="reply()" style="border-radius:0px;"> Reply</button>
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
