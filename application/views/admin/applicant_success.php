<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>">
</head>
<body>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Application Form</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Your Application form has been sent. Kindly wait for 24 hours for evaluation. Goldcross Security Agency will send you an sms for the next process.
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
	      </div>
	    </div>
	  </div>
	</div>
	
	<script type="text/javascript" src="<?=base_url('assets/bower_components/jquery/dist/jquery.js')?>"></script>
	<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	<script type="text/javascript">
		var base_url = "<?=base_url()?>";
		$('#exampleModal').modal('show');
		$('#exampleModal').on('hidden.bs.modal', function (e) {
			  window.location.href = base_url + "applicant/application_form";
		});
	</script>
</body>
</html>