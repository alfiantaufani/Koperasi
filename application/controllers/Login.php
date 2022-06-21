<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            //load library form validasi
            $this->load->library('form_validation');
            
        }

        public function index()
        {
            if($this->M_login->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                   // redirect dahsboard
            if ($this->session->userdata('level')=='administrator') {
               redirect('dashboard');
            }elseif ($this->session->userdata('level')=='kasir') {
               redirect('kasir/Home');
            }

            }else{

                //jika session belum terdaftar
                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                    //get data dari FORM
                    $username = $this->input->post("username", TRUE);
                    $password = $this->input->post('password', TRUE);
                    
                    //checking data via model
                    $checking = $this->M_login->check_login('tbl_admin', array('username' => $username), array('password' => md5($password)));
                                    
                    //jika ditemukan, maka create session
                    if ($checking != FALSE) {
                        foreach ($checking as $apps) {

                            $session_data = array(
                                'id' => $apps->id,
                                'username' => $apps->username,
                                'nama' => $apps->nama,
                                'password' => $apps->password,
                                'level' => $apps->level
                               
                            );
                            //set session userdata
                            $this->session->set_userdata($session_data);

                            if ($this->session->userdata('level') == 'administrator') {
                               redirect('dashboard');
                            }elseif ($this->session->userdata('level') == 'pegawai') {
                               redirect('dashboard');
                            }

                        }
                    }else{

                        $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                            <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                        $this->load->view('login', $data);
                    }

                }else{

                    $this->load->view('login');
                }
            }
        }
    }
?>