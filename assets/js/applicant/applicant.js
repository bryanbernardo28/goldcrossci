$(document).ready(function(){
	$("#add_record_btn").click(function(e){
		e.preventDefault();

		var new_employ_record = "";
		new_employ_record += '<div class="row">';
		new_employ_record += '<div class="form-group col-lg-3">';
		new_employ_record += '<label for="Name_of_Company" class="control-label" style="font-size: 16px;">NAME OF COMPANY/ADDRESS</label>';
		new_employ_record += '<div>';
		new_employ_record += '<input class="form-control"  id="Name_of_Company" name="name_of_company[]" placeholder="Name of Company/Agency Address">';
		new_employ_record += '</div>';
		new_employ_record += '</div>';
		new_employ_record += '<div class="form-group col-md-2">';
		new_employ_record += '<label for="Period" class="control-label" style="font-size: 16px;">PERIOD</label>';
		new_employ_record += '<div>';
		new_employ_record += '<input class="form-control" id="Period" name="period_from[]" placeholder="From:">';
		new_employ_record += '</div>';
		new_employ_record += '<div>';
		new_employ_record += '<input class="form-control" id="Period" name="period_to[]" placeholder="To:">';
		new_employ_record += '</div>';
		new_employ_record += '</div>';
		new_employ_record += '<div class="form-group col-md-2">';
		new_employ_record += '<label for="SALARY" class="control-label" style="font-size: 16px;">SALARY</label>';
		new_employ_record += '<div>';
		new_employ_record += '<input class="form-control" id="SALARY" name="salary[]" placeholder="Salary">';
		new_employ_record += '</div>';
		new_employ_record += '</div>';
		new_employ_record += '<div class="form-group col-md-2">';
		new_employ_record += '<label for="POSITION" class="control-label">POSITION</label>';
		new_employ_record += '<input type="text" class="form-control" id="POSITION" name="position[]" placeholder="Positon">';
		new_employ_record += '</div>';
		new_employ_record += '<div class="form-group col-md-3">';
		new_employ_record += '<label for="Reason_For_Leaving" class="control-label">RFL</label>';
		new_employ_record += '<input type="text" class="form-control"  id="Reason_For_Leaving" name="rfl[]" placeholder="Reason for leaving">';
		new_employ_record += '</div>';
		new_employ_record += '</div>';
		new_employ_record += '<hr>';



		$(".experience").append(new_employ_record);
	});

	$("#add_tab5").click(function(e){
		e.preventDefault();
		var tab5 = "";
		tab5 += '<div class="row">';
		tab5 += '<div class="form-group col-md-4">';
		tab5 += '<label for="TOPIC_TITLE<" class="control-label" style="font-size: 16px;"></label>';
		tab5 += '<div>';
		tab5 += '<input class="form-control"  id="TOPIC_TITLE" placeholder="TOPIC/TITLE">';
		tab5 += '</div>';
		tab5 += '</div>';
		tab5 += '<div class="form-group col-md-3">';
		tab5 += '<label for="SPONSOR" class="control-label" style="font-size: 16px;"></label>';
		tab5 += '<div>';
		tab5 += '<input class="form-control" id="SPONSOR" placeholder="SPONSOR">';
		tab5 += '</div>';
		tab5 += '</div>';
		tab5 += '<div class="form-group col-md-2">';
		tab5 += '<label for="INCLUSIVE_DATES" class="control-label" style="font-size: 16px;"></label>';
		tab5 += '<div>';
		tab5 += '<input class="form-control" id="INCLUSIVE_DATES" placeholder="INCLUSIVE DATES">';
		tab5 += '</div>';
		tab5 += '</div>';
		tab5 += '<div class="form-group col-md-3">';
		tab5 += '<label for="SPEAKER" class="control-label" style="font-size: 16px;"></label>';
		tab5 += '<div>';
		tab5 += '<input class="form-control" id="SPEAKER" placeholder="SPEAKER">';
		tab5 += '</div>';
		tab5 += '</div>';
		tab5 += '</div>';
		tab5 += '<hr>';
		
		
		$(".row-tab5").append(tab5);
	});
});