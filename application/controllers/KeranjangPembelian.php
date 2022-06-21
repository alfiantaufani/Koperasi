<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') OR exit('No direct script access allowed');

class KeranjangPembelian extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index()
    {
        $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $this->db->from('tbl_keranjang_pembelian');
        $this->db->join('tbl_produk','tbl_produk.id_produk=tbl_keranjang_pembelian.id_produk');
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

    public function store()
    {
        $this->form_validation->set_rules('barcode', 'Barcode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->output->set_content_type('application/json');
			$this->output->set_output(json_encode([
				'status' => 'error',
				'message' => 'form harus diisi.',
			]));
        }else{
            $barcode = $this->input->post("barcode", TRUE);
            $cek_barang = $this->db->query("SELECT * FROM tbl_produk WHERE kode_produk='$barcode'");
            $barcode_sendiri = $this->db->query("SELECT * FROM tbl_produk WHERE barcode_sendiri='$barcode'");
            
            $cek_keranjang = $this->db->query("SELECT * FROM tbl_keranjang_pembelian WHERE barcode='$barcode'");

            if ($cek_barang->num_rows() > 0){
                $dari_kode = $cek_barang->row();

                if ($cek_keranjang->num_rows() > 0){
                    $this->output->set_content_type('application/json');
                    $this->output->set_output(json_encode([
                        'status' => 'error',
                        'message' => 'Barang sudah ada di keranjang.',
                    ]));
                }else{
                    $insert_keranjang = array(
                        'id_produk' => $dari_kode->id_produk,
                        'barcode' => $dari_kode->kode_produk,    
                        'qty' => 1,    
                    );
                    $create = $this->db->insert('tbl_keranjang_pembelian', $insert_keranjang);
                    if ($create) {
                        require APPPATH . '/views/vendor/autoload.php';

                        $pusher = new Pusher\Pusher(
                            "fcc6b0d11fd751af380d",
                            "3dc5db5486f39251742b",
                            "1399648",
                            array('cluster' => 'ap1')
                        );

                        $pusher->trigger('my-channel', 'my-event', array('message' => 'hello world'));

                        // output
                        $this->output->set_content_type('application/json');
                        $this->output->set_output(json_encode([
                            'status' => 'success',
                        ]));
                    }else{
                        $this->output->set_content_type('application/json');
                        $this->output->set_output(json_encode([
                            'status' => 'error',
                            'message' => 'Gagal input keranjang.',
                        ]));
                    }
                }
                
            }elseif ($barcode_sendiri->num_rows() > 0) {
                $dari_barcode = $barcode_sendiri->row();

                if ($cek_keranjang->num_rows() > 0){
                    $this->output->set_content_type('application/json');
                    $this->output->set_output(json_encode([
                        'status' => 'error',
                        'message' => 'Barang sudah ada di keranjang.',
                    ]));
                }else{
                    $insert_keranjang = array(
                        'id_produk' => $dari_barcode->id_produk,
                        'barcode' => $dari_barcode->barcode_sendiri,    
                        'qty' => 1,    
                    );
                    $create = $this->db->insert('tbl_keranjang_pembelian', $insert_keranjang);
                    if ($create) {
                        require APPPATH . '/views/vendor/autoload.php';

                        $pusher = new Pusher\Pusher(
                            "fcc6b0d11fd751af380d",
                            "3dc5db5486f39251742b",
                            "1399648",
                            array('cluster' => 'ap1')
                        );

                        $pusher->trigger('my-channel', 'my-event', array('message' => 'hello world'));

                        // output
                        $this->output->set_content_type('application/json');
                        $this->output->set_output(json_encode([
                            'status' => 'success',
                        ]));
                    }else{
                        $this->output->set_content_type('application/json');
                        $this->output->set_output(json_encode([
                            'status' => 'error',
                            'message' => 'Gagal input keranjang.',
                        ]));
                    }
                }
            }else{
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode([
                    'status' => 'error',
                    'message' => 'Barcode produk tidak ada',
                ]));
            }
            

        }
    }

    public function show()
    {
        $draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

        $data = $this->db->get('tbl_keranjang_pembelian');

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
        if ($_POST['id'] != "") {
            $result = array();
            foreach ($_POST['id'] as $key => $val) {
                $result[] = array(        
                    'id' => $_POST['id'][$key],       
                    'qty' => $_POST['qty'][$key],    
                    'id_supplier' => $_POST['supplier'][$key],    
                ); 
            }
            $update = $this->db->update_batch('tbl_keranjang_pembelian', $result, 'id');
            echo '<script>window.location.href = "'.base_url("pembelian/create?cek=true").'";</script>';
        }else{
            echo '<script>window.location.href = "'.base_url("pembelian/create").'";</script>';
        }
    }

    public function delete()
    {
        $delete = $this->db->delete('tbl_keranjang_pembelian', array('id' => $this->input->post("id"))); 
        if ($delete) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('error'));
        }
    }
}