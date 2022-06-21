<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {
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
		$this->load->view('kasir/v_barang_masuk');

	}
	public function tampil()
	{
	  $dtJSON = '{"data": [xxx]}';
	  $dtisi = "";
	  $dt = $this->M_barang_masuk->mtampil();
	  foreach ($dt as $k){
	      $id_pemasukan = $k->id_pemasukan;
	      $nama_produk = $k->nama_produk;
	      $tanggal= $k->tanggal;
	      $jumlah= $k->jumlah;
	      

	      $tomboledit = "<button type='button' class='btn btn-warning  btn-sm' data-toggle='modal' data-target='#myModal' data-kode='".$id_pemasukan."' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button> ";
	      $dtisi .= '["'.$nama_produk.'","'.$tanggal.'","'.$jumlah.'","'.$tomboledit.'"],';
	  }
	  $dtisifix = rtrim($dtisi, ",");
	  $data = str_replace("xxx", $dtisifix, $dtJSON);
	  echo $data;
	}
	function tampilproduk(){
		$data = $this->M_barang_masuk->mtampilproduk();
		echo json_encode($data);
	}
	function hapusbarangmasuk(){
	  $a = $this->input->post("kode");
	      $operasi = $this->M_barang_masuk->mhapusbarangmasuk($a);
	      echo $operasi;
	}

	public function tambahbarangmasuk(){
		$nama_produk = $this->input->post("nama_produk");
	    $tanggal = $this->input->post("tanggal");
	    $jumlah = $this->input->post("jumlah");
	        $operasi = $this->M_barang_masuk->mtambahbarangmasuk($nama_produk,$tanggal,$jumlah);
	        echo $operasi;

		}

		function editbarangmasuk(){
		    $kode = $this->input->post("kode");
		    $dt = $this->M_barang_masuk->meditbarangmasuk($kode);
		    $dtkirim = "";
		    if(is_array($dt)){
		        foreach($dt as $x){
		            $dtkirim = "1|".$x->id_produk."|".$x->tanggal."|".$x->jumlah;
		        }
		    }else{$dtkirim = "0|";}
		    echo $dtkirim;
		}
		function updatebarangmasuk(){
			$id_pemasukan = $this->input->post("id_pemasukan");
		    $nama_produk = $this->input->post("nama_produk");
		    $tanggal= $this->input->post("tanggal");
		    $jumlah= $this->input->post("jumlah");
		    $operasi = $this->M_barang_masuk->mupdatebarangmasuk($id_pemasukan,$nama_produk,$tanggal,$jumlah);
		        echo $operasi;
		    }


}