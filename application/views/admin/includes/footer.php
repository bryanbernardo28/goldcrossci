  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">WebApp2 Project</a></strong> All rights
    reserved.
  </footer>

  

<!-- jQuery 3 -->

<script src="<?=base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- FastClick -->
<script src="<?=base_url()?>/assets/bower_components/fastclick/lib/fastclick.js"></script>

<!-- Sparkline -->
<script src="<?=base_url()?>/assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?=base_url()?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=base_url()?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?=base_url()?>/assets/dist/js/pages/dashboard2.js"></script> -->


<!-- AdminLTE App -->
<script src="<?=base_url()?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- ChartJS -->
<script src="<?=base_url()?>/assets/dist/js/demo.js"></script>


<!-- iCheck -->
<script src="<?=base_url()?>/assets/plugins/iCheck/icheck.min.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/select2/js/select2.js"></script>

<script type="text/javascript" src="<?=base_url()?>assets/js/evaluation.js"></script>
<script>
  var base_url = "<?=base_url()?>";
  $(document).ready(function(){
    $('#example1').DataTable();
    $('#example2').DataTable();
    

    // select for access
    $("#select_access").on("change",function(){
      var selected = $(this).val();
      if (selected == 3) {
        $("#input_company").removeClass("hidden");
      }
      else{
        $("#input_company").addClass("hidden"); 
      }
    });

    // regex for input type age
    $("input[name=age]").on("input",function(){
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  });

</script>
<?php if($page_name === 'perf_eval_submit'){ ?>
<script type="text/javascript">
  var json_eval = <?php echo json_encode($evals->evaluation_summary); ?>;
</script>
<script type="text/javascript" src="<?=base_url('assets/js/evaluation_graph.js')?>"></script>
<?php } ?>
<?php if($page_name === 'client_rank'): ?>
<script type="text/javascript" src="<?=base_url('assets/js/client_rank_graph.js')?>"></script>
<?php endif; ?>
<?php
if ($page_name === 'with_exp') {
?>
<script type="text/javascript" src="<?=base_url('assets/js/sms_send.js')?>"></script>
<?php
}
?>

<?php
if ($page_name == "view_forecast") {
?>
<script type="text/javascript">
  var mydata = "<?=json_encode($data)?>";
  var parsejson = JSON.parse(mydata);
  $(function () {
    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }
    var mydata = [];
    for (var i = 1; i <= parsejson.length-1;i++) {
      mydata.push(parsejson[i]);
    }

    // console.log(mydata);
    //-------------
    //- LINE CHART -
    //--------------
    var ctx = $('#lineChart').get(0).getContext('2d')
    // var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions = areaChartOptions
    // lineChartOptions.datasetFill = false
    // lineChart.Line(areaChartData, lineChartOptions);
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'],
        datasets: [{
            label: 'Year '+parsejson[0],
            borderColor: 'rgb(255, 99, 132)',
            data: mydata
        }]
    },
    options: lineChartOptions
    });

  })
</script>
<?php
}else if($page_name === "add_exam_questions"){
?>
<script src="<?=base_url('assets/js/exam/add_exam.js')?>"></script>
<?php } ?>
</body>
</html>