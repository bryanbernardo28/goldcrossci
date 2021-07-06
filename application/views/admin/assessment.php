
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Assessment
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?=base_url('admin/index2')?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Assessment</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <!-- <h3 class="box-title">Assessment</h3> -->
          </div>
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Applied Position</th>
                <th>Score</th>
                <th>Remarks</th>
                <th>Date of Exam</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  if ($assess) {
                    foreach ($assess as $assess_value) {
                      $apdata = json_decode($assess_value->applicant_personal_data,true);
                ?>
                <tr>
                  <td><?=$apdata["first_name"]?></td>
                  <td><?=$apdata["family_name"]?></td>
                  <td><?=$apdata["gender"]?></td>
                  <td><?=$apdata["category"]?></td>
                  <td><?=$assess_value->score?></td>
                  <td><?=$assess_value->remarks?></td>
                  <td><?=date("M d, Y",$assess_value->date_exam)?></td>
                  <td>
                    <a href="<?=base_url('admin/submit_hired/'.$assess_value->remarks_id)?>" class="btn btn-primary">Hire</a>
                  </td>
                </tr>
                <?php
                  }}
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