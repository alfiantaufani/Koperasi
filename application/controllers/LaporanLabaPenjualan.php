<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LaporanLabaPenjualan extends CI_Controller {
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
		$this->load->view('admin/laporanlabarugi/index');
	}

    public function json()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        // echo $this->input->get('tgl_akhir');
        if ($this->input->get('tgl_awal') != "" && $this->input->get('tgl_akhir') != "") {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            
            $this->db->select("*");
            $this->db->from('tbl_transaction');
            $this->db->join('tbl_transaction_product', 'tbl_transaction_product.id_transaksi = tbl_transaction.id', 'left');
            $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_transaction_product.id_produk', 'inner');
            $this->db->where('tbl_transaction.created_at >=', $tgl_awal);
            $this->db->where('tbl_transaction.created_at <=', $tgl_akhir);
            $query = $this->db->get();

            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $query->result(),
            );
            echo json_encode($result);
            exit();
        } else {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            
            $this->db->select("*");
            $this->db->from('tbl_transaction');
            $this->db->join('tbl_transaction_product', 'tbl_transaction_product.id_transaksi = tbl_transaction.id', 'left');
            $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_transaction_product.id_produk', 'inner');
            $query = $this->db->get();

            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" => $query->result(),
            );
            echo json_encode($result);
            exit();
        }
        
    }
}