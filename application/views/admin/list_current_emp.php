<!--Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        List of Current Employees
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home </a></li>
        <li><a href="#">Reports</a></li>
        <li class="active">List of Current Employees</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Employee Personal Information</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row" style="margin-bottom: 10px;">
                <div class="col-md-12">
                  <a href="<?=base_url('admin/export_list_current_emp')?>" target="_blank" class="btn btn-info pull-right">Export</a>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Address</th>
                      <th>Gender</th>
                   
                    </tr>
                    </thead>
                    <tbody>
                    <?php if ($employees): ?>
                      <?php foreach ($employees as $employees_value): ?>
                        <tr>
                          <td><?= $employees_value->firstname ?></td>
                          <td><?= $employees_value->lastname ?></td>
                          <td><?= $employees_value->address ?></td>
                          <td><?= $employees_value->gender == 1 ? "Male" : "Female" ?></td>
                        </tr>
                      <?php endforeach ?>
                    <?php endif ?>
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