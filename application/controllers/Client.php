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

	

	public function dashboard()
	{
		
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "index",
		);

		$this->load->view('client/includes/header',$uinfo);
		$this->load->view('client/index');
		$this->load->view('client/includes/footer');
	}


	public function client_profile(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "dashboard",
		);

		$this->load->view('client/includes/header',$uinfo);
		$this->load->view('client/client_profile');
		$this->load->view('client/includes/footer');
	}



	public function edit_profile()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "change_pass",
		);

		$this->load->view("client/includes/header",$uinfo);

		

		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|callback_check_password');
		$this->form_validation->set_rules('confirm_pass', 'Confirm New Password', 'trim|required|matches[new_pass]');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view("client/edit_profile");
		}
		else{
			$newpass = $this->input->post('new_pass',true);
			$email = $this->session->clientemail;
			$where = array("email" => $email);
			$data = array("password" => sha1($newpass));

			if ($this->Gcsa_model->update("accounts",$data,$where)) {
				redirect("client/client_profile");
			}
			else{
				echo "Error on change password";
			}
		}


		$this->load->view("client/includes/footer");
	}

	public function check_password($password){
		$oldpass = $this->input->post('old_pass',true);
		$email = $this->session->userdata("email");
		$my_info = $this->Gcsa_model->fetchAll("accounts",array("email" => $email));
		$my_info = $my_info[0];
		$oldpassword = $my_info->password;
		if (sha1($oldpass) != $oldpassword) {
			$this->form_validation->set_message('check_password', 'Old password is incorrect.');
			return false;
		}
		else{
			if (sha1($password) == $oldpassword) {
				$this->form_validation->set_message('check_password', 'Your new password must be different from your previous password.');
				return false;
			}
			else{
				return true;
			}
		}
	}


	public function change_profile_picture(){
		$config['upload_path'] = './assets/profile_pictures/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $this->load->library('upload',$config);

    	if ( ! $this->upload->do_upload('profile_picture')){
            print_r($this->upload->display_errors());
            echo $this->input->post('profile_picture');
            die();
    	}
        else{
        	$imageinfo = $this->upload->data();
			$full_path = $imageinfo['full_path'];

			// check EXIF and autorotate if needed
			$this->load->library('image_autorotate', array('filepath' => $full_path));
			
        	$image = $this->upload->data('file_name');
        	$config2['image_library'] = 'gd2';
			$config2['source_image'] = './assets/profile_pictures/'.$image;
			$config2['create_thumb'] = FALSE;
			$config2['maintain_ratio'] = TRUE;
			// $config2['width']         = 100;
			// $config2['height']       = 100;
			$this->load->library('image_lib', $config2);
			if ( ! $this->image_lib->resize()){
				echo $this->image_lib->display_errors();
			}
			else{
				
				$this->image_lib->initialize($config2);
				$this->image_lib->resize();
				$email = $this->session->userdata("email");
				$data = array("image" => $image);
				$where = array("email" => $email);
				if ($this->Gcsa_model->update("accounts",$data,$where)) {
					redirect("client/client_profile");
				}
				else{
					echo "Error updating profile picture";
				}
			}
        }
	}



	public function verify(){
        $code = $this->uri->segment(3);
        $this->Gcsa_model->update('accounts',['status'=>3],['verification_code'=>$code]);
		redirect('login');
    }


    public function jp_evals(){
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "perf_eval_submit",
		);


		$user_id = $this->uri->segment(3);
		$evals = $this->Gcsa_model->fetchAll("evaluations",array("user_id" => $user_id));
		$body_datas = array("evals" => $evals);
		$this->load->view("client/includes/header",$uinfo);
		$this->load->view("client/jp_evals",$body_datas);
		$this->load->view("client/includes/footer");
    }

    public function sec_evaluation_form(){
    	$id = $this->uri->segment(3);
    	$evaluator_info = (object)$this->session->all_userdata();
		$account_id = $this->session->userdata("user_id");
		$user_info = $this->Gcsa_model->get_detachment($account_id,$id);
		$user_info = $user_info[0];


		

		
		// $this->form_validation->set_rules('q2', 'Question 2', 'required');
		// $this->form_validation->set_rules('q3', 'Question 3', 'required');
		// $this->form_validation->set_rules('q4', 'Question 4', 'required');
		// $this->form_validation->set_rules('q5', 'Question 5', 'required');
		// $this->form_validation->set_rules('q6', 'Question 6', 'required');
		// $this->form_validation->set_rules('q7', 'Question 7', 'required');

		$this->load->view("client/includes/eval_header");

		
		$evaluations = [];
		$pe_category = $this->Gcsa_model->fetchAll("personnel_evaluation_category");
		foreach ($pe_category as $pe_category_value) {
			$category_name = $pe_category_value->personnel_evaluation_category_name;
			$pe_question = $this->Gcsa_model->fetchAll("personnel_evaluation_questions",["personnel_evaluation_category_id" => $pe_category_value->personnel_evaluation_category_id]);
			$questions = [];
			foreach ($pe_question as $pe_question_value) {
				// $this->form_validation->set_rules('q1', 'Question 1', 'required');
				$q_id = $pe_question_value->personnel_evaluation_questions_id;
				$question_content = $pe_question_value->personnel_evaluation_questions_content;
				// echo $question_number."".$question_content."<br>";
				$questions[$q_id] = $question_content;

				$this->form_validation->set_rules("q$q_id", "Question $q_id", "required");
			}
			$evaluations[$category_name] = $questions;
		}
		
		
		$datas = array("acc_client" => $user_info , "evaluator_info" => $evaluator_info,"evaluation" =>$evaluations);

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
			$this->load->view("client/sec_evaluation_form",$datas);
		}else{
			$jp_info = $this->Gcsa_model->fetchAll("job_performance",array("user_id" => $id));
	    	$evaluator = $this->input->post("evaluator");
			$from_date = $this->input->post("from_date");
			$from_to = $this->input->post("to_date");

			$question_count = $this->Gcsa_model->fetchAll("personnel_evaluation_questions");
			if ($jp_info) {
				
				$attempt2 = [];
				$attempt3 = [];

				$sample = [];
				foreach ($jp_info as $jp_info_value) {
					$json_values = json_decode($jp_info_value->jp_attempt,true);
					foreach ($question_count as $question_value) {
						$i = $question_value->personnel_evaluation_questions_id;
		    			$var_name = "q".$i;
		    			$json_rate = $json_values[$var_name]["rate"];
		    			$json_attempt = $json_values[$var_name]["attempt"];
		    			$sample[] = $var_name."|".$json_rate;
					}
				}
				

				foreach ($jp_info as $jp_info_value) {
					$attempt = array();
					
		    		$json_values = json_decode($jp_info_value->jp_attempt,true);
		    		$attempt_count = 0;

		    		foreach ($question_count as $question_value) {
		    			$i = $question_value->personnel_evaluation_questions_id;
		    			$var_name = "q".$i;
		    			$rate = $this->input->post($var_name);


		    			$json_rate = $json_values[$var_name]["rate"];
		    			$json_attempt = $json_values[$var_name]["attempt"];

		    			$holder_name = $var_name."|".$rate;

		    			if (in_array($holder_name,$sample)) {
		    				$count = array_count_values($sample);
		    				$attempt_count = $count[$holder_name] + 1;
		    			}
		    			else{
		    				$attempt_count = 1;
		    			}

		    			// if ($rate == $json_rate) {
		    			// 	// $json_attempt++;
		    			// 	$attempt_count = $json_attempt+1;
		    			// 	// echo $var_name.") ".$attempt_count."<br>";
		    			// }
		    			// else{
		    			// 	$attempt_count = $json_attempt;
		    			// 	// echo $var_name.") ".$attempt_count."<br>";
		    			// }

		    			$attempt3["rate"] = $rate;
		    			$attempt3["attempt"] = $attempt_count;
		    			$attempt2 = $attempt3;

		    			$attempt += array_merge(array($var_name => $attempt2));
		    		}


				}
				// $data = array_count_values($sample);
				// var_dump($data["q1|3"]);
				// var_dump($sample);
				// die;

	    		$data = array(
	    			"user_id" => $id,
	    			"jp_evaluator" => $evaluator,
	    			"jp_attempt" => json_encode($attempt),
	    			"jp_from" => time(),
	    			"jp_to" => time(),
	    			"jp_evaluation_date" => time()
	    		);

	    		if ($this->Gcsa_model->insert("job_performance",$data)) {
	    			redirect("client/sp_evaluation");
	    		}
	    		else{
	    			echo "Error occured";
	    			die();
	    		}

	    	}
	    	else{
	    		$attempts = [];

	    		foreach ($question_count as $question_value) {
	    			$q_id = $question_value->personnel_evaluation_questions_id;
	    			$var_name = "q".$q_id;
	    			

	    			$var_name = $this->input->post("q".$q_id);

	    			$q_value = "q".$q_id."_val";
	    			$q_value = array("rate" => $var_name,"attempt" => 1);
	    			$attempts["q".$q_id] = $q_value;
	    		}

	    		$data = array(
	    			"user_id" => $id,
	    			"jp_evaluator" => $evaluator,
	    			"jp_attempt" => json_encode($attempts),
	    			"jp_from" => time(),
	    			"jp_to" => time(),
	    			"jp_evaluation_date" => time()
	    		);

	    		if ($this->Gcsa_model->insert("job_performance",$data)) {
	    			redirect("client/sp_evaluation");
	    		}
	    		else{
	    			echo "Error occured";
	    			die();
	    		}
	    	}
		}

		$this->load->view("client/includes/eval_footer");
    }


    public function get_max_attempt()
    {

    	$attempts = [];
    	$attempts2 = [];
    	// $get_questions = $this->Gcsa_model->jp();
    	$attempts = new stdClass();
    	$res = $this->Gcsa_model->fetchAll("jp_offense_attempt",["user_id"=>74]);
    	foreach ($res as $res_key => $res_value) {
    		$q_id = $res_value->personnel_evaluation_questions_id;
    		$attempts2[] = $q_id."|".$res_value->jp_offense_attempt_rate;
    		// $attempts[] = $attempts2;
    	}

    	var_dump(array_count_values($attempts2));
    	die;
    }

    public function sp_evaluation(){

    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_pinformation",
		);


		$account_id = $this->session->userdata("user_id");
		$detachment = $this->Gcsa_model->get_detachment($account_id);
		$datas = array("acc_client"=>$detachment);
		$this->load->view("client/includes/header",$uinfo);
		$this->load->view("client/sp_evaluation",$datas);
		$this->load->view("client/includes/footer");






    }


    public function account_pinformation(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_pinformation",
		);


		$account_id = $this->session->userdata("user_id");
		// $account_client = $this->Gcsa_model->fetchAll("client_company",["account_id" => $account_id]);
		// $account_client = $account_client[0];

		$detachment = $this->Gcsa_model->get_detachment($account_id);
		// var_dump($detachment);
		// die;
		$datas = array("acc_client"=>$detachment);


		$this->load->view("client/includes/header",$uinfo);
		$this->load->view("client/account_pinformation",$datas);
		$this->load->view("client/includes/footer");
	}

	public function edit_pinformation(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "edit_pinformation",
		);


		$edit_pinformation_info = $this->Gcsa_model->fetchDetachment(2,$acc_id);
		$edit_pinformation_info = $edit_pinformation_info[0];
		
		$body = array(
			"pinformation" => $edit_pinformation_info,
			"formaction" => "edit_pinformation",
		);

		$this->load->view("client/includes/header",$uinfo);

		$this->form_validation->set_rules('pinfo_fname', 'Firstname', 'required');
		$this->form_validation->set_rules('pinfo_lname', 'Lastname', 'required');
		$this->form_validation->set_rules('pinfo_address', 'Address', 'required');
		$this->form_validation->set_rules('pinfo_gender', 'Gender', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view("client/edit_pinformation",$body);
		}
		else{
			$fname = $this->input->post("pinfo_fname",true);
			$lname = $this->input->post("pinfo_lname",true);
			$pinfo_address = $this->input->post("pinfo_address",true);
			$pinfo_gender = $this->input->post("pinfo_gender",true);


			$acc_info_update = array(
				"firstname" => $fname,
				"lastname" => $lname,
				"address" => $pinfo_address,
				"gender" => $pinfo_gender,
				"updated_at" => time()
			);
			$where = array("user_id"=>$acc_id);

			if ($this->Gcsa_model->update("accounts" , $acc_info_update , $where)) {
				redirect("client/account_pinformation");
			}else{
				var_dump(false);
			}
		}

		$this->load->view("admin/includes/footer");
	}



	
	public function account_employees()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
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


		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
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

	

	public function delete_employees_client(){
		$acc_id = $this->uri->segment(3);
		$acc_status = $this->uri->segment(4);
		if ($acc_status == 0) {
			$acc_status = 1;
		}

		else {

			$acc_status = 0;
		}

		$this->Gcsa_model->update("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
		redirect("client/account_pinformation");
		// echo "ASD";

	}

	

	
	



	public function edit_employee(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
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

	public function job_request(){
	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->userdata("email")));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "job_request",
		);

		$this->load->view("client/includes/header",$uinfo);

		

		$this->form_validation->set_rules('guard_type', 'Guard Type', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		


		if ($this->form_validation->run() == FALSE) {
			$this->load->view("client/job_request");
		}
		else{
			$newpass = $this->input->post('new_pass',true);
			$email = $this->session->userdata("email");
			$where = array("email" => $email);
			$data = array("password" => sha1($newpass));

			if ($this->Gcsa_model->update("accounts",$data,$where)) {
				redirect("client/job_request");
			}
			else{
				echo "Error on change password";
			}
		}


		$this->load->view("client/includes/footer");


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
