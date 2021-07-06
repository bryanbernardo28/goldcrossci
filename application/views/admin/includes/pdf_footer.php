
	<script src="<?=base_url()?>/assets/bower_components/jquery/dist/jquery.min.js"></script>

	<script src="<?=base_url()?>/assets/bootstrap4/js/bootstrap.min.js"></script>

	<!-- ChartJS -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->


	<script type="text/javascript">
	  var json_eval = <?php echo json_encode($evals->evaluation_summary); ?>;
	</script>
	<script type="text/javascript" src="<?=base_url('assets/js/evaluation_graph.js')?>"></script>
</body>
</html>