<body>
<div class="limiter">

  <div class="container-login100" style="background-image: url(<?=base_url('assets/images/bg-02.jpg')?>);">
    <div class="wrap-login100 p-t-30 p-b-50">
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
        <div class="container-login100-form-btn m-t-32">
          <button type="submit" class="login100-form-btn">Send</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

