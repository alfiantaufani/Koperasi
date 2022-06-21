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

        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/logo.png">

        <title>Login</title>

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>
        <style>
            .wrapper-page .logo {
                font-size: 35px !important;
            }
        </style>
    </head>

    <body>

        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <img src="<?= base_url()?>assets/upload/logo/<?= $setting->logo ?>" alt="" width="100" srcset=""><br>
                <a href="#" class="logo font-bold"><span><?= $setting->nama_koperasi ?></span></a>
                <h5 class="text-muted m-t-0 font-600">Silahkan Login</h5>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
                </div>
                <div class="p-20">
                   <?php echo form_open('login'); ?>
                   <?php if (isset($error)) {echo $error; }; ?>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Username" id="username" name="username">
                                <?php echo form_error('username') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" id="password" name="password">
                                <?php echo form_error('password') ?>
                            </div>
                        </div>

                        

                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                       
                    <?php echo form_close(); ?>

                </div>
            </div>
            <!-- end card-box-->

            
            
        </div>
        <!-- end wrapper page -->



        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.app.js"></script>
	
	</body>
</html>