<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Piutang extends CI_Controller {
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
        $this->db->from('tbl_piutang');
        $this->db->join('tbl_transaction','tbl_transaction.id=tbl_piutang.id_transaksi');
        $this->db->join('tbl_anggota','tbl_anggota.id=tbl_piutang.id_anggota');
        $query = $this->db->get();

        $data = [
            'piutang' => $query->result(),
        ];

		$this->load->view('admin/header');
		$this->load->view('admin/piutang/index', $data);
	}

    public function bayar()
    {
		$cek = $this->db->get_where('tbl_piutang', array('id_transaksi' => $this->input->post("id_transaksi")))->row_array(); 
        $hasil = $cek['total_piutang'] - str_replace(str_split('Rp. '),"",$this->input->post("jml_bayar"));
        if (str_replace(str_split('Rp. '),"",$this->input->post("jml_bayar")) == $cek['total_piutang']) {
            $data = array(
                'total_piutang'   	=> $hasil,
                'status'   	        => 'LUNAS',
            );
            $this->db->where('id_transaksi', $this->input->post("id_transaksi"));
            $update = $this->db->update('tbl_piutang', $data);
            if ($update) {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('success'));
            } else {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('error'));
            }
        } else {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('error_jml'));
        }
        
    }
}