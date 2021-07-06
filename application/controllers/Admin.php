<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model("Gcsa_model");
		$this->load->library('recaptcha');
		$this->load->library('pdf');
		$this->load->library('nexmo');
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
		$account_admin = $this->Gcsa_model->fetchClient(3);
		$this->load->view('admin/includes/header', $uinfo);
		$this->load->view('admin/index2');
		$this->load->view('admin/includes/footer');
	}

	public function dashboard()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "dashboard",
		);
		
		$employees_cnt = $this->Gcsa_model->count_item("accounts",["account_access"=>2]);
		$client_cnt = $this->Gcsa_model->count_item("accounts",["account_access"=>3]);
		$top = $this->Gcsa_model->get_all_evals();

		$body = ["top" => $top , "emp_cnt" => $employees_cnt,"client_cnt" => $client_cnt ];
		// $footer = ["data"=>$data];
		$this->load->view('admin/includes/header', $uinfo);
		$this->load->view('admin/index2',$body);
		$this->load->view('admin/includes/footer');
	}

	public function exam()
	{
		$this->load->view('admin/includes/exam_header');
		$this->load->view('admin/exam');
		$this->load->view('admin/includes/exam_footer');
	}

	public function submit_exam(){
		$score = $this->input->post("score",true);
		$fname = strtolower($this->input->post("fname",true));
		$lname = strtolower($this->input->post("lname",true));
		$getinfo = $this->Gcsa_model->fetchAll("applicant");
		$infos = [];

		foreach ($getinfo as $value) {
			$pdata = json_decode($value->applicant_personal_data,true);
			$fname2 = strtolower($pdata["first_name"]);
			$lname2 = strtolower($pdata["family_name"]);
			$fname2 = str_replace(' ', '', $fname2);
			$lname2 = str_replace(' ', '', $lname2);
			$fname = str_replace(' ', '', $fname);
			$app_id = $value->applicant_id;
			if ((strpos($fname2,$fname) !== false) && (strpos($lname2,$lname) !== false)) {
				$remarks = "";
				if ($score >= 60) {
					$remarks = "Passed";
				}
				else{
					$remarks = "Failed";
				}
				$data = [
					"account_id" => $app_id,
					"score" => $score,
					"remarks" => $remarks,
					"date_exam" => time()
				];
				$this->Gcsa_model->insert("remarks",$data);
				echo json_encode(['score' => $score,'infos' => $infos]);			
			}
		}
		
	}

	public function floater(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "floater",
		);

		$get_remarks = $this->Gcsa_model->get_remarks_hired();
		$get_client = $this->Gcsa_model->fetchAll("client_company");

		$body = ["remarks" => $get_remarks,"client" => $get_client];

		$this->load->view('admin/includes/header',$uinfo);
		$this->load->view('admin/floater',$body);
		$this->load->view('admin/includes/footer');
	}

	public function submit_detachment()
	{
		

		$client_id = $this->input->post("client");
		$account_hired_id = $this->uri->segment(3);
		$remarks_id = $this->uri->segment(4);

		$account_hired_id = $this->Gcsa_model->fetchAll("applicant",["applicant_id" => $account_hired_id]);
		$account_hired = $account_hired_id[0];

		$applicant_personal_data = json_decode($account_hired->applicant_personal_data,true);
		$this->load->helper('string');
		$verification_code = random_string('alnum',6);
		$insert_account = [
			"firstname" => $applicant_personal_data["first_name"],
			"lastname" => $applicant_personal_data["family_name"],
			"gender" => $applicant_personal_data["gender"] == "Male" ? 1 : 2 ,
			"address" => $applicant_personal_data["city_address"],
			"position" => $applicant_personal_data["category"],
			"password" => sha1("test"),
			"status" => 1,
			"account_access" => 2,
			"registered_at" => time(),
			"updated_at" => time(),
			"verification_code" => $verification_code,
			"is_verified" => 1,
			"image" => "default_avatar.png"
		];

		$account_id = $this->Gcsa_model->insert("accounts",$insert_account);

		$update_remarks = [
			"remarks_hired" => 2
		];

		$this->Gcsa_model->update("remarks",$update_remarks,["remarks_id" => $remarks_id]);


		$insert_detachment = [
			"account_id" => $account_id["insert_id"],
			"client_id" => $client_id,
			"detachment_date" => time()
		];

		$this->Gcsa_model->insert("detachment",$insert_detachment);

		redirect("admin/floater");


	}

	public function list_hired(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "list_hired",
		);

		$get_remarks = $this->Gcsa_model->get_remarks_hired();

		$body = ["remarks" => $get_remarks];

		$this->load->view('admin/includes/header',$uinfo);
		$this->load->view('admin/list_hired',$body);
		$this->load->view('admin/includes/footer');

	}

	public function export_list_hired()
	{
		$get_remarks = $this->Gcsa_model->get_remarks_hired();

		$body = ["remarks" => $get_remarks];

		$this->load->view("admin/export_list_hired",$body);
		$html = $this->output->get_output();


		
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));


	}

	public function list_clients(){

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "list_clients",
		);
		$account_admin = $this->Gcsa_model->fetchClient(3);
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/list_clients",$datas);
		$this->load->view("admin/includes/footer");

	}

	public function export_list_clients()
	{
		$clients = $this->Gcsa_model->fetchClient(3);

		$body = ["list_clients" => $clients];

		$this->load->view("admin/export_list_clients",$body);
		$html = $this->output->get_output();


		
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function list_current_emp(){

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "list_current_emp",
		);

		$employees = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>2));
		$datas = array("employees"=>$employees);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/list_current_emp",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function export_list_current_emp()
	{
		$employees = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>2));

		$body = ["employees" => $employees];

		$this->load->view("admin/export_list_current_emp",$body);
		$html = $this->output->get_output();


		
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function list_applicants()
	{

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "list_applicants",
		);

		$applicant = $this->Gcsa_model->fetchAll("applicant");
		$info = [];
		if ($applicant) {
			foreach ($applicant as $table_val) {
				$array_info =  json_decode($table_val->applicant_personal_data,true);
				$data_info = [
					"id" => $table_val->applicant_id,
					"lastname" => $array_info["family_name"],
					"firstname" => $array_info["first_name"],
					// "address" => $array_info["city_address"],
					"gender" => $array_info["gender"],
					"category" => $array_info["category"],
					"contact_number" => $array_info['contact_no']
				];
				array_push($info,$data_info);
			}
		}


		$datas = array("applicant"=>$info);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/list_applicants",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function export_list_applicants()
	{
		$applicant = $this->Gcsa_model->fetchAll("applicant");
		$info = [];
		if ($applicant) {
			foreach ($applicant as $table_val) {
				$array_info =  json_decode($table_val->applicant_personal_data,true);
				$data_info = [
					"id" => $table_val->applicant_id,
					"lastname" => $array_info["family_name"],
					"firstname" => $array_info["first_name"],
					// "address" => $array_info["city_address"],
					"gender" => $array_info["gender"],
					"category" => $array_info["category"],
					"contact_number" => $array_info['contact_no']
				];
				array_push($info,$data_info);
			}
		}

		$body = ["applicant" => $info];

		$this->load->view("admin/export_list_applicants",$body);
		$html = $this->output->get_output();


		
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}

	public function archives(){

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "archives",
		);

		$this->load->view('admin/includes/header',$uinfo);
		$this->load->view('admin/archives');
		$this->load->view('admin/includes/footer');

	}

	
	
	
	public function client_rank(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "client_rank",
		);

		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/client_rank");
		$this->load->view("admin/includes/footer");

	}


	public function edit_profile()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "change_pass",
		);

		$this->load->view("admin/includes/header",$uinfo);


		$this->form_validation->set_rules('old_pass', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|callback_check_password');
		$this->form_validation->set_rules('confirm_pass', 'Confirm New Password', 'trim|required|matches[new_pass]');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_profile");
		}
		else{
			$newpass = $this->input->post('new_pass',true);
			$email = $this->session->adminemail;
			$where = array("email" => $email);
			$data = array("password" => sha1($newpass));

			if ($this->Gcsa_model->update("accounts",$data,$where)) {
				redirect("Admin/admin_profile");
			}
			else{
				echo "Error on change password";
			}
		}


		$this->load->view("admin/includes/footer");
	}

	public function check_password($password){
		$oldpass = $this->input->post('old_pass',true);
		$email = $this->session->adminemail;
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
				$email = $this->session->adminemail;
				$data = array("image" => $image);
				$where = array("email" => $email);
				if ($this->Gcsa_model->update("accounts",$data,$where)) {
					redirect("admin/admin_profile");
				}
				else{
					echo "Error updating profile picture";
				}
			}
        }
	}

	public function admin_profile(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "index2",
		);

		$this->load->view('admin/includes/header',$uinfo);
		$this->load->view('admin/admin_profile');
		$this->load->view('admin/includes/footer');
	}

	public function tryform(){

		
		$this->load->view('admin/tryform');

	}

	public function p_evaluation(){
		$category = $this->Gcsa_model->fetchAll("category");

		$category_question = [];
		foreach ($category as $category_value) {
			
			$question = $this->Gcsa_model->fetchAll("question",["category_id"=>$category_value->category_id]);
			$questions = [];
			// $questions[] = ;
			
			$input_name = preg_replace('/\s+/', '|', strtolower($category_value->category_name));
			$this->form_validation->set_rules($input_name, $category_value->category_name, 'required');	
			foreach ($question as $question_value) {
				$question_number = $question_value->question_number;
				$question_points = $question_value->question_points;
				$questions[$question_number."|".$question_points] = $question_value->question_name;

			}
			$cat_name = $category_value->category_name;
			$category_question[$category_value->category_name] = $questions;

		}

		$body = ["category_question" => $category_question];

		$id = $this->uri->segment(3);

		$user_info = $this->Gcsa_model->f_detachment($id);
		$user_info = $user_info[0];

		$data = array("userinfo" => $user_info);



		$this->load->view("admin/includes/eval_header",$data);

		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/view_performance_evaluation",$body);
		}
		else{
			$total = 0;
			$adjective_rating = "";
			$descriptive_rating = "";
			$rating_id = "";
			$userid = $this->uri->segment(3);
			$evaluation_summary = array();

			// var_dump($this->input->post());

			foreach ($this->input->post() as $category => $points) {
				$total += $points;
				$category_title = ucwords(str_replace('|', ' ', $category));
				$evaluation_summary += array_merge($evaluation_summary,array($category_title => $points));
			}
			
			$get_num_rating = $this->Gcsa_model->fetchAll("rating");
			foreach ($get_num_rating as $value) {
				$rate_decode = json_decode($value->rating_numerical);

				$array_count = count($rate_decode);
				if ($array_count > 1) {
					if ($total >= $rate_decode[0] && $total <= $rate_decode[1]) {
						$rating_id = $value->rating_id;
						$adjective_rating = $value->rating_adjective;
						$descriptive_rating = $value->rating_descriptive;
					}
				}
				else{
					if ($total == $rate_decode[0] || $total <= $rate_decode[0]) {
						$rating_id = $value->rating_id;
						$adjective_rating = $value->rating_adjective;
						$descriptive_rating = $value->rating_descriptive;
					}
				}
			}

			$where = array("rating_id" => $rating_id);

			$merit_data = $this->Gcsa_model->fetchAll("merit_rating_basis",$where);
			$merit_data = $merit_data[0];

			$uinfo = $this->Gcsa_model->fetchDetachment(2,$userid);
			$uinfo = $uinfo[0];

			$period_covered = array("from"=>$uinfo->ec_date_hired,"to"=>time());
			$period_covered = json_encode($period_covered);

			// echo "Total Points: ".$total."<br>"."Adjective Rating: ".$adjective_rating."<br>"."Descriptive Rating: ".$descriptive_rating."<br>"."Salary Increase: ".$merit_data->increase."%";

			$evaluation_summary = json_encode($evaluation_summary);
			$eval_data = array(
				"user_id" => $userid,
				"rating_id" => $rating_id,
				"evaluation_summary" => $evaluation_summary,
				"total_points" => $total,
				"evaluation_remarks" => "N/A",
				"evaluation_date" => time(),
				"period_covered" => $period_covered
	 		);


	 		$return_insert = $this->Gcsa_model->insert("evaluations",$eval_data);
	 		$redirect_to = "admin/perf_eval_submit/".$return_insert["insert_id"];
	 		redirect($redirect_to);
		}
		$this->load->view("admin/includes/eval_footer");
	}


	public function perf_eval_submit(){
		$eval_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "perf_eval_submit",
		);

		$evals = $this->Gcsa_model->fetchEvalRating($eval_id);
		$evals = $evals[0];

		$footer_datas = array(
			"evals" => $evals,
		);
		// var_dump($evals);
		// die();
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/perf_eval_graph",$footer_datas);
		$this->load->view("admin/includes/footer");
	}

	public function get_graph_image()
	{
		$img = $this->input->post("chart_datas");
		$table_datas = $this->input->post("table_datas");
		$userid = $this->uri->segment(3);
		$evaluationid = $this->uri->segment(4);
		define('UPLOAD_DIR', 'assets/images/graph/');
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $this->load->helper('string');
		$rand_name = random_string('alnum',8);
		$graph_name = $rand_name . '.png';
        $file = UPLOAD_DIR . $graph_name;
        file_put_contents($file, $image_base64);

        $get_user = $this->Gcsa_model->get_evals($userid,$evaluationid);
        $get_user = $get_user[0];

		$body = ["graph_name" => $img,"table_datas" => $table_datas,"user"=>$get_user];
		$html = $this->load->view("admin/pdf_graph",$body,true);
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('Letter', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("Graph.pdf", array("Attachment"=>0));
		unlink("assets/images/graph/".$graph_name);
        
	}

	public function perf_evals(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "perf_eval_submit",
		);


		$user_id = $this->uri->segment(3);
		$evals = $this->Gcsa_model->fetchAll("evaluations",array("user_id" => $user_id));
		$body_datas = array("evals" => $evals);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/perf_evals",$body_datas);
		$this->load->view("admin/includes/footer");

	}


	/*public function register()
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
*/

	

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

	public function with_exp(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "with_exp",
		);


		
		$applicant_wexp = $this->Gcsa_model->fetchAll("applicant",["experience_status" => 1]);
		$info = [];
		if ($applicant_wexp) {
			foreach ($applicant_wexp as $table_val) {
				$array_info =  json_decode($table_val->applicant_personal_data,true);
				$data_info = [
					"id" => $table_val->applicant_id,
					"lastname" => $array_info["family_name"],
					"firstname" => $array_info["first_name"],
					// "address" => $array_info["city_address"],
					"gender" => $array_info["gender"],
					"category" => $array_info["category"],
					"contact_number" => $array_info['contact_no']
				];
				array_push($info,$data_info);
			}
		}

		$text_message = $this->Gcsa_model->fetchAll("sms");
		$text_message = $text_message[0];
		$datas = array("with_exp"=>$info,"sms" => $text_message);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/with_exp",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function without_exp(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "without_exp",
		);


		
		$applicant_woexp = $this->Gcsa_model->fetchAll("applicant",["experience_status" => 2]);
		$info = [];
		if ($applicant_woexp) {
			foreach ($applicant_woexp as $table_val) {
				$array_info =  json_decode($table_val->applicant_personal_data,true);
				$data_info = [
					"id" => $table_val->applicant_id,
					"lastname" => $array_info["family_name"],
					"firstname" => $array_info["first_name"],
					"address" => $array_info["city_address"],
					"gender" => $array_info["gender"],
					"category" => $array_info["category"]
				];
				array_push($info,$data_info);
			}
		}
		$datas = array("without_exp"=>$info);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/without_exp",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function account_pinformation(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_pinformation",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>2));
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/account_pinformation",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function account_detachment(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_detachment",
		);


		$account_admin = $this->Gcsa_model->fetchDetachment(2);
		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/account_detachment",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function account_client(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "account_client",
		);
		$account_admin = $this->Gcsa_model->fetchClient(3);
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
		$position = $this->input->post("position",true);	
		$email = $this->input->post('email',true);
		/*$gender = $this->input->post("gender",true);*/
		$access = $this->input->post("access",true);
		$client_access = false;
		$password = random_string('alnum',8);
		

		$this->form_validation->set_rules('fname', 'Firstname', 'required|alpha_numeric');
		$this->form_validation->set_rules('lname', 'Lastname', 'required|alpha_numeric');
		$this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('position', 'Position', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');
		/*$this->form_validation->set_rules('gender', 'Gender', 'required|numeric');*/
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
	            'smtp_user'     => "Lancebernardo22@gmail.com",
	            'smtp_pass'     => "0915759470054556358",
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
					'position' => $position,
	 				'email' => 	  $email,
					/*'gender' => $gender,*/
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
						'cc_name' => $company,
						'cc_added_at' => time(),
						'cc_updated_at' => time()
					];
					if ($this->Gcsa_model->insert("client_company",$companyinfo)["affected_rows"] > 0) {
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
					'position' => $position,
	 				'email' => 	  $email,
					/*'gender' => $gender,*/
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

	public function add_admin(){



		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_admin",
		);


		$this->load->view("admin/includes/header",$uinfo);

		$this->load->helper('string');
		$firstname = $this->input->post('fname',true);
		$lastname = $this->input->post('lname',true);
		$address = $this->input->post("address",true);	
		$position = $this->input->post("position",true);	
		$email = $this->input->post('email',true);
		$gender = $this->input->post("gender",true);
		$access = $this->input->post("access",true);
		$client_access = false;
		$password = random_string('alnum',8);
		

		$this->form_validation->set_rules('fname', 'Firstname', 'required|alpha_numeric');
		$this->form_validation->set_rules('lname', 'Lastname', 'required|alpha_numeric');
		$this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('position', 'Position', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');
		$this->form_validation->set_rules('gender', 'Gender', 'required|numeric');
		$this->form_validation->set_rules('access', 'Access', 'required|numeric');


		if ($access == 3) {
			$client_access = true;
			$company = $this->input->post("company",true);
			$this->form_validation->set_rules('company', 'Company', 'required|alpha_numeric_spaces');
		}



		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_admin");
		}
		else{
			$verification_code = random_string('alnum',6);

			$this->load->library('email');
         
	        $config = array(
	            'protocol'      => 'smtp',
	            'smtp_host'     => 'ssl://smtp.gmail.com',
	            'smtp_port'     => 465,
	            'smtp_user'     => "jsprbernardo@gmail.com",
	            'smtp_pass'     => "Lncbernardo09",
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
					'position' => $position,
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
				            redirect("admin/add_admin");
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
					'position' => $position,
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
			            redirect("admin/add_admin");
			        }
				}
				else{
					echo "Error inserting in accounts table";
				}
			}
	        
		}

		$this->load->view("admin/includes/footer");
	}


	public function add_client(){


		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_client",
		);


		$this->load->view("admin/includes/header",$uinfo);

		$this->load->helper('string');
		$firstname = $this->input->post('fname',true);
		$lastname = $this->input->post('lname',true);
		$address = $this->input->post("address",true);	
		$city = $this->input->post("city",true);	
		$position = $this->input->post("position",true);	
		$email = $this->input->post('email',true);
		$gender = $this->input->post("gender",true);
		$access = $this->input->post("access",true);
		$client_access = false;
		$password = random_string('alnum',8);
		

		$this->form_validation->set_rules('fname', 'Firstname', 'required|alpha_numeric');
		$this->form_validation->set_rules('lname', 'Lastname', 'required|alpha_numeric');
		$this->form_validation->set_rules('address', 'Address', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('city', 'City', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('position', 'Position', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[accounts.email]');
		$this->form_validation->set_rules('gender', 'Gender', 'required|numeric');
		$this->form_validation->set_rules('access', 'Access', 'required|numeric');


		if ($access == 3) {
			$client_access = true;
			$company = $this->input->post("company",true);
			$this->form_validation->set_rules('company', 'Company', 'required|alpha_numeric_spaces');
		}



		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_client");
		}
		else{
			$verification_code = random_string('alnum',6);

			$this->load->library('email');
         
	        $config = array(
	            'protocol'      => 'smtp',
	            'smtp_host'     => 'ssl://smtp.gmail.com',
	            'smtp_port'     => 465,
	            'smtp_user'     => "Lancebernardo22@gmail.com",
	            'smtp_pass'     => "0915759470054556358",
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
					'city' => $city,
					'position' => $position,
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
						'cc_name' => $company,
						'cc_added_at' => time(),
						'cc_updated_at' => time()
					];
					if ($this->Gcsa_model->insert("client_company",$companyinfo)["affected_rows"] > 0) {
						if($this->email->send() == FALSE){
				            echo $this->email->print_debugger();
				        }
				        else{
				            echo "Email sent succesfully!";
				            redirect("admin/add_client");
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
					'city' => $city,
					'position' => $position,
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
			            redirect("admin/account_clients");
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
		$this->Gcsa_model->update("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
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

		$this->Gcsa_model->update("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
		redirect("admin/account_pinformation"); //employees account

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

		$this->Gcsa_model->update("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
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

		$this->Gcsa_model->update("accounts",array("status"=>$acc_status),array("user_id"=>$acc_id));
		redirect("admin/account_applicant"); //applicant account

	}

	public function edit_admin(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "edit_admin",
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
		$this->form_validation->set_rules('position', 'Position', 'required|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_admin",$body);
		}
		else{
			$fname = $this->input->post("fname",true);
			$lname = $this->input->post("lname",true);
			$address = $this->input->post("address",true);
			$position = $this->input->post("position",true);
			$datas = array(
				"firstname" => $fname,
				"lastname" => $lname,
				"address" => $address,
				"position" => $position
			);

			$this->Gcsa_model->update("accounts" , $datas , array("user_id"=>$acc_id));
			redirect("admin/account_admin");

		}

		$this->load->view("admin/includes/footer");
	}



	public function edit_detachment(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "edit_detachment",
		);


		$edit_detachment_info = $this->Gcsa_model->fetchDetachment(2,$acc_id);
		$edit_detachment_info = $edit_detachment_info[0];
		
		$body = array(
			"detachment" => $edit_detachment_info,
			"formaction" => "edit_client",
		);

		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('ec_fname', 'Firstname', 'required');
		$this->form_validation->set_rules('ec_lname', 'Lastname', 'required');
		$this->form_validation->set_rules('ec_company', 'Company', 'required');
		$this->form_validation->set_rules('ec_branch', 'Branch', 'required');
		$this->form_validation->set_rules('ec_position', 'Position', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_detachment",$body);
		}
		else{
			$fname = $this->input->post("ec_fname",true);
			$lname = $this->input->post("ec_lname",true);
			$ec_name = $this->input->post("ec_company",true);
			$ec_branch = $this->input->post("ec_branch",true);
			$ec_position = $this->input->post("ec_position",true);


			$acc_info_update = array(
				"firstname" => $fname,
				"lastname" => $lname,
				"position" => $ec_position,
				"updated_at" => time()
			);
			$where = array("user_id"=>$acc_id);

			if ($this->Gcsa_model->update("accounts" , $acc_info_update , $where)) {
				$detachment_company_update = array(
					"ec_name" => $ec_name,
					"ec_branch" => $ec_branch,
					"ec_updated_at" => time()
				);
				$detachment_company_id = array("ec_account_id" => $acc_id);

				$this->Gcsa_model->update("employee_company" , $detachment_company_update , $detachment_company_id);
				redirect("admin/account_detachment");
			}else{
				var_dump(false);
			}
		}

		$this->load->view("admin/includes/footer");
	}


	public function edit_pinformation(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
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

		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('pinfo_fname', 'Firstname', 'required');
		$this->form_validation->set_rules('pinfo_lname', 'Lastname', 'required');
		$this->form_validation->set_rules('pinfo_address', 'Address', 'required');
		$this->form_validation->set_rules('pinfo_gender', 'Gender', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_pinformation",$body);
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
				redirect("admin/account_pinformation");
			}else{
				var_dump(false);
			}
		}

		$this->load->view("admin/includes/footer");
	}

	public function edit_client(){
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "edit_client",
		);


		$edit_client_info = $this->Gcsa_model->fetchClient(3,$acc_id);
		$edit_client_info = $edit_client_info[0];
		
		$body = array(
			"client" => $edit_client_info,
			"formaction" => "edit_client",
		);

		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('fname', 'Firstname', 'required');
		$this->form_validation->set_rules('lname', 'Lastname', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('company', 'Company', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_client",$body);
		}
		else{
			$fname = $this->input->post("fname",true);
			$lname = $this->input->post("lname",true);
			$address = $this->input->post("address",true);
			$city = $this->input->post("city",true);
			$cc_name = $this->input->post("company",true);
			$acc_info_update = array(
				"firstname" => $fname,
				"lastname" => $lname,
				"address" => $address,
				"city" => $city,
				"updated_at" => time()
			);
			$where = array("user_id"=>$acc_id);


			// $this->Gcsa_model->update_client("accounts" , $acc_info_update , $where);
			if ($this->Gcsa_model->update("accounts" , $acc_info_update , $where)) {
				$client_company_update = array("cc_name" => $cc_name,"cc_updated_at" => time());
				$client_company_id = array("account_id" => $acc_id);

				$this->Gcsa_model->update("client_company" , $client_company_update , $client_company_id);
				redirect("admin/account_client");
			}else{
				var_dump(false);
			}
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

			$this->Gcsa_model->update("accounts" , $datas , array("user_id"=>$acc_id));
			redirect("admin/account_employees");

		}

		$this->load->view("admin/includes/footer");
	}



	public function sp_evaluation(){

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "sp_evaluation",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>2));

		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/sp_evaluation",$datas);
		$this->load->view("admin/includes/footer");
	}


	public function jp_evals(){
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "jp_evals",
		);


		$user_id = $this->uri->segment(3);
		$jp_evals = $this->Gcsa_model->fetchAll("job_performance",array("user_id" => $user_id));
		$body_datas = array("jp_evals" => $jp_evals);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/jp_evals",$body_datas);
		$this->load->view("admin/includes/footer");
    }

    public function jp_evals_submit(){

    	$jp_id = $this->uri->segment(3);
		$jp_evals = $this->Gcsa_model->fetchAll("job_performance",array("jp_id" => $jp_id));
		$jp_evals = $jp_evals[0];

		// $evaluated_info = $this->Gcsa_model->fetchDetachment(2,$jp_evals->user_id);
		// $evaluated_info = $evaluated_info[0];

		$evaluated_info = $this->Gcsa_model->f_detachment($jp_evals->user_id);
		$evaluated_info = $evaluated_info[0];

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
			}
			$evaluations[$category_name] = $questions;
		}


		$jp_attempts = json_decode($jp_evals->jp_attempt);

		$jp_vals_merge = array();
		foreach ($jp_attempts as $key => $value) {
			$jp_vals = array();
			$qnumber = str_replace("q","",$key);
			$attempt = $value->attempt;
			$rate = $value->rate;

			// echo $qnumber." = ".$attempt."<br>";

			$where = array("jp_offense_qnumber" => $qnumber,"jp_offense_attempt >=" => $attempt);
			$jp_offense = $this->Gcsa_model->fetchAll("jp_offense",$where);

			if ($jp_offense) {
				foreach ($jp_offense as $key => $jp_offense_value) {

					$valid_rates = json_decode($jp_offense_value->jp_offense_rate);

					if (in_array($rate , $valid_rates)) {
						
						$jp_vals = array("has_offense" => true , "rate" => $rate ,"offense"=>$jp_offense_value->jp_offense_name);
					}
					else{

						$jp_vals = array("has_offense" => false , "rate" => $rate);
					}

					$jp_vals_merge += array_merge($jp_vals_merge,array("q".$qnumber => $jp_vals));

				}
			}
			

		}

		// var_dump($jp_vals_merge);
		// die;

		$body_datas = array("jp_evals" => $jp_evals,"evaluated_info" => $evaluated_info,"evaluation" =>$evaluations,"jp_offense" => $jp_vals_merge );
		// $body_datas = array("jp_evals" => $jp_evals,"evaluated_info" => $evaluated_info,"jp_offense" => $jp_vals_merge ,"evaluation" =>$evaluations);

    	$this->load->view("admin/includes/eval_header");
		$this->load->view("admin/sec_evaluation_form",$body_datas);
		$this->load->view("admin/includes/eval_footer");
    }


    public function print_jp_evals()
    {
    	$jp_id = $this->uri->segment(3);
		$jp_evals = $this->Gcsa_model->fetchAll("job_performance",array("jp_id" => $jp_id));
		$jp_evals = $jp_evals[0];

		$evaluated_info = $this->Gcsa_model->fetchDetachment(2,$jp_evals->user_id);
		$evaluated_info = $evaluated_info[0];


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
			}
			$evaluations[$category_name] = $questions;
		}


		$jp_attempts = json_decode($jp_evals->jp_attempt);

		$jp_vals_merge = array();
		foreach ($jp_attempts as $key => $value) {
			$jp_vals = array();
			$qnumber = str_replace("q","",$key);
			$attempt = $value->attempt;
			$rate = $value->rate;

			// echo $qnumber." = ".$attempt."<br>";

			$where = array("jp_offense_qnumber" => $qnumber,"jp_offense_attempt >=" => $attempt);
			$jp_offense = $this->Gcsa_model->fetchAll("jp_offense",$where);

			if ($jp_offense) {
				foreach ($jp_offense as $key => $jp_offense_value) {

					$valid_rates = json_decode($jp_offense_value->jp_offense_rate);

					if (in_array($rate , $valid_rates)) {
						
						$jp_vals = array("has_offense" => true , "rate" => $rate ,"offense"=>$jp_offense_value->jp_offense_name);
					}
					else{

						$jp_vals = array("has_offense" => false , "rate" => $rate);
					}

					$jp_vals_merge += array_merge($jp_vals_merge,array("q".$qnumber => $jp_vals));

				}
			}
			

		}

		// var_dump($jp_vals_merge);
		// die;

		$body_datas = array("jp_evals" => $jp_evals,"evaluated_info" => $evaluated_info,"evaluation" =>$evaluations,"jp_offense" => $jp_vals_merge );
		// $body_datas = array("jp_evals" => $jp_evals,"evaluated_info" => $evaluated_info,"jp_offense" => $jp_vals_merge ,"evaluation" =>$evaluations);

    	$this->load->view("admin/includes/eval_header");
		$this->load->view("admin/print_sec_eval_form",$body_datas);
		$this->load->view("admin/includes/eval_footer");

		$html = $this->output->get_output();


		
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'landscape');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));

    }


    public function personnel_evaluation_list()
    {
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "personnel_evaluation_list",
		);

		$pe_category = $this->Gcsa_model->fetchAll("personnel_evaluation_category");
		$body = ["pe_category" => $pe_category];
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/personnel_evaluation_list",$body);
		$this->load->view("admin/includes/footer");
    }

    public function edit_pe()
    {
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "edit_pe",
		);

		$pe_category_id = $this->uri->segment(3);
		$pe_category = $this->Gcsa_model->fetchAll("personnel_evaluation_category",["personnel_evaluation_category_id"=>$pe_category_id]);
		$pe_category = $pe_category[0];
		$pe_question = $this->Gcsa_model->fetchAll("personnel_evaluation_questions",["personnel_evaluation_category_id"=>$pe_category_id]);
		$body = ["pe_category" => $pe_category,"pe_question" => $pe_question];
		$this->load->view("admin/includes/header",$uinfo);


		$this->form_validation->set_rules("pe_category", "Evaluation Category", "required|regex_match['^[a-zA-Z/,.\s]+$']");

		$pe_question_input = $this->input->post("pe_question",true);
		if (!empty($pe_question_input)) {
			foreach ($pe_question_input as $pe_question_input_key => $pe_question_input_value) {
				$this->form_validation->set_rules("pe_question[$pe_question_input_key]", "Evaluation Question", "required|regex_match['^[a-zA-Z/,.\s]+$']");
				
			}
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_pe",$body);
		}
		else{
			$pe_category_input = $this->input->post("pe_category",true);

			$edit_pe = [
				"personnel_evaluation_category_name" => $pe_category_input
			];

			$this->Gcsa_model->update("personnel_evaluation_category",$edit_pe,["personnel_evaluation_category_id"=>$pe_category_id]);

			$pe_question_input = $this->input->post("pe_question",true);
			foreach ($pe_question_input as $pe_question_question_id => $pe_question_value) {
				$question = [
					"personnel_evaluation_questions_content" => $pe_question_value
				];
				$this->Gcsa_model->update("personnel_evaluation_questions",$question,["personnel_evaluation_questions_id"=> $pe_question_question_id]);
			}


			redirect("admin/personnel_evaluation_list");


		}
		
		$this->load->view("admin/includes/footer");
    }


    public function add_pe_offense()
    {
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_pe_offense",
		);

		$category_id = $this->uri->segment(3);
		$pe_category = $this->Gcsa_model->fetchAll("personnel_evaluation_category",["personnel_evaluation_category_id" => $category_id]);

		$pe_category = $pe_category[0];

		$category_name = $pe_category->personnel_evaluation_category_name;
		$pe_question = $this->Gcsa_model->fetchAll("personnel_evaluation_questions",["personnel_evaluation_category_id" => $category_id]);

		$body = [
			"pe_category" => $pe_category,
			"pe_question" => $pe_question
		];

		foreach ($pe_question as $questions) {
			$q_id = $questions->personnel_evaluation_questions_id;
			for ($attempt = 1; $attempt <= 4; $attempt++){
				$this->form_validation->set_rules("offense".$attempt.$q_id."[]", "Offense", "required|regex_match['^[0-9a-zA-Z/,.\s]+$']");
				$this->form_validation->set_rules("rate".$attempt.$q_id."[]", "Rate", "required|numeric");
			}
		}

		$this->load->view("admin/includes/header",$uinfo);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_pe_offense",$body);
		}
		else{
			$merge_offense = [];
			$qnumber = 0;
			foreach ($pe_question as $key => $questions) {
				$qnumber = $key+1;
				$offense_array = [];
				$q_id = $questions->personnel_evaluation_questions_id;
				for ($attempt = 1; $attempt <= 4; $attempt++){
					$offense = $this->input->post("offense".$attempt.$q_id,true);
					$rate = $this->input->post("rate".$attempt.$q_id,true);
					$rate = array_map('intval', $rate);
					$offense_array["jp_offense_attempt"] = $attempt;
					$offense_array["jp_offense_qnumber"] = $q_id;
					$offense_array["pe_category_id"] = $category_id;
					$offense_array["jp_offense_name"] = json_encode($offense);
					$offense_array["jp_offense_rate"] = json_encode($rate);
					$merge_offense[] = $offense_array;

				}
				
			}
			// echo json_encode($merge_offense);
			$this->Gcsa_model->insert_batch("jp_offense",$merge_offense);

			redirect("admin/pe_offense/");


		}
		
		$this->load->view("admin/includes/footer");
    }

    public function edit_pe_offense()
    {
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "edit_pe_offense",
		);

		$category_id = $this->uri->segment(3);


		$pe_category = $this->Gcsa_model->fetchAll("personnel_evaluation_category",["personnel_evaluation_category_id" => $category_id]);

		$pe_category = $pe_category[0];

		$category_name = $pe_category->personnel_evaluation_category_name;
		$pe_question = $this->Gcsa_model->fetchAll("personnel_evaluation_questions",["personnel_evaluation_category_id" => $category_id]);
		$offense_array = [];
		
		foreach ($pe_question as $questions) {
			$offense_object = new stdClass();
			$q_id = $questions->personnel_evaluation_questions_id;

			$offense_object->personnel_evaluation_questions_id = $q_id;
			$offense_object->personnel_evaluation_category_id = $questions->personnel_evaluation_category_id;
			$offense_object->personnel_evaluation_questions_content = $questions->personnel_evaluation_questions_content;

			$attempt_ar = [];
			$attempt_all = [];
			for ($attempt = 1; $attempt <= 4; $attempt++){
				$get_offense = $this->Gcsa_model->fetchAll("jp_offense",["jp_offense_qnumber"=>$q_id,"jp_offense_attempt"=>$attempt]);
				$get_offense = $get_offense[0];
				$var_jp_offense_id = $get_offense->jp_offense_id;
				$attempt_ar["jp_offense_id"] = $get_offense->jp_offense_id;
				$attempt_ar["jp_offense_attempt"] = $get_offense->jp_offense_attempt;
				$attempt_ar["jp_offense_qnumber"] = $get_offense->jp_offense_qnumber;
				$attempt_ar["pe_category_id"] = $get_offense->pe_category_id;
				$attempt_ar["jp_offense_name"] = json_decode($get_offense->jp_offense_name,true);
				$attempt_ar["jp_offense_rate"] = json_decode($get_offense->jp_offense_rate,true);
				$attempt_all[] = $attempt_ar;
				$this->form_validation->set_rules("offense".$attempt.$var_jp_offense_id."[]", "Offense", "required|regex_match['^[0-9a-zA-Z/,.\s]+$']");
				$this->form_validation->set_rules("rate".$attempt.$var_jp_offense_id."[]", "Rate", "required|numeric");
			}
			$offense_object->jp_offense = $attempt_all;
			$offense_array[] = $offense_object;
		}


		// var_dump($offense_array);
		// die;


		$body = [
			"pe_category" => $pe_category,
			"pe_question" => $pe_question,
			"offense" => $offense_array
		];



		$this->load->view("admin/includes/header",$uinfo);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_pe_offense",$body);
		}
		else{
			// die;
			foreach ($pe_question as $questions) {
				for ($attempt = 1; $attempt <= 4; $attempt++){
					$get_offense = $this->Gcsa_model->fetchAll("jp_offense",["jp_offense_qnumber"=>$q_id,"jp_offense_attempt"=>$attempt]);
					$get_offense = $get_offense[0];
					$var_jp_offense_id = $get_offense->jp_offense_id;

					$offense = $this->input->post("offense".$attempt.$var_jp_offense_id,true);
					$rate = $this->input->post("rate".$attempt.$var_jp_offense_id,true);
					$rate = array_map('intval', $rate);

					$update_data = [
						"jp_offense_name" => json_encode($offense),
						"jp_offense_rate" => json_encode($rate)
					];
					$where = ["jp_offense_id" => $var_jp_offense_id];
					$this->Gcsa_model->update("jp_offense",$update_data,$where);

				}
			}

			redirect("admin/pe_offense");

			// foreach ($pe_question as $key => $questions) {
			// 	$qnumber = $key+1;
			// 	$offense_array = [];
			// 	$q_id = $questions->personnel_evaluation_questions_id;
			// 	for ($attempt = 1; $attempt <= 4; $attempt++){
			// 		$offense = $this->input->post("offense".$attempt.$q_id,true);
			// 		$rate = $this->input->post("rate".$attempt.$q_id,true);
			// 		$rate = array_map('intval', $rate);
			// 		$offense_array["jp_offense_attempt"] = $attempt;
			// 		$offense_array["jp_offense_qnumber"] = $q_id;
			// 		$offense_array["pe_category_id"] = $category_id;
			// 		$offense_array["jp_offense_name"] = json_encode($offense);
			// 		$offense_array["jp_offense_rate"] = json_encode($rate);
			// 		$merge_offense[] = $offense_array;

			// 	}
				
			// }
			// // echo json_encode($merge_offense);
			// $this->Gcsa_model->insert_batch("jp_offense",$merge_offense);
		}

		$this->load->view("admin/includes/footer");
    }

    public function delete_pe_offense()
    {
    	$category_id = $this->uri->segment(3);
		$this->Gcsa_model->delete("jp_offense",["pe_category_id" => $category_id]);

		redirect("admin/pe_offense");

    }

    public function pe_offense()
    {
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "pe_offense",
		);


		$pe_category = $this->Gcsa_model->fetchAll("personnel_evaluation_category");
		$pe_category_offense = $this->Gcsa_model->pe_offense();

		$pe_category_offense_id = [];

		if ($pe_category_offense) {
			foreach ($pe_category_offense as $pe_category_offense_value) {
				$pe_category_offense_id[] = $pe_category_offense_value->pe_category_id;
			}
		}
		

		$body = [
			"pe_category" => $pe_category,
			"pe_category_offense" => $pe_category_offense_id
		];

		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/pe_offense",$body);
		$this->load->view("admin/includes/footer");
    }

    public function view_pe_offense()
    {
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "view_pe_offense",
		);

		$cat_id = $this->uri->segment(3);

		$pe_category = $this->Gcsa_model->fetchAll("personnel_evaluation_category",["personnel_evaluation_category_id" => $cat_id]);
		$pe_category = $pe_category[0];

		// $pe_question = $this->Gcsa_model->fetchAll("personnel_evaluation_questions",["personnel_evaluation_category_id" => $cat_id]);


		// $pe_offense_key = [];
		// $pe_offense = [];

		// $pe_offense_key["pe_category_name"] = $pe_category->personnel_evaluation_category_name;
		// $pe_offense[] = $pe_offense_key;

		// $pe_question
		

		// foreach ($pe_question as $pe_offense_question_value) {
		// 	$q_id = $pe_offense_question_value->personnel_evaluation_questions_id;

		// 	for ($i = 1; $i <= 4; $i++) {
		// 		$pe_offense = $this->Gcsa_model->pe_offense_question($cat_id,$q_id,$i);
		// 		var_dump($pe_offense);
		// 	}
		// }
		
		die;

		$pe_category_offense = $this->Gcsa_model->pe_offense_spec($cat_id);

		


		// $pe_offense_key["personnel_evaluation_category_id"] = $pe_category_offense[0]->personnel_evaluation_category_id;
		// $pe_offense_key["personnel_evaluation_category_name"] = $pe_category_offense[0]->personnel_evaluation_category_name;
		// $pe_offense_key["personnel_evaluation_questions_content"] = $pe_category_offense[0]->personnel_evaluation_questions_content;
		// $pe_offense_key["personnel_evaluation_questions_id"] = $pe_category_offense[0]->personnel_evaluation_questions_id;
		// $pe_offense[] = $pe_offense_key;
		
		

		foreach ($pe_category_offense as $pe_category_offense_value) {
			$pe_offense_key["jp_offense_attempt"] = $pe_category_offense_value->jp_offense_attempt;
			$pe_offense_key["jp_offense_attempt"] = $pe_category_offense_value->jp_offense_attempt;
			$pe_offense_key["jp_offense_name"] = json_decode($pe_category_offense_value->jp_offense_name,true);
			$pe_offense_key["jp_offense_rate"] = json_decode($pe_category_offense_value->jp_offense_rate,true);
			$pe_offense[] = $pe_offense_key;
		}
		
		$body = [
			// "pe_category" => $pe_category,
			"pe_offense" => $pe_offense
		];

		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/edit_pe_offense",$body);
		$this->load->view("admin/includes/footer");
    }

    public function add_personnel_evaluation_category()
    {
    	$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_personnel_evaluation_category",
		);
		$this->load->view("admin/includes/header",$uinfo);


		$personnel_question_category = $this->input->post("personnel_eval_category",true);
		if (!empty($personnel_question_category)) {
			foreach ($personnel_question_category as $personnel_question_category_key => $personnel_question_category_value) {
				$this->form_validation->set_rules("personnel_eval_category[$personnel_question_category_key]", "Evaluation Category", "required|regex_match['^[a-zA-Z/,.\s]+$']");
				
			}
		}


		$personnel_question_content = $this->input->post("personnel_question_content",true);
		if (!empty($personnel_question_content)) {
			foreach ($personnel_question_content as $personnel_question_content_key1 => $personnel_question_content_value1) {
				if (!empty($personnel_question_content_value1)) {
					foreach ($personnel_question_content_value1 as $personnel_question_content_key2 => $personnel_question_content_value2) {
						$this->form_validation->set_rules("personnel_question_content[$personnel_question_content_key1][$personnel_question_content_key2]", "Evaluation Question", "required|regex_match['^[a-zA-Z/,.\s]+$']");
					}
				}
				
			}
		}

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_personnel_evaluation_category");
		}
		else{
			$personnel_category = $this->input->post("personnel_eval_category",true);
			$personnel_questions = $this->input->post("personnel_question_content",true);
			foreach ($personnel_category as $personnel_category_key => $personnel_category_value) {
				$insert_category = [
					"personnel_evaluation_category_name" => $personnel_category_value
				];
				$category_id = $this->Gcsa_model->insert("personnel_evaluation_category",$insert_category);
				foreach ($personnel_questions[$personnel_category_key] as $personnel_questions_key => $personnel_questions_value) {
					$insert_question = [
						"personnel_evaluation_category_id" => $category_id["insert_id"],
						"personnel_evaluation_questions_content" => $personnel_questions_value
					];
					$this->Gcsa_model->insert("personnel_evaluation_questions",$insert_question);
				}
			}

			redirect("admin/personnel_evaluation_list");

		}
		
		$this->load->view("admin/includes/footer");
    }
 

	public function performance_evaluation(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "performance_evaluation",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>2));

		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/performance_evaluation",$datas);
		$this->load->view("admin/includes/footer");
	}

	public function performance_evaluation_list()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "performance_evaluation_list",
		);


		$category = $this->Gcsa_model->fetchAll("category");

		$body = ["category" => $category];

		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/performance_evaluation_list",$body);
		$this->load->view("admin/includes/footer");
	}

	public function edit_performance_evaluation()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "performance_evaluation_list",
		);

		$cat_id = $this->uri->segment(3);

		$category = $this->Gcsa_model->fetchAll("category",["category_id" => $cat_id]);
		$category = $category[0];
		$questions = $this->Gcsa_model->fetchAll("question",["category_id" => $cat_id]);

		$body = ["category" => $category,"question" => $questions];

		$this->form_validation->set_rules("question_category", "Evaluation Category", "required|regex_match['^[a-zA-Z/,.\s]+$']");

		$question_points = $this->input->post("question_points",true);
		if (!empty($question_points)) {
			foreach ($question_points as $question_points_key => $question_points_value) {
				$this->form_validation->set_rules("question_points[$question_points_key]", "Question Points", "required|numeric");
			}
		}

		$question = $this->input->post("question_name",true);
		if (!empty($question)) {
			foreach ($question as $question_key => $question_value) {
				$this->form_validation->set_rules("question_name[$question_key]", "Evaluation Question", "required|regex_match['^[a-zA-Z/,.\s]+$']");
			}
		}



		$this->load->view("admin/includes/header",$uinfo);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/edit_performance_evaluation",$body);
		}
		else{

			$cat_id = $this->uri->segment(3);

			$category_name = $this->input->post("question_category",true);
			$category = [
				"category_name" => $category_name
			];
			$this->Gcsa_model->update("category",$category,["category_id"=> $cat_id]);
			
			$question = $this->input->post("question_name",true);
			$points = $this->input->post("question_points",true);
			foreach ($question as $question_id => $question_name) {
				$question = [
					"category_id" => $cat_id,
					"question_points" => $points[$question_id],
					"question_name" => $question_name
				];
				$this->Gcsa_model->update("question",$question,["question_id"=> $question_id]);
			}
			redirect("admin/performance_evaluation_list");

		}
		
		$this->load->view("admin/includes/footer");
	}

	public function delete_performance_evaluation()
	{
		$category_id = $this->uri->segment(3);
		$this->Gcsa_model->delete("category" ,["category_id" => $category_id]);
		$this->Gcsa_model->delete("question" ,["category_id" => $category_id]);
		redirect("admin/performance_evaluation_list");
	}

	public function delete_pe()
	{
		$category_id = $this->uri->segment(3);
		$this->Gcsa_model->delete("personnel_evaluation_category" ,["personnel_evaluation_category_id" => $category_id]);
		
		$fetch_pe = $this->Gcsa_model->fetchAll("personnel_evaluation_questions",["personnel_evaluation_category_id" => $category_id]);
		foreach ($fetch_pe as $fetch_pe_value) {
			$q_id = $fetch_pe_value->personnel_evaluation_questions_id;
			$this->Gcsa_model->delete("jp_offense" ,["jp_offense_qnumber" => $q_id]);
		}

		$this->Gcsa_model->delete("personnel_evaluation_questions" ,["personnel_evaluation_category_id" => $category_id]);


		redirect("admin/personnel_evaluation_list");
	}

	public function add_performance_evaluation()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_performance_evaluation",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>2));

		$datas = array("acc_admin"=>$account_admin);
		$this->load->view("admin/includes/header",$uinfo);


		$category = $this->input->post("question_category",true);
		if (!empty($category)) {
			foreach ($category as $category_key => $category_value) {
				$this->form_validation->set_rules("question_category[$category_key]", "Evaluation Category", "required|regex_match['^[a-zA-Z/,.\s]+$']");
			}
		}

		$eval_question = $this->input->post("question_content",true);
		if (!empty($eval_question)) {
			foreach ($eval_question as $eval_questiony_key1 => $eval_question_value1) {
				if (!empty($eval_question_value1)) {
					foreach ($eval_question_value1 as $eval_questiony_key2 => $eval_question_value2) {
						$this->form_validation->set_rules("question_content[$eval_questiony_key1][$eval_questiony_key2]", "Evaluation Question", "required|regex_match['^[a-zA-Z/,.\s]+$']");
					}
				}
				
			}
		}


		$eval_question_points = $this->input->post("question_points",true);
		if (!empty($eval_question_points)) {
			foreach ($eval_question_points as $eval_question_points_key1 => $eval_question_points_value1) {
				if (!empty($eval_question_points_value1)) {
					foreach ($eval_question_points_value1 as $eval_question_points_key2 => $eval_question_points_value2) {
						$this->form_validation->set_rules("question_points[$eval_question_points_key1][$eval_question_points_key2]", "Evaluation Question Points", "required|numeric");
					}
				}
				
			}
		}


		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/add_performance_evaluation",$datas);
		}
		else{

			foreach ($category as $category_key => $category_value) {
				$insert_category = [
					"category_name" => $category_value
				];
				$category_id = $this->Gcsa_model->insert("category",$insert_category);
				foreach ($eval_question[$category_key] as $eval_question_key => $eval_question_value) {
					


					$question_name = $eval_question_value;
					$category_number = $eval_question_key + 1;
					$question_points = $eval_question_points[$category_key][$eval_question_key];

					$insert_question = [
						"category_id" => $category_id["insert_id"],
						"question_number" => $category_number,
						"question_points" => $question_points,
						"question_name" => $question_name
					];

					$this->Gcsa_model->insert("question",$insert_question);

				}
			}
			redirect("admin/performance_evaluation_list");

		}
		
		$this->load->view("admin/includes/footer");
	}

	public function view_performance_evaluation()
	{
		$category = $this->Gcsa_model->fetchAll("category");

		$category_question = [];
		foreach ($category as $category_value) {
			
			$question = $this->Gcsa_model->fetchAll("question",["category_id"=>$category_value->category_id]);
			$questions = [];
			$questions[] = $category_value->category_name;
			
			$input_name = preg_replace('/\s+/', '', strtolower($category_value->category_name));
			$this->form_validation->set_rules($input_name, $category_value->category_name, 'required');	
			foreach ($question as $question_value) {
				$questions[] = $question_value->question_name;

			}
			$cat_name = $category_value->category_name;
			$category_question[] = $questions;

		}


		$body = ["evals" => $category_question];

		$id = $this->uri->segment(3);

		$user_info = $this->Gcsa_model->fetchDetachment(2,$id);
		$user_info = $user_info[0];

		$data = array("userinfo" => $user_info);



		$this->load->view("admin/includes/eval_header",$data);

		

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/view_performance_evaluation",$body);
		}
		else{
			$category = $this->Gcsa_model->fetchAll("category");
			$total = 0;
			$adjective_rating = "";
			$descriptive_rating = "";
			$rating_id = "";
			$userid = $this->uri->segment(3);
			$evaluation_summary = array();
			
			
			foreach ($category as $category_value) {
				$rp_value = $category_value->category_points;
				$rp_title = $category_value->category_name;
				$input_name = preg_replace('/\s+/', '', strtolower($rp_title));
				$ans = $this->input->post($input_name);
				$jsonArray = json_decode($rp_value,true);
				$total += $jsonArray[$ans];
				$evaluation_summary += array_merge($evaluation_summary,array($rp_title => $jsonArray[$ans]));
			}
			
			$get_num_rating = $this->Gcsa_model->fetchAll("rating");
			foreach ($get_num_rating as $value) {
				$rate_decode = json_decode($value->rating_numerical);

				$array_count = count($rate_decode);
				if ($array_count > 1) {
					if ($total >= $rate_decode[0] && $total <= $rate_decode[1]) {
						$rating_id = $value->rating_id;
						$adjective_rating = $value->rating_adjective;
						$descriptive_rating = $value->rating_descriptive;
					}
				}
				else{
					if ($total == $rate_decode[0] || $total <= $rate_decode[0]) {
						$rating_id = $value->rating_id;
						$adjective_rating = $value->rating_adjective;
						$descriptive_rating = $value->rating_descriptive;
					}
				}
			}

			$where = array("rating_id" => $rating_id);

			$merit_data = $this->Gcsa_model->fetchAll("merit_rating_basis",$where);
			$merit_data = $merit_data[0];

			$uinfo = $this->Gcsa_model->fetchDetachment(2,$userid);
			$uinfo = $uinfo[0];

			$period_covered = array("from"=>$uinfo->ec_date_hired,"to"=>time());
			$period_covered = json_encode($period_covered);

			echo "Total Points: ".$total."<br>"."Adjective Rating: ".$adjective_rating."<br>"."Descriptive Rating: ".$descriptive_rating."<br>"."Salary Increase: ".$merit_data->increase."%";
		}
		$this->load->view("admin/includes/eval_footer");
	}

	public function assessment(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "assessment",
		);


		$account_admin = $this->Gcsa_model->fetchAll("accounts",array("account_access"=>1));


		$get_remarks = $this->Gcsa_model->get_remarks();
		$datas = array("acc_admin"=>$account_admin,"assess" => $get_remarks);


		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/assessment",$datas);
		$this->load->view("admin/includes/footer");
	}


	public function submit_hired()
	{
		$id = $this->uri->segment(3);
		$edit_remarks = ["remarks_hired" => 1,"date_hired" => time()];
		$where = ['remarks_id' => $id];
		$this->Gcsa_model->update("remarks",$edit_remarks,$where);
		redirect("admin/floater");
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

	public function examinee(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "examinee",
		);

		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/exam/examinee");
		$this->load->view("admin/includes/footer");
	}

	public function exam_questions(){
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$questions = $this->Gcsa_model->getExams();

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "exam_questions",
		);

		$formatted_questions = [];
		$formatted_questions_details = [];
		$choices = [];
		$questionIds = [];
		foreach($questions as $question){
			$hasQuestionId = in_array($question->exam_question_id,$questionIds);
			if(!$hasQuestionId){
				$formatted_questions_details = [];
				$choices = [];
				array_push($questionIds,$question->exam_question_id);
			}
			array_push($choices,$question->exam_choice_text);
			$formatted_questions_details["question"] = $question->exam_question_text;
			$formatted_questions_details["choices"] = $choices;
			
			$formatted_questions[$question->exam_question_number] = $formatted_questions_details;
		}

		$data_body = array(
			"formatted_questions" => $formatted_questions
		);

		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/exam/exam_questions",$data_body);
		$this->load->view("admin/includes/footer");
	}

	public function add_exam_question()
	{
		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];

		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "add_exam_questions",
		);

		$this->load->view("admin/includes/header",$uinfo);
		$this->load->view("admin/exam/add_exam_questions");
		$this->load->view("admin/includes/footer");
	}

	public function unpost_post_job(){
		$jobid = $this->uri->segment(3);
		$job_posted_status = $this->uri->segment(4);

		$job_post_unpost = ($job_posted_status == 0 ? 1 : 0);

		$where = array("job_id" => $jobid);
		$job_posted = array("job_posted" => $job_post_unpost);

		$this->Gcsa_model->update("jobs",$job_posted,$where);
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

			$this->Gcsa_model->update("jobs",$job,$where);
			redirect("admin/jobs");
		}

		$this->load->view("admin/includes/footer");

	}

	public function pdf_withexp(){
		$id = $this->uri->segment(3);
		$data_user = array();
		$data_user = $this->Gcsa_model->fetchAll("applicant",["applicant_id" => $id]);
		$data_user = $data_user[0];
		$apd_json = json_decode($data_user->applicant_personal_data,true);
		$ae_json = json_decode($data_user->applicant_education,true);
		$aer_json = json_decode($data_user->applicant_employment_record,true);
		$ast_json = json_decode($data_user->applicant_seminars_ta,true);



		$body = [
			"applicant_id" => $data_user->applicant_id,
			"apd_info" => $apd_json,
			"ae_info" => $ae_json,
			"aer_info" => $aer_json,
			"ast_info" => $ast_json,
			"experience_status" => $data_user->experience_status


		];
		$this->load->view("AF_withexp.php",$body);
		$html = $this->output->get_output();


		
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}	

	public function pdf_withoutexp(){
		$id = $this->uri->segment(3);
		$data_user = array();
		$data_user = $this->Gcsa_model->fetchAll("applicant",["applicant_id" => $id]);
		$data_user = $data_user[0];
		$apd_json = json_decode($data_user->applicant_personal_data,true);
		$ae_json = json_decode($data_user->applicant_education,true);
		$aer_json = json_decode($data_user->applicant_employment_record,true);
		$ast_json = json_decode($data_user->applicant_seminars_ta,true);



		$body = [
			"applicant_id" => $data_user->applicant_id,
			"apd_info" => $apd_json,
			"ae_info" => $ae_json,
			"aer_info" => $aer_json,
			"ast_info" => $ast_json,
			"experience_status" => $data_user->experience_status

		];
		$this->load->view("AF_withoutexp.php",$body);
		$html = $this->output->get_output();


		
		$this->dompdf->loadHtml($html);
		$this->dompdf->setPaper('A4', 'portrait');
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
	}	

	public function sam(){
		$this->load->view("admin/applicant_success");
	}

	public function text_message()
	{
		$acc_id = $this->uri->segment(3);

		$userinfo = $this->Gcsa_model->fetchAll("accounts",array("email"=>$this->session->adminemail));
		$userinfo = $userinfo[0];
		$uinfo = array(
			"acc_info"=> $userinfo,
			"page_name"=> "text_message",
		);
	

		$this->load->view("admin/includes/header",$uinfo);

		$this->form_validation->set_rules('w_sms_content_passed', 'SMS Content (With Experience)', 'required|regex_match["^[^<>$!&]*$"]');
		$this->form_validation->set_rules('wo_sms_content_passed', 'SMS Content (Without Experience)', 'required|regex_match["^[^<>$!&]*$"]');

		$this->form_validation->set_rules('w_sms_content_failed', 'SMS Content (With Experience)', 'required|regex_match["^[^<>$!&]*$"]');
		$this->form_validation->set_rules('wo_sms_content_failed', 'SMS Content (Without Experience)', 'required|regex_match["^[^<>$!&]*$"]');

		$get_sms_content = $this->Gcsa_model->fetchAll("sms");
		$get_sms_content = $get_sms_content[0];
		$w_sms_content_passed = "";
		$wo_sms_content_passed = "";
		$w_sms_content_failed = "";
		$wo_sms_content_failed = "";
		if ($get_sms_content) {
			$w_sms_content_passed = $get_sms_content->w_sms_content_passed;
			$wo_sms_content_passed = $get_sms_content->wo_sms_content_passed;
			$w_sms_content_failed = $get_sms_content->w_sms_content_failed;
			$wo_sms_content_failed = $get_sms_content->wo_sms_content_failed;
		}

		$body = [
			"w_sms_content_passed" => $w_sms_content_passed,
			"wo_sms_content_passed" => $wo_sms_content_passed,
			"w_sms_content_failed" => $w_sms_content_failed,
			"wo_sms_content_failed" => $wo_sms_content_failed
		];

		if ($this->form_validation->run() == FALSE) {
			$this->load->view("admin/text_message",$body);
		}
		else{
			$w_sms_content_passed = $this->input->post("w_sms_content_passed",true);
			$wo_sms_content_passed = $this->input->post("wo_sms_content_passed",true);
			$w_sms_content_failed = $this->input->post("w_sms_content_failed",true);
			$wo_sms_content_failed = $this->input->post("wo_sms_content_failed",true);

			if ($get_sms_content) {
				
				$sms_id = $get_sms_content->sms_id;
				$update_sms_content = [
					"w_sms_content_passed" => $w_sms_content_passed,
					"wo_sms_content_passed" => $wo_sms_content_passed,
					"w_sms_content_failed" => $w_sms_content_failed,
					"wo_sms_content_failed" => $wo_sms_content_failed,
					"sms_updated_date" => time()
				];
				$status = $this->Gcsa_model->update("sms",$update_sms_content,["sms_id" => $sms_id]);
			}
			else{
				$insert_sms_content = [
					"w_sms_content_passed" => $w_sms_content_passed,
					"wo_sms_content_passed" => $wo_sms_content_passed,
					"w_sms_content_failed" => $w_sms_content_failed,
					"wo_sms_content_failed" => $wo_sms_content_failed,
					"sms_created_date" => time(),
					"sms_updated_date" => time()
				];
				$this->Gcsa_model->insert("sms",$insert_sms_content);
			}
			
			redirect("admin/text_message");
		}

		$this->load->view("admin/includes/footer");

	}

	public function sendsms_withexp(){
		$sms_content = $this->input->post("sms_content",true);

		$this->form_validation->set_rules('sms_content', 'SMS Content', 'required|regex_match["^[^<>$!&]*$"]');

		$return = [];
		if ($this->form_validation->run() == FALSE) {
			$return["errors"] = $this->form_validation->error_array();
			$return["has_error"] = true;
		}
		else{

			$this->nexmo->set_format('json');
			$cnum = $this->input->post("num",true);
			if (preg_match("/^(\+639)\d{9}$/", $cnum)) {
				$cnum = substr($cnum,3);
			}
			else if (preg_match("/^(09)\d{9}$/", $cnum)) {
				$cnum = substr($cnum,1);
			}
	        // **********************************Text Message*************************************
	        $from = 'Goldcross';
	        $to = '+63'.$cnum;

	        $message = array(
	            'text' => $sms_content,
	        );
	        $response = $this->nexmo->send_message($from, $to, $message);
	        $stat = json_encode($response["messages"]);
	        $stat = json_decode($stat);
	        $return["has_error"] = false;
	        $return["number"] = $to;
	        $return["status"] = $stat[0]->status;
		}
		echo json_encode($return);
	}



	public function sendsms_withoutexp(){


		$this->nexmo->set_format('json');

        $cnum = $this->input->post("cnumber");
		if (preg_match("/^(\+639)\d{9}$/", $cnum)) {
			$cnum = substr($cnum,3);
		}
		else if (preg_match("/^(09)\d{9}$/", $cnum)) {
			$cnum = substr($cnum,1);
		}
        // **********************************Text Message*************************************
        $from = 'Goldcross';
        $to = '+63'.$cnum;

        $get_sms_content = $this->Gcsa_model->fetchAll("sms");
        $get_sms_content = $get_sms_content[0];
        $wo_sms_content = $get_sms_content->wo_sms_content;

        $message = array(
            'text' => $wo_sms_content,
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        echo "<h1>Text Message</h1>";
        // $this->nexmo->d_print($response);
        // echo $response;
        $stat = json_encode($response["messages"]);
        $stat = json_decode($stat);
        echo $stat[0]->status;
        echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";


	}


	public function pred(){



				$json = exec('\xampp\htdocs\goldcross\pred');
				$data = json_decode($json);
				echo $data;


	}





	public function signout(){
		$this->session->sess_destroy();
		redirect("adminlogin/login");
	}





}
