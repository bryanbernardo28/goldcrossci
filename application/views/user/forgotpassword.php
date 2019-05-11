<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Gold Cross Security Agency</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Forgot Password</p>
    <form action="<?=base_url('adminlogin/forgotPassword')?>" method="post">
      <div class="form-group  has-feedback <?php if(!empty(form_error('femail'))): ?> has-error <?php endif?>">
        <input type="email" class="form-control" name="femail" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?=form_error('femail','<span class="help-block">','</span>')?>
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

