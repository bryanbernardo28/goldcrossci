<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Gold Cross Security & Investigation Agency</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Forgot Password</p>
    <form action="<?=base_url('adminlogin/confirm_resetpass/').$this->uri->segment(3)?>" method="post">
      <div class="form-group  has-feedback <?php if(!empty(form_error('npassword'))): ?> has-error <?php endif?>">
        <input type="password" class="form-control" name="npassword" placeholder="New Password">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?=form_error('npassword','<span class="help-block">','</span>')?>
      </div>

      <div class="form-group  has-feedback <?php if(!empty(form_error('cpassword'))): ?> has-error <?php endif?>">
        <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?=form_error('cpassword','<span class="help-block">','</span>')?>
      </div>

      <div class="row">
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

