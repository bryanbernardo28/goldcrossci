<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Client Profile
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <!-- <li><a href="#"></a></li> -->
      <li class="active">Client profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="row">
      <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="<?=base_url('assets/profile_pictures/').$acc_info->image?>" alt="User profile picture">

            
             <h3 class="profile-username text-center"><?=$acc_info->firstname." ".$acc_info->lastname?> </h3>

            <p class="text-muted text-center">Client</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
              <a href="<?=base_url('client/edit_profile')?>" class="lsit-group-item pull-left">Edit Profile</a> <br>
              </li>

              <!-- <li class="list-group-item">
              <a href="<?=base_url('client/change_pass')?>" class="lsit-group-item pull-left">Change Password</a> <br>
              </li> -->
  
            </ul>

           
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
          <!-- <div class="box-header with-border">
            <h3 class="box-title">About Me</h3>
          </div> -->
          <!-- /.box-header -->
          <div class="box-body">
           
<!-- 
            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

            <p class="text-muted">Quezon City</p>
 -->
           

            
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom box-header with-border">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#change_password" data-toggle="tab">Change Password</a></li>
            <li><a href="#profile_picture" data-toggle="tab">Change Profile Picture</a></li>
            <a href="<?=base_url('client/client_profile')?>" class="btn btn-success">Back</a>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="change_password">
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
                    <form action="<?=base_url('client/edit_profile')?>" method="post">
                      <div class="form-group">
                        <input type="password" name="old_pass" class="form-control" placeholder="Old Password">
                      </div>

                      <div class="form-group has-feedback">
                        <input type="password" name="new_pass" class="form-control" placeholder="New Password">
                      </div>

                      <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="confirm_pass" placeholder="Confirm New Password">
                        
                      </div>
                      <div class="form-group">
                        <!-- <label for="exampleInputFile">Change profile picture:</label>
                        <input type="file" id="exampleInputFile" name="profile_picture"> -->

                        <!-- <p class="help-block">Example block-level help text here.</p> -->
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


            <div class="tab-pane" id="profile_picture">
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
                    <form action="<?=base_url('client/change_profile_picture')?>" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputFile">Change profile picture:</label>
                        <input type="file" id="exampleInputFile" name="profile_picture">

                        <!-- <p class="help-block">Example block-level help text here.</p> -->
                      </div>
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