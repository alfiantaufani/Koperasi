<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->M_login->logged_id()) {
			redirect('login');
		}
		if($this->session->userdata('level') !='kasir'){
			redirect('login');
		}
	}
	
	public function index()
	{
		$this->load->view('kasir/v_header');
		$this->load->view('kasir/v_home');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
