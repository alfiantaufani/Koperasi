<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

        <title>Koperasi Unwaha</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/morris/morris.css">

        <!-- App css -->
        <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url() ?>assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>Koperasi<span>Unwaha</span></span><i class="mdi mdi-layers"></i></a>
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
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                        </ul>

                        <nav class="navbar-custom">

                            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                                

                             

                            </ul>
                        </nav>
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
                            <div class="user-status offline"><i class="mdi mdi-adjust"></i></div>
                        </div>
                        <h5><a href="#">Mat Helme</a> </h5>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" >
                                    <i class="mdi mdi-settings"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#" class="text-custom">
                                    <i class="mdi mdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title">Navigation</li>

                            <li>
                                <a href="index.html" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                            <li>
                                <a href="typography.html" class="waves-effect"><i class="mdi mdi-format-font"></i> <span> Kategori </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-invert-colors"></i> <span> Anggota </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-cards.html">Cards</a></li>
                                    <li><a href="ui-draggable-cards.html">Draggable Cards</a></li>
                                    <li><a href="ui-checkbox-radio.html">Checkboxs-Radios</a></li>
                                    <li><a href="ui-material-icons.html">Material Design Icons</a></li>
                                    <li><a href="ui-font-awesome-icons.html">Font Awesome</a></li>
                                    <li><a href="ui-dripicons.html">Dripicons</a></li>
                                    <li><a href="ui-themify-icons.html">Themify Icons</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-notification.html">Notification</a></li>
                                    <li><a href="ui-range-slider.html">Range Slider</a></li>
                                    <li><a href="ui-components.html">Components</a>
                                    <li><a href="ui-sweetalert.html">Sweet Alert</a>
                                    <li><a href="ui-treeview.html">Tree view</a>
                                    <li><a href="ui-widgets.html">Widgets</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-texture"></i><span class="badge badge-warning pull-right">7</span><span> Laporan</span> </a>
                                <ul class="list-unstyled">
                                    <li><a href="form-elements.html">General Elements</a></li>
                                    <li><a href="form-advanced.html">Advanced Form</a></li>
                                    <li><a href="form-validation.html">Form Validation</a></li>
                                    <li><a href="form-wizard.html">Form Wizard</a></li>
                                    <li><a href="form-fileupload.html">Form Uploads</a></li>
                                    <li><a href="form-wysiwig.html">Wysiwig Editors</a></li>
                                    <li><a href="form-xeditable.html">X-editable</a></li>
                                </ul>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">


                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                        		<div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                        			<h4 class="header-title mt-0 m-b-30">Total Revenue</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                               data-bgColor="#F9B9B9" value="58"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>

                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 mb-0"> 256 </h2>
                                            <p class="text-muted m-b-10">Revenue today</p>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                        		<div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                        			<h4 class="header-title mt-0 m-b-30">Sales Analytics</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-success badge-pill pull-left m-t-20">32% <i class="mdi mdi-trending-up"></i> </span>
                                            <h2 class="mb-0"> 8451 </h2>
                                            <p class="text-muted m-b-25">Revenue today</p>
                                        </div>
                                        <div class="progress progress-bar-success-alt progress-sm mb-0">
                                            <div class="progress-bar progress-bar-success" role="progressbar"
                                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 77%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                        		<div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                        			<h4 class="header-title mt-0 m-b-30">Statistics</h4>

                                    <div class="widget-chart-1">
                                        <div class="widget-chart-box-1">
                                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                               data-bgColor="#FFE6BA" value="80"
                                               data-skin="tron" data-angleOffset="180" data-readOnly=true
                                               data-thickness=".15"/>
                                        </div>
                                        <div class="widget-detail-1">
                                            <h2 class="p-t-10 mb-0"> 4569 </h2>
                                            <p class="text-muted m-b-10">Revenue today</p>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                        		<div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                        			<h4 class="header-title mt-0 m-b-30">Daily Sales</h4>

                                    <div class="widget-box-2">
                                        <div class="widget-detail-2">
                                            <span class="badge badge-pink badge-pill pull-left m-t-20">32% <i class="mdi mdi-trending-up"></i> </span>
                                            <h2 class="mb-0"> 158 </h2>
                                            <p class="text-muted m-b-25">Revenue today</p>
                                        </div>
                                        <div class="progress progress-bar-pink-alt progress-sm mb-0">
                                            <div class="progress-bar progress-bar-pink" role="progressbar"
                                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 77%;">
                                                <span class="sr-only">77% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                        		</div>
                            </div><!-- end col -->

                        </div>
                        <!-- end row -->

                        



                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2021 Koperasi Unwaha
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Notifications</h4>
                <div class="notification-list nicescroll">
                    <ul class="list-group list-no-border user-list">
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="<?php echo base_url() ?>assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">Michael Zenaty</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-info">
                                    <i class="mdi mdi-account"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Signup</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">5 hours ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-pink">
                                    <i class="mdi mdi-comment"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">New Message received</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="avatar">
                                    <img src="<?php echo base_url() ?>assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <div class="user-desc">
                                    <span class="name">James Anderson</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">2 days ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item active">
                            <a href="#" class="user-list-item">
                                <div class="icon bg-warning">
                                    <i class="mdi mdi-settings"></i>
                                </div>
                                <div class="user-desc">
                                    <span class="name">Settings</span>
                                    <span class="desc">There are new settings available</span>
                                    <span class="time">1 day ago</span>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


        <!-- jQuery  -->
        <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url() ?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url() ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.scrollTo.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="assets/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.js"></script>

        <!--Morris Chart-->
		<script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>
		<script src="<?php echo base_url() ?>assets/plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="<?php echo base_url() ?>assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>

    </body>
</html>