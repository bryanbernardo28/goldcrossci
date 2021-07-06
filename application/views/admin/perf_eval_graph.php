<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Graph
      <!-- <small>it all starts here</small> -->
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <div class="box box-default">
      <div class="box-header with-border">
        <h3 class="box-title">Performance Evaluation Graph</h3>
        <a href="<?=base_url('admin/perf_evals/').$evals->user_id?>" class="btn btn-success">Back</a>
        <!-- <a  class="btn btn-link pull-right" target="_blank" id="export_graph">Export</a> -->
        <form action="<?=base_url('admin/get_graph_image/'.$evals->user_id.'/'.$this->uri->segment(3))?>" method="post" target="_blank">
          <input type="hidden" name="chart_datas">
          <input type="hidden" name="table_datas">
          <button class="btn btn-link pull-right hidden" type="submit" id="submit_export">Export</button>
        </form>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <div class="chart-responsive">
              <canvas id="pieChart" height="110"></canvas>
            </div>
            <!-- ./chart-responsive -->
          </div>
        </div>
        <div id="table_datas">
          <div class="row justify-content-center">
            <div class="col-md-4 col-centered">
              <table class="table table-bordered">
                <tbody>
                  <tr>
                    <td>Total Points: </td>
                    <td><?=$evals->total_points?></td>
                  </tr>
                  <tr>
                    <td>Adjective Rating:</td>
                    <td><?=$evals->rating_adjective?></td>
                  </tr>
                  <tr>
                    <td>Descriptive Rating:</td>
                    <td><?=$evals->rating_descriptive?></td>
                  </tr>
                  <tr>
                    <td>Salary Increase:</td>
                    <td><?=$evals->increase?>%</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
      
      <!-- /.footer -->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper