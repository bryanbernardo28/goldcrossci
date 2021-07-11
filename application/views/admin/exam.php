<body>
	<div id="quizContainer" class="container">
		<div class="form-group">
		    <label>Firstname:</label>
		    <input type="text" class="form-control" id="fname">
	  	</div>
	  	<div class="form-group">
		    <label for="email">Lastname:</label>
		    <input type="text" class="form-control" id="lname">
	  	</div>
		<div class="form-group">
		    <label for="sec_lic_no">Security License No.:</label>
		    <input type="text" class="form-control" id="sec_lic_no">
	  	</div>
		<div class="title">Gold Cross Assessment Exam</div>
		<div class="subtitle">Numerical Reasoning / Verbal Reasoning</div>
		<div id="question" class="question"></div>
		<div id="div_image" style="display: none;"><img id="question_img" /></div>
		<label class="option"> <input type="radio" name="option" value="1" id="opt1" /><span id="label_opt1">  </span></label>
		<label class="option"> <input type="radio" name="option" value="2" id="opt2" /> <span id="label_opt2">  </span> </label>
		<label class="option"> <input type="radio" name="option" value="3" id="opt3" /> <span id="label_opt3">  </span> </label>
		<label class="option"> <input type="radio" name="option" value="4" id="opt4" /> <span id="label_opt4">  </span> </label>
		<button id="nextButton" class="next-btn" onclick="loadNextQuestion();">Next Question</button>
	</div>
	<div id="result" class="container result" style="display:none;">
		<span class="display_text"></span>
	</div>