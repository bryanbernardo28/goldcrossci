<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Performance Evalution
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Performance Evalution</a></li>
      <li><a href="#">Performance Evalution</a></li>
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
                foreach($acc_admin as $admins_acc):
                ?>
                <tr>
                  <td><?=$admins_acc->firstname?></td>
                  <td><?=$admins_acc->lastname?></td>
                  <td><?=$admins_acc->address?></td>
                  <td><?=$admins_acc->gender == 1 ? "Male" : "Female"?></td>
                  <td>
                    <a href="<?=base_url('admin/p_evaluation/').$admins_acc->user_id?>" class="btn btn-primary">Evaluate</a>
                    <a href="<?=base_url('admin/perf_evals/').$admins_acc->user_id?>" class="btn btn-info">View Evaluations</a>
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