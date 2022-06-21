<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') OR exit('No direct script access allowed');

defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

    public function uang_masuk()
    {
        $this->db->select("sum(tbl_transaction.total_bayar - tbl_transaction.kembalian) - tbl_piutang.total_piutang as total_transaksi,");
		$this->db->from('tbl_transaction');
		$this->db->join('tbl_piutang', 'tbl_piutang.id_transaksi=tbl_transaction.id', 'left');
		$query = $this->db->get();

        // output
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($query->row_array()));
       
    }

    public function penjualan()
    {
        $total = $this->db->get('tbl_transaction')->num_rows();

        // output
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode([
            'total_transksi' => $total
        ]));
       
    }

    public function piutang()
    {
        $this->db->select("sum(total_piutang) as piutang,");
		$this->db->from('tbl_piutang');
        $piutang = $this->db->get();

        // output
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($piutang->row_array()));
       
    }

    public function produk_kosong()
    {
        $total = $this->db->get_where('tbl_produk', array('stock' => 0))->num_rows();

        // output
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode([
            'total_produk' => $total
        ]));
       
    }
}