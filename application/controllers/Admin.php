<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct(){
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
		$email = $this->input->post('email',true);
		$password = $this->input->post('password',true);
		$cpassword = $this->input->post('cpassword',true);

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[accounts.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_account");
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
             'smtp_user'     => "",
             'smtp_pass'     => "",
             'mailtype'      => 'html',
             'charset'       => 'utf-8'
         );

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

	public function signout(){
		$this->session->sess_destroy();
		redirect("adminlogin/login");
	}





}
