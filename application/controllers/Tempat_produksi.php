<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tempat_produksi extends CI_Controller {
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
    $this->load->view('admin/tempat_produksi');
  }
  public function tampil()
  {
    $dtJSON = '{"data": [xxx]}';
    $dtisi = "";
    $dt = $this->M_tempat_produksi->mtampil();
    foreach ($dt as $k){
        $id_tempat_produksi = $k->id_tempat_produksi;
        $nama_tempat_produksi = $k->nama_tempat_produksi;
        $alamat = $k->alamat;

        $tomboledit = "<button type='button' class='btn btn-warning  btn-sm' data-toggle='modal' data-target='#myModal' data-kode='".$id_tempat_produksi."' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button> <button type='button' class='btn btn-danger btn-sm' onclick='hapus(".$id_tempat_produksi.");'><i class='mdi mdi-delete'></i></button>";
        $dtisi .= '["'.$nama_tempat_produksi.'","'.$alamat.'","'.$tomboledit.'"],';
    }
    $dtisifix = rtrim($dtisi, ",");
    $data = str_replace("xxx", $dtisifix, $dtJSON);
    echo $data;
  }
    public function tambahtempatproduksi(){
        $nama_tempat_produksi = $this->input->post("ntp");
        $alamat= $this->input-> post ("alamat");
        $operasi = $this->M_tempat_produksi->mtambahtempatproduksi($nama_tempat_produksi,$alamat);
        echo $operasi;

  }

  function edittempatproduksi(){
      $kode = $this->input->post("kd");
      $dt = $this->M_tempat_produksi->medittempatproduksi($kode);
      $dtkirim = "";
      if(is_array($dt)){
          foreach($dt as $x){
              $dtkirim = "1|".$x->id_tempat_produksi."|".$x->nama_tempat_produksi."|".$x->alamat;
          }
      }else{$dtkirim = "0|";}
      echo $dtkirim;
  }

  function hapustempatproduksi(){
    $a = $this->input->post("kode");
        $operasi = $this->M_tempat_produksi->mhapustempatproduksi($a);
        echo $operasi;
  }
  function updatetempatproduksi(){
      $id = $this->input->post("id");
      $nama_tempat_produksi= $this->input->post("nama_tempat_produksi");
      $alamat = $this->input->post("alamat");  
      $operasi = $this->M_tempat_produksi->mupdatetempatproduksi($id,$nama_tempat_produksi,$alamat);
          echo $operasi;
      

}

}
