<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['kategori'] = 'Kategori';
$route['anggota'] = 'Anggota';
$route['laporan'] = 'Laporan';
$route['harga'] = 'Harga';
$route['pembelian'] = 'Pembelian';
$route['pembelian/store'] = 'Pembelian/store';
$route['retur-pembelian'] = 'ReturPembelian';
$route['pengguna'] = 'Pengguna';
$route['laporan-pembelian'] = 'LaporanPembelian';
$route['laporan-pembelian/json'] = 'LaporanPembelian/json';
$route['laporan-penjualan'] = 'LaporanPenjualan';
$route['laporan-penjualan/json'] = 'LaporanPenjualan/json';
$route['laporan-laba'] = 'LaporanLabaPenjualan';
$route['laporan-laba/json'] = 'LaporanLabaPenjualan/json';
$route['laporan-cashflow'] = 'LaporanCashFlow';
$route['laporan-cashflow/json'] = 'LaporanCashFlow/json';
$route['piutang'] = 'Piutang';
$route['cetak-barcode'] = 'CetakBarcode';
$route['cetak-barcode/(:num)'] = 'CetakBarcode/details/$1';
$route['cetak-laporan-pembelian/(:num)'] = 'LaporanPembelian/cetak/$1';
$route['cetak-laporan-penjualan/(:num)'] = 'LaporanPenjualan/cetak/$1';

$route['setting'] = 'Setting';
$route['logout'] = 'Dashboard/logout';

// Kasir
$route['home'] = 'Kasir/Home';
$route['transaksi'] = 'Kasir/Transaksi';
$route['kasir'] = 'Kasir/Transaksi/pembayaran';
$route['bayar'] = 'Kasir/Transaksi/bayar';

// route api dari andorid
$route['keranjang-kasir'] = 'Keranjang';
$route['keranjang-kasir/keranjang'] = 'Keranjang/store';
$route['keranjang-kasir/show'] = 'Keranjang/show';
$route['keranjang-kasir/delete'] = 'Keranjang/delete';
$route['update_qty'] = 'Keranjang/update';

$route['keranjang-pembelian'] = 'KeranjangPembelian';
$route['keranjang-pembelian/keranjang'] = 'KeranjangPembelian/store';
$route['keranjang-pembelian/delete'] = 'KeranjangPembelian/delete';
$route['keranjang-pembelian/update_qty'] = 'KeranjangPembelian/update';

$route['keranjang-kadaluwarsa/keranjang'] = 'KeranjangKadaluwarsa/store';
$route['keranjang-kadaluwarsa/show'] = 'KeranjangKadaluwarsa/show';
$route['keranjang-kadaluwarsa/delete'] = 'KeranjangKadaluwarsa/delete';
$route['keranjang-kadaluwarsa/update_qty'] = 'KeranjangKadaluwarsa/update';

$route['api/uang-masuk'] = 'Informasi/uang_masuk';
$route['api/penjualan'] = 'Informasi/penjualan';
$route['api/piutang'] = 'Informasi/piutang';
$route['api/produk-kosong'] = 'Informasi/produk_kosong';