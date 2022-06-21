<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Setting extends CI_Controller {
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
        $data = [
            'setting' => $this->db->get_where('tbl_setting', array('id' => 1))->row(),
        ];

		$this->load->view('admin/header');
		$this->load->view('admin/setting/index', $data);
	}

    public function update()
    {
        $data = array(
			'nama_koperasi' => $this->input->post("nama_koperasi"),
			'no_telepon' => $this->input->post("telepon"),
			'alamat' => $this->input->post("alamat"),
		);
		$this->db->where('id', 1);
		$update = $this->db->update('tbl_setting', $data);
		if ($update) {
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode('success'));
		} else {
			$this->output->set_content_type('application/json');
			$this->output->set_output(json_encode('error'));
		}
    }

	public function update_logo()
	{
		$config['upload_path']="./assets/upload/logo";
		$config['allowed_types']='gif|jpg|png';
		$config['ancrypt_name']= TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("file")){
			$data = array('upload_data' => $this->upload-> data());;
			$logo = $data['upload_data']['file_name'];
			
			$data = array(
				'logo'   	=> $logo,
			);
			$this->db->where('id', $this->input->post("id"));
    		$update = $this->db->update('tbl_setting', $data);
			if ($update) {
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode('success'));
			} else {
				$this->output->set_content_type('application/json');
				$this->output->set_output(json_encode('error'));
			}
		}
	}
}