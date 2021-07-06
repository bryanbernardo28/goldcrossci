  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2016 <a href="#">Hanijam Studio</a></strong> All rights
    reserved.
  </footer>

  

<!-- jQuery 3 -->

<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

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
<!-- <script src="<?=base_url()?>/assets/bower_components/chart.js/Chart.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?=base_url()?>/assets/dist/js/pages/dashboard2.js"></script> -->


<!-- AdminLTE App -->
<script src="<?=base_url()?>/assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>/assets/dist/js/demo.js"></script>


<!-- iCheck -->
<script src="<?=base_url()?>/assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(document).ready(function(){
    // $('#example1').DataTable();
    $('#detachment_table').DataTable();    
    

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
</body>
</html>