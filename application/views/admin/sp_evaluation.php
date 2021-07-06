<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Security Personnel Evaluation
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Security Personnel Evaluation</a></li>
      <li><a href="#">Security Personnel Evaluation</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Address</th>
                <th>Gender</th>
                <!-- <th>Gender</th> -->
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                foreach($acc_admin as $admin_acc):
                ?>
                <tr>
                  <td><?=$admin_acc->firstname?></td>
                  <td><?=$admin_acc->lastname?></td>
                  <td><?=$admin_acc->address?></td>
                  <td><?=$admin_acc->gender == 1 ? "Male" : "Female"?></td>
                  <td>
                    
                    <a href="<?=base_url('admin/jp_evals/').$admin_acc->user_id?>" class="btn btn-info">View Evaluations</a>
                    
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