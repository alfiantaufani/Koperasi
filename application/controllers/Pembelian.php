<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pembelian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'file', 'string'));
		if (!$this->M_login->logged_id()) {
			redirect('login');
		}
		if ($this->session->userdata('level') != 'administrator') {
			redirect('login');
		}
	}

	public function index()
	{
		$data = [
			'pembelian' => $this->db->get('tbl_laporan_pembelian')->result(),
		];
		$this->load->view('admin/header');
		$this->load->view('admin/pembelian/index', $data);
	}

	public function get_detail($id)
	{
		$this->db->select("*");
		$this->db->from('tbl_pembelian');
		$this->db->join('tbl_laporan_pembelian', 'tbl_laporan_pembelian.id_pembelian=tbl_pembelian.nota_pembelian');
		$this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_pembelian.id_produk');
		$this->db->join('tbl_tempat_produksi', 'tbl_tempat_produksi.id_tempat_produksi=tbl_pembelian.id_tempat_produksi', 'left');
		$this->db->where('tbl_pembelian.nota_pembelian', $id);
		$result = $this->db->get()->result();

		echo json_encode($result);
	}

	public function create()
	{
		$this->db->from('tbl_keranjang_pembelian');
		$this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_keranjang_pembelian.id_produk');
		$keranjang = $this->db->get();

		$data = [
			'produk' => $this->db->get('tbl_produk')->result(),
			'supplier' => $this->db->get('tbl_tempat_produksi')->result(),
			'keranjang' => $keranjang->result(),
			'totals' => $this->db->query('SELECT tbl_produk.harga_beli*tbl_keranjang_pembelian.qty AS total FROM tbl_keranjang_pembelian LEFT JOIN tbl_produk ON tbl_keranjang_pembelian.id_produk=tbl_produk.id_produk  ORDER BY total DESC')->result_array(),
		];
		// echo json_encode($data['totals']);
		$this->load->view('admin/header');
		$this->load->view('admin/pembelian/create', $data);
	}

	public function updateharga()
	{
		$data = array(
			'harga_beli' => $this->input->post("form_edit_harga_beli"),
		);
		$this->db->where('id_produk', $this->input->post("edit_id"));
		$update = $this->db->update('tbl_produk', $data);
		$id = $this->db->get_where('tbl_produk', array('id_produk' =>  $this->input->post("edit_id")))->row();
		if ($update) {
			echo json_encode([
				'status' => 'success',
			]);
		} else {
			echo json_encode([
				'status' => 'error'
			]);
		}
	}

	public function store()
	{
		$this->db->trans_start();

		$nota_pembelian = random_string('basic');
		$result = array();
		$cek = array();
		$stock_sekarang = array();
		foreach ($_POST['id_produk'] as $key => $val) {
			$result[] = array(
				'nota_pembelian' => $nota_pembelian,
				'id_produk' => $_POST['id_produk'][$key],
				'total_stock' => $_POST['qty_new'][$key],
				'id_tempat_produksi' => $_POST['id_supplier'][$key],
			);
			$delete_keranjang[] = $_POST['id_keranjang'][$key]; 
			$cek[] = $this->db->get_where('tbl_produk', array('id_produk' => $_POST['id_produk'][$key]))->row();
			foreach ($cek as $k => $value) {
				$stock_sekarang[$k] = array(
					'id_produk' => $value->id_produk,
					'stock' => $value->stock + $_POST['qty_new'][$k]
				);
			}
		}
		// echo json_encode($cek);
		$this->db->where_in('id', $delete_keranjang)->delete('tbl_keranjang_pembelian');
		$update = $this->db->update_batch('tbl_produk', $stock_sekarang, 'id_produk'); // update stock produk
		$insert = $this->db->insert_batch('tbl_pembelian', $result); // insert tbl pembelian

		$laporan_pembelian = array(
			'id_pembelian'   	=> $nota_pembelian,
			'total_uang' 		=> $_POST['simpan_nominal'],
		);
		$create = $this->db->insert('tbl_laporan_pembelian', $laporan_pembelian); // tambah ke laporan pembelian
		if ($insert) {
			$notif = [
				'status' => 'success',
				'message' => 'Pembayaran Berhasil.'
			];
		} else {
			$notif = [
				'status' => 'error',
				'message' => 'Pembayaran Gagal.'
			];
		}
		$this->session->set_flashdata('notif', $notif);
		echo '<script>window.location.href = "' . base_url("pembelian/create") . '";</script>';
		



		$this->db->trans_complete();
	}
}
