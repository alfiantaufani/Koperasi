-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 05:23 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dm_transaksi`
--

CREATE TABLE `dm_transaksi` (
  `id_dt` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `nama`, `password`, `level`) VALUES
('afandi', 'afandi', 'afandi', 'administrator'),
('fadil', 'fadil', 'fadil', 'administrator'),
('faqih', 'faqih', 'faqih', 'administrator'),
('kasir_afandi', 'kasir_afandi', 'kasir_afandi', 'kasir'),
('kasir_fadil', 'kasir_fadil', 'kasir_fadil', 'kasir_fadil'),
('kasir_faqih', 'kasir_faqih', 'kasir_faqih', 'kasir'),
('kasir_nadyatus', 'kasir_nadyatus', 'kasir_nadyatus', 'kasir'),
('kasir_zuke', 'kasir_zuke', 'kasir_zuke', 'kasir'),
('nadyatus', 'nadyatus', 'nadyatus', 'administrator'),
('zuke', 'zuke', 'zuke', 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `nip` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tgl_gabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`nip`, `nama`, `password`, `no_hp`, `tgl_gabung`) VALUES
(1802040779, 'Zuke Ernanda Putri', 'zuke', '085646253810', '2020-01-29'),
(1802040783, 'Muhammad Fadil Zulfikar', 'fadil', '085156852348', '2020-02-01'),
(1802040791, 'Muhammad Al Faqih', 'faqih', '08971540955', '2020-03-01'),
(1802040794, 'Nadyatus Nur Sholicha', 'nadyatus', '085790578744', '2020-04-01'),
(1802040820, 'Achmad Afandi', 'afandi', '085851159603', '2020-05-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balas_chat`
--

