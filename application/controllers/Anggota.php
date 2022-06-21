<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Anggota extends CI_Controller {
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
		$this->load->view('admin/anggota');
	}
	public function tampil()
	{
		$dtJSON = '{"data": [xxx]}';
		$dtisi = "";
		$no = 1;
		$dt = $this->M_anggota->mtampil();
			foreach ($dt as $k){
			    $nama = $k->nama;
			    $no_hp = $k->no_hp;

			    $tomboledit = "<button type='button' class='btn btn-warning  btn-sm' data-toggle='modal' data-target='#myModal' data-kode='".$k->id."' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button> <button type='button' class='btn btn-danger btn-sm' data-kode='".$k->id."'  onclick='hapus(this);'><i class='mdi mdi-delete'></i></button>";
			    $dtisi .= '["'.$no++.'","'.$nama.'","'.$no_hp.'","'.$tomboledit.'"],';
			}
			$dtisifix = rtrim($dtisi, ",");
			$data = str_replace("xxx", $dtisifix, $dtJSON);
			echo $data;
		}
	public function tambahanggota(){
		$nama = $this->input->post("nama");
		$no_hp = $this->input->post("no_hp");
		$tgl_gabung = $this->input->post("tgl_gabung");
		// $operasi = $this->M_anggota->mtambahanggota($nama,$no_hp,$tgl_gabung);
		$data = array( 
			'nama'   => $nama,
			'no_hp '=> $no_hp,
			'tgl_gabung'=> $tgl_gabung,
		);
		$create = $this->db->insert('tbl_anggota',$data);
		if ($create) {
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode('success'));
		} else {
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode('error'));
		} 

	}

		function editanggota(){
		    $kode = $this->input->post("kd");
		    $dt = $this->M_anggota->meditanggota($kode);
		    $dtkirim = "";
		    if(is_array($dt)){
		        foreach($dt as $x){
		            $dtkirim = "1|".$x->id."|".$x->nama."|".$x->no_hp."|".$x->tgl_gabung;
		        }
		    }else{$dtkirim = "0|";}
		    echo $dtkirim;
		}

		function hapusanggota(){
			$a = $this->input->post("kode");
			$cek_piutang = $this->db->query("SELECT * FROM tbl_piutang WHERE id_anggota='$a'")->num_rows();
			if ($cek_piutang > 0) {
				return "0";
			}else{
				$operasi = $this->M_anggota->mhapusanggota($a);
				echo $operasi;
			}
		}
		function updateanggota(){
		    $id= $this->input->post("kode");
		    $nama= $this->input->post("nama");
		    $no_hp= $this->input->post("no_hp");
		    $tgl_gabung= $this->input->post("tgl_gabung");  
		    $operasi = $this->M_anggota->mupdateanggota($id,$nama,$no_hp,$tgl_gabung);
		        echo $operasi;
		    }



}
