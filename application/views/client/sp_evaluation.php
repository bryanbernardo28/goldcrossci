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
            <table id="detachment_table" class="table table-bordered table-hover">
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
                if ($acc_client):
                foreach($acc_client as $clients_acc):
                ?>
                <tr>
                   <td><?=$clients_acc->firstname?></td>
                    <td><?=$clients_acc->lastname?></td>
                   
                    <td><?=$clients_acc->address?></td>
                    <td><?=$clients_acc->gender == 1 ? "Male" : "Female"?></td>
                  <td>
                    <a href="<?=base_url('client/sec_evaluation_form/').$clients_acc->user_id?>" class="btn btn-primary">Evaluate</a>
                  </td> 
                </tr>
                <?php
                endforeach;
                endif;
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