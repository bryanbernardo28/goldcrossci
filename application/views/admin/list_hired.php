
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
                    <th>Date Hired</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      if ($remarks) {
                        foreach ($remarks as $remarks_value) {
                          $apdata = json_decode($remarks_value->applicant_personal_data,true);
                    ?>
                    <tr>
                      <td><?=$apdata["first_name"]?></td>
                      <td><?=$apdata["family_name"]?></td>
                      <td><?=$apdata["gender"]?></td>
                      <td><?=$apdata["category"]?></td>
                      <td><?=date("M d, Y",$remarks_value->date_hired)?></td>
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