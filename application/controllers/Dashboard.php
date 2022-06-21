<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
		ini_set('date.timezone', 'Asia/Jakarta');
		$date = new DateTime("now");
		$curr_date = $date->format('Y-m-d');
		$this->db->select("sum(tbl_transaction.total_bayar - tbl_transaction.kembalian) as semua_transaksi, tbl_piutang.total_piutang, sum(tbl_transaction.total_bayar - tbl_transaction.kembalian) - tbl_piutang.total_piutang as jumlah,");
		$this->db->from('tbl_transaction');
		$this->db->join('tbl_piutang', 'tbl_piutang.id_transaksi=tbl_transaction.id', 'left');
		// $this->db->where('DATE(tbl_transaction.created_at)', $curr_date);
		$query = $this->db->get();

		// cart 7 hari
		$this->db->select('DATE(created_at) as date, sum(total_belanja) as total_belanja');
		$this->db->where("created_at >= DATE(NOW()) - INTERVAL 7 DAY");
		$this->db->group_by('date');
      	$result = $this->db->get('tbl_transaction')->result_array();

		// cart semua hari
		$this->db->select('DATE(created_at) as date, sum(total_belanja) as total_belanja');
		$this->db->group_by('date');
      	$cart_semua = $this->db->get('tbl_transaction')->result_array();
		// echo json_encode($cart_semua);

		// transaksi terkahir
		$this->db->select("
			tbl_transaction.id as id_transaksi, 
			tbl_transaction.created_at, 
			tbl_transaction.nota,
			tbl_transaction.total_belanja,
			tbl_transaction.total_bayar,
			tbl_transaction.kembalian,
			tbl_transaction.type_pembayaran,
			tbl_anggota.nama
		");
		$this->db->from('tbl_transaction');
		$this->db->join('tbl_anggota', 'tbl_anggota.id = tbl_transaction.pelanggan', 'left');
		$this->db->order_by("tbl_transaction.id", "desc");
		$this->db->limit('3');
		$transaksi_terkahir = $this->db->get();

		$data = [
			'total_barang' => $this->db->query('SELECT * FROM tbl_produk')->num_rows(),
			'total_pelanggan' => $this->db->query('SELECT * FROM tbl_anggota')->num_rows(),
			'supplier' => $this->db->query('SELECT * FROM tbl_tempat_produksi')->num_rows(),
			'pengguna' => $this->db->query('SELECT * FROM tbl_admin')->num_rows(),
			'uang_masuk' => $query->row_array(),
			'total_penjualan' => $this->db->get_where('tbl_transaction', array('DATE(tbl_transaction.created_at)' => $curr_date))->num_rows(),
			'total_piutang' => $this->db->get_where('tbl_piutang', array('status' => 'BELUM LUNAS'))->num_rows(),
			'cart' => json_encode($result),
			'cart_semua' => json_encode($cart_semua),
			'transaksi_terakhir' => $transaksi_terkahir->result_array(),
		];
		$this->load->view('admin/header');
		$this->load->view('admin/dashboard', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
