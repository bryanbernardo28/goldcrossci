<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Profile
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <!-- <li><a href="#"></a></li> -->
        <li class="active">Admin profile</li>
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

              <p class="text-muted text-center">Admin</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                <a href="<?=base_url('admin/edit_profile')?>" class="lsit-group-item pull-left">Edit Profile</a> <br>
                </li>
    
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
             

              <!-- <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Quezon City</p>
 -->
             

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">

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