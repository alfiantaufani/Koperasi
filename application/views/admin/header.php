<?php
$setting = $this->db->get_where('tbl_setting', array('id' => 1))->row();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo.png">

    <title><?= $setting->nama_koperasi ?></title>

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">
    <!-- Sweet Alert css -->
    <link href="<?php echo base_url() ?>assets/plugins/sweet-alert/sweetalert2.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url() ?>assets/js/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>assets/js/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" type="text/css" />

    <link href="https://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>
    <style>
        input[type="number"] {
            -webkit-appearance: textfield;
            -moz-appearance: textfield;
            appearance: textfield;
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
        }

        .number-input {
            border: 0;
            display: inline-flex;
        }

        .number-input,
        .number-input * {
            box-sizing: border-box;
        }

        .number-input button {
            outline: none;
            -webkit-appearance: none;
            background-color: transparent;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            cursor: pointer;
            margin: 0;
            position: relative;
            border-radius: 7px;
            border-color: #323a4645;
        }

        .number-input button:before,
        .number-input button:after {
            display: inline-block;
            position: absolute;
            content: '';
            width: 1rem;
            height: 2px;
            background-color: #343a40b5;
            transform: translate(-50%, -50%);
        }

        .number-input button.plus:after {
            transform: translate(-50%, -50%) rotate(90deg);
        }

        .number-input input[type=number] {
            max-width: 5rem;
            padding: .5rem;
            font-size: 18px;
            color: #6c757d;
            border: none;
            /* border-width: 0 2px; */
            font-weight: bold;
            text-align: center;
        }

        @media(max-width: 990px) {
            .logo {
                display: none !important;
            }

            .side-menu {
                top: 50px !important;
            }

            .topbar-left {
                display: none !important;
            }

            .dropdown-item {
                padding: 13px 1.5rem !important;
            }
        }

        #sidebar-menu>ul>li>a>span {
            font-weight: 600 !important;
        }

        .logo {
            font-size: 17px !important;
        }

        .nav>li>a:focus,
        .nav>li>a:hover {
            padding: 0px 10px 0px 10px !important;
        }

        .navbar-default .nav-link {
            padding: 0px 10px 0px 10px !important;
        }

        #responsive-datatable_filter label {
            display: none !important;
        }

        #tbl_keranjang_filter label {
            display: none !important;
        }

        #tbl_keranjang_length label {
            display: none !important;
        }

        #tbl_keranjang_info {
            display: none !important;
        }

        #tbl_keranjang_paginate {
            display: none !important;
        }

        .form-control-lg {
            height: calc(1.5em + 1rem + 2px) !important;
            padding: 0.5rem 1rem !important;
            font-size: 1.25rem !important;
            line-height: 1.5 !important;
            border-radius: 0.3rem !important;
        }

        .datepicker {
            padding: 15px !important;
        }

        .inline-group {
            max-width: 9rem;
            padding: .5rem;
        }

        .inline-group .form-control {
            text-align: right;
        }

        .form-control[type="number"]::-webkit-inner-spin-button,
        .form-control[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">
        <div class="topbar">
            <div class="topbar-left">
                <a href="#" class="logo  font-bold"><?= $setting->nama_koperasi ?><i class="mdi mdi-layers"></i></a>
            </div>

            <div class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <ul class="nav navbar-nav list-inline navbar-left">
                        <li class="list-inline-item">
                            <button class="button-menu-mobile open-left">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="list-inline-item">
                            <h1 class="page-title">Dashboard</h1>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav list-inline navbar-left">
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url() ?>assets/upload/logo/<?= $setting->logo ?>" width="30" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                    <?= $this->session->userdata('nama') ?> <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" x-placement="bottom-end" style="position: absolute; transform: translate3d(-42px, 70px, 0px); top: 0px; left: 0px; will-change: transform;">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mt-2">Main menu</h6>
                                </div>

                                <!-- item-->
                                <a href="<?= base_url() ?>pengguna/show/<?= $this->session->userdata('id') ?>" class="dropdown-item notify-item">
                                    <i class="mdi mdi-account"></i>
                                    <span>Akun saya</span>
                                </a>

                                <!-- item-->
                                <a href="<?= base_url() ?>setting" class="dropdown-item notify-item">
                                    <i class="mdi mdi-settings"></i>
                                    <span>Settings</span>
                                </a>

                                <div class="dropdown-divider"></div>

                                <!-- item-->
                                <a href="<?php echo base_url() ?>logout" class="dropdown-item notify-item">
                                    <i class="mdi mdi-login"></i>
                                    <span>Keluar Aplikasi</span>
                                </a>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <!-- User -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="<?= base_url() ?>assets/upload/logo/<?= $setting->logo ?>" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail img-responsive">

                    </div>
                    <h5><a href="<?php echo base_url() ?>dashboard"><?= $this->session->userdata('nama') ?></a> </h5>
                </div>
                <!-- End User -->

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                        <li class="text-muted menu-title">Menu</li>

                        <li>
                            <a href="<?php echo base_url() ?>dashboard" class="waves-effect"><i class="mdi mdi-home"></i> <span> DASHBOARD </span> </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>kasir" class="waves-effect"><i class="mdi mdi-monitor-dashboard"></i> <span> KASIR </span> </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-cart-outline"></i>
                                <span>PRODUK </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?php echo base_url() ?>produk">DATA PRODUK</a></li>
                                <li><a href="<?php echo base_url() ?>kategori">KATEGORI PRODUK</a></li>
                                <li><a href="<?php echo base_url() ?>cetak-barcode">CETAK BARCODE</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>pembelian" class="waves-effect"><i class="mdi mdi-cart-plus"></i> <span> PEMBELIAN </span> </a>
                        </li>
                        <!-- <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-cart-plus"></i>
                                    <span>PEMBELIAN </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="<?php echo base_url() ?>pembelian">PEMBELIAN</a></li>
                                    <li><a href="<?php echo base_url() ?>retur-pembelian">RETUR PEMBELIAN</a></li>
                                </ul>
                            </li>  -->
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-account-multiple"></i>
                                <span>PELANGGAN </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?php echo base_url() ?>anggota">DATA PELANGGAN</a></li>
                                <li><a href="<?php echo base_url() ?>piutang">PIUTANG PELANGGAN</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-chart-bar"></i>
                                <span>LAPORAN </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="<?php echo base_url() ?>laporan-pembelian">LAPORAN PEMBELIAN</a></li>
                                <li><a href="<?php echo base_url() ?>laporan-penjualan">LAPORAN PENJUALAN</a></li>
                                <li><a href="<?php echo base_url() ?>laporan-laba">LAPORAN LABA PENJUALAN</a></li>
                                <li><a href="<?php echo base_url() ?>laporan-cashflow">LAPORAN CASHFLOW</a></li>
                            </ul>
                        </li>
                        <!-- <li>
                                <a href="<?php echo base_url() ?>" class="waves-effect"><i class="mdi mdi-deskphone"></i> <span> KAS KOPERASI</span> </a>
                            </li>                            -->
                        <li>
                            <a href="<?php echo base_url() ?>tempat_produksi" class="waves-effect"><i class="mdi mdi-bank"></i> <span> SUPPLIER</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>kadaluwarsa" class="waves-effect"><i class="mdi mdi-inbox-arrow-down"></i> <span> DATA KADALUWARSA</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>pengguna" class="waves-effect"><i class="mdi mdi-account"></i> <span> PENGGUNA</span> </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('setting') ?>" class="waves-effect"><i class="mdi mdi-settings"></i> <span> PENGATURAN</span> </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->