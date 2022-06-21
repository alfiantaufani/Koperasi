<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == TRUE) {
            //get data dari FORM
            $username = $this->input->post("username", TRUE);
            $password = $this->input->post('password', TRUE);

            $checking = $this->M_login->check_login('tbl_admin', array('username' => $username), array('password' => md5($password)));
            if ($checking != FALSE) {
                foreach ($checking as $apps) {
                    $data = array(
                        'id' => $apps->id,
                        'username' => $apps->username,
                        'nama' => $apps->nama,
                        'password' => $apps->password,
                        'level' => $apps->level
                       
                    );
                }
                $status = 'success';
            }else{
                $status = 'error';
                $data = 'user atau password salah.';
            }
            
            $this->output->set_content_type('application/json');
			$this->output->set_output(json_encode([
				'status' => $status,
                'data' => $data
			]));
        }else{
            $this->output->set_content_type('application/json');
			$this->output->set_output(json_encode([
				'status' => 'error',
				'data' => 'form harus diisi.',
			]));
        }
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

            $cek_keranjang = $this->db->query("SELECT * FROM tbl_keranjang WHERE kode_produk='$barcode'");
            if ($cek_barang->num_rows() > 0){
                $data = $cek_barang->row();
                if ($cek_keranjang->num_rows() > 0){
                    $this->output->set_content_type('application/json');
                    $this->output->set_output(json_encode([
                        'status' => 'error',
                        'message' => 'Barang sudah ada di keranjang.',
                    ]));
                }else{
                    if ($data->stock > 0) {
                        $insert_keranjang = array(
                            'id_produk' => $data->id_produk,
                            'kode_produk' => $data->kode_produk,
                            'nama_produk' => $data->nama_produk,    
                            'qty' => 1,    
                            'harga' => $data->harga_jual,
                        );
                        $create = $this->db->insert('tbl_keranjang', $insert_keranjang);
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
                    } else {
                        $this->output->set_content_type('application/json');
                        $this->output->set_output(json_encode([
                            'status' => 'error',
                            'message' => 'Stock produk kosong.',
                        ]));
                    }
                }
                
            }elseif($barcode_sendiri->num_rows() > 0){
                $dari_barcode = $barcode_sendiri->row();

                if ($cek_keranjang->num_rows() > 0){
                    $this->output->set_content_type('application/json');
                    $this->output->set_output(json_encode([
                        'status' => 'error',
                        'message' => 'Barang sudah ada di keranjang.',
                    ]));
                }else{
                    if ($dari_barcode->stock > 0) {
                        $insert_keranjang = array(
                            'id_produk' => $dari_barcode->id_produk,
                            'kode_produk' => $dari_barcode->barcode_sendiri,
                            'nama_produk' => $dari_barcode->nama_produk,    
                            'qty' => 1,    
                            'harga' => $dari_barcode->harga_jual,
                        );
                        $create = $this->db->insert('tbl_keranjang', $insert_keranjang);
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
                    } else {
                        $this->output->set_content_type('application/json');
                        $this->output->set_output(json_encode([
                            'status' => 'error',
                            'message' => 'Stock produk kosong.',
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

        $data = $this->db->get('tbl_keranjang');

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
                ); 
            }
            $update = $this->db->update_batch('tbl_keranjang', $result, 'id');
            echo '<script>window.location.href = "'.base_url("kasir?cek=true").'";</script>';
        }else{
            echo '<script>window.location.href = "'.base_url("kasir").'";</script>';
        }
    }

    public function delete()
    {
        $delete = $this->db->delete('tbl_keranjang', array('id' => $this->input->post("id"))); 
        if ($delete) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('error'));
        }
    }
}