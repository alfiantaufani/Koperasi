<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Harga extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
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
		$this->load->view('admin/harga');
	}
	function tampilproduk(){
		$data = $this->M_harga->mtampilproduk();
		echo json_encode($data);
	}
	public function tampil()
	{
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_harga->mtampil();
			foreach ($dt as $k){
				$id_harga= $k->id_harga;
			    $id_produk = $k->id_produk;
			    $nama_produk= $k->nama_produk;
			    $harga= $k->harga;
			    

			    $tomboledit = "<button type='button' class='btn btn-warning  btn-sm' data-toggle='modal' data-target='#myModal' data-kode='".$id_harga."' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button> <button type='button' class='btn btn-danger btn-sm' onclick='hapus(".$id_harga.");'><i class='mdi mdi-delete'></i></button>";
			    $dtisi .= '["'.$nama_produk.'","'.$harga.'","'.$tomboledit.'"],';
			}
			$dtisifix = rtrim($dtisi, ",");
			$data = str_replace("xxx", $dtisifix, $dtJSON);
			echo $data;
		}
	public function tambahharga(){
		$nama_produk = $this->input->post("nama_produk");
	    $harga = $this->input->post("harga");
	        $operasi = $this->M_harga->mtambahharga($nama_produk,$harga);
	        echo $operasi;

		}

		function editharga(){
		    $kode = $this->input->post("kd");
		    $dt = $this->M_harga->meditharga($kode);
		    $dtkirim = "";
		    if(is_array($dt)){
		        foreach($dt as $x){
		            $dtkirim = "1|".$x->id_produk."|".$x->harga;
		        }
		    }else{$dtkirim = "0|";}
		    echo $dtkirim;
		}

		function hapusharga(){
			$a = $this->input->post("kode");
	        $operasi = $this->M_harga->mhapusharga($a);
	        echo $operasi;
		}
		function updateharga(){
			$id_harga = $this->input->post("id_harga");
		    $nama_produk= $this->input->post("nama_produk");
		    $harga= $this->input->post("harga");
		    $operasi = $this->M_harga->mupdateharga($id_harga,$nama_produk,$harga);
		        echo $operasi;
		    }



}
