<!DOCTYPE html>

<html>
<head>
<?php include LAYOUT_DIR . 'css.ctp'; ?>
  <base href="/">


</head>
<body ng-app='admin' ng-controller= 'LoginController'>
<div class="login-box" >
  <div class="login-logo">
    <img src="/img/logo-wstroke.png" style="height:60px;">
  </div>
    <form>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" id= "username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
      <BR></BR>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" ng-click="login()" class="btn btn-block btn-flat" style="background-color:#222d32; color:white;">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


</div>


<?php include LAYOUT_DIR . 'script.ctp'; ?>


</body>



</html>
