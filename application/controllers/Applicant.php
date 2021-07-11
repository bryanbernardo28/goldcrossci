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
		$header = array(
			"breadcrum_title" => "hide"
		);

		$this->load->view('applicant/includes/header',$header);
		$this->load->view('applicant/index');
		$this->load->view('applicant/includes/footer');
	}


	public function about_us(){
		$header = array(
			"breadcrum_title" => "About Us"
		);

		$this->load->view('applicant/includes/header',$header);
		$this->load->view('applicant/aboutus');
		$this->load->view('applicant/includes/footer');
	}

	public function applicant(){
		$header = array(
			"breadcrum_title" => "Applicant"
		);

		$this->load->view('applicant/includes/header',$header);
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

		$header = array(
			"breadcrum_title" => "Jobs"
		);

		$this->load->view('applicant/includes/header',$header);
		$this->load->view('applicant/jobs',$datas);
		$this->load->view('applicant/includes/footer');
	}


public function regex_check($str)
{
    if (preg_match("/^(?:'[A-Za-z](([\._\-][A-Za-z0-9])|[A-Za-z0-9])*[a-z0-9_]*')$/", $str))
    {
        $this->form_validation->set_message('regex_check', 'The %s field is not valid!');
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}


	public function application_form(){
		$header = array(
			"breadcrum_title" => "hide"
		);
		$this->load->view('applicant/includes/header',$header);
		


		//Error Validations For Personal Data
		$this->form_validation->set_rules('family_name', 'Family Name', 'required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('gender', 'Gender', 'required|alpha');
		$this->form_validation->set_rules('contact_no', 'Contact Number', 'required|alpha_numeric');
		$this->form_validation->set_rules('security_license_no','Security License No.','required|numeric');
		$this->form_validation->set_rules('category', 'Category', 'required|trim|alpha_numeric_spaces');
		if (empty($_FILES['resume']['name']))
		{
			$this->form_validation->set_rules('resume', 'Resume', 'required');
		}
		
		//Error Validations For Employment Record
		$exp_status = $this->input->post("exp");

		//Error Validations For Seminars / Training Attended
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('applicant/application_form');
		}
		else{
			$lastname = $this->input->post('family_name');
			$firstname = $this->input->post('first_name');
			if(!empty($_FILES['resume']['name'])){
				
				// Question image upload start
				$image_name = "resume_"."$lastname-$firstname";
				$config['upload_path'] = './assets/resume/';
				$config['allowed_types'] = 'pdf';
				$config['file_name'] = $image_name;
				$config['max_size'] = 0;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('resume'))
				{
					print_r($this->upload->display_errors());
					echo $this->input->post('resume');
					die();
				}
				else
				{
					$fileName = pathinfo($_FILES["resume"]["name"], PATHINFO_EXTENSION);
					$personal_data = array(
						"family_name" => $lastname,
						"first_name" => $firstname,
						"gender" => $this->input->post('gender'),
						"contact_no" => $this->input->post('contact_no'),
						"security_license_no" => $this->input->post('security_license_no'),
						"category" => $this->input->post('category'),
					);
		
					$insert_this = [
						"applicant_personal_data" => json_encode($personal_data),
						"experience_status" => $exp_status,
						"applicant_resume" => $image_name.".".$fileName
					];
		
					$this->Gcsa_model->insert("applicant",$insert_this);
					$this->load->view("admin/applicant_success");
				}
				// Question image upload end
			}
			
			

		}	

		
		
		$this->load->view('applicant/includes/footer');
	}
}