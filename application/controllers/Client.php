<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_controller{



	public function Home(){


		$this->load->view('user/includes/header');
		$this->load->view('user/index');
		$this->load->view('user/includes/footer');
	}


	public function about_us(){
		$this->load->view('user/includes/header');
		$this->load->view('user/aboutus');
		$this->load->view('user/includes/footer');
	}
}