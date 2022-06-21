<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_booking extends CI_Model
{
	public function mtampil()
	  {
	    $sql = "SELECT  tbl_booking.*,tbl_anggota.nama, tbl_produk.nama_produk FROM tbl_booking JOIN tbl_anggota ON tbl_booking.nip=tbl_anggota.nip JOIN tbl_produk on tbl_booking.id_produk = tbl_produk.id_produk";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){
	      return $querySQL->result();
	    }else{
	      return 0;
	    }
	  }
	  function mtampilnama(){
      $sql = "SELECT * FROM tbl_anggota";
      $querySQL = $this->db->query($sql);
      if($querySQL){
        return $querySQL->result();
      }else{
        return 0;
      }
    }
 	  function mtampil_jenis_pembayaran(){
       $sql = "SELECT * FROM tbl_jenis_pembayaran";
       $querySQL = $this->db->query($sql);
       if($querySQL){
         return $querySQL->result();
       }else{
         return 0;
       }
     }
	  function msetuju($setuju){
	    $sql = "UPDATE tbl_booking SET status='Menunggu Pembayaran' WHERE id_booking='$setuju'";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){return "1";}
	    else{return "0";}
	  }
	  function mtolak($tolak){
	    $sql = "UPDATE tbl_booking SET status='Ditolak' WHERE id_booking='$tolak'";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){return "1";}
	    else{return "0";}
	  }
	  function mcek_edit_status($kode){
	    $sql = "SELECT status FROM tbl_booking where id_booking = '$kode'";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){
	      return $querySQL->result();
	    }else{return 0;}
	  }

	  function mlanjut_bayar($kode){
	    $sql = "SELECT tbl_booking.*, tbl_anggota.nama, tbl_harga.harga,(jumlah*harga) as total  FROM tbl_booking JOIN tbl_anggota on tbl_booking.nip = tbl_anggota.nip JOIN tbl_harga on tbl_booking.id_produk = tbl_harga.id_produk where tbl_booking.id_booking = '$kode'";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){
	      return $querySQL->result();
	    }else{return 0;}
	  }

	  public function msisa($a){
	    $sql = "SELECT  COALESCE(((selisih*100000)-total_belanja),0) as saldo FROM v_sisa WHERE nip = '$a'";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){
	      return $querySQL->result();
	    }else{return 0;}
	  }

	  function mtambahbayar($id_transaksi,$total_harga,$jenis_pembayaran,$nip,$booking,$id_diskon,$id_produk,$jumlah,$harga){
	  	$sql = "INSERT INTO tbl_transaksi VALUES('$id_transaksi',NOW(),'$total_harga','$jenis_pembayaran','$nip','$booking','$id_diskon');";
	  	$querySQL = $this->db->query($sql);
	  	if($querySQL){
	  	  $sql2 = "INSERT INTO tbl_dt_transaksi VALUES('',$id_transaksi,'$id_produk','$jumlah','$harga');";
	  	  $querySQL2 = $this->db->query($sql2);
	  	  if($querySQL2){
	  	    $sql3 = "UPDATE tbl_booking SET status='Bayar Tunai Selesai' WHERE id_booking='$booking'";
	  	    $querySQL3 = $this->db->query($sql3);
	  	    if($querySQL3){
	  	      $sql4 = "UPDATE tbl_detail_diskon SET pakai='Dipakai' WHERE kode_diskon='$id_diskon' and nip = '$nip'";
	  	      $querySQL4 = $this->db->query($sql4);
	  	      if($querySQL4){
	  	        return 1;
	  	      }else{
	  	        return 0;
	  	      }
	  	    }else{
	  	      return 0;
	  	    }
	  	  }else{
	  	    return 0;
	  	  }
	  	}else{
	  	  return 0;
	  	}
	  }

	  function msimpan_status_edit($a,$b){

	      $sql4 = "UPDATE tbl_booking SET status='$b' WHERE id_booking='$a'";
	      $querySQL4 = $this->db->query($sql4);
	      if($querySQL4){
	        return 1;
	      }else{
	        return 0;
	      }
	  	    
	  }


	  function mnomor_transaksi(){
	  	$sql = "SELECT (MAX(id_transaksi)+1) as id_transaksi from tbl_transaksi";
	  	$querySQL = $this->db->query($sql);
	  	if($querySQL){
	  	  return $querySQL->result();
	  	}else{
	  	  return 0;
	  	}
	  }


	  public function mdiskonku($a){
	    $sql = "SELECT tbl_diskon.kode_diskon, tbl_diskon.keterangan, tbl_detail_diskon.nip, tbl_detail_diskon.status, tbl_detail_diskon.pakai, tbl_detail_diskon.id_detail_diskon FROM tbl_diskon JOIN tbl_detail_diskon on tbl_diskon.kode_diskon = tbl_detail_diskon.kode_diskon WHERE tbl_detail_diskon.status = 'Disetujui' AND tbl_detail_diskon.nip = '1802040779' AND tbl_detail_diskon.pakai = '';";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){
	      return $querySQL->result();
	    }else{return 0;}
	  } 

	  public function mhitungdiskon($a){
	    $sql = "SELECT * FROM tbl_diskon WHERE kode_diskon = '$a'";
	    $querySQL = $this->db->query($sql);
	    if($querySQL){
	      return $querySQL->result();
	    }else{
	      return 0;
	    }
	  }
}