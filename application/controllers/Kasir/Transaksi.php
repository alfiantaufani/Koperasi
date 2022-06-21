<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Transaksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'file', 'string')); 
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
		$this->load->view('kasir/v_transaksi');

	}

	public function pembayaran()
	{
		$this->db->select('SUM(harga) as total');
		$this->db->from('tbl_keranjang');
		$total = $this->db->get()->row()->total;

		$data = [
			// 'id_transaksi' => $this->M_transaksi->cekidtransaksi(),
			'produk' => $this->db->get('tbl_produk')->result(),
			'pelanggan' => $this->db->get('tbl_anggota')->result(),
			'keranjang' =>  $this->db->get('tbl_keranjang')->result(),
			'totals' => $this->db->query('SELECT harga*qty AS total FROM tbl_keranjang ORDER BY total DESC')->result_array(),
		];
		// echo json_encode($data['total']);
		$this->load->view('admin/header');
		$this->load->view('kasir/v_pembayaran',$data);
	}

	public function bayar()
	{
		$this->db->trans_start();
		$nota = random_string('basic');
		$type_pay = $this->input->post('type_pay');
		if ($type_pay == 'tunai') {
			$data = array( 
				'nota'   => $nota,
				'total_belanja' => $this->input->post('total_belanja'),
				'total_bayar' => str_replace(str_split('.'),"",$this->input->post('uang')),
				'kembalian' => $this->input->post('kembalian_bayar'),
				'type_pembayaran' => $type_pay,
			);
			$create = $this->db->insert('tbl_transaction', $data);
			$nota_id = $this->db->insert_id();
		}else{
			if ($this->input->post('pelanggan') == "") { //insert pelanggan
				$pelanggan = array( 
					'nama'   => $this->input->post('nama_pelanggan'),
					'no_hp '=> $this->input->post('no_telepon'),
					'tgl_gabung'=> date('Y-m-d'),
				);
				$create = $this->db->insert('tbl_anggota',$pelanggan);
				$id_pelanggan = $this->db->insert_id();

				$data = array( 
					'nota'   => $nota,
					'total_belanja' => $this->input->post('total_belanja'),
					'total_bayar' => str_replace(str_split('.'),"",$this->input->post('uang')),
					'kembalian' => $this->input->post('kembalian_bayar'),
					'type_pembayaran' => $type_pay,
					'pelanggan' => $id_pelanggan,
				);
				$create = $this->db->insert('tbl_transaction', $data);
				$nota_id = $this->db->insert_id();
	
				$piutang = array( 
					'id_anggota'   	=> $id_pelanggan,
					'id_transaksi'  => $nota_id,
					'total_piutang' => $this->input->post('total_belanja'),
					'status' 		=> "BELUM LUNAS",
					'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo'),
				);
				$create = $this->db->insert('tbl_piutang',$piutang);
			}else{
				$data = array( 
					'nota'   => $nota,
					'total_belanja' => $this->input->post('total_belanja'),
					'total_bayar' => str_replace(str_split('.'),"",$this->input->post('uang')),
					'kembalian' => $this->input->post('kembalian_bayar'),
					'type_pembayaran' => $type_pay,
					'pelanggan' => $this->input->post('pelanggan'),
				);
				$create = $this->db->insert('tbl_transaction', $data);
				$nota_id = $this->db->insert_id();
	
				$piutang = array( 
					'id_anggota'   	=> $this->input->post('pelanggan'),
					'id_transaksi'  => $nota_id,
					'total_piutang' => $this->input->post('total_belanja'),
					'status' 		=> "BELUM LUNAS",
					'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo'),
				);
				$create = $this->db->insert('tbl_piutang',$piutang);
			}
		}

		$result = array();
		$delete_keranjang = array();
		$cek = array();
		$stock = array();
		$stock_sekarang = array();
		foreach ($_POST['id_produk'] as $key => $val) {
			$result[] = array(             
				'id_transaksi' => $nota_id,    
				'id_produk' => $_POST['id_produk'][$key],    
				'qty' => $_POST['qty_new'][$key],    
				'price' => $_POST['harga_asli'][$key],    
			);
			$delete_keranjang[] = $_POST['id_keranjang'][$key];   
			$cek[] = $this->db->get_where('tbl_produk', array('id_produk' => $_POST['id_produk'][$key]))->row();
			foreach ($cek as $k => $value) {
				$stock_sekarang[$k] = array(
					'id_produk' => $value->id_produk,
					'stock' => $value->stock - $_POST['qty_new'][$key]
				);
			}
		} 
		$this->db->where_in('id', $delete_keranjang)->delete('tbl_keranjang');
		$update = $this->db->update_batch('tbl_produk', $stock_sekarang, 'id_produk');

		$insert = $this->db->insert_batch('tbl_transaction_product', $result);
		if ($insert) {
			$notif = [
				'status' => 'success',
				'message' => 'Pembayaran Berhasil.'
			];
		}else{
			$notif = [
				'status' => 'error',
				'message' => 'Pembayaran Berhasil.'
			];
		}
		$this->session->set_flashdata('notif', $notif);
		echo '<script>window.location.href = "'.base_url("kasir").'";</script>';
		$this->db->trans_complete();
	}	
}