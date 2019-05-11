<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model("Gcsa_model");
		$this->load->library('recaptcha');
		if (!$this->session->isloggedinclient) {
		    redirect("clientlogin/login");
		}
	}

	

	public function index2()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->clientemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "index2",
		);

		$this->load->view('user/includes/header',$uinfo);
		$this->load->view('user/index2');
		$this->load->view('user/includes/footer');
	}

	public function verify(){
        $code = $this->uri->segment(3);
        $this->Gcsa_model->update('accounts',['status'=>3],['verification_code'=>$code]);
		redirect('login');
    }

	
	public function account_employees()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_employees",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>2));
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("user/includes/header",$uinfo);
		$this->load->view("user/account_employees",$datas);
		$this->load->view("user/includes/footer");
	}

	
	
	public function add_account(){


		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_account",
		);


		$this->load->view("user/includes/header",$uinfo);

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
			$this->load->view("user/add_account");
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

         $this->Gcsa_model->insert("accounts",$userinfo);

			redirect("user/add_account");

		}

		$this->load->view("user/includes/footer");
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
		redirect("user/account_employees"); //employees account

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


		$this->load->view("user/includes/header",$uinfo);

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('age', 'Age', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("user/edit_account",$body);
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
			redirect("user/account_employees");

		}

		$this->load->view("user/includes/footer");




	}

	
	
	
	// public function sample(){
	// 	$samtext = "Height : 5'3 above; Atleast college level; confident and can speak english; With pleasing personality; Work experience not necessary but preferably attentive to details; Age rage bet 20-34 year old";

	// 	$modtext = str_replace(";", "<br>",$samtext);

	// 	echo $modtext;
	// }

	public function signout(){
		$this->session->sess_destroy();
		redirect("clientlogin/login");
	}





}
