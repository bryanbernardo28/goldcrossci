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
$this->form_validation->set_rules('qualifier', 'Qualifier', 'alpha_numeric');
$this->form_validation->set_rules('maternal_name', 'Maternal Name', 'alpha');
$this->form_validation->set_rules('date_of_application', 'Date of application', 'required');
$this->form_validation->set_rules('gender', 'Gender', 'required|alpha');
$this->form_validation->set_rules('civil_status', 'Civil Status', 'required|alpha');
$this->form_validation->set_rules('religion', 'Religion', 'required|trim|alpha_numeric_spaces');
$this->form_validation->set_rules('citizenship', 'Citizenship', 'required|alpha');
$this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required');
$this->form_validation->set_rules('place_of_birth', 'Place of Birth', 'alpha_numeric_spaces');
$this->form_validation->set_rules('age', 'Age', 'required|alpha_numeric');
$this->form_validation->set_rules('height', 'Height', 'trim|alpha_numeric_spaces');
$this->form_validation->set_rules('weight', 'Weight', 'numeric');
$this->form_validation->set_rules('city_address', 'City Address', 'required|trim|alpha_numeric_spaces');
$this->form_validation->set_rules('contact_no', 'Contact Number', 'required|alpha_numeric');
$this->form_validation->set_rules('provincial_address', 'Provincial Address', 'alpha_numeric');
$this->form_validation->set_rules('security_license_no','Security License No.','required|numeric');
$this->form_validation->set_rules('expiration_date', 'Expiration Date', 'required');
$this->form_validation->set_rules('category', 'Category', 'required|trim|alpha_numeric_spaces');		
$this->form_validation->set_rules('security_training', 'Security Training', 'alpha_numeric');


		//Error Validations For Education
