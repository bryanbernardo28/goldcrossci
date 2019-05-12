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
		$address = $this->input->post("address",true);	
		$age = $this->input->post("age",true);	
		$email = $this->input->post('email',true);
		$gender = $this->input->post("gender",true);
		$access = $this->input->post("access",true);
		

		$this->form_validation->set_rules('fname', 'Firstname', 'required|alpha_numeric');
		$this->form_validation->set_rules('lname', 'Lastname', 'required|alpha_numeric');
		$this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric');
		$this->form_validation->set_rules('age', 'Age', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');
		$this->form_validation->set_rules('gender', 'Gender', 'required|numeric');
		$this->form_validation->set_rules('access', 'Access', 'required|numeric');

		if ($access == 1) {
			$company = $this->input->post("company",true);
			$this->form_validation->set_rules('company', 'Company', 'required|numeric');
			var_dump($this->input->post());
		}

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
	        }
	        else{
	            echo "Email sent succesfully!";
	            $this->Gcsa_model->insert("accounts",$userinfo);
	            redirect("admin/register");
	        }
		}
		

		$this->load->view("admin/includes/footer");
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
		$account_admin = $this->Gcsa_model->fetchAllClient(3);
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

		$this->load->helper('string');
		$firstname = $this->input->post('fname',true);
		$lastname = $this->input->post('lname',true);
		$address = $this->input->post("address",true);	
		$age = $this->input->post("age",true);	
		$email = $this->input->post('email',true);
		$gender = $this->input->post("gender",true);
		$access = $this->input->post("access",true);
		$client_access = false;
		$password = random_string('alnum',8);
		

		$this->form_validation->set_rules('fname', 'Firstname', 'required|alpha_numeric');
		$this->form_validation->set_rules('lname', 'Lastname', 'required|alpha_numeric');
		$this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('age', 'Age', 'required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');
		$this->form_validation->set_rules('gender', 'Gender', 'required|numeric');
		$this->form_validation->set_rules('access', 'Access', 'required|numeric');


		if ($access == 3) {
			$client_access = true;
			$company = $this->input->post("company",true);
			$this->form_validation->set_rules('company', 'Company', 'required|alpha_numeric_spaces');
		}



		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_account");
		}
		else{
			$verification_code = random_string('alnum',6);

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
	         
	        $this->email->to($email); // TATANGGAP
	        $this->email->from('jsprbernardo@gmail.com'); // SENDER
	        $this->email->subject("CI Email Message");
	         
	        $data = array('name'=>"Valid User!",'message'=>$message ,'code'=>$verification_code,'tmp_pass' => $password,"access" => $access);
         	
         	$this->email->message($this->load->view('email_message',$data,true));
	         
	        


            if ($client_access) {
				$userinfo = [
					'firstname' =>$firstname,
					'lastname' => $lastname,
					'address' => $address,
					'age' => $age,
	 				'email' => 	  $email,
					'gender' => $gender,
					'password' => sha1($password),
					'account_access' => $access,
					'verification_code' => $verification_code,
					'registered_at' => time()
				];

				$acc_resp = $this->Gcsa_model->insert("accounts",$userinfo);
				if ($acc_resp["affected_rows"] > 0) {
					$acc_id = $acc_resp["insert_id"];
					$companyinfo = [
						'account_id' => $acc_id,
						'company_name' => $company,
						'company_added_at' => time(),
						'company_updated_at' => time()
					];
					if ($this->Gcsa_model->insert("company",$companyinfo)["affected_rows"] > 0) {
						if($this->email->send() == FALSE){
				            echo $this->email->print_debugger();
				        }
				        else{
				            echo "Email sent succesfully!";
				            redirect("admin/add_account");
				        }
					}
					else{
						echo "Error inserting in company table";
					}
				}
				else{
					echo "Error inserting in accounts table";
				}
				

			}
			else{
				$userinfo = [
					'firstname' =>$firstname,
					'lastname' => $lastname,
					'address' => $address,
					'age' => $age,
	 				'email' => 	  $email,
					'gender' => $gender,
					'password' => sha1($password),
					'account_access' => $access,
					'verification_code' => $verification_code,
					'registered_at' => time()
				];
				$acc_resp = $this->Gcsa_model->insert("accounts",$userinfo);
				if ($acc_resp["affected_rows"] > 0) {
					if($this->email->send() == FALSE){
			            echo $this->email->print_debugger();
			        }
			        else{
			            echo "Email sent succesfully!";
			            redirect("admin/add_account");
			        }
				}
				else{
					echo "Error inserting in accounts table";
				}
			}
	        
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
