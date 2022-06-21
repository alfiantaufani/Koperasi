<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ReturPembelian extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		if (!$this->M_login->logged_id()) {
			redirect('login');
		}
		if($this->session->userdata('level') !='administrator'){
			redirect('login');
		}
	}

    public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/returpembelian/index');
	}
}