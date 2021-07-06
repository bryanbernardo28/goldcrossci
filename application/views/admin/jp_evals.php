<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Performance Evalutions
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Performance Evalution</a></li>
      <li><a href="#">Performance Evalutions</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Employee Personal Evaluations</h3>
            <a href="<?=base_url('admin/sp_evaluation')?>" class="btn btn-success">Back</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Evaluator</th>
                <th>Evaluation Date</th>
                <!-- <th>Gender</th> -->
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
                <?php
                if ($jp_evals) {
                foreach($jp_evals as $jp_evals_value):
                ?>
                <tr>
                  <td><?=$jp_evals_value->jp_evaluator?></td>
                  <td><?=date('M j, Y h:i A',$jp_evals_value->jp_evaluation_date)?></td>
                  <td>
                    <a href="<?=base_url('admin/jp_evals_submit/').$jp_evals_value->jp_id?>" class="btn btn-info">View</a>
                  </td> 
                </tr>
                <?php
                endforeach;
                }
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