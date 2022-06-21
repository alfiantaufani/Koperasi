<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Booking extends CI_Controller {
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
		$this->load->view('kasir/v_booking');

	}
	public function tampil()
	{
	  $dtJSON = '{"data": [xxx]}';
	  $dtisi = "";
	  $dt = $this->M_booking->mtampil();
	  foreach ($dt as $k){
	      $id_booking = $k->id_booking;
	      $nama = $k->nama;
	      $tanggal_booking= $k->tanggal_booking;
	      $status= $k->status;
	      $tanggal_ambil= $k->tanggal_ambil;
	      $nama_produk= $k->nama_produk;
	      $jumlah= $k->jumlah;
	      
	      if($status == 'Ditolak'){
	      	$tomboledit = "<button type='button' class='btn btn-warning btn-sm' onclick='lanjut_status(".$id_booking.");'><i class='fa fa-edit'></i></button>";
	      }else if ($status == 'Menunggu Pembayaran'){
	      	$tomboledit = "<button type='button' class='btn btn-warning btn-sm' onclick='lanjut_status(".$id_booking.");'><i class='fa fa-edit'></i></button>  <button type='button' class='btn btn-success btn-sm' onclick='lanjut_bayar(".$id_booking.");'><i class='fa fa-shopping-cart'></i></button> ";
	      }elseif($status == 'Bayar Tunai Selesai'){
	      	$tomboledit = "-";

	      }
	      else{
	      	$tomboledit = "<button type='button' class='btn btn-primary btn-sm' onclick='setuju(".$id_booking.");'><i class=' dripicons-thumbs-up'></i></button> <button type='button' class='btn btn-danger btn-sm' onclick='tolak(".$id_booking.");'><i class=' dripicons-thumbs-down'></i></button>";

	      }

	     
	      $dtisi .= '["'.$nama.'","'.$tanggal_booking.'","'.$tanggal_ambil.'","'.$nama_produk.'","'.$jumlah.'","'.$status.'","'.$tomboledit.'"],';
	  }
	  $dtisifix = rtrim($dtisi, ",");
	  $data = str_replace("xxx", $dtisifix, $dtJSON);
	  echo $data;
	}
	function tampilnama(){
		$data = $this->M_booking->mtampilnama();
		echo json_encode($data);
	}
	function setuju(){
	  $setuju = $this->input->post("kode");
	      $operasi = $this->M_booking->msetuju($setuju);
	      echo $operasi;
	}
	function tolak(){
	  $tolak = $this->input->post("kode");
	      $operasi = $this->M_booking->mtolak($tolak);
	      echo $operasi;
	}
	function tampil_jenis_pembayaran(){
		$data = $this->M_booking->mtampil_jenis_pembayaran();
		echo json_encode($data);
	}
	function lanjut_bayar(){
	    $kode = $this->input->post("kd");
	    $dt = $this->M_booking->mlanjut_bayar($kode);
	    $dtkirim = "";
	    if(is_array($dt)){
	        foreach($dt as $x){
	            $dtkirim = "1|".$x->id_booking."|".$x->harga."|".$x->nama."|".$x->nip."|".$x->id_produk."|".$x->jumlah."|".$x->total;
	        }
	    }else{$dtkirim = "0|";}
	    echo $dtkirim;
	}

	function cek_edit_status(){
	    $kode = $this->input->post("kd");
	    $dt = $this->M_booking->mcek_edit_status($kode);
	    $dtkirim = "";
	    if(is_array($dt)){
	        foreach($dt as $x){
	            $dtkirim = "1|".$x->status;
	        }
	    }else{$dtkirim = "0|";}
	    echo $dtkirim;
	}


	public function sisa(){
		$a = $this->input->post("a");
		$dt = $this->M_booking->msisa($a);
		$dtkirim = "";
		if(is_array($dt)){
		    foreach($dt as $x){
		        $dtkirim = "1|".$x->saldo;
		    }
		}else{$dtkirim = "0|";}
		echo $dtkirim;
	}
	    public function tambahbayar(){
	    	$id_transaksi = $this->input->post('id_transaksi');
	    	$total_harga = $this->input->post('total_harga');
	    	$jenis_pembayaran = $this->input->post('jenis_pembayaran');
	    	$nip = $this->input->post('nip');
	    	$booking = $this->input->post('booking');
	    	$id_diskon = $this->input->post('id_diskon');

	    	$id_produk = $this->input->post('id_produk');
	    	$jumlah = $this->input->post('jumlah');
	    	$harga = $this->input->post('harga');

	        $operasi = $this->M_booking->mtambahbayar($id_transaksi,$total_harga,$jenis_pembayaran,$nip,$booking,$id_diskon,$id_produk,$jumlah,$harga);
	        echo $operasi;

		}

		public function simpan_status_edit(){
			$a = $this->input->post('a');
			$b = $this->input->post('b');

			$operasi = $this->M_booking->msimpan_status_edit($a,$b);
			echo $operasi;
		}

		public function diskonku(){
			$a = $this->input->post("a");
			$dt = $this->M_booking->mdiskonku($a);
		    echo json_encode($dt) ;
		}

		public function hitungdiskon(){
			$a = $this->input->post("a");
			$dt = $this->M_booking->mhitungdiskon($a);
		    $dtkirim = "";
		    if(is_array($dt)){
		        foreach($dt as $x){
		            $dtkirim = "1|".$x->diskon;
		        }
		    }else{$dtkirim = "0|";}
		    echo $dtkirim;
		}

		function nomor_transaksi(){
			$data = $this->M_booking->mnomor_transaksi();
			echo json_encode($data);
		}

}