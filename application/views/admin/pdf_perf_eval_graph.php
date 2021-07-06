<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/bootstrap4/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.css">
</head>
<body>
  <div class="container-fluid" id="chart_datas">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="chart-responsive">
          <canvas id="pieChart" height="100" class="d-none"></canvas>
        </div>
        <img id="url" width="1250">
      </div>
    </div>
    <div class="row justify-content-center mt-4" id="table_datas">
      <div class="col-md-4">
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


  <script src="<?=base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

  <script src="<?=base_url()?>/assets/bootstrap4/js/bootstrap.min.js"></script>

  <!-- ChartJS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->


  <script type="text/javascript">
    var json_eval = <?php echo json_encode($evals->evaluation_summary); ?>;
    var base_url = "<?=base_url()?>";
    var id = "<?=$this->uri->segment(3)?>";
  </script>
  <script type="text/javascript" src="<?=base_url('assets/js/evaluation_graph.js')?>"></script>
</body>
</html>