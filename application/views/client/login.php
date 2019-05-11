<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <p style="color:rgb(237,236,236,0.7);"><b style="font-family:garamond";>Gold Cross Security & Investigation Agency</b></p>
  </div> 
  <!-- /.login-logo -->
  <div class="login-box-body" style="background-color: rgb(255,255,255,0.4);">
    <?php
    if(validation_errors()){
    ?>
    <div class="callout callout-danger">
      <h5><?=validation_errors();?></h5>
    </div>
    <?php
    }
    ?>
    <p class="login-box-msg" style="color:rgb(37,9,97);">Sign in to start your session</p>

    <form action="<?=base_url('adminlogin/login')?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="adminemail" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control"name="adminpass" placeholder="Password" text-align:=left>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <?=$widget?>
              <?=$script?>
        
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  

    <a href="<?=base_url('adminlogin/forgotPassword')?>">I forgot my password</a><br>
    <a href="<?=base_url('adminlogin/register')?>" class="text-center">Register account</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

