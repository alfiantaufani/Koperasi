<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LaporanPenjualan extends CI_Controller {
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
		$this->load->view('admin/laporanpenjualan/index');
	}

    public function json()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        if ($this->input->get('tgl_awal') != "" && $this->input->get('tgl_akhir') != "") {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            
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
            $this->db->where('tbl_transaction.created_at >=', $tgl_awal);
            $this->db->where('tbl_transaction.created_at <=', $tgl_akhir);
            $query = $this->db->get();

            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $query->result()
            );
            echo json_encode($result);
            exit();
        } else {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            
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
            $query = $this->db->get();

            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $query->result()
            );
            echo json_encode($result);
            exit();
        }
        
    }

    public function cetak($id)
    {
        $this->db->select("*");
		$this->db->from('tbl_transaction_product');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_transaction_product.id_produk');
        $this->db->where('tbl_transaction_product.id_transaksi', $id);
		$result = $this->db->get()->result();

		echo json_encode($result);
    }
}