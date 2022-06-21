<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_tempat_produksi extends CI_Model
{
	public function mtampil()
    {
      $sql = "SELECT * FROM tbl_tempat_produksi";
      $querySQL = $this->db->query($sql);
      if($querySQL){
        return $querySQL->result();
      }else{
        return 0;
      }
    }

    function mtambahtempatproduksi($nama_tempat_produksi , $alamat){

        $sql = "INSERT INTO tbl_tempat_produksi VALUES('','$nama_tempat_produksi','$alamat');";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return "1";
        }
        else{
          return "0";
        }  
    }

    function medittempatproduksi($kode){
      $sql = "SELECT * FROM tbl_tempat_produksi WHERE id_tempat_produksi= '$kode'";
      $querySQL = $this->db->query($sql);
      if($querySQL){
        return $querySQL->result();
      }else{return 0;}
    }

    function mupdatetempatproduksi($id,$nama_tempat_produksi,$alamat){
      $sql = "UPDATE tbl_tempat_produksi SET nama_tempat_produksi='$nama_tempat_produksi', alamat='$alamat' WHERE id_tempat_produksi='$id'";
      $querySQL = $this->db->query($sql);
      if($querySQL){return "1";}
      else{return "0";}
    }
    
    function mhapustempatproduksi($a){
      $sql = "DELETE FROM tbl_tempat_produksi WHERE id_tempat_produksi='$a'";
      $querySQL = $this->db->query($sql);
      if($querySQL){return "1";}
      else{return "0";}
    }

}