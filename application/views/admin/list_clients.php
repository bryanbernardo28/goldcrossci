<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       List of Clients
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">List of Clients</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Client Accounts</h3>
               <a href="<?=base_url('admin/add_client')?>" class="btn btn-flat btn-primary">Add Account</a>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-12">
                  <a href="<?=base_url('admin/export_list_clients')?>" target="_blank" class="btn btn-info pull-right">Export</a>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>

                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Company</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Position</th>
                      <th>Gender</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($acc_admin as $admins_acc):
                      ?>
                      <tr>
                        <td><?=$admins_acc->firstname?></td>
                        <td><?=$admins_acc->lastname?></td>
                        <td><?=$admins_acc->cc_name?></td>
                        <td><?=$admins_acc->address?></td>
                        <td><?=$admins_acc->city?></td>
                        <td><?=$admins_acc->position?></td>
                        <td><?=$admins_acc->gender == 1 ? "Male" : "Female"?>

                      </tr>
                      <?php
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->