<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Job Request
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <!-- <li><a href="#"></a></li> -->
      <li class="active">Job Request</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
     
      <div class="col-md-9">
        <div class="nav-tabs-custom box-header with-border">
          <ul class="nav nav-tabs">
            <!-- <li class="active"><a href="#change_password" data-toggle="tab">Change Password</a></li>
            <li><a href="#profile_picture" data-toggle="tab">Change Profile Picture</a></li> -->
            <a href="<?=base_url('client/dashboard')?>" class="btn btn-success">Back</a>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane">
              <div class="container-fluid">
                <?php
                if (validation_errors()) {
                ?>
                <div class="alert alert-danger">
                  <?php echo validation_errors(); ?>
                </div>
                <?php
                }
                ?>
                <div class="row">
                  <div class="col-md-6" style="float: none;margin: 0 auto;">
                    <form action="<?=base_url('client/job_request')?>" method="post">
                      <div class="form-group has-feedback <?php if(!empty(form_error('guard_type'))): ?> has-error <?php endif?>">
                         <?php $guard = set_value("guard_type"); ?>
                        <select class="form-control">
                    <option value="" disabled <?= $guard=="" ? 'selected' : '' ?> >Guard Type</option>
                    <option> Licensed Security Officer</option>
                    <option> Licensed Security Guards </option>
                    <option> Licensed Lady Guards/CCTV Operators </option>

                  </select>
                      </div>

                      
                      <div class="form-group">
                        <?php $gender = set_value("gender"); ?>
                <div class="form-group has-feedback <?php if(!empty(form_error('gender'))): ?> has-error <?php endif?>" >
                  <select class="form-control" name="gender">
                    <option value="" disabled <?= $gender=="" ? 'selected' : '' ?> >Gender</option>
                    <option value="1" <?=$gender=="1" ? 'selected' : '' ?> >Male</option>
                    <option value="2" <?=$gender=="2" ? 'selected' : '' ?> >Female</option>
                  </select>
                  <?=form_error('gender','<span class="help-block">','</span>')?>
                </div>  
                      </div>

                      <div class="form-group">
                       <p> <strong> Quantity: </strong>  <input type="number" name="quantity" min="0" max="100" value="5"> </p>
                          

                      </div>
                      <div class="row">
                        <div class="col-xs-5 pull-right">
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


            <div class="tab-pane" id="guard">
              <div class="container-fluid">
                <?php
                if (validation_errors()) {
                ?>
                <div class="alert alert-danger">
                  <?php echo validation_errors(); ?>
                </div>
                <?php
                }
                ?>
                <div class="row">
                  <div class="col-md-12" style="float: none;margin: 0 auto;">
                    <form action="<?=base_url('client/job_request')?>" method="post" enctype="multipart/form-data">
                     
                      <div class="row">
                        <div class="col-xs-2 pull-right">
                          <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper