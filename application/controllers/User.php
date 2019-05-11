<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_controller{

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
		$this->load->view('user/includes/header');
		$this->load->view('user/index');
		$this->load->view('user/includes/footer');
	}


	public function about_us(){
		$this->load->view('user/includes/header');
		$this->load->view('user/aboutus');
		$this->load->view('user/includes/footer');
	}

	public function try(){
		$this->load->view('user/includes/header');
		$this->load->view('user/try');
		$this->load->view('user/includes/footer');
	}

	public function job_posting(){

		$where = array(
			"job_vacancy !=" => 0,
			"job_posted !=" => 0 
		);

		$jobs = $this->Gcsa_model->fetchAll("jobs",$where);
		$datas = array("jobs" => $jobs);

		$this->load->view('user/includes/header');
		$this->load->view('user/jobs',$datas);
		$this->load->view('user/includes/footer');
	}

	public function application_form(){
		$this->load->view('user/includes/header');
		$this->load->view('user/application_form');
		$this->load->view('user/includes/footer');
	}
}