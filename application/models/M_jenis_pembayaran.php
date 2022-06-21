<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_jenis_pembayaran extends CI_Model
{
	public function mtampil()
    {
      $sql = "SELECT * FROM tbl_jenis_pembayaran";
      $querySQL = $this->db->query($sql);
      if($querySQL){
        return $querySQL->result();
      }else{
        return 0;
      }
    }

    function mtambahjenispembayaran($nama_jenis_pembayaran){

        $sql = "INSERT INTO tbl_jenis_pembayaran VALUES('','$nama_jenis_pembayaran');";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return "1";
        }
        else{
          return "0";
        }  
    }

    function meditjenispembayaran($kode){
      $sql = "SELECT * FROM tbl_jenis_pembayaran WHERE id_jenis_pembayaran = '$kode'";
      $querySQL = $this->db->query($sql);
      if($querySQL){
        return $querySQL->result();
      }else{return 0;}
    }

    function mupdatejenispembayaran($id,$jenis_pembayaran){
      $sql = "UPDATE tbl_jenis_pembayaran SET nama_jenis_pembayaran='$jenis_pembayaran' WHERE id_jenis_pembayaran='$id'";
      $querySQL = $this->db->query($sql);
      if($querySQL){return "1";}
      else{return "0";}
    }
    
    function mhapusjenispembayaran($a){
      $sql = "DELETE FROM tbl_jenis_pembayaran WHERE id_jenis_pembayaran='$a'";
      $querySQL = $this->db->query($sql);
      if($querySQL){return "1";}
      else{return "0";}
    }

}