<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Produk extends CI_Controller {
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
		$data = [
			'kategori' => $this->db->query('SELECT * FROM tbl_kategori')->result(),
		];
		$this->load->view('admin/header');
		$this->load->view('admin/produk', $data);
	}

	function tampilkategori(){
		$data = $this->M_produk->mtampilkategori();
		echo json_encode($data);
	}
	function tampiltempatproduksi(){
		$data = $this->M_produk->mtampiltempatproduksi();
		echo json_encode($data);
	}
	public function tampil()
	{
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));

		$data = [];
		$no = 1;
		$query = $this->db->query("SELECT * FROM tbl_produk INNER JOIN tbl_kategori ON tbl_produk.id_kategori=tbl_kategori.id_kategori ORDER BY id_produk DESC");
		foreach ($query->result() as $value) {
			$data[] = array(
				'no' => $no++,
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $query->result()
		);
		echo json_encode($result);
		exit();
	}
	public function tambahproduk(){
		$kode_produk = $this->input->post("kode_produk");
		$buat_barcode = $this->input->post('buat_barcode');
		$nama_produk = $this->input->post("nama_produk");
		$kandungan_produk = $this->input->post("txt_kandungan");

		$config['upload_path']="./assets/upload";
		$config['allowed_types']='gif|jpg|png';
		$config['ancrypt_name']= TRUE;

		$cek_kode_produk = $this->db->query("SELECT * FROM tbl_produk WHERE nama_produk='$nama_produk' OR kode_produk='$kode_produk' OR barcode_sendiri='$kode_produk'");
		if ($cek_kode_produk->num_rows() > 0) {
			$create = false;
			$message = 'Nama produk atau Kode/Barcode produk suda ada.';
		} else {
			$cek_barcode_sendiri = $this->db->query("SELECT * FROM tbl_produk WHERE nama_produk='$nama_produk' OR kode_produk='$buat_barcode' OR barcode_sendiri='$buat_barcode'");
			if ($cek_barcode_sendiri->num_rows() > 0) {
				$create = false;
				$message = 'Nama produk atau Kode/Barcode produk suda ada.';
			}else{
				$this->load->library('upload',$config);
				if($this->upload->do_upload("file")){
					$data = array('upload_data' => $this->upload->data());
					$harga_beli = str_replace(str_split('Rp. '),"",$this->input->post("harga_beli"));
					$kategori_produk = $this->input->post("txt_kategori");
					$foto_produk= $data['upload_data']['file_name'];
					$tempat = $this->input->post("txt_tempat"); 
						if ($this->input->post("buat_barcode") == "") {
							if ($this->input->post('nama_kategori') == "") {
								$data = array(
									'nama_produk'   	=> $nama_produk,
									'stock'         	=> 0,
									'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_beli")),
									'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_jual")),
									'foto_produk'   	=> $foto_produk,
									'kode_produk'   	=> $this->input->post("kode_produk"),
									'id_kategori'   	=> $kategori_produk,
									'kandungan_produk'	=> $kandungan_produk
								);
								$create = $this->db->insert('tbl_produk',$data);
							}else{
	
								$add_kategori = array(
									'nama_kategori'   	=> $this->input->post('nama_kategori'),
								);
								$this->db->insert('tbl_kategori',$add_kategori);
								$kategori_id = $this->db->insert_id();
	
								$data = array(
									'nama_produk'   	=> $nama_produk,
									'stock'         	=> 0,
									'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_beli")),
									'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_jual")),
									'foto_produk'   	=> $foto_produk,
									'kode_produk'   	=> $this->input->post("kode_produk"),
									'id_kategori'   	=> $kategori_id,
									'kandungan_produk'	=> $kandungan_produk
								);
								$create = $this->db->insert('tbl_produk',$data);
	
							}
						}else{
							if ($this->input->post('nama_kategori') == "") {
								$data = array(
									'nama_produk'   	=> $nama_produk,
									'stock'         	=> 0,
									'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_beli")),
									'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_jual")),
									'foto_produk'   	=> $foto_produk,
									'barcode_sendiri'   	=> $this->input->post("buat_barcode"),
									'id_kategori'   	=> $kategori_produk,
									'kandungan_produk'	=> $kandungan_produk
								);
								$create = $this->db->insert('tbl_produk',$data);
							}else{
								$add_kategori = array(
									'nama_kategori'   	=> $this->input->post('nama_kategori'),
								);
								$this->db->insert('tbl_kategori',$add_kategori);
								$kategori_id = $this->db->insert_id();
	
								$data = array(
									'nama_produk'   	=> $nama_produk,
									'stock'         	=> 0,
									'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_beli")),
									'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_jual")),
									'foto_produk'   	=> $foto_produk,
									'barcode_sendiri'   	=> $this->input->post("buat_barcode"),
									'id_kategori'   	=> $kategori_id,
									'kandungan_produk'	=> $kandungan_produk
								);
								$create = $this->db->insert('tbl_produk',$data);
							}
						}
				}else{
					$nama_produk = $this->input->post("nama_produk");
					$kandungan_produk = $this->input->post("txt_kandungan");
	
					$hapus_rp = str_replace(str_split('Rp. '),"",$this->input->post("harga_produk"));
					$kategori_produk = $this->input->post("txt_kategori");
					$tempat = $this->input->post("txt_tempat"); 
	
					$cek = $this->db->query("SELECT * FROM tbl_produk WHERE nama_produk='$nama_produk' OR kode_produk='$kode_produk'");
					if ($cek->num_rows() > 0) {
						$create = false;
						$message = 'Nama produk atau Kode produk suda ada.';
					} else {
						if ($this->input->post("buat_barcode") == "") {
							if ($this->input->post('nama_kategori') == "") {
								$data = array(
									'nama_produk'   	=> $nama_produk,
									'stock'         	=> 0,
									'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_beli")),
									'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_jual")),
									'kode_produk'   	=>$this->input->post("kode_produk"),
									'id_kategori'   	=>$kategori_produk,
									'kandungan_produk'	=>$kandungan_produk
								);
								$create = $this->db->insert('tbl_produk',$data);
							}else{
								$add_kategori = array(
									'nama_kategori'   	=> $this->input->post('nama_kategori'),
								);
								$this->db->insert('tbl_kategori',$add_kategori);
								$kategori_id = $this->db->insert_id();
	
								$data = array(
									'nama_produk'   	=> $nama_produk,
									'stock'         	=> 0,
									'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_beli")),
									'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_jual")),
									'kode_produk'   	=> $this->input->post("kode_produk"),
									'id_kategori'   	=> $kategori_id,
									'kandungan_produk'	=> $kandungan_produk
								);
								$create = $this->db->insert('tbl_produk',$data);
							}
						}else{
							if ($this->input->post('nama_kategori') == "") {
								$data = array(
									'nama_produk'   =>$nama_produk,
									'stock'         => 0,
									'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_beli")),
									'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_jual")),
									'kode_produk'   	=>$this->input->post("kode_produk"),
									'barcode_sendiri'   =>$this->input->post("buat_barcode"),
									'id_kategori'   	=>$kategori_produk,
									'kandungan_produk'	=>$kandungan_produk
								);
								$create = $this->db->insert('tbl_produk',$data);
							}else{
								$add_kategori = array(
									'nama_kategori'   	=> $this->input->post('nama_kategori'),
								);
								$this->db->insert('tbl_kategori',$add_kategori);
								$kategori_id = $this->db->insert_id();
	
								$data = array(
									'nama_produk'   =>$nama_produk,
									'stock'         => 0,
									'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_beli")),
									'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("harga_jual")),
									'kode_produk'   	=> $this->input->post("kode_produk"),
									'barcode_sendiri'   => $this->input->post("buat_barcode"),
									'id_kategori'   	=> $kategori_id,
									'kandungan_produk'	=> $kandungan_produk
								);
								$create = $this->db->insert('tbl_produk',$data);
							}
						}
					}
				}
			}
		}
		if ($create) {
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode([
				'status' => 'success',
			]));
		} else {
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode([
				'status' => 'error',
				'message' => $message,
				'message_default' => 'Data gagal didimpan.'
			]));
		}
	}

	function hapusproduk(){
		$a = $this->input->post("kode");
		$operasi = $this->M_produk->mhapusproduk($a);
		echo $operasi;
	}

	function updateproduk(){
		$id = $this->input->post('id');
		$config['upload_path']="./assets/upload";
		$config['allowed_types']='gif|jpg|png';
		$config['ancrypt_name']= TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
			$data = array('upload_data' => $this->upload-> data());;
			$foto_produk= $data['upload_data']['file_name'];
			
			$cek = $this->db->query("SELECT * FROM tbl_produk WHERE id_produk='$id'")->row();
			if ($cek->barcode_sendiri == null) {
				$data = array(
					'nama_produk'   	=> $this->input->post("edit_nama_produk"),
					'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("edit_harga_beli")),
					'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("edit_harga_jual")),
					'foto_produk'   	=> $foto_produk,
					'kode_produk'   	=>$this->input->post("kode_produk"),
					'id_kategori'   	=> $this->input->post("edit_txt_kategori"),
					'kandungan_produk'	=> $this->input->post("edit_txt_kandungan")
				);
			}else{
				$data = array(
					'nama_produk'   	=> $this->input->post("edit_nama_produk"),
					'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("edit_harga_beli")),
					'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("edit_harga_jual")),
					'foto_produk'   	=> $foto_produk,
					'barcode_sendiri'   =>$this->input->post("kode_produk"),
					'id_kategori'   	=> $this->input->post("edit_txt_kategori"),
					'kandungan_produk'	=> $this->input->post("edit_txt_kandungan")
				);
			}

			$this->db->where('id_produk', $this->input->post("id"));
    		$update = $this->db->update('tbl_produk', $data);
			if ($update) {
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode('success'));
			} else {
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode('error'));
			}
		}else{
			$cek = $this->db->query("SELECT * FROM tbl_produk WHERE id_produk='$id'")->row();
			if ($cek->barcode_sendiri == null) {
				$data = array(
					'nama_produk'   	=> $this->input->post("edit_nama_produk"),
					'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("edit_harga_beli")),
					'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("edit_harga_jual")),
					'kode_produk'   	=>$this->input->post("kode_produk"),
					'id_kategori'   	=> $this->input->post("edit_txt_kategori"),
					'kandungan_produk'	=> $this->input->post("edit_txt_kandungan")
				);
			}else{
				$data = array(
					'nama_produk'   	=> $this->input->post("edit_nama_produk"),
					'harga_beli'    	=> str_replace(str_split('Rp. '),"",$this->input->post("edit_harga_beli")),
					'harga_jual'    	=> str_replace(str_split('Rp. '),"",$this->input->post("edit_harga_jual")),
					'barcode_sendiri'   	=>$this->input->post("kode_produk"),
					'id_kategori'   	=> $this->input->post("edit_txt_kategori"),
					'kandungan_produk'	=> $this->input->post("edit_txt_kandungan")
				);
			}
			$this->db->where('id_produk', $this->input->post("id"));
    		$update = $this->db->update('tbl_produk', $data);
			if ($update) {
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode('success'));
			} else {
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode('error'));
			}
		}



	}

	public function get_barcode()
	{
		$code = (int)preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());
		$cek = $this->db->query("SELECT * FROM tbl_produk WHERE kode_produk = '$code' OR barcode_sendiri = '$code'");
		if ($cek->num_rows() > 0) {
			$code_sekarang = (int)preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());
		}else{
			$code_sekarang = (int)preg_replace('/(0)\.(\d+) (\d+)/', '$3$1$2', microtime());
		}
		echo json_encode($code_sekarang);
	}
}
