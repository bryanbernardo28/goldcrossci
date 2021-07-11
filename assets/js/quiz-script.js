var questions = {};
var container = document.getElementById('quizContainer');
var questionEl = document.getElementById('question');
var labelopt1 = document.getElementById('label_opt1');
var labelopt2 = document.getElementById('label_opt2');
var labelopt3 = document.getElementById('label_opt3');
var labelopt4 = document.getElementById('label_opt4');

var opt1 = document.getElementById('opt1');
var opt2 = document.getElementById('opt2');
var opt3 = document.getElementById('opt3');
var opt4 = document.getElementById('opt4');
var nextButton = document.getElementById('nextButton');
var resultCont = document.getElementById('result');

var currentQuestion = 0;
var score = 0;
var totQuestions = 0;


$(function(){
	$.get( base_url+"admin/exam_questions_api", function(data) {
		questions = JSON.parse(data);
		totQuestions = questions.length;
		loadQuestion(currentQuestion);
		console.log(base_url);
	});
});


function loadQuestion(questionIndex){
	var q = questions[questionIndex];
	var image = q.image_name;

	questionEl.textContent = (questionIndex + 1) + '. ' + q.question;
	labelopt1.textContent = q.option1;
	labelopt2.textContent = q.option2;
	labelopt3.textContent = q.option3;
	labelopt4.textContent = q.option4;

	opt1.value = q.option1;
	opt2.value = q.option2;
	opt3.value = q.option3;
	opt4.value = q.option4;

	if(image != null){
		// $("div#div_image").show();
		$("img#question_img").attr("src", base_url+"assets/question_images/"+q.image_name);
	}
	

};

function loadNextQuestion(){
	var selectedOption = document.querySelector('input[type=radio]:checked');

	if(!selectedOption){
		alert('Please select your answer!');
		return;
	}

	var answer = selectedOption.value;
	if (questions[currentQuestion].answer == answer) {
		score += parseInt(questions[currentQuestion].points);
	}
	selectedOption.checked = false;
	currentQuestion++;
	if (currentQuestion == totQuestions - 1) {
		nextButton.textContent = 'Submit';
	}

	if (currentQuestion == totQuestions) {
		container.style.display = 'none';
		resultCont.style.display = '';
		$(".display_text").text("Thank you for taking the exam.");
		// var fname = $("#fname").val();
		// var lname = $("#lname").val();
		var sec_lic_no = $("input#sec_lic_no_id").val();
		$.ajax({
			type : "post",
			url : base_url+"admin/submit_exam",
			data : { 
				"score": score ,
				"sec_lic_no":sec_lic_no
			},
			dataType : "json",
			success : function(res){
				console.log("Success response: " ,res);
			},
			error:function(res){
				console.log("Error response: ",res);
			}
		});
		// console.log(base_url);
		return;
	}
	loadQuestion(currentQuestion);


}


