<body>
<div class="limiter">
  
  <div class="container-login100" style="background-image: url(<?=base_url('assets/images/bg-02.jpg')?>);" id="particles-js">
  <div class="wrap-login100 p-t-30 p-b-50">
    <p class="login100-form-title p-b-41">Forgot Password</p>
    <form action="<?=base_url('adminlogin/forgotPassword')?>" method="post" class="login100-form validate-form p-b-33 p-t-5">
      <div class="form-group  has-feedback <?php if(!empty(form_error('femail'))): ?> has-error <?php endif?>">
        <input type="email" class="form-control" name="femail" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?=form_error('femail','<span class="help-block">','</span>')?>
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

