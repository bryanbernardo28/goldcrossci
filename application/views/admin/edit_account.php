<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Edit account
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
        <h3 class="box-title">Edit Account</h3><br>
        <a href="<?=base_url('admin/account_admin')?>" class="btn btn-success">Back</a>
      </div>
      <div class="box-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6" style="float: none;margin: 0 auto;">
              <form action="<?=base_url('admin/'.$formaction.'/').$acc->user_id?>" method="post">
                <div class="form-group has-feedback  <?php if(!empty(form_error('fname'))): ?> has-error <?php endif?>">
                  <input type="text" name="fname" class="form-control" placeholder="First name" value="<?=$acc->firstname?>">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  <?=form_error('fname','<span class="help-block">','</span>')?>
                </div>
                <div class="form-group has-feedback <?php if(!empty(form_error('lname'))): ?> has-error <?php endif?>">
                  <input type="text" name="lname" class="form-control" placeholder="Last name" value="<?=$acc->lastname?>">
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                   <?=form_error('lname','<span class="help-block">','</span>')?>
                </div>

                <div class="form-group has-feedback <?php if(!empty(form_error('address'))): ?> has-error <?php endif?>">
                  <textarea class="form-control" name="address" rows="3" cols="50" placeholder="Address" style="resize: none;"><?=$acc->address?></textarea>
                  <?=form_error('address','<span class="help-block">','</span>')?>
                </div>

                <div class="form-group has-feedback <?php if(!empty(form_error('age'))): ?> has-error <?php endif?>">
                  <textarea class="form-control" name="age" rows="3" cols="50" placeholder="Age" style="resize: none;"><?=$acc->age?></textarea>
                  <?=form_error('age','<span class="help-block">','</span>')?>
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