<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_produk extends CI_Model
{
  	public function mtampil()
      {
        $sql = "SELECT tbl_produk.*,tbl_kategori.nama_kategori from tbl_produk JOIN tbl_kategori ON tbl_produk.id_kategori = tbl_kategori.id_kategori";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{
          return 0;
        }
      }

      function mtampilkategori(){
        $sql = "SELECT * FROM tbl_kategori";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{
          return 0;
        }
      }

      function mtampiltempatproduksi(){
        $sql = "SELECT * FROM tbl_tempat_produksi";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{
          return 0;
        }
      }

      

      function simpan_upload($nama_produk,$foto_produk,$kategori_produk,$tempat,$kandungan_produk,$harga_produk){
        $data = array(
          'nama_produk'   =>$nama_produk,
          'harga'         =>$harga_produk,
          'foto_produk'   =>$foto_produk,
          'id_kategori'   =>$kategori_produk,
          // 'id_tempat_produksi'=>$tempat,
          'kandungan_produk'=>$kandungan_produk
        );
        $result=$this->db->insert('tbl_produk',$data);
        return $result;
      }

      function meditproduk($kode){
        $sql = "SELECT * FROM tbl_produk WHERE id_produk= '$kode'";
        $querySQL = $this->db->query($sql);
        if($querySQL){
          return $querySQL->result();
        }else{return 0;}
      }

      function mupdateproduk($id_produk,$nama_produk,$foto_produk,$kategori_produk,$kandungan_produk){
        $sql = "UPDATE tbl_produk SET nama_produk='$nama_produk',foto_produk='$foto_produk', id_kategori='$kategori_produk', kandungan_produk='$kandungan_produk' WHERE id_produk='$id_produk'";
        $querySQL = $this->db->query($sql);
        if($querySQL){return "1";}
        else{return "0";}
      }
      
      function mhapusproduk($id_produk){
        $sql = "DELETE FROM tbl_produk WHERE id_produk='$id_produk'";
        $querySQL = $this->db->query($sql);
        if($querySQL){return "1";}
        else{return "0";}
      }

}