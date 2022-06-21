<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Jenis_pembayaran extends CI_Controller {
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
    $this->load->view('admin/jenis_pembayaran');
  }
  public function tampil()
  {
    $dtJSON = '{"data": [xxx]}';
    $dtisi = "";
    $dt = $this->M_jenis_pembayaran->mtampil();
    foreach ($dt as $k){
        $id_jenis_pembayaran = $k->id_jenis_pembayaran;
        $nama_jenis_pembayaran = $k->nama_jenis_pembayaran;

        $tomboledit = "<button type='button' class='btn btn-warning  btn-sm' data-toggle='modal' data-target='#myModal' data-kode='".$id_jenis_pembayaran."' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button> <button type='button' class='btn btn-danger btn-sm' onclick='hapus(".$id_jenis_pembayaran.");'><i class='mdi mdi-delete'></i></button>";
        $dtisi .= '["'.$nama_jenis_pembayaran.'","'.$tomboledit.'"],';
    }
    $dtisifix = rtrim($dtisi, ",");
    $data = str_replace("xxx", $dtisifix, $dtJSON);
    echo $data;
  }
    public function tambahjenispembayaran(){
        $nama_jenis_pembayaran = $this->input->post("njp");
        

        $operasi = $this->M_jenis_pembayaran->mtambahjenispembayaran($nama_jenis_pembayaran);
        echo $operasi;

  }

  function editjenispembayaran(){
      $kode = $this->input->post("kd");
      $dt = $this->M_jenis_pembayaran->meditjenispembayaran($kode);
      $dtkirim = "";
      if(is_array($dt)){
          foreach($dt as $x){
              $dtkirim = "1|".$x->id_jenis_pembayaran."|".$x->nama_jenis_pembayaran;
          }
      }else{$dtkirim = "0|";}
      echo $dtkirim;
  }

  function hapusjenispembayaran(){
    $a = $this->input->post("kode");
        $operasi = $this->M_jenis_pembayaran->mhapusjenispembayaran($a);
        echo $operasi;
  }
  function updatejenispembayaran(){
      $id = $this->input->post("id");
      $jenis_pembayaran= $this->input->post("jenis_pembayaran");
         
      $operasi = $this->M_jenis_pembayaran->mupdatejenispembayaran($id,$jenis_pembayaran);
          echo $operasi;
      }



}
