
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Detachment
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
        <a href="<?=base_url('admin/account_detachment')?>" class="btn btn-success">Back</a>
      </div>
      <div class="box-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6" style="float: none;margin: 0 auto;">
              <form action="<?=base_url('admin/edit_detachment/').$detachment->user_id?>" method="post">
                <div class="form-group has-feedback  <?php if(!empty(form_error('ec_fname'))): ?> has-error <?php endif?>">
                  <input type="text" name="ec_fname" class="form-control" value="<?=$detachment->firstname?>" placeholder="First name">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  <?=form_error('ec_fname','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('ec_lname'))): ?> has-error <?php endif?>">
                  <input type="text" name="ec_lname" class="form-control" value="<?=$detachment->lastname?>" placeholder="Last name">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                   <?=form_error('ec_lname','<span class="help-block">','</span>')?>
                </div>

                <div class="form-group has-feedback <?php if(!empty(form_error('ec_company'))): ?> has-error <?php endif?>">
                  <input type="text" name="ec_company" class="form-control" value="<?=$detachment->ec_name?>" placeholder="Company">
                  <span class="glyphicon glyphicon-heart form-control-feedback"></span>
                  <?=form_error('ec_company','<span class="help-block">','</span>')?>
                </div>

                <div class="form-group has-feedback <?php if(!empty(form_error('ec_branch'))): ?> has-error <?php endif?>">
                  <input type="text" name="ec_branch" class="form-control" value="<?=$detachment->ec_branch?>" placeholder="Branch">
                  <span class="glyphicon glyphicon-heart form-control-feedback"></span>
                  <?=form_error('ec_branch','<span class="help-block">','</span>')?>
                </div>

                <div class="form-group has-feedback <?php if(!empty(form_error('ec_position'))): ?> has-error <?php endif?>">
                  <input type="text" name="ec_position" class="form-control" value="<?=$detachment->position?>" placeholder="Position">
                  <span class="glyphicon glyphicon-heart form-control-feedback"></span>
                  <?=form_error('ec_position','<span class="help-block">','</span>')?>
                </div>
               


               

                <div class="row">
                  <div class="col-xs-4 pull-right">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
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