CREATE TABLE `tbl_balas_chat` (
  `id_balas_chat` int(11) NOT NULL,
  `id_tujuan_chat` varchar(25) NOT NULL,
  `tgl` datetime NOT NULL,
  `deskripsi_balas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_balas_chat`
--

INSERT INTO `tbl_balas_chat` (`id_balas_chat`, `id_tujuan_chat`, `tgl`, `deskripsi_balas`) VALUES
(8, '001', '2021-04-01 11:17:19', 'Hai? apa kabar'),
(9, '001', '2021-04-03 08:40:19', 'Hai?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id_booking` int(50) NOT NULL,
  `nip` int(50) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `id_produk` int(50) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal_ambil` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `id_chat` varchar(25) NOT NULL,
  `tgl` datetime NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `user`, `id_chat`, `tgl`, `deskripsi`, `tipe`) VALUES
(8, 'fadil', '31856', '2021-04-03 09:53:41', 'hai?', 'user'),
(9, 'administrator', '31856', '2021-04-03 09:53:52', 'Hai? apa kabar', 'admin'),
(12, 'administrator', '31856', '2021-04-03 10:12:37', 'apa?', 'admin'),
(16, 'alfian', '07136', '2021-04-03 10:18:36', 'kak, gimana proses setelah booking barang?', 'user'),
(17, 'administrator', '07136', '2021-04-03 10:19:13', 'silahkan pergi ke koperasi untuk ambil barangnya.', 'admin'),
(18, 'alfian', '07136', '2021-04-03 10:23:08', 'Oke kak. Terima kasih banyak', 'user'),
(19, 'administrator', '07136', '2021-04-03 10:23:24', 'ya, sama sama', 'admin'),
(20, 'fadil', '31856', '2021-04-03 10:28:35', 'barang saya gimana?', 'user'),
(21, 'administrator', '31856', '2021-04-03 10:28:52', 'emang kenapa?', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_diskon`
--

CREATE TABLE `tbl_detail_diskon` (
  `id_detail_diskon` int(100) NOT NULL,
  `nip` int(100) NOT NULL,
  `kode_diskon` int(100) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pakai` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_diskon`
--

INSERT INTO `tbl_detail_diskon` (`id_detail_diskon`, `nip`, `kode_diskon`, `bukti`, `status`, `pakai`) VALUES
(1, 1802040779, 1, 'diskon1.jpg', 'Disetujui', ''),
(2, 1802040794, 2, 'diskon2.jpg', 'Disetujui', ''),
(3, 1802040791, 1, 'diskon3.jpg\r\n', 'Disetujui', ''),
(4, 1802040783, 1, 'diskon4.jpg', 'Ditolak', ''),
(5, 1802040820, 2, 'diskon5.jpg', 'Diproses\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diskon`
--

CREATE TABLE `tbl_diskon` (
  `kode_diskon` int(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `detail_tantangan` varchar(100) NOT NULL,
  `diskon` int(100) NOT NULL,
  `aktif` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diskon`
--

INSERT INTO `tbl_diskon` (`kode_diskon`, `keterangan`, `detail_tantangan`, `diskon`, `aktif`) VALUES
(1, 'Produk ABC 30%', 'Beli 3 produk untuk mendapat diskon', 30, '2021-06-21'),
(2, 'Produk Aice 10%', 'Ajak orang lain untuk menjadi anggota', 50, '2021-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dt_transaksi`
--

CREATE TABLE `tbl_dt_transaksi` (
  `id_dt` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_harga`
--

CREATE TABLE `tbl_harga` (
  `id_harga` int(50) NOT NULL,
  `id_produk` int(50) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_harga`
--

INSERT INTO `tbl_harga` (`id_harga`, `id_produk`, `harga`) VALUES
(1, 1, 6500),
(2, 2, 5500),
(3, 3, 16000),
(4, 4, 6000),
(5, 5, 4500),
(6, 6, 5000),
(7, 7, 4500),
(8, 8, 6000),
(9, 9, 19000),
(10, 10, 6000),
(11, 11, 3000),
(12, 12, 9500),
(13, 13, 6500),
(14, 14, 5500),
(15, 15, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pembayaran`
--

CREATE TABLE `tbl_jenis_pembayaran` (
  `id_jenis_pembayaran` int(50) NOT NULL,
  `nama_jenis_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jenis_pembayaran`
--

INSERT INTO `tbl_jenis_pembayaran` (`id_jenis_pembayaran`, `nama_jenis_pembayaran`) VALUES
(1, 'Pembayaran bulanan'),
(2, 'Pembayaran tunai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Keperluan Memasak'),
(4, 'Kosmetik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemasukan`
--

CREATE TABLE `tbl_pemasukan` (
  `id_pemasukan` int(50) NOT NULL,
  `id_produk` int(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemasukan`
--

INSERT INTO `tbl_pemasukan` (`id_pemasukan`, `id_produk`, `tanggal`, `jumlah`) VALUES
(1, 1, '2021-04-01', '100'),
(2, 2, '2021-04-05', '100'),
(3, 3, '2021-04-08', '100'),
(4, 4, '2021-04-15', '100'),
(5, 5, '2021-04-11', '100'),
(6, 6, '2021-07-01', '100'),
(7, 7, '2021-07-01', '100'),
(8, 8, '2021-07-01', '100'),
(9, 9, '2021-07-01', '100'),
(10, 10, '2021-07-01', '100'),
(11, 11, '2021-07-01', '100'),
(12, 12, '2021-07-01', '100'),
(13, 13, '2021-07-01', '100'),
(14, 14, '2021-07-01', '100'),
(15, 15, '2021-07-01', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemilik_diskon`
--

CREATE TABLE `tbl_pemilik_diskon` (
  `id_pemilik` int(100) DEFAULT NULL,
  `nip` int(100) NOT NULL,
  `kode_diskon` int(100) NOT NULL,
  `tanggal_digunakan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemilik_diskon`
--

INSERT INTO `tbl_pemilik_diskon` (`id_pemilik`, `nip`, `kode_diskon`, `tanggal_digunakan`) VALUES
(1, 1802040779, 1, '2021-04-07'),
(2, 1802040794, 1, '2021-04-06'),
(3, 1802040791, 2, '2021-04-13'),
(4, 1802040783, 2, '2021-04-13'),
(5, 1802040820, 1, '2021-04-13'),
(1, 1802040779, 1, '2021-04-07'),
(2, 1802040794, 1, '2021-04-06'),
(3, 1802040791, 2, '2021-04-13'),
(4, 1802040783, 2, '2021-04-13'),
(5, 1802040820, 1, '2021-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(50) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `id_kategori` int(100) NOT NULL,
  `id_tempat_produksi` int(50) NOT NULL,
  `kandungan_produk` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `nama_produk`, `foto_produk`, `kode_produk`, `id_kategori`, `id_tempat_produksi`, `kandungan_produk`) VALUES
(1, 'Crunch coklat', 'gb1.jpg', '8997212800479', 1, 1, '32 gram karbohidrat dimana 25 gram karbohidrat tersebut berasal dari gula, yang artinya 12,8% dari minuman ini adalah karbohidrat dan 10% karbohidrat tersebut berasal dari gula'),
(2, 'Hydrococo Original', 'gb2.jpg', '8992858527308', 1, 2, 'Air Kelapa Murni'),
(3, 'Bimoli 1 Liter', 'gb3.jpg', '899262802215', 1, 3, 'Kelapa sawit Golden Grade yang diproses dengan Golden Refinery Technology dan Pemurnian Multi Proses'),
(4, 'Mitu Wipes Antiseptic', 'gb4.jpg', '899274554068', 1, 4, 'Benzalkonium Chloride'),
(5, 'Zwitsal Baby Soap 70G', 'gb5.jpg', '899269424250', 1, 5, 'Sodium palmate, sodium cocoate, olive oil PEG-7 esters, parfum, cocamide MEA, mineral oil, titanium dioxide, tetrasodium EDTA, sodium thiosulfate, canola oil, BHT.'),
(6, 'Abc Kacang Hijau', 'gb6.jpg', '711844162419', 2, 6, ' Sari kacang hijau (80%), air, gula, gula kelapa (4.6%), daun pandan (0.3%), jahe (0.2%), pewarna alami karamel kelas I INS.150a, premiks vitamin B1 & B2.'),
(7, 'Aice Choco Cookies', 'gb7.jpg', '8885013130072', 2, 7, '220 kkal. 10.23 % 16 g. 23.88 % 12 g. 18 g. 5.54 % 2 g.'),
(8, 'Aqua Besar', 'gb8.jpg', '8886008101091', 2, 8, 'Air Pegunungan yang disuling'),
(9, 'Susu Bendera Gold Kaleng 490', 'gb9.jpg', '8992753721009', 2, 9, 'Zat gizi makro (protein, karbohidrat dan lemak) serta mengandung 8 Vitamin (Vitamin A, D3, E, B1, B2, B3, B6 dan B12) dan mineral: Kalsium dan Fosfor yang bisa memberi sumber energi.'),
(10, 'Abc Sambal Asli 135ML', 'gb10.jpg', '0349384', 3, 10, 'Cabai, air, gula, garam, bawang putih, pati, cuka, pengawet natrium benzoat dan natrium metabisulfit, pengatur keasaman, penguatrasa mononatrium glutamat dan inosinat guanilat, pemantap nabati.'),
(11, 'Agar Rasa Melon 10 g', 'gb11.jpg', '8992933423112', 3, 11, 'Rumput laut, perisa melon'),
(12, 'Boncabe Level 15', 'gb12.jpg', '8995899250341', 3, 12, 'Cabai kering, bawang putih, bawang merah, lada hitam, lada putih, minyak sayur, garam, gula, penguat rasa (sodium inosinate & guanilat)'),
(13, 'Bontea Green Original', 'gb13.jpg', '8991002311213', 1, 13, 'Glukosa, gula, teh hijau (0,55%), perisa identik alami teh hijau, pengatur keasaman asam lactic, pengemulsi lesitin kedelai, perisa identik alami apel, garam, menthol. '),
(14, 'Chicki Ball 55 Gram', 'gb14.jpg', ' 089686591019', 1, 14, 'Jagung, Beras, Minyak Kelapa Sawit, dan Bumbu Rasa Keju (mengandung Penguat Rasa Mononatrium Glutamat, Dinatrium Ribonukleotida)'),
(15, 'Cheetos Ayam Panggang 40 gram', 'gb15.jpg', '89686600049', 1, 15, 'Pecahan jagung 54.07%, minyak olein kelapa sawit, bumbu rasaÂ Ayam Panggang (megandung penguat rasa mononatrium glutamat, dinatrium inosinat, dinatrium guanilat), daging sapi bubuk 0.01%');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tempat_produksi`
--

CREATE TABLE `tbl_tempat_produksi` (
  `id_tempat_produksi` int(50) NOT NULL,
  `nama_tempat_produksi` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tempat_produksi`
--

INSERT INTO `tbl_tempat_produksi` (`id_tempat_produksi`, `nama_tempat_produksi`, `alamat`) VALUES
(1, 'Kuma Crunch Coklat ', 'Sukoharjo, Jawa Tengah'),
(2, 'PT. Kalbe Farma', 'Malang, Jawa Timur'),
(3, 'Salim Ivo Mas Pratama', 'Bitung, Sulawesi Utara'),
(4, 'PT. Megasari Makmur', 'Bogor, Jawa Barat'),
(5, 'PT. Sara Lee Body Care Indonesia', 'Jakarta, Jawa Barat'),
(6, 'PT. Heinz ABC Indonesia ', 'Jakarta, Jawa Barat'),
(7, 'PT Alpen Food Industry', 'Bekasi, Jawa Barat'),
(8, 'PT.  AQUA', 'Jakarta, Jawa Barat'),
(9, 'PT Frisian Flag Indonesia ', 'Jakarta Timur, Jawa Barat'),
(10, 'PT Aneka Bina Cipta Central Food Industry', 'Jakarta, Jawa Barat'),
(11, 'CV. Agar Sari Jaya', 'Malang, Jawa Timur'),
(12, 'PT Kobe Boga', 'Kudus, Jawa Tengah'),
(13, 'PT. Agel Langgeng', 'Pasuruan, Jawa Timur'),
(14, 'PT. Indofood Fritolay', 'Jakarta, Jawa Barat'),
(15, 'PT. Indofood Fritolay', 'Jakarta, Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(100) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_harga` int(100) NOT NULL,
  `id_jenis_pembayaran` int(100) NOT NULL,
  `nip` int(100) NOT NULL,
  `id_booking` varchar(11) NOT NULL,
  `kode_diskon` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`) VALUES
(1, 'fadil', 'fadil');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_anggota`
-- (See below for the actual view)
--
CREATE TABLE `v_anggota` (
`nip` int(50)
,`nama` varchar(50)
,`password` varchar(50)
,`no_hp` varchar(50)
,`tgl_gabung` date
,`sekarang` date
,`selisih` bigint(22)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_booking`
-- (See below for the actual view)
--
CREATE TABLE `v_booking` (
`id_produk` int(50)
,`jml_booking` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_hasil_stock`
-- (See below for the actual view)
--
CREATE TABLE `v_hasil_stock` (
`id_produk` int(50)
,`nama_produk` varchar(50)
,`id_kategori` int(100)
,`id_tempat_produksi` int(50)
,`jml_pemasukan` double
,`jml_transaksi` decimal(32,0)
,`jml_booking` decimal(65,0)
,`jumlah` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_hitung_sisa`
-- (See below for the actual view)
--
CREATE TABLE `v_hitung_sisa` (
`nip` int(100)
,`id_jenis_pembayaran` int(100)
,`total` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemasukan`
-- (See below for the actual view)
--
CREATE TABLE `v_pemasukan` (
`id_produk` int(50)
,`jml_pemasukan` double
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_sisa`
-- (See below for the actual view)
--
CREATE TABLE `v_sisa` (
`nip` int(50)
,`total_belanja` decimal(65,0)
,`selisih` bigint(22)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi` (
`id_produk` int(11)
,`jml_transaksi` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `v_anggota`
--
DROP TABLE IF EXISTS `v_anggota`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_anggota`  AS SELECT `tbl_anggota`.`nip` AS `nip`, `tbl_anggota`.`nama` AS `nama`, `tbl_anggota`.`password` AS `password`, `tbl_anggota`.`no_hp` AS `no_hp`, `tbl_anggota`.`tgl_gabung` AS `tgl_gabung`, curdate() AS `sekarang`, timestampdiff(MONTH,`tbl_anggota`.`tgl_gabung`,curdate()) + 1 AS `selisih` FROM `tbl_anggota` ;

-- --------------------------------------------------------

--
-- Structure for view `v_booking`
--
DROP TABLE IF EXISTS `v_booking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_booking`  AS SELECT `tbl_booking`.`id_produk` AS `id_produk`, sum(`tbl_booking`.`jumlah`) AS `jml_booking` FROM `tbl_booking` WHERE `tbl_booking`.`status` = 'Disetujui' GROUP BY `tbl_booking`.`id_produk` ;

-- --------------------------------------------------------

--
-- Structure for view `v_hasil_stock`
--
DROP TABLE IF EXISTS `v_hasil_stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_hasil_stock`  AS SELECT `tbl_produk`.`id_produk` AS `id_produk`, `tbl_produk`.`nama_produk` AS `nama_produk`, `tbl_produk`.`id_kategori` AS `id_kategori`, `tbl_produk`.`id_tempat_produksi` AS `id_tempat_produksi`, coalesce(`v_pemasukan`.`jml_pemasukan`,0) AS `jml_pemasukan`, coalesce(`v_transaksi`.`jml_transaksi`,0) AS `jml_transaksi`, coalesce(`v_booking`.`jml_booking`,0) AS `jml_booking`, coalesce(`v_pemasukan`.`jml_pemasukan`,0) - coalesce(`v_transaksi`.`jml_transaksi`,0) - coalesce(`v_booking`.`jml_booking`,0) AS `jumlah` FROM (((`tbl_produk` left join `v_pemasukan` on(`tbl_produk`.`id_produk` = `v_pemasukan`.`id_produk`)) left join `v_transaksi` on(`tbl_produk`.`id_produk` = `v_transaksi`.`id_produk`)) left join `v_booking` on(`tbl_produk`.`id_produk` = `v_booking`.`id_produk`)) GROUP BY `tbl_produk`.`id_produk` ;

-- --------------------------------------------------------

--
-- Structure for view `v_hitung_sisa`
--
DROP TABLE IF EXISTS `v_hitung_sisa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_hitung_sisa`  AS SELECT `tbl_transaksi`.`nip` AS `nip`, `tbl_transaksi`.`id_jenis_pembayaran` AS `id_jenis_pembayaran`, sum(`tbl_transaksi`.`total_harga`) AS `total` FROM `tbl_transaksi` WHERE `tbl_transaksi`.`id_jenis_pembayaran` = '1' GROUP BY `tbl_transaksi`.`nip` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pemasukan`
--
DROP TABLE IF EXISTS `v_pemasukan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemasukan`  AS SELECT `tbl_pemasukan`.`id_produk` AS `id_produk`, sum(`tbl_pemasukan`.`jumlah`) AS `jml_pemasukan` FROM `tbl_pemasukan` GROUP BY `tbl_pemasukan`.`id_produk` ;

-- --------------------------------------------------------

--
-- Structure for view `v_sisa`
--
DROP TABLE IF EXISTS `v_sisa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_sisa`  AS SELECT `v_anggota`.`nip` AS `nip`, coalesce(`v_hitung_sisa`.`total`,0) AS `total_belanja`, `v_anggota`.`selisih` AS `selisih` FROM (`v_anggota` left join `v_hitung_sisa` on(`v_hitung_sisa`.`nip` = `v_anggota`.`nip`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS SELECT `tbl_dt_transaksi`.`id_produk` AS `id_produk`, sum(`tbl_dt_transaksi`.`jumlah`) AS `jml_transaksi` FROM `tbl_dt_transaksi` GROUP BY `tbl_dt_transaksi`.`id_produk` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dm_transaksi`
--
ALTER TABLE `dm_transaksi`
  ADD PRIMARY KEY (`id_dt`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_balas_chat`
--
ALTER TABLE `tbl_balas_chat`
  ADD PRIMARY KEY (`id_balas_chat`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_detail_diskon`
--
ALTER TABLE `tbl_detail_diskon`
  ADD PRIMARY KEY (`id_detail_diskon`);

--
-- Indexes for table `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  ADD PRIMARY KEY (`kode_diskon`);

--
-- Indexes for table `tbl_dt_transaksi`
--
ALTER TABLE `tbl_dt_transaksi`
  ADD PRIMARY KEY (`id_dt`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  ADD PRIMARY KEY (`id_harga`);

--
-- Indexes for table `tbl_jenis_pembayaran`
--
ALTER TABLE `tbl_jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_pemasukan`
--
ALTER TABLE `tbl_pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_tempat_produksi`
--
ALTER TABLE `tbl_tempat_produksi`
  ADD PRIMARY KEY (`id_tempat_produksi`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dm_transaksi`
--
ALTER TABLE `dm_transaksi`
  MODIFY `id_dt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `nip` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;

--
-- AUTO_INCREMENT for table `tbl_balas_chat`
--
ALTER TABLE `tbl_balas_chat`
  MODIFY `id_balas_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id_booking` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_detail_diskon`
--
ALTER TABLE `tbl_detail_diskon`
  MODIFY `id_detail_diskon` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_diskon`
--
ALTER TABLE `tbl_diskon`
  MODIFY `kode_diskon` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_dt_transaksi`
--
ALTER TABLE `tbl_dt_transaksi`
  MODIFY `id_dt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_harga`
--
ALTER TABLE `tbl_harga`
  MODIFY `id_harga` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_jenis_pembayaran`
--
ALTER TABLE `tbl_jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pemasukan`
--
ALTER TABLE `tbl_pemasukan`
  MODIFY `id_pemasukan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_tempat_produksi`
--
ALTER TABLE `tbl_tempat_produksi`
  MODIFY `id_tempat_produksi` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dm_transaksi`
--
ALTER TABLE `dm_transaksi`
  ADD CONSTRAINT `dm_transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`);

--
-- Constraints for table `tbl_dt_transaksi`
--
ALTER TABLE `tbl_dt_transaksi`
  ADD CONSTRAINT `tbl_dt_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tbl_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tbl_dt_transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tbl_produk` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
