<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_kategori extends CI_Model
{
	public function mtampil()
    {
      $sql = "SELECT * FROM tbl_kategori";
      $querySQL = $this->db->query($sql);
      if($querySQL){
        return $querySQL->result();
      }else{
        return 0;
      }
    }

    function mtambahkategori($nama_kategori){

        $sql = "INSERT INTO tbl_kategori VALUES('','$nama_kategori');";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return "1";
        }
        else{
          return "0";
        }  
    }

    function meditkategori($kode){
      $sql = "SELECT * FROM tbl_kategori WHERE id_kategori = '$kode'";
      $querySQL = $this->db->query($sql);
      if($querySQL){
        return $querySQL->result();
      }else{return 0;}
    }

    function mupdatekategori($id,$kategori){
      $sql = "UPDATE tbl_kategori SET nama_kategori='$kategori' WHERE id_kategori='$id'";
      $querySQL = $this->db->query($sql);
      if($querySQL){return "1";}
      else{return "0";}
    }
    
    function mhapuskategori($a){
      $sql = "DELETE FROM tbl_kategori WHERE id_kategori='$a'";
      $querySQL = $this->db->query($sql);
      if($querySQL){return "1";}
      else{return "0";}
    }

}