<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model("Gcsa_model");
		$this->load->library('recaptcha');
		if (!$this->session->isloggedinadmin) {
		    redirect("adminlogin/login");
		}
	}

	

	public function index2()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "index2",
		);

		$this->load->view('admin/includes/header',$uinfo);
		$this->load->view('admin/index2');
		$this->load->view('admin/includes/footer');
	}

	public function register()
	{

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "register",
		);


		$this->load->view("admin/includes/header",$uinfo);

		$firstname = $this->input->post('fname',true);
		$lastname = $this->input->post('lname',true);
		$username  = $this->input->post('uname',true);
		$email = $this->input->post('email',true);
		$password = $this->input->post('password',true);
		$cpassword = $this->input->post('cpassword',true);

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/register");
		}
		else{

			$this->load->helper('string');
			$verification_code = random_string('alnum',6);
			$userinfo = [

				'firstname' =>$firstname,
				'lastname' => $lastname,
				'email' => 	  $email,
				'password' => $password,
				'verification_code' => $verification_code,
				];

				$this->load->library('email');
         
         $config = array(
             'protocol'      => 'smtp',
             'smtp_host'     => 'ssl://smtp.gmail.com',
             'smtp_port'     => 465,
             'smtp_user'     => "jsprbernardo@gmail.com",
             'smtp_pass'     => "bernardopassword",
             'mailtype'      => 'html',
             'charset'       => 'utf-8'
         );

         $this->email->initialize($config);
         $this->email->set_newline("\r\n");
         
         $message = "<h1>Email Verification</h1>";
         
         $this->email->to($userinfo['username']); // TATANGGAP
         $this->email->from('jsprbernardo@gmail.com'); // SENDER
         $this->email->subject("CI Email Message");
         
         $data = array('name'=>"Valid User!",'message'=>$message ,'code'=>$verification_code);
         
         $this->email->message($this->load->view('email_message',$data,true));
         
         if($this->email->send() == FALSE){
             echo $this->email->print_debugger();
         }else{
             echo "Email sent succesfully!";
             $this->Gcsa_model->insert("accounts",$userinfo);
             redirect("admin/register");

         }

		}
		

		$this->load->view("admin/includes/footer");
	}





 	public function verify(){
        $code = $this->uri->segment(3);
        $this->Gcsa_model->update('accounts',['status'=>1],['verification_code'=>$code]);
        redirect('login');
    }


	

	public function account_admin(){


		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_admin",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>1));
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/account_admin",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function account_employees(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_employees",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>2));
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/account_employees",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function account_client(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_client",
		);

		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>3));
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/account_clients",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function account_applicant(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_applicant",
		);

		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>4));
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/account_applicant",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function add_account(){


		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_account",
		);


		$this->load->view("admin/includes/header",$uinfo);

		$firstname = $this->input->post('fname',true);
		$lastname = $this->input->post('lname',true);
		$address = $this->input->post('address',true);
		$age= $this->input->post('age',true);
		$gender = $this->input->post('genderspecific',true);
		

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required');
		$this->form_validation->set_rules('genderspecific', 'Gender', 'required');
		$this->form_validation->set_rules('access', 'Access', 'required');
		$this->form_validation->set_rules('company', 'Company', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_account");
		}
		else{

			$this->load->helper('string');
			$verification_code = random_string('alnum',6);
			$userinfo = [

				'firstname' =>$firstname,
				'lastname' => $lastname,
				'home' => $address,
				/*'email' => 	  $email,*/
				'password' => $password,
				'verification_code' => $verification_code,
				];

				/*$this->load->library('email');
         
	         $config = array(
	            'protocol'      => 'smtp',
	            'smtp_host'     => 'ssl://smtp.gmail.com',
	            'smtp_port'     => 465,
	            'smtp_user'     => "",
	            'smtp_pass'     => "",
	            'mailtype'      => 'html',
	            'charset'       => 'utf-8'
	         );*/

         $this->Gcsa_model->insert("accounts",$userinfo);

			redirect("admin/add_account");

		}

		$this->load->view("admin/includes/footer");
	}

	public function delete_admin(){
		$acc_id = $this->uri->segment(3);
		$acc_status = $this->uri->segment(4);
		if ($acc_status == 0) {
			$acc_status = 1;
		}
		else{
			$acc_status = 0;
		}
		$this->Gcsa_model->edit("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
		redirect("admin/account_admin"); //admin account



	}

	public function delete_employees(){
		$acc_id = $this->uri->segment(3);
		$acc_status = $this->uri->segment(4);
		if ($acc_status == 0) {
			$acc_status = 1;
		}

		else {

			$acc_status = 0;
		}

		$this->Gcsa_model->edit("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
		redirect("admin/account_employees"); //employees account

	}

	public function delete_client(){
		$acc_id = $this->uri->segment(3);
		$acc_status = $this->uri->segment(4);
		if ($acc_status == 0) {
			$acc_status = 1;
		}

		else {

			$acc_status = 0;
		}

		$this->Gcsa_model->edit("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
		redirect("admin/account_client"); //clients account

	}

	public function delete_applicant(){
		$acc_id = $this->uri->segment(3);
		$acc_status = $this->uri->segment(4);
		if ($acc_status == 0) {
			$acc_status = 1;
		}

		else {

			$acc_status = 0;
		}

		$this->Gcsa_model->edit("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
		redirect("admin/account_applicant"); //applicant account

	}

	public function edit_admin(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_account",
		);


		$edit_account_info = $this->Gcsa_model->fetchAll("accounts",array("user_id"=>$acc_id));
		$edit_account_info = $edit_account_info[0];

		$body = array(
			"acc" => $edit_account_info,
			"formaction" => "edit_admin",
		);


		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_account",$body);
		}
		else{
			$fname = $this->input->post("fname",true);
			$lname = $this->input->post("lname",true);
			$address = $this->input->post("address",true);
			$age = $this->input->post("age",true);
			$datas = array(
				"firstname" => $fname,
				"lastname" => $lname,
				"address" => $address,
				"age" => $age
			);

			$this->Gcsa_model->edit("accounts" , $datas , array("user_id"=>$acc_id));
			redirect("admin/account_admin");

		}

		$this->load->view("admin/includes/footer");




	}



	public function edit_employee(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_account",
		);


		$edit_account_info = $this->Gcsa_model->fetchAll("accounts",array("user_id"=>$acc_id));
		$edit_account_info = $edit_account_info[0];

		$body = array(
			"acc" => $edit_account_info,
			"formaction" => "edit_employee",
		);


		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_account",$body);
		}
		else{
			$fname = $this->input->post("fname",true);
			$lname = $this->input->post("lname",true);
			$address = $this->input->post("address",true);
			$age = $this->input->post("age",true);
			$datas = array(
				"firstname" => $fname,
				"lastname" => $lname,
				"address" => $address,
				"age" => $age
			);

			$this->Gcsa_model->edit("accounts" , $datas , array("user_id"=>$acc_id));
			redirect("admin/account_employees");

		}

		$this->load->view("admin/includes/footer");




	}

	public function edit_client(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_account",
		);


		$edit_account_info = $this->Gcsa_model->fetchAll("accounts",array("user_id"=>$acc_id));
		$edit_account_info = $edit_account_info[0];

		$body = array(
			"acc" => $edit_account_info,
			"formaction" => "edit_client",
		);


		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_account",$body);
		}
		else{
			$fname = $this->input->post("fname",true);
			$lname = $this->input->post("lname",true);
			$address = $this->input->post("address",true);
			$age = $this->input->post("age",true);
			$datas = array(
				"firstname" => $fname,
				"lastname" => $lname,
				"address" => $address,
				"age" => $age
			);

			$this->Gcsa_model->edit("accounts" , $datas , array("user_id"=>$acc_id));
			redirect("admin/account_employees");

		}

		$this->load->view("admin/includes/footer");
	}


	public function edit_applicant(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_account",
		);


		$edit_account_info = $this->Gcsa_model->fetchAll("accounts",array("user_id"=>$acc_id));
		$edit_account_info = $edit_account_info[0];

		$body = array(
			"acc" => $edit_account_info,
			"formaction" => "edit_applicant",
		);


		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_account",$body);
		}
		else{
			$fname = $this->input->post("fname",true);
			$lname = $this->input->post("lname",true);
			$address = $this->input->post("address",true);
			$age = $this->input->post("age",true);
			$datas = array(
				"firstname" => $fname,
				"lastname" => $lname,
				"address" => $address,
				"age" => $age
			);

			$this->Gcsa_model->edit("accounts" , $datas , array("user_id"=>$acc_id));
			redirect("admin/account_employees");

		}

		$this->load->view("admin/includes/footer");
	}


	public function assessment(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "assessment",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>1));
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/assessment",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function jobs(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "jobs",
		);



		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>1));
		
		$jobs = $this->Gcsa_model->fetchAll("jobs");

		$datas = array(
			"acc_admin" => $account_admin,
			"jobs" => $jobs
		);
		


		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/jobs",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function unpost_post_job(){
		$jobid = $this->uri->segment(3);
		$job_posted_status = $this->uri->segment(4);

		$job_post_unpost = ($job_posted_status == 0 ? 1 : 0);

		$where = array("job_id" => $jobid);
		$job_posted = array("job_posted" => $job_post_unpost);

		$this->Gcsa_model->edit("jobs",$job_posted,$where);
		redirect("admin/jobs");

	}

	public function add_job(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "jobs",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>1));
		$datas = array("acc_admin"=>$account_admin);
		
		
		


		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('job_name', 'Job name', 'required');
		$this->form_validation->set_rules('job_req', 'Job requirements', 'required');
		$this->form_validation->set_rules('job_vacant', 'Job vacancy', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_job",$datas);
		}
		else{
			$job_name = $this->input->post("job_name",true);
			$job_req = $this->input->post("job_req",true);
			$job_vacant = $this->input->post("job_vacant",true);
			$job = array(
				"job_name" => $job_name,
				"job_requirements" => $job_req,
				"job_vacancy" => $job_vacant,
				"job_date_added" => time(),
				"job_date_updated" => time()
			);

			$this->Gcsa_model->insert("jobs",$job);
			redirect("admin/jobs");

		}

		$this->load->view("admin/includes/footer");


	}



	public function edit_job(){

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "jobs",
		);

		$jobid = $this->uri->segment(3);


		$spec_job = $this->Gcsa_model->fetchAll("jobs",array("job_id"=>$jobid));
		$spec_job = $spec_job[0];
		$datas = array("spec_job"=>$spec_job);



		$this->load->view("admin/includes/header",$uinfo);
		
		$this->form_validation->set_rules('job_name', 'Job name', 'required');
		$this->form_validation->set_rules('job_req', 'Job requirements', 'required');
		$this->form_validation->set_rules('job_vacant', 'Job vacancy', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_jobposting",$datas);
		}
		else{
			$job_name = $this->input->post("job_name",true);
			$job_req = $this->input->post("job_req",true);
			$job_vacant = $this->input->post("job_vacant",true);
			$job = array(
				"job_name" => $job_name,
				"job_requirements" => $job_req,
				"job_vacancy" => $job_vacant,
				"job_date_updated" => time()
			);

			$where = array("job_id" => $jobid);

			$this->Gcsa_model->edit("jobs",$job,$where);
			redirect("admin/jobs");
		}

		$this->load->view("admin/includes/footer");

	}

	// public function sample(){
	// 	$samtext = "Height : 5'3 above; Atleast college level; confident and can speak english; With pleasing personality; Work experience not necessary but preferably attentive to details; Age rage bet 20-34 year old";

	// 	$modtext = str_replace(";", "<br>",$samtext);

	// 	echo $modtext;
	// }

	public function signout(){
		$this->session->sess_destroy();
		redirect("adminlogin/login");
	}





}
