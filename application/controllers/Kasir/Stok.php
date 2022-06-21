<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Stok extends CI_Controller {
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
		$this->load->view('kasir/v_stok');

	}
	public function tampil()
	{
	  $dtJSON = '{"data": [xxx]}';
	  $dtisi = "";
	  $dt = $this->M_stok->mtampil();
	  foreach ($dt as $k){
	      $nama_produk= $k->nama_produk;
	      $kategori= $k->nama_kategori;
	      $jumlah = $k->jumlah;
	      $dtisi .= '["'.$nama_produk.'","'.$kategori.'","'.$jumlah.'"],';
	  }
	  $dtisifix = rtrim($dtisi, ",");
	  $data = str_replace("xxx", $dtisifix, $dtJSON);
	  echo $data;
	}


}