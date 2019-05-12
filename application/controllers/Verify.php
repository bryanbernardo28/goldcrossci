<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {


	public function __construct(){
		parent::__construct();
		$this->load->model("Gcsa_model");
	}


	public function verify_account(){
        $code = $this->uri->segment(3);
        $access = $this->uri->segment(4);
        $this->Gcsa_model->update('accounts',['status'=>1],['verification_code'=>$code]);
        if ($access == 1) {
        	redirect('adminlogin/login');
        }
        else if ($access == 2) {
        	# code...
        }
        else if ($access == 3) {
        	redirect('clientlogin/login');
        }
    }
}
