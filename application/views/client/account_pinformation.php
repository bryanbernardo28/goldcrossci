<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accounts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Accounts</a></li>
        <li><a href="#">Employee</a></li>
        <li class="active">Personal Information</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Employee Personal Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Position</th>
                  <th>Address</th>
                  <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if ($acc_client):
                  foreach($acc_client as $client_acc):
                  ?>
                  <tr>
                    <td><?=$client_acc->firstname?></td>
                    <td><?=$client_acc->lastname?></td>
                    <td><?=$client_acc->position?></td>
                   
                    <td><?=$client_acc->address?></td>
                    <td><?=$client_acc->gender == 1 ? "Male" : "Female"?></td>
                    
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
  <!-- /.content-wrapper