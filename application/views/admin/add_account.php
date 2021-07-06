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
                  <input type="text" name="fname" class="form-control" value="<?=set_value('fname');?>" placeholder="First name">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  <?=form_error('fname','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('lname'))): ?> has-error <?php endif?>">
                  <input type="text" name="lname" class="form-control" value="<?=set_value('lname');?>" placeholder="Last name">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                   <?=form_error('lname','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('address'))): ?> has-error <?php endif?>">
                  <input type="text" class="form-control" name="address" value="<?=set_value('address');?>" placeholder="Address">
                  <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                  <?=form_error('address','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('position'))): ?> has-error <?php endif?>">
                  <input type="text" name="position" class="form-control" value="<?=set_value('age');?>" placeholder="Position">
                  <span class="glyphicon glyphicon-heart form-control-feedback"></span>
                  <?=form_error('position','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('email'))): ?> has-error <?php endif?>">
                  <input type="email" name="email" class="form-control" value="<?=set_value('email');?>" placeholder="Email">
                  <span class="glyphicon glyphicon-heart form-control-feedback"></span>
                  <?=form_error('email','<span class="help-block">','</span>')?>
                </div>

                <!-- <?php $gender = set_value("gender"); ?>
                <div class="form-group has-feedback <?php if(!empty(form_error('gender'))): ?> has-error <?php endif?>" >
                  <select class="form-control" name="gender">
                    <option value="" disabled <?= $gender=="" ? 'selected' : '' ?> >Gender</option>
                    <option value="1" <?=$gender=="1" ? 'selected' : '' ?> >Male</option>
                    <option value="2" <?=$gender=="2" ? 'selected' : '' ?> >Female</option>
                  </select>
                  <?=form_error('gender','<span class="help-block">','</span>')?>
                </div> -->

                <?php $access = set_value("access"); ?>
                <div class="form-group has-feedback <?php if(!empty(form_error('access'))): ?> has-error <?php endif?>">
                  <select class="form-control" name="access" id="select_access">
                    <option value="" disabled <?=$access=="" ? 'selected' : '' ?> >Select Account Type</option>
                    <option value="1" <?=$access=="1" ? 'selected' : '' ?> >Admin</option>
                    <option value="2" <?=$access=="2" ? 'selected' : '' ?> >Employee</option>
                    <option value="3" <?=$access=="3" ? 'selected' : '' ?> >Client</option>
                  </select>
                  <?=form_error('access','<span class="help-block">','</span>')?>
                </div>

                <div class="form-group has-feedback <?php if(!empty(form_error('company'))): ?> has-error <?php endif?> <?=set_value('access') == "3" ?  : 'hidden' ?>" id="input_company">
                  <input type="text" name="company" class="form-control" placeholder="Company">
                  <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
                  <?=form_error('company','<span class="help-block">','</span>')?>
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