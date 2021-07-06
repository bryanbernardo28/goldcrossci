<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Questions extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->database('Gcsa_model');
	}

	public function quizdisplay()
	{
		$this->load->model('Gcsa_model');
		$this->data['questions'] = $this->Gcsa_model->getQuestions();
		$this->load->view('play_quiz', $this->data);
	}
	
		public function resultdisplay()
	{
		$this->data['checks'] = array(
		     'ques1' => $this->input->post('quizid1'),
		     'ques2' => $this->input->post('quizid2'),
			 'ques4' => $this->input->post('quizid4'),
			 'ques5' => $this->input->post('quizid5'),
		     'ques6' => $this->input->post('quizid6'),
			 'ques7' => $this->input->post('quizid7'),
			 'ques8' => $this->input->post('quizid8'),
			 'ques9' => $this->input->post('quizid9'),
		     'ques10' => $this->input->post('quizid10'),
			 'ques11' => $this->input->post('quizid11'),
			 'ques12' => $this->input->post('quizid12'),
			 'ques13' => $this->input->post('quizid13'),
			 'ques14' => $this->input->post('quizid14'),
			 'ques15' => $this->input->post('quizid15'),
			 'ques16' => $this->input->post('quizid16'),
			 'ques17' => $this->input->post('quizid17'),
			 'ques18' => $this->input->post('quizid18'),
			 'ques19' => $this->input->post('quizid19'),
			 'ques20' => $this->input->post('quizid20'),
			 'ques21' => $this->input->post('quizid21'),

		);

        $this->load->model('Gcsa_model');
		$this->data['results'] = $this->Gcsa_model->getQuestions();
		$this->load->view('result_display', $this->data);
	}
}

