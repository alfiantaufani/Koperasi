<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array();


$autoload['libraries'] = array('database','session', 'cart');


$autoload['drivers'] = array();

$autoload['helper'] = array('url','form');


$autoload['config'] = array();

$autoload['language'] = array();


$autoload['model'] = array('M_login','M_kategori','M_anggota','M_produk','M_laporan','M_jenis_pembayaran','M_tempat_produksi','M_harga','M_barang_masuk','M_booking','M_stok');
