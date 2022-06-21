<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CetakBarcode extends CI_Controller {
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
            'barcode' => $this->db->query("SELECT * FROM tbl_produk WHERE barcode_sendiri is NOT NULL ORDER BY id_produk DESC ")->result(),
        ];
        $this->load->view('admin/header');
        $this->load->view('admin/cetakbarcode/index', $data);
    }

    public function details($id)
    {
        require 'vendor/autoload.php';
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $height = 2; 
        $width = 55; 
        $data = $this->db->query("SELECT * FROM tbl_produk WHERE barcode_sendiri='$id'")->row();
        echo '
            <div class="row" id="content-print">
                <div class="col-md-3" style="margin-top: 20px;text-align: center"> ';
                $jml = $this->input->get('jml_cetak');
                for ($i=0; $i < $jml; $i++) { 
                    echo '
                        <div class="barcode" style="height: 110px;width: 220px;float: left;margin: 5px;border: 1px solid #ccc;padding: 7px;background-color: white">
                            <label style="font-size: 11px">'.$data->nama_produk.'</label>
                            <br>
                                <img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->barcode_sendiri, $generator::TYPE_CODE_128, $height, $width)) . '">
                            <br>
                            <label style="font-size: 11px; letter-spacing: 7px;">'.$data->barcode_sendiri.'</label>
                        </div>
                    ';
                }
            echo '
                </div>
            </div>
            
        <script src="'.base_url().'assets/js/jquery.min.js"></script>
        <script>
            $("document").ready(function (){
                var divToPrint = document.getElementById("content-print");
                console.log( divToPrint );
                
                document.open();
                document.write(`<html><body onload="window.print()">`+divToPrint.innerHTML+`</body></html>`);
                document.close();
            })
        </script>
        ' ;
    }
}