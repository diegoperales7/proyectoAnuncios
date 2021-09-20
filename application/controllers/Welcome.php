<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function index()
	{
		$this->load->view('/inc/header_view.php');
		$this->load->view('welcome_message');
		$this->load->view('/inc/footer_view.php');
	}

	public function login()
	{
		$this->load->view('/inc/header_view.php');
		$this->load->view('login');
		$this->load->view('/inc/footer_view.php');
	}
}
