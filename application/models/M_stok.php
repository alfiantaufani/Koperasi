<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_stok extends CI_Model
{
	public function mtampil()
      {
        $sql = "SELECT v_hasil_stock.*,tbl_kategori.nama_kategori from v_hasil_stock JOIN tbl_kategori on v_hasil_stock.id_kategori=tbl_kategori.id_kategori";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{
          return 0;
        }
      }
}