$this->form_validation->set_rules('elementary', 'Elementary', 'required|trim|alpha_numeric_spaces');
$this->form_validation->set_rules('e_course_major', 'Course/Major', 'required|trim|alpha_numeric_spaces');
$this->form_validation->set_rules('e_date_graduated', 'Date graduated', 'required');
$this->form_validation->set_rules('highschool', 'High School', 'required|trim|alpha_numeric_spaces');
$this->form_validation->set_rules('h_course_major', 'Course/Major', 'required|trim|alpha_numeric_spaces');
$this->form_validation->set_rules('h_date_graduated', 'Date graduated', 'required');
$this->form_validation->set_rules('college', 'College', 'required|trim|alpha_numeric_spaces');
$this->form_validation->set_rules('c_course_major', 'Course/Major', 'required|trim|alpha_numeric_spaces');
$this->form_validation->set_rules('c_date_graduated', 'Date graduated', 'required');
		
		//Error Validations For Employment Record
		$exp_status = $this->input->post("exp");
		if ($exp_status == 1) {
			$this->form_validation->set_rules('name_of_company[]', 'Name of Company/Agency Address', 'alpha_numeric_spaces');
			$this->form_validation->set_rules('period_from[]', 'period_from', 'alpha_numeric');
			$this->form_validation->set_rules('period_from[]', 'period_to', 'alpha_numeric');
			$this->form_validation->set_rules('salary[]', 'Salary', 'numeric');
			$this->form_validation->set_rules('position[]', 'Positon', 'trim|alpha_numeric_spaces');
			$this->form_validation->set_rules('rfl[]', 'Reason for leaving', 'trim|alpha_numeric_spaces');
		}


		//Error Validations For Seminars / Training Attended

		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('applicant/application_form');
		}
		else{

			$personal_data = array(

			"family_name" => $this->input->post('family_name'),
			"first_name" => $this->input->post('first_name'),
			"qualifier" => $this->input->post('qualifier'),	
			"maternal_name" => $this->input->post('maternal_name'),
			"date_of_application" => $this->input->post('date_of_application'),
			"gender" => $this->input->post('gender'),
			"civil_status" => $this->input->post('civil_status'),
			"religion" => $this->input->post('religion'),
			"citizenship" => $this->input->post('citizenship'),
			"date_of_birth" => $this->input->post('date_of_birth'),
			"place_of_birth" => $this->input->post('place_of_birth'),
			"age" => $this->input->post('age'),
			"height" => $this->input->post('height'),
			"weight" => $this->input->post('weight'),
			"city_address" => $this->input->post('city_address'),
			"contact_no" => $this->input->post('contact_no'),
			"provincial_address" => $this->input->post('provincial_address'),
			"security_license_no" => $this->input->post('security_license_no'),
			"expiration_date" => $this->input->post('expiration_date'),
			"category" => $this->input->post('category'),
			"security_training" => $this->input->post('security_training'),
			"service_record" => $this->input->post('service_record[]'),
			);

			$education = array(

			"elementary" => $this->input->post('elementary'),
			"e_course_major" => $this->input->post('e_course_major'),
			"e_course_major" => $this->input->post('e_course_major'),
			"e_date_graduated" => $this->input->post('e_date_graduated'),
			"highschool" => $this->input->post('highschool'),
			"h_course_major" => $this->input->post('h_course_major'),
			"h_honor_awards" => $this->input->post('h_honor_awards'),
			"h_date_graduated" => $this->input->post('h_date_graduated'),
			"college" => $this->input->post('college'),
			"c_course_major" => $this->input->post('c_course_major'),
			"c_honor_awards" => $this->input->post('c_honor_awards'),
			"c_date_graduated" => $this->input->post('c_date_graduated'),
			"post_grad" => $this->input->post('post_grad'),
			"pg_course_major" => $this->input->post('pg_course_major'),
			"pg_honor_awards" => $this->input->post('pg_honor_awards'),
			"pg_date_graduated" => $this->input->post('pg_date_graduated'),
			"special_course" => $this->input->post('special_course'),
			"sc_course_major" => $this->input->post('sc_course_major'),
			"sc_honor_awards" => $this->input->post('sc_honor_awards'),
			"sc_date_graduated" => $this->input->post('sc_date_graduated'),
			"commendations_received" => $this->input->post('commendations_received'),
			"nature" => $this->input->post('nature'),
			"granted_by" => $this->input->post('granted_by'),
			"year" => $this->input->post('year'),
			"licensure_exams_token" => $this->input->post('licensure_exams_token'),
			"date_taken" => $this->input->post('date_taken'),
			"rating" => $this->input->post('rating'),
			"reading" => $this->input->post('reading'),
			"speaking" => $this->input->post('speaking'),
			"writing" => $this->input->post('writing'),
			"machine_operated" => $this->input->post('machine_operated[]'),
			

			);

			$employment_record = array(

			"name_of_company" => $this->input->post('name_of_company'),
			"period_from" => $this->input->post('period_from'),
			"period_to" => $this->input->post('period_to'),
			"salary" => $this->input->post('salary'),
			"position" => $this->input->post('position'),
			"rfl" => $this->input->post('rfl'),


			);

			$seminars_ta = array(

			"topic" => $this->input->post('topic'),
			"sponsor" => $this->input->post('sponsor'),
			"inclusive_dates" => $this->input->post('inclusive_dates'),
			"speaker" => $this->input->post('speaker'),
	


			);

			$insert_this = [
				"applicant_personal_data" => json_encode($personal_data),
				"applicant_education" => json_encode($education),
				"applicant_employment_record" => json_encode($employment_record),
				"applicant_seminars_ta" => json_encode($seminars_ta),
				"experience_status" => $exp_status
			];

			$this->Gcsa_model->insert("applicant",$insert_this);
			// $this->Gcsa_model->fetchAll("applicant",["experience_status" => 1]);
			// redirect("admin/applicant/");
			$this->load->view("admin/applicant_success");
			

		}	

		
		
		$this->load->view('applicant/includes/footer');
	}
}