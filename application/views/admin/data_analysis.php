<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Analysis
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Clients</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manpower Predictions</h3>
               
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                  <th>Company</th>
                  <th>City</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  foreach($acc_admin as $admins_acc):
                  ?>
                  <tr>
                    
                    <td><?=$admins_acc->cc_name?></td>
                    
                    <td><?=$admins_acc->city?></td>
                    
                    
                    <td>
                      <a href="<?=base_url('admin/view_forecast/').$admins_acc->user_id?>" class="btn btn-warning">View Forecast</a>
                      
                      
                      <!-- /.modal -->
                    </td> 
                  </tr>
                  <?php
                  endforeach;
                  ?>
                </tbody>
              </table>
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