<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends CI_controller{

	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model("Gcsa_model");
		// $this->load->library('recaptcha');
		// if (!$this->session->isloggedinadmin) {
		//     redirect("adminlogin/login");
		// }
	}

	public function index(){
		$this->load->view('applicant/includes/header');
		$this->load->view('applicant/index');
		$this->load->view('applicant/includes/footer');
	}


	public function about_us(){
		$this->load->view('applicant/includes/header');
		$this->load->view('applicant/aboutus');
		$this->load->view('applicant/includes/footer');
	}

	public function applicant(){
		$this->load->view('applicant/includes/header');
		$this->load->view('applicant');
		$this->load->view('applicant/includes/footer');
	}

	public function job_posting(){

		$where = array(
			"job_vacancy !=" => 0,
			"job_posted !=" => 0 
		);

		$jobs = $this->Gcsa_model->fetchAll("jobs",$where);
		$datas = array("jobs" => $jobs);

		$this->load->view('applicant/includes/header');
		$this->load->view('applicant/jobs',$datas);
		$this->load->view('applicant/includes/footer');
	}

	public function application_form(){
		$this->load->view('applicant/includes/header');
		$this->load->view('applicant/application_form');
		$this->load->view('applicant/includes/footer');
	}
}