<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_anggota extends CI_Model
{
  	public function mtampil()
      {
        $sql = "SELECT * FROM tbl_anggota";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{
          return 0;
        }
      }

      function mtambahanggota($nama,$no_hp,$tgl_gabung){

          $sql = "INSERT INTO tbl_anggota VALUES('$nama','$no_hp','$tgl_gabung')";
          $querySQL = $this->db->query($sql);
          if($querySQL){
            return "1";
          }
          else{
            return "0";
          }  
      }

      function meditanggota($kode){
        $sql = "SELECT * FROM tbl_anggota WHERE id = '$kode'";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{return 0;}
      }

      function mupdateanggota($id,$nama,$no_hp,$tgl_gabung){
        $sql = "UPDATE tbl_anggota SET nama='$nama',no_hp='$no_hp',tgl_gabung='$tgl_gabung' WHERE id='$id'";
        $querySQL = $this->db->query($sql);
        if($querySQL){return "1";}
        else{return "0";}
      }
      
      function mhapusanggota($id){
        $sql = "DELETE FROM tbl_anggota WHERE id='$id'";
        $querySQL = $this->db->query($sql);
        if($querySQL){return "1";}
        else{return "0";}
      }

}