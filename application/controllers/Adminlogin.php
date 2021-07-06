<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->library('email');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model("Gcsa_model");
		$this->load->library('recaptcha');
		if ($this->session->isloggedinadmin) {
		    redirect("Admin/index2");
		}
	}


	public function login()
	{

		$data = array('script' => $this->recaptcha->getScriptTag(),
    				'widget' => $this->recaptcha->getWidget()
    				);
		$this->load->view("admin/includes/header_login");

		$this->form_validation->set_rules('adminemail', 'email', 'required|valid_email');
		$this->form_validation->set_rules('adminpass', 'Password', 'required|callback_check_recaptcha');
		// $this->form_validation->set_rules('g-recaptcha-response','CAPTCHA','required|callback_check_recaptcha');
		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/login",$data);
		}
		else{
			$email = $this->input->post("adminemail");

			//session
			$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$email));
			$userinfo = $userinfo[0];
			$this->session->isloggedinadmin = true;
			$this->session->adminemail = $userinfo->email;
			redirect("admin/account_admin");
		}
		$this->load->view("admin/includes/footer_login");
	}

	public function check_recaptcha($response){

		// if (!empty($response)) {
		// 	$response = $this->recaptcha->verifyResponse($response);
		// 	if ($response['success'] === TRUE) {
				$adminid = $this->input->post("adminemail");
				$password = $this->input->post("adminpass");
				$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email" => $adminid));
				if (!$userinfo) {
					$this->form_validation->set_message('check_recaptcha', 'No account exist');
					return false;
				}
				else{
					$userinfo = $userinfo[0];
					if ($userinfo->password == sha1($password)) {
						if ($userinfo->is_verified == 1) {
							if ($userinfo->status) {
								if ($userinfo->account_access == 1) {
									return true;
								}
								else{
									$this->form_validation->set_message('check_recaptcha', 'Invalid Account');
					            	return false;
								}
							}
							else{
								$this->form_validation->set_message('check_recaptcha', 'Your Account is block');
		            			return false;
							}
						}
						else{
							$this->form_validation->set_message('check_recaptcha', 'Your Account is not yet verified');
		        			return false;
						}
					}
					else{
						$this->form_validation->set_message('check_recaptcha', 'No account exist');
						return false;
					}
				}
		// 	}
		// 	else {
		// 		$this->form_validation->set_message('check_recaptcha', 'reCaptcha is required');
  //           	return false;
  //       	}
		// }	
	}

	public function verify(){
        $code = $this->uri->segment(3);
        $this->Gcsa_model->update('accounts',['status'=>1],['verification_code'=>$code]);
        redirect('login');
    }



	/*public function register()
	{
		$this->load->view('admin/includes/header_login');
		
		

		$this->form_validation->set_rules('fname','First name','required');
		$this->form_validation->set_rules('lname','Last name','required');
		$this->form_validation->set_rules('uname','Username','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');
		$this->form_validation->set_rules('password','Re-type password','required|alpha_numeric|matches[password]');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/register');	
		}
		else{
			echo "SUCCESS";
		}
		$this->load->view('admin/includes/footer_login');


	}

	*/


	public function forgotPassword()
	{
		$this->load->view("admin/includes/header_login");

		$this->form_validation->set_rules('femail', 'email', 'required|valid_email');
		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/forgotpassword");
		}
		else{

			$this->load->helper('string');
	        $key = random_string('alnum',6);
	        $data = array("key"=>$key);
	        $email = $this->input->post("femail");


			$this->email->from('Lancebernardo22@gmail.com', 'NAME');
	        $this->email->to($email);

	        $this->email->subject('Reset Password');
	        $this->email->message($this->load->view('admin/fpasspage',$data,true));
	        
	        if(!$this->email->send()){
	            $this->email->print_debugger();
	        }
	        else{

	            $this->Gcsa_model->update("accounts",array("password_code"=>$key),array("email"=>$email));
	            redirect("adminlogin/login");
	        }
		}
		$this->load->view("admin/includes/footer_login");
	}


	public function confirm_resetpass(){
		if ($this->uri->segment(3) != null) {
			$this->load->view("admin/includes/header_login");

			$this->form_validation->set_rules('npassword', 'New Password', 'required|alpha_numeric');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|alpha_numeric|matches[npassword]');
			$passcode = $this->uri->segment(3);

			if ($this->form_validation->run() == FALSE) {
				$this->load->view("admin/rpasspage");
			}
			else{
				
				$newpass = $this->input->post("npassword",true);
				
					$getcode = $this->Gcsa_model->fetchAll("accounts",array("password_code" => $passcode));				
					if ($getcode) {
					$this->Gcsa_model->update("accounts",array("password"=>sha1($newpass)),array("password_code" => $passcode));
						redirect("adminlogin/login");
					}

				


			}
			$this->load->view("admin/includes/footer_login");
		}
		else{
			redirect("adminlogin/login");
			// echo "No Password Code";
		}
	}
		
	


}
