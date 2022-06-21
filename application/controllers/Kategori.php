<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kategori extends CI_Controller {
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
		$this->load->view('admin/kategori');
	}
	public function tampil()
	{
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$dt = $this->M_kategori->mtampil();
		foreach ($dt as $k){
		    $id_kategori = $k->id_kategori;
		    $nama_kategori = $k->nama_kategori;

		    $tomboledit = "<button type='button' class='btn btn-warning  btn-sm' data-toggle='modal' data-target='#myModal' data-kode='".$id_kategori."' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button> <button type='button' class='btn btn-danger btn-sm' onclick='hapus(".$id_kategori.");'><i class='mdi mdi-delete'></i></button>";
		    $dtisi .= '["'.$nama_kategori.'","'.$tomboledit.'"],';
		}
		$dtisifix = rtrim($dtisi, ",");
		$data = str_replace("xxx", $dtisifix, $dtJSON);
		echo $data;
	}
    public function tambahkategori(){
        $nama_kategori = $this->input->post("nk");
        

        $operasi = $this->M_kategori->mtambahkategori($nama_kategori);
        echo $operasi;

	}

	function editkategori(){
	    $kode = $this->input->post("kd");
	    $dt = $this->M_kategori->meditkategori($kode);
	    $dtkirim = "";
	    if(is_array($dt)){
	        foreach($dt as $x){
	            $dtkirim = "1|".$x->id_kategori."|".$x->nama_kategori;
	        }
	    }else{$dtkirim = "0|";}
	    echo $dtkirim;
	}

	function hapuskategori(){
		$a = $this->input->post("kode");
        $operasi = $this->M_kategori->mhapuskategori($a);
        echo $operasi;
	}
	function updatekategori(){
	    $id = $this->input->post("id");
	    $kategori = $this->input->post("kategori");
	       
	    $operasi = $this->M_kategori->mupdatekategori($id,$kategori);
	        echo $operasi;
	    }



}
