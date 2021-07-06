// $.post( "test.php", { func: "getNameAndTime" }, function( data ) {
//   console.log( data.name ); // John
//   console.log( data.time ); // 2pm
// }, "json");

$(document).ready(function(){
	// $(".btn-send-sms").click(function(){
	// 	// alert($(this).attr("id"));
	// 	var contact_number = $(this).attr("id");

	// 	$.post( base_url + "/admin/sendsms_withexp", { cnumber: contact_number }, function( data ) {
	// 		if (data.status == 0) {
	// 			$(".sms-sent-message").text("Text message has been sent to "+ "+63" + contact_number);
	// 			$('#sent_success_modal').modal('show');
	// 			// alert("sent to " + data.number);
	// 			console.log("Message has been sent.");
	// 		}
	// 		else{
	// 			$("#sent_success_modal").attr('class', 'modal modal-danger fade');
	// 			$(".sms-sent-message").text("Text message has not been sent to "+ "+63" + contact_number);
	// 			$('#sent_success_modal').modal('show');
	// 			console.log("Message has been sent.");

	// 		}
	// 	}, "json");
	// });


	$(".btn-send-sms-wexp").click(function(){
		var sms_content = $("input[name='sms_content_val']:checked").val();
		$("textarea[name='sms_content']").val(sms_content);
	});

	$('input[type=radio][name=sms_content_val]').change(function() {
	    $("textarea[name=sms_content]").val(this.value);
	});

	$(".btn-send-sms").click(function(){
		var num = $(this).attr("id");
		var sms_content = $("#my-sms-content").val();

		console.log(sms_content);
		// $.ajax({
	 //      type : "post",
	 //      url : base_url+"admin/sendsms_withexp",
	 //      data : {
	 //        sms_content : sms_content,
	 //        num : num
	 //      },
	 //      dataType : "json",
	 //      success : function(res){
	 //      	console.log(res);
	 //        if (res.has_error) {
	 //        	$(".has-feedback").addClass("has-error");
	 //        	$("textarea[name='sms_content']").after("<span class='help-block'>"+res.errors["sms_content"]+"</span>");
	 //        }
	 //        else{
	 //        	$(".has-feedback").removeClass("has-error");
	 //        	$("textarea[name='sms_content']").next("span").remove();
	 //        	$("#textModal").modal("hide");
	 //        	if (res.status == "0") {
	 //        		$(".sms-sent-message").text("Text message has been sent to " + res.number);
		// 			$('#sent_success_modal').modal('show');
		// 			console.log(res.status);
	 //        	}
	 //        	else{
	 //        		$("#sent_success_modal").attr('class', 'modal modal-danger fade');
		// 			$(".sms-sent-message").text("Text message has not been sent to "+ res.number);
		// 			$('#sent_success_modal').modal('show');
		// 			console.log(res.status);
	 //        	}

	 //        }
	 //      }
	 //      ,
	 //      error:function(res){
	 //        console.log("Error");
	 //          console.log(res);
	 //      }
	 //    });
	});
})