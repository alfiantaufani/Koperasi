<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LaporanCashFlow extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
        $this->load->library('form_validation');
		if (!$this->M_login->logged_id()) {
			redirect('login');
		}
		if($this->session->userdata('level') !='administrator'){
			redirect('login');
		}
	}

    public function index()
	{
		$this->form_validation->set_rules('tgl_awal', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
		$this->form_validation->set_message('required', '<div class="alert bg-red"><i class="fa fa-warning"></i> {field} harus diisi</div>');

		if($this->form_validation->run() == TRUE){

			$tgl_awal   	= $this->input->post("tgl_awal");
			$tgl_akhir  	= $this->input->post("tgl_akhir");

            $this->db->select("sum(tbl_transaction.total_bayar - tbl_transaction.kembalian) as semua_transaksi, IFNULL(tbl_piutang.total_piutang, 0) as utang, sum(tbl_transaction.total_bayar - tbl_transaction.kembalian) - IFNULL(tbl_piutang.total_piutang, 0) as jumlah,");
            $this->db->from('tbl_transaction');
            $this->db->join('tbl_piutang', 'tbl_piutang.id_transaksi=tbl_transaction.id', 'left');
            $this->db->where('tbl_transaction.created_at >=', $tgl_awal);
            $this->db->where('tbl_transaction.created_at <=', $tgl_akhir);
            $query = $this->db->get();

			$data = array(
				'tgl_awal' 		    => $tgl_awal,
				'tgl_akhir' 		=> $tgl_akhir,
				//data pembelian
				'total_pembelian'		=> $this->db->query("SELECT SUM(tbl_laporan_pembelian.total_uang) as jumlah FROM tbl_laporan_pembelian WHERE CAST(created_at AS DATE) BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'")->row(),
				'total_penjualan'		=> $query->row_array(),
			);
            // echo json_encode($data['total_penjualan']);
			$this->load->view('admin/header');
		    $this->load->view('admin/laporancashflow/index', $data);
		}else{
			$this->db->select("sum(tbl_transaction.total_bayar - tbl_transaction.kembalian) as semua_transaksi, IFNULL(tbl_piutang.total_piutang, 0) as utang, sum(tbl_transaction.total_bayar - tbl_transaction.kembalian) - IFNULL(tbl_piutang.total_piutang, 0) as jumlah,");
            $this->db->from('tbl_transaction');
            $this->db->join('tbl_piutang', 'tbl_piutang.id_transaksi=tbl_transaction.id', 'left');
            $query = $this->db->get();

			$data = array(
				// 'tgl_awal' 		    => $tgl_awal,
				// 'tgl_akhir' 		=> $tgl_akhir,
				//data pembelian
				'total_pembelian'		=> $this->db->query("SELECT SUM(tbl_laporan_pembelian.total_uang) as jumlah FROM tbl_laporan_pembelian")->row(),
				'total_penjualan'		=> $query->row_array(),
			);
            // echo json_encode($data['total_penjualan']);
			$this->load->view('admin/header');
		    $this->load->view('admin/laporancashflow/index', $data);
		}

		
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