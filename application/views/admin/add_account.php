<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Register new account
      <!-- <small>it all starts here</small> -->
    </h1>
   <!--  <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Register</h3>
      </div>
      <div class="box-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6" style="float: none;margin: 0 auto;">
              <form action="<?=base_url('admin/add_account')?>" method="post">
                <div class="form-group has-feedback  <?php if(!empty(form_error('fname'))): ?> has-error <?php endif?>">
                  <input type="text" name="fname" class="form-control" placeholder="First name">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  <?=form_error('fname','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('lname'))): ?> has-error <?php endif?>">
                  <input type="text" name="lname" class="form-control" placeholder="Last name">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                   <?=form_error('lname','<span class="help-block">','</span>')?>
                </div>
                <!-- <div class="form-group has-feedback <?php if(!empty(form_error('uname'))): ?> has-error <?php endif?>">
                  <input type="uname" class="form-control" placeholder="Username">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  <?=form_error('uname','<span class="help-block">','</span>')?>
                </div> -->
                <div class="form-group has-feedback <?php if(!empty(form_error('email'))): ?> has-error <?php endif?>">
                  <input type="email" name="email" class="form-control" placeholder="Email">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                  <?=form_error('email','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('password'))): ?> has-error <?php endif?>">
                  <input type="password" name="password" class="form-control" placeholder="Password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                  <?=form_error('password','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('cpassword'))): ?> has-error <?php endif?>">
                  <input type="password" name="cpassword" class="form-control" placeholder="Re-type password">
                  <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                  <?=form_error('cpassword','<span class="help-block">','</span>')?>
                </div>
                <div class="row">
                  <div class="col-xs-4 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                  </div>
                  <div class="col-xs-4 pull-left">
                    <input type="reset" class="btn btn-default" value="Clear">
                  </div>
                  
                  <!-- /.col -->
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->