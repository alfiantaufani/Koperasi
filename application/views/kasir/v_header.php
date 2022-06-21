<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo.png">

        <title>Koperasi Unwaha</title>

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
       
        <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>
    </head>
    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="#" class="logo"><span>Koperasi<span>Unwaha</span></span><i class="mdi mdi-layers"></i></a>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">

                        <!-- Page title -->
                        <ul class="nav navbar-nav list-inline navbar-left">
                            <li class="list-inline-item">
                                <button class="button-menu-mobile open-left">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                            <li class="list-inline-item">
                                <h1 class="page-title">Welcome Kasir :)</h1>
                            </li>
                        </ul>
                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">

                    <!-- User -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="<?php echo base_url() ?>assets/images/users/logo.png" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail img-responsive">
                            
                        </div>
                        <h5><a href="<?php echo base_url()?>kasir/home">Kasir</a></h5>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" >
                                    <i class="mdi mdi-settings"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="<?php echo base_url()?>kasir/home/logout" class="text-custom">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">Menu</li>

                            <li>
                                <a href="<?php echo base_url()?>home" class="waves-effect"><i class="mdi mdi-home"></i> <span> Dashboard </span> </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>barang-masuk" class="waves-effect"><i class=" mdi mdi-clipboard-arrow-down"></i> <span>Barang Masuk </span> </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>stok" class="waves-effect"><i class="mdi mdi-clipboard-outline"></i> <span>Stok </span> </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url()?>transaksi" class="waves-effect"><i class="dripicons-cart"></i> <span> Transaksi</span> </a>
                            </li> 
                            <li>
                                <a href="<?php echo base_url()?>booking" class="waves-effect"><i class="fa fa-check-square-o"></i> <span> Booking</span> </a>
                            </li> 
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->