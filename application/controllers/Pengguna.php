<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengguna extends CI_Controller {
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
		$this->load->view('admin/header');
	    $this->load->view('admin/pengguna/index');
	}

    public function get()
    {
        $dtJSON = '{"data": [xxx]}';
		$dtisi = "";
        $no = 1;
        $username = $this->session->userdata('username');
        $data =  $this->db->query("SELECT * FROM tbl_admin WHERE username NOT IN ('$username')")->result();
        foreach ($data as $value){
            $username = $value->username;
            $nama = $value->nama;
            $level = $value->level;

            $tomboledit = "<button type='button' class='btn btn-warning  btn-sm' data-id='".$value->id."' data-username='".$username."' data-nama='".$nama."' data-level='".$level."' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button> <button type='button' class='btn btn-danger btn-sm' onclick='hapus(".$value->id.");'><i class='mdi mdi-delete'></i></button>";
            $dtisi .= '["'.$no++.'","'.$username.'","'.$nama.'","'.$level.'","'.$tomboledit.'"],';
        }
        $dtisifix = rtrim($dtisi, ",");
        $data = str_replace("xxx", $dtisifix, $dtJSON);
        echo $data;
    }

    public function store()
    {
        $cek_user = $this->db->get_where('tbl_admin', array('username' => $this->input->post("username")))->num_rows();
        if (!$cek_user) {
            $data = array(
                'username' => $this->input->post("username"),
                'nama' => $this->input->post("nama"),
                'password' => md5($this->input->post("password")),
                'level' => $this->input->post("level"),
            );
            $create = $this->db->insert('tbl_admin', $data);
            if ($create) {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('success'));
            } else {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('error'));
            }
        } else {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('error'));
        }
        
    }

    public function update()
    {
        if ($this->input->post("password") != "") {
            $data = array(
                'username' => $this->input->post("username"),
                'nama' => $this->input->post("nama"),
                'password' => md5($this->input->post("password")),
                'level' => $this->input->post("level"),
            );
            $this->db->where('id', $this->input->post("id"));
            $update = $this->db->update('tbl_admin', $data);
            if ($update) {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('success'));
            } else {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('error'));
            }
        } else {
            $data = array(
                'username' => $this->input->post("username"),
                'nama' => $this->input->post("nama"),
                'level' => $this->input->post("level"),
            );
            $this->db->where('id', $this->input->post("id"));
            $update = $this->db->update('tbl_admin', $data);
            if ($update) {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('success'));
            } else {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('error'));
            }
        }
    }

    public function show()
    {
        $data = [
            'pengguna' => $this->db->get_where('tbl_admin', array('id' => $this->uri->segment(3)))->row(),
        ];
        if ($data['pengguna']) {
            $this->load->view('admin/header');
            $this->load->view('admin/pengguna/show', $data);
        }else{
            $this->output->set_status_header('404'); 
            $this->load->view('err404');//loading in custom error view
        }
    }

    public function update_id()
    {
        if ($this->input->post("password") != "") {
            $data = array(
                'username' => $this->input->post("username"),
                'nama' => $this->input->post("nama"),
                'password' => md5($this->input->post("password")),
            );
            $this->db->where('id', $this->input->post("id"));
            $update = $this->db->update('tbl_admin', $data);
            if ($update) {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('success'));
            } else {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('error'));
            }
        } else {
            $data = array(
                'username' => $this->input->post("username"),
                'nama' => $this->input->post("nama"),
            );
            $this->db->where('id', $this->input->post("id"));
            $update = $this->db->update('tbl_admin', $data);
            if ($update) {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('success'));
            } else {
                $this->output->set_content_type('application/json');
                $this->output->set_output(json_encode('error'));
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->db->delete('tbl_admin', array('id' => $id)); 
        if ($delete) {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('success'));
        } else {
            $this->output->set_content_type('application/json');
            $this->output->set_output(json_encode('error'));
        }
    }
}