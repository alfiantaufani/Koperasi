<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="mt-0 mb-3 header-title">Cetak Barcode Buatan Sendiri</h4>
                        <button type='button' class="btn btn-primary" style="margin-bottom: 10px" id="btn-print">Print Semua Barcode</button> 
                        <div class="card" style="margin-top: 20px">
                            <div class="card-body" style="background-color: #ddd;text-align: center;margin-bottom: 20px;height: 300px; overflow-y: scroll;padding-bottom: 20px;">
                                <div class="row" id="content-print">
                                    <?php
                                         require 'vendor/autoload.php';
                                         $generator = new Picqer\Barcode\BarcodeGeneratorPNG();

                                         foreach ($barcode as $value) :
                                    ?>

                                    <div class="col-md-3" style="margin-top: 20px;text-align: center">
                                        <div class="barcode" style="height: 110px;width: 220px;float: left;margin: 5px;border: 1px solid #ccc;padding: 7px;background-color: white">
                                            <label style="font-size: 11px"><?= $value->nama_produk ?></label>
                                            <br>
                                            <?php $height = 2; $width = 55; echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value->barcode_sendiri, $generator::TYPE_CODE_128, $height, $width)) . '">' ?>
                                            <br>
                                            <label style="font-size: 11px; letter-spacing: 7px;"><?= $value->barcode_sendiri ?></label>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

        <footer class="footer text-right">2021 Koperasi</footer>
    </div>
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
<script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.js"></script>

<!--Morris Chart-->
<script src="<?php echo base_url() ?>assets/plugins/morris/morris.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/raphael/raphael-min.js"></script>

<!-- Dashboard init -->
<script src="<?php echo base_url() ?>assets/pages/jquery.dashboard.js"></script>
         
<!-- Responsive datatable examples -->
<link href="<?php echo base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        
<!-- Multi Item Selection examples -->
<link href="<?php echo base_url() ?>assets/plugins/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
         
<!-- Required datatable js -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        
<!-- Key Tables -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.keyTable.min.js"></script>
         
<!-- Responsive examples -->
<script src="<?php echo base_url() ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
        
<!-- Sweet Alert Js  -->
<script src="<?php echo base_url() ?>assets/plugins/sweet-alert/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>assets/pages/jquery.sweet-alert.init.js"></script>

<!-- App js -->
<script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>

<!-- upload -->
<script src="<?php echo base_url() ?>assets/js/dropify/dropify.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/form-fileupload.init.js"></script>

<script>
    // print page
	$("#btn-print").on("click", function () {
		var divToPrint=document.getElementById('content-print');

		var newWin=window.open('','Print-Window');

		newWin.document.open();

		newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

		newWin.document.close();

		setTimeout(function(){newWin.close();},10);
	});
</script>