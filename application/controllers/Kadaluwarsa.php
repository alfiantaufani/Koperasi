<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kadaluwarsa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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
        $this->db->select("tbl_produk.id_produk as idproduk, tbl_produk.nama_produk, tbl_produk.kode_produk, tbl_produk.barcode_sendiri, tbl_kadaluwarsa.id as id, tbl_kadaluwarsa.qty");
		$this->db->from('tbl_kadaluwarsa');
		$this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_kadaluwarsa.id_produk','left');
		$query = $this->db->get();
        
        $data = [
			'data' => $query->result(),
		];
		$this->load->view('admin/header');
		$this->load->view('admin/kadaluwarsa/index', $data);
    }

    public function create()
    {
        $this->db->select("*");
		$this->db->from('tbl_keranjang_kadaluwarsa');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_keranjang_kadaluwarsa.id_produk','left');
		$query = $this->db->get();
        
        $data = [
			'keranjang' => $query->result(),
		];
        $this->load->view('admin/header');
		$this->load->view('admin/kadaluwarsa/create', $data);
    }

    public function store()
    {
        $this->db->trans_start();

		$result = array();
		$cek = array();
		$stock_sekarang = array();
		foreach ($_POST['id_produk'] as $key => $val) {
			$result[] = array(
				'id_produk' => $_POST['id_produk'][$key],
				'qty' => $_POST['qty_new'][$key],
			);
			$delete_keranjang[] = $_POST['id_keranjang'][$key]; 
			$cek[] = $this->db->get_where('tbl_produk', array('id_produk' => $_POST['id_produk'][$key]))->row();
			foreach ($cek as $k => $value) {
                if ($_POST['qty_new'][$k] >= $value->stock) {
                    $notif = [
                        'status' => 'error',
                        'message' => 'Beberapa Produk Melebihi Stock Sekarang.'
                    ];
                    $this->session->set_flashdata('notif', $notif);
		            echo '<script>window.location.href = "' . base_url("kadaluwarsa/create?cek=true") . '";</script>';
                }
				$stock_sekarang[$k] = array(
					'id_produk' => $value->id_produk,
					'stock' => $value->stock - $_POST['qty_new'][$k]
				);
			}
		}
		// echo json_encode($cek);
		$this->db->where_in('id', $delete_keranjang)->delete('tbl_keranjang_kadaluwarsa');
		$update = $this->db->update_batch('tbl_produk', $stock_sekarang, 'id_produk'); // update stock produk
		$insert = $this->db->insert_batch('tbl_kadaluwarsa', $result); // insert tbl kadaluwarsa

		if ($insert) {
			$notif = [
				'status' => 'success',
				'message' => 'Produk Berhasil Disimpan.'
			];
		} else {
			$notif = [
				'status' => 'error',
				'message' => 'Produk Gagal Disimpan.'
			];
		}
		$this->session->set_flashdata('notif', $notif);
		echo '<script>window.location.href = "' . base_url("kadaluwarsa/create") . '";</script>';
		
		$this->db->trans_complete();
    }

    public function show()
    {
        $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $this->db->from('tbl_keranjang_kadaluwarsa');
		$this->db->join('tbl_produk', 'tbl_produk.id_produk=tbl_keranjang_kadaluwarsa.id_produk');
		$data = $this->db->get();
        
        $result = array(
			"draw" => $draw,
			"recordsTotal" => $data->num_rows(),
			"recordsFiltered" => $data->num_rows(),
			"data" => $data->result()
		);
		echo json_encode($result);
		exit();
    }

    public function update()
    {
        // $id_produk = $this->input->post('idproduk');
        // $cek_stock = $this->db->query("SELECT * FROM tbl_produk WHERE id_produk='$id_produk'")->row();
        // if ($this->input->post("qty") > $cek_stock->stock) {
        //     $this->output->set_content_type('application/json');
        //     $this->output->set_output(json_encode([
        //         'status' => 'false', 
        //         'message' => 'Qty melebihi Stock produk'
        //     ]));
        // }

        // $data = array(
        //     'qty'   	=> $this->input->post("qty"),
        // );
        // $this->db->where('id', $this->input->post("id"));
        // $update = $this->db->update('tbl_keranjang_kadaluwarsa', $data);
        
        // $ubah_stok = array(
        //     'stock'   	=> $stok,
        // );
        // $this->db->where('id', $this->input->post("id"));
        // $produk = $this->db->update('tbl_produk', $ubah_stok);
        // if ($update) {
        //     $this->output->set_content_type('application/json');
        //     $this->output->set_output(json_encode('success'));
        // } else {
        //     $this->output->set_content_type('application/json');
        //     $this->output->set_output(json_encode('error'));
        // }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('tbl_kadaluwarsa', array('id' => $id)); 
        if ($delete) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('error'));
        }
    }
}