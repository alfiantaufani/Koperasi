<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_harga extends CI_Model
{
    public function mtampil()
      {
        $sql = "Select tbl_harga.*,tbl_produk.nama_produk FROM tbl_harga JOIN tbl_produk ON tbl_harga.id_produk=tbl_produk.id_produk";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{
          return 0;
        }
      }
      function mtampilproduk(){
        $sql = "SELECT * FROM tbl_produk";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{
          return 0;
        }
      }

      function mtambahharga($id_produk,$harga){

          $sql = "INSERT INTO tbl_harga VALUES('','$id_produk','$harga');";
          $querySQL = $this->db->query($sql);
          if($querySQL){
            return "1";
          }
          else{
            return "0";
          }  
      }

      function meditharga($kode){
        $sql = "SELECT * FROM tbl_harga WHERE id_harga = '$kode'";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{return 0;}
      }

      function mupdateharga($id_harga,$id_produk,$harga){
        $sql = "UPDATE tbl_harga SET id_produk='$id_produk',harga='$harga'WHERE id_harga='$id_harga'";
        $querySQL = $this->db->query($sql);
        if($querySQL){return "1";}
        else{return "0";}
      }
      
      function mhapusharga($id_produk){
        $sql = "DELETE FROM tbl_harga WHERE id_produk='$id_produk'";
        $querySQL = $this->db->query($sql);
        if($querySQL){return "1";}
        else{return "0";}
      }


}