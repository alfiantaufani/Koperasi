<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_barang_masuk extends CI_Model
{
	public function mtampil()
	  {
	    $sql = "SELECT tbl_pemasukan.*,tbl_produk.nama_produk FROM tbl_pemasukan JOIN tbl_produk ON tbl_pemasukan.id_produk=tbl_produk.id_produk";
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

	  
	  function mtambahbarangmasuk($id_produk,$tanggal,$jumlah){

	      $sql = "INSERT INTO tbl_pemasukan VALUES('','$id_produk','$tanggal','$jumlah');";
	      $querySQL = $this->db->query($sql);
	      if($querySQL){
	        return "1";
	      }
	      else{
	        return "0";
	      }  
	  }

	  function meditbarangmasuk($kode){
	    $sql = "SELECT * FROM tbl_pemasukan WHERE id_pemasukan = '$kode'";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){
	      return $querySQL->result();
	    }else{return 0;}
	  }

	  function mupdatebarangmasuk($id_pemasukan,$nama_produk,$tanggal,$jumlah){
	    $sql = "UPDATE tbl_pemasukan SET id_produk='$nama_produk',tanggal='$tanggal',jumlah='$jumlah' WHERE id_pemasukan='$id_pemasukan'";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){return "1";}
	    else{return "0";}
	  }
	  

}