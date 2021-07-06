
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit Personal Information
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
        <h3 class="box-title">Edit</h3>
        <a href="<?=base_url('client/account_pinformation')?>" class="btn btn-success">Back</a>
      </div>
      <div class="box-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6" style="float: none;margin: 0 auto;">
              <form action="<?=base_url('client/edit_pinformation/').$pinformation->user_id?>" method="post">
                <div class="form-group has-feedback  <?php if(!empty(form_error('pinfo_fname'))): ?> has-error <?php endif?>">
                  <input type="text" name="pinfo_fname" class="form-control" value="<?=$pinformation->firstname?>" placeholder="First name">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  <?=form_error('pinfo_fname','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('pinfo_lname'))): ?> has-error <?php endif?>">
                  <input type="text" name="pinfo_lname" class="form-control" value="<?=$pinformation->lastname?>" placeholder="Last name">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                   <?=form_error('pinfo_lname','<span class="help-block">','</span>')?>
                </div>

                <div class="form-group has-feedback <?php if(!empty(form_error('pinfo_address'))): ?> has-error <?php endif?>">
                  <input type="text" name="pinfo_address" class="form-control" value="<?=$pinformation->address?>" placeholder="Address">
                  <span class="glyphicon glyphicon-heart form-control-feedback"></span>
                  <?=form_error('pinfo_address','<span class="help-block">','</span>')?>
                </div>


                <div class="form-group has-feedback">
                  <label class="radio-inline">
                    <input type="radio" name="pinfo_gender" value="1" <?=$pinformation->gender == 1 ? "checked" : "" ?>>
                    Male
                  </label>

                  <label class="radio-inline">
                    <input type="radio" name="pinfo_gender" value="2" <?=$pinformation->gender == 2 ? "checked" : "" ?>>
                    Female
                  </label>
                </div>

                <!-- <div class="form-group has-feedback <?php if(!empty(form_error('pinfo_company'))): ?> has-error <?php endif?>">
                  <input type="text" name="pinfo_company" class="form-control" value="<?=$detachment->ec_name?>" placeholder="Company">
                  <span class="glyphicon glyphicon-heart form-control-feedback"></span>
                  <?=form_error('pinfo_company','<span class="help-block">','</span>')?>
                </div> -->

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