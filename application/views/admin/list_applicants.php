<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List of Applicants
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User Accounts</a></li>
        <li><a href="#">Applicant</a></li>
        <li class="active">With Experience</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Applicant with experience</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-12">
                  <a href="<?=base_url('admin/export_list_applicants')?>" target="_blank" class="btn btn-info pull-right">Export</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <!-- <th>Address</th> -->
                      <th>Gender</th>
                      <th>Position Applied</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($applicant) {
                      foreach($applicant as $exp_acc):
                      ?>
                      <tr>
                        <td><?=$exp_acc["firstname"]?></td>
                        <td><?=$exp_acc["lastname"]?></td>
                        <!-- <td><?=$exp_acc["address"]?></td> -->
                        <td><?=$exp_acc["gender"] == "Male" ? "Male" : "Female"?></td>
                        <td><?=$exp_acc["category"]?></td>
                      </tr>
                      
                      <?php
                      endforeach;
                      }
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