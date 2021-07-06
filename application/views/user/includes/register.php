<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <h1 href="../../index2.html"><b>Gold Cross Security & Investigation Agency</b></h1>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new account</p>

    <form action="<?=base_url('adminlogin/register')?>" method="post">
      <div class="form-group has-feedback  <?php if(!empty(form_error('fname'))): ?> has-error <?php endif?>">
        <input type="fname" class="form-control" placeholder="First name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?=form_error('fname','<span class="help-block">','</span>')?>
      </div>
      <div class="form-group has-feedback <?php if(!empty(form_error('lname'))): ?> has-error <?php endif?>">
        <input type="lnam" class="form-control" placeholder="Last name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
         <?=form_error('lname','<span class="help-block">','</span>')?>
      </div>
      <div class="form-group has-feedback <?php if(!empty(form_error('uname'))): ?> has-error <?php endif?>">
        <input type="uname" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?=form_error('uname','<span class="help-block">','</span>')?>
      </div>
      <div class="form-group has-feedback <?php if(!empty(form_error('email'))): ?> has-error <?php endif?>">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?=form_error('email','<span class="help-block">','</span>')?>
      </div>
      <div class="form-group has-feedback <?php if(!empty(form_error('password'))): ?> has-error <?php endif?>">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?=form_error('password','<span class="help-block">','</span>')?>
      </div>
      <div class="form-group has-feedback <?php if(!empty(form_error('password'))): ?> has-error <?php endif?>">
        <input type="password" class="form-control" placeholder="Re-type password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <?=form_error('password','<span class="help-block">','</span>')?>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>

        </div>

        <input type="reset" class="btn btn-default" value="Clear">
        <!-- /.col -->
      </div>
    </form>

    

    <a href="<?=base_url('adminlogin/login')?>" class="text-center">Already have an account? Sign in</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->