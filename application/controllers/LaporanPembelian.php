<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class LaporanPembelian extends CI_Controller {
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
		$this->load->view('admin/laporanpembelian/index');
	}

    public function json()
    {
        $tgl_awal = $this->input->get('tgl_awal');
        $tgl_akhir = $this->input->get('tgl_akhir');
        if ($this->input->get('tgl_awal') != "" && $this->input->get('tgl_akhir') != "") {
            $draw = intval($this->input->get("draw"));
            $start = intval($this->input->get("start"));
            $length = intval($this->input->get("length"));
            
            $this->db->select("*");
            $this->db->from('tbl_laporan_pembelian');
            $this->db->where('created_at >=', $tgl_awal);
            $this->db->where('created_at <=', $tgl_akhir);
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
    
            $this->db->select("*");
            $this->db->from('tbl_laporan_pembelian');
            $query = $this->db->get();
            
            $result = array(
                "draw" => $draw,
                "recordsTotal" => $query->num_rows(),
                "recordsFiltered" => $query->num_rows(),
                "data" =>  $query->result()
            );
            echo json_encode($result);
            exit();
        }
        
    }

    public function cetak($id)
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
}