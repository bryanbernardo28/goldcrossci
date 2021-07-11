
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      List of Hired Applicants
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url('admin/index2')?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">List of Hired Applicants</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
           <!--  <h3 class="box-title">Floater</h3> -->
          </div>
          <div class="box-body">
            <div class="row" style="margin-bottom: 10px;">
              <div class="col-md-12">
                <a href="<?=base_url('admin/export_list_hired')?>" target="_blank" class="btn btn-info pull-right">Export</a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Gender</th>
                    <th>Applied Position</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      if ($employees) {
                        foreach ($employees as $employee) {
                    ?>
                    <tr>
                      <td><?=$employee->firstname?></td>
                      <td><?=$employee->lastname?></td>
                      <td><?=($employee->gender == 1 ? "Male" : "Female")?></td>
                      <td><?=$employee->position?></td>
                    </tr>
                    <?php
                      }}
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
<!-- /.content-wrapper   -->