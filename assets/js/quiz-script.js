var currentQuestion = 0;
var score = 0;
var totQuestions = questions.length;

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

function loadQuestion(questionIndex){
	var q = questions[questionIndex];

	questionEl.textContent = (questionIndex + 1) + '. ' + q.question;
	labelopt1.textContent = q.option1;
	labelopt2.textContent = q.option2;
	labelopt3.textContent = q.option3;
	labelopt4.textContent = q.option4;

	opt1.value = q.option1;
	opt2.value = q.option2;
	opt3.value = q.option3;
	opt4.value = q.option4;

};

function loadNextQuestion (){
	var selectedOption = document.querySelector('input[type=radio]:checked');

	if(!selectedOption){
		alert('Please select your answer!');
		return;
	}

	var answer = selectedOption.value;
	if (questions[currentQuestion].answer == answer) {
		score += 5;
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
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var fetch_class = $.post(base_url+"Admin/submit_exam", { "score": score ,"fname":fname,"lname":lname}, function(data){
			console.log(data);
		}, "json");

		console.log(base_url);
		return;
	}
	loadQuestion(currentQuestion);


}
loadQuestion(currentQuestion);

