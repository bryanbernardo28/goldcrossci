$(document).ready(function(){
	$("#btn-add-eval-category").click(function(e){
		e.preventDefault();
		var count_category = $("input[name='question_category[]']").map(function(){return $(this).val();}).get().length;
		
		var	table_cat_id = "tbody-question-cat" + count_category;
		var btn_cat_id = "cat-" + count_category;
		var div_name = "cl-div-del-"+count_category;
		var eval_append = "";
		// eval_append += "<hr>";
		eval_append += "<div class='col-md-12 "+div_name+"'>";
		eval_append += "<div class='form-group row'>";
		eval_append += "<label class='col-sm-2 col-form-label'>Evaluation Label: </label>";
		eval_append += "<div class='col-sm-4'>";
		eval_append += "<input type='text' name='question_category[]' class='form-control' placeholder='Evaluation category'>";
		eval_append += "</div>";
		eval_append += "<div class='col-md-3 mb-3 pull-right'>";
		eval_append += "<button type='button' class='btn btn-primary btn-flat pull-right add_question float-right' id='"+btn_cat_id+"'>Add Question</button>";
		eval_append += "<button type='button' class='btn btn-danger btn-flat' id='"+btn_cat_id+"' onClick='remove_div(`"+div_name+"`)'>Remove</button>";
		eval_append += "</div>";
		eval_append += "</div>";
		eval_append += "<table class='table table-bordered table-hover myTable'>";
		eval_append += "<thead>";
		eval_append += "<tr>";
		eval_append += "<th scope='col' width='10%'>Question Rating</th>";    
		eval_append += "<th scope='col' width='10%'>Question Points</th>";
		eval_append += "<th scope='col'>Question</th>";
		eval_append += "<th scope='col' width='30'>Action</th>";
		eval_append += "</tr>";
		eval_append += "</thead>";
		eval_append += "<tbody id='"+table_cat_id+"' class='tbody-question'>";
		eval_append += "</tbody>";
		eval_append += "</table>";
		eval_append += "</div>";

		// console.log(eval_append);
		$(".add-category").append(eval_append);
	});
	$(document).on("click", ".add_question", function(e){
		e.preventDefault();
		var this_btn_id = $(this).attr("id");
		var split_id = this_btn_id.split("-")[1];
		console.log(this_btn_id);
		var question_num = $("input[name='question_points["+split_id+"][]']").map(function(){return $(this).val();}).get().length+1;

		
		$("#tbody-question-cat"+split_id).append("<tr>"+
										"<td>"+
										question_num+
										"<td>"+
						      			"<div class='form-group'><input type='text' name='question_points["+split_id+"][]' class='form-control'></div>"+
							      		"</td>"+
							      		"<td>"+
						      			"<div class='form-group'><input type='text' name='question_content["+split_id+"][]' class='form-control'></div>"+
							      		"</td>"+
							      		"<td>"+
						      			"<button type='button' class='btn btn-danger btn-flat' onClick='remove_Btn($(this),"+split_id+")'>Remove</button>"+
							      		"</td>"+
								    	"</tr>");
	});


	$("#btn-add-personnel-eval-category").click(function(){
		var count_category = $("input[name='personnel_eval_category[]']").map(function(){return $(this).val();}).get().length;
		var	table_cat_id = "tbody-personnel-question-cat" + count_category;
		var btn_cat_id = "cat-" + count_category;
		var div_name = "cl-div-del-"+count_category;
		var eval_append = "";
		eval_append += "<div class='col-md-12 "+div_name+"'>";
		eval_append += "<hr style='width: 100%; background-color: #fff; border-top: 3px double #8c8b8b;' />";
		eval_append += "<div class='form-group row'>";
		eval_append += "<label class='col-sm-2 col-form-label'>Evaluation Label: </label>";
		eval_append += "<div class='col-sm-4'>";
		eval_append += "<input type='text' name='personnel_eval_category[]' class='form-control' placeholder='Evaluation category'>";
		eval_append += "</div>";
		eval_append += "<div class='col-md-3 mb-3 pull-right'>";
		eval_append += "<button type='button' class='btn btn-primary btn-flat pull-right add_question_personnel float-right' id='"+btn_cat_id+"'>Add Question</button>";
		eval_append += "<button type='button' class='btn btn-danger btn-flat' id='"+btn_cat_id+"' onClick='remove_div(`"+div_name+"`)'>Remove Category</button>";
		eval_append += "</div>";
		eval_append += "</div>";
		eval_append += "<table class='table table-bordered table-hover' id='"+table_cat_id+"'>";
		eval_append += "<thead>";
		eval_append += "<tr>";
		eval_append += "<th scope='col'>Question Content</th>";
		eval_append += "<th scope='col' style='width:10%;'>Action</th>";
		eval_append += "</tr>";
		eval_append += "</thead>";
		eval_append += "<tbody id='"+table_cat_id+"' class='tbody-personnel-question questions'>";
		eval_append += "</tbody>";
		eval_append += "</table>";
		eval_append += "</div>";

		$(".row-personnel-category").append(eval_append);
	});
	
	$(document).on("click", ".add_question_personnel", function(e){
		e.preventDefault();
		var this_btn_id = $(this).attr("id");
		var split_id = this_btn_id.split("-")[1];
		var cat_cnt = $("input[name='personnel_eval_category[]']").map(function(){return $(this).val();}).get().length;
		var question_cnt = $('.questions tr').length+1;
		$("#tbody-personnel-question-cat"+split_id).append("<tr>"+
										// "<td>"+
										// question_cnt+
										// "</td>"+
										"<td>"+
						      			"<div class='form-group'><input type='text' name='personnel_question_content["+split_id+"][]' class='form-control'></div>"+
							      		"</td>"+
							      		"<td>"+
						      			"<button type='button' class='btn btn-danger btn-flat' onClick='remove_Btn($(this),"+split_id+")'>Remove Question</button>"+
							      		"</td>"+
								    	"</tr>");

	});

	$('.offense-select2').select2({
		theme: "bootstrap",
  		placeholder: 'Type Offense.',
  		width: 'resolve',
  		tags: true,
	});
	$('.rate-select2').select2({
		theme: "bootstrap",
		width: 'resolve',
	  	placeholder: 'Select rate number'
	});
});

function remove_Btn(tr_class_name,split_id){
	tr_class_name.closest('tr').remove();
	$(".index"+split_id).each(function (i){
       $(this).text(i+1);
    }); 
}

function remove_div(divname){
	// console.log(divname);
	console.log(divname);
	$("."+divname).remove();
}

