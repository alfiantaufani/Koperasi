<!-- Start right Content here -->
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Download Aplikasi Scanner untuk Kasir <strong><a target="_blank" href="https://drive.google.com/file/d/1-lOStclSyDPMsNESKzY74kCbltixfUaL/view?usp=sharing">disini</a></strong> 
        </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-4">Produk</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <p class="display-3 text-danger">
                                    <i class="mdi mdi-cart-outline"></i>
                                </p>
                            </div>
                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> <?= $total_barang ?> </h2>
                                <p class="text-muted mb-1">Total Produk</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-4">Pelanggan</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <p class="display-3 text-info">
                                    <i class="mdi mdi-account-multiple"></i>
                                </p>
                            </div>
                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> <?= $total_pelanggan ?> </h2>
                                <p class="text-muted mb-1">Total Pelanggan</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-4">Supplier</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <h5 class="display-4 text-warning">
                                    <i class="mdi mdi-bank"></i>
                                </h5>
                            </div>
                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> <?= $supplier?> </h2>
                                <p class="text-muted mb-1">Total Supplier</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card-box">
                        <h4 class="header-title mt-0 mb-4">Pengguna</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-left" dir="ltr">
                                <p class="display-3 text-pink">
                                    <i class="mdi mdi-account"></i>
                                </p>
                            </div>
                            <div class="widget-detail-1 text-right">
                                <h2 class="font-weight-normal pt-2 mb-1"> <?= $pengguna ?> </h2>
                                <p class="text-muted mb-1">Total Pengguna</p>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-xl-8 col-md-6">
                    <div class="card-box">              
                        <div class="row ml-2 mt-2 mb-3">
                            <h4 class="header-title mt-0">PENJUALAN 7 HARI TERAKHIR</h4>
                            <div class="ml-auto mr-3">
                                <a href="<?=base_url()?>laporan-penjualan"><p class="text-primary"><b>Lihat semuanya<i class="mdi mdi-chevron-right"></i></b></p></a>
                            </div>
                        </div>          
                        <div id="bar-example" dir="ltr" style="height: 385px;" class="morris-chart"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="">
                        <div class="card-box widget-user">
                            <div>
                                <div class="avatar-lg float-left mr-3">
                                    <p class="display-4 text-info">
                                        <i class="mdi mdi-cash"></i>
                                    </p>
                                </div>
                                <div class="wid-u-info">
                                    <h5 class="mt-0">UANG MASUK</h5>
                                    <h2 class="font-weight-normal pt-1 mb-1"> Rp. <?= number_format($uang_masuk['jumlah']) ?>  </h2>
                                    <p class="text-info"><b> Dari semua penjualan <i class="mdi mdi-arrow-up"></i></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card-box widget-user">
                            <div>
                                <div class="avatar-lg float-left mr-3">
                                    <h5 class="display-4 text-purple">
                                        <i class="mdi mdi-credit-card"></i>
                                    </h5>
                                </div>
                                <div class="wid-u-info">
                                    <h5 class="mt-0">PENJUALAN </h5>
                                    <h2 class="font-weight-normal pt-1 mb-1"> <?= $total_penjualan ?> TRANSAKSI </h2>
                                    <p class="text-purple"><b>HARI INI <i class="mdi mdi-arrow-up"></i></b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card-box widget-user">
                            <div>
                                <div class="avatar-lg float-left mr-3">
                                    <h5 class="display-4 text-danger">
                                        <i class="mdi mdi-wallet"></i>
                                    </h5>
                                </div>
                                <div class="wid-u-info">
                                    <h5 class="mt-0">PIUTANG PELANGGAN </h5>
                                    <h2 class="font-weight-normal pt-1 mb-1"> <?= $total_piutang ?> PIUTANG </h2>
                                    <a href="<?=base_url()?>piutang"><p class="text-danger"><b>Lihat semuanya <i class="mdi mdi-arrow-right"></i></b></p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-md-8">
                    <div class="card-box">              
                        <div class="row ml-2 mt-2 mb-3">
                            <h4 class="header-title mt-0">GRAFIK SEMUA PENJUALAN</h4>
                            <div class="ml-auto mr-3">
                                <a href="<?=base_url()?>laporan-penjualan"><p class="text-primary"><b>Lihat semuanya<i class="mdi mdi-chevron-right"></i></b></p></a>
                            </div>
                        </div>          
                        <div id="cart-semua" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card-box">
                        <div class="dropdown float-right">
                            <a href="<?= base_url('laporan-penjualan') ?>" class="link">Lihat Semua <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <h4 class="header-title mb-4">Transaksi terakhir</h4>
                        <div class="inbox-widget mt-4 mb-4" style="margin-top: 40px !important; margin-bottom: 110px !important;">
                            <?php foreach ($transaksi_terakhir as $terakhir) : ?>
                            <div class="inbox-item">
                                <a href="#">
                                    <h5 class="inbox-item-author mt-0 mb-1">Nota <?= $terakhir['nota'] ?></h5>
                                    <p class="inbox-item-text"><?= $terakhir['created_at'] ?></p>
                                    <div class="inbox-item-date">
                                        <a href="#" class="btn btn-primary" data-id="<?= $terakhir['id_transaksi'] ?>" data-nota="<?= $terakhir['nota'] ?>" data-bayar="<?= $terakhir['total_belanja'] ?>" data-pembeli="<?= $terakhir['nama'] ?>" data-type="<?= $terakhir['type_pembayaran'] ?>" data-totalbayar="<?= $terakhir['total_bayar'] ?>" data-kembalian="<?= $terakhir['kembalian'] ?>" data-tgl="2<?= $terakhir['created_at'] ?>" onclick="cetak(this)"> <i class=" mdi mdi-printer"></i> Cetak Nota</a>
                                    </div>
                                </a>
                            </div>
                            <?php endforeach ?>
                            <!-- end -->
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- content -->
        <footer class="footer text-right">2021 Koperasi</footer>
    </div>

    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->
</div>
<!-- END wrapper -->
<div id="cetak" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="panel-body" id="content-print">
                    <div class="page">
                        <div class="subpage">
                            <div class="clearfix">
                                <div class="float-left">
                                <?php $setting = $this->db->get_where('tbl_setting', array('id' => 1))->row(); ?>
                                    <h3><?= $setting->nama_koperasi ?></h3>
                                    <?= $setting->alamat ?><br>
                                    <?= $setting->no_telepon ?>
                                </div>
                                <div class="float-right">
                                    <h4>Invoice # <br>
                                        <span id="invoice"></span>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-left mt-3">
                                        <p>
                                            <strong>Id Pembelian : </strong> <span id="invoice2"></span><br>
                                            <strong>Nama Pembeli : </strong> <span id="pembeli"></span>
                                        </p>
                                    </div>
                                    <div class="float-right mt-3">
                                        <p>
                                            <strong>Tanggal : </strong> <span id="tgl"></span><br>
                                            <strong>Type Pembayaran : </strong> <span id="type"></span><br>
                                        </p>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table mt-2">
                                            <thead>
                                                <tr>
                                                    <th width="70%">Nama Produk</th>
                                                    <th width="10%">QTY</th>
                                                    <th>Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="d-print-none">
                    <div class="float-right">
                        <button id="btn-print" class="btn btn-dark waves-effect waves-light"><i class="mdi mdi-printer"></i> PRINT</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

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

<!-- App js -->
<script src="<?php echo base_url() ?>assets/js/jquery.core.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.app.js"></script>
<script src="<?php echo base_url() ?>assets/js/app.js"></script>
<script>
    Morris.Bar({
        element: 'bar-example',
        barColors: ['#188ae2'],
        resize: true,
        barSizeRatio: 0.3,
        data: <?php echo $cart;?>,
        xkey: 'date',
        ykeys: ['total_belanja'],
        labels: ['Total ']
    });
</script>
<script>
    Morris.Bar({
        element: 'cart-semua',
        barColors: ['#188ae2'],
        resize: true,
        barSizeRatio: 0.3,
        data: <?php echo $cart_semua;?>,
        xkey: 'date',
        ykeys: ['total_belanja'],
        labels: ['Total']
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function cetak(el) {
        $.ajax({
            url   : '<?php echo base_url() ;?>cetak-laporan-penjualan/' + $(el).data('id'),
            type  :"post",
            processData : false,
            contentType : false,
            cache       : false,
            async       : false,
            success: (response) => {
                $('#cetak').modal('show');
                if(response.data != ""){
                    var tbl = "";
                    var total = "";
                    var pembeli = $(el).data('pembeli');
                    var invoice = $(el).data('nota');
                    var tgl = $(el).data('tgl');
                    $.each(JSON.parse(response), function(index, item) {
                        tbl += `
                            <tr>
                                <td>`+item.nama_produk+`</td>
                                <td>`+item.qty+`</td>
                                <td>Rp. `+numberWithCommas(item.harga_jual)+`</td>
                            </tr>
                        `;
                    });
                    total = $(el).data('bayar');
                    tbl += `
                    <tr>
                        <th colspan="2"><h3><b>TOTAL PEMBELIAN</h3></b></th>
                        <th colspan="1"><h3><b>Rp. `+numberWithCommas(total)+`</h3></b></th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <div class="row">
                                <div class="col-md-12" style="padding-right: 60px">
                                    <div class="float-left">
                                        <p>Jumlah Uang : </p>
                                        <p>Kembalian : </p>
                                    </div>
                                    <div class="float-right">
                                        <p>Rp. `+numberWithCommas($(el).data('totalbayar'))+`</p>
                                        <p>Rp. `+numberWithCommas($(el).data('kembalian'))+`</p>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                    `;
                    $('#tbl').html(tbl);
                    $('#invoice').html(invoice);
                    $('#invoice2').html(invoice);
                    $('#tgl').html(tgl);
                    
                    if ($(el).data('type') == "tunai") {
                        var type = "TUNAI"
                    }else{
                        var type = "NON TUNAI/PIUTANG"
                    }
                    $('#type').html(type);

                    if (pembeli == null) {
                        $('#pembeli').html('-');
                    }else{
                        $('#pembeli').html(pembeli);
                    }
                }
            }
        });
    }

    $("#btn-print").on("click", function () {
		var divToPrint=document.getElementById('content-print');

		var newWin=window.open('','Print-Window');

		newWin.document.open();

		newWin.document.write(`
            <html>
            <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
            <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet" type="text/css" />

            <link href="<?php echo base_url() ?>assets/js/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            <style>
            body {
                width: 100% !important;
                height: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
                background-color: #fff !important;
            }
            * {
                box-sizing: border-box;
                -moz-box-sizing: border-box;
            }
            .page {
                width: 210mm;
                min-height: 297mm;
                padding: 20mm;
                margin: 10mm auto;
                border: 1px #fff solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            .subpage {
                padding: 1cm;
                height: 257mm;
            }
            
            @page {
                size: A4;
                margin: 0;
            }
            @media print {
                html, body {
                    width: 210mm;
                    height: 297mm;        
                }
                .page {
                    margin: 0;
                    border: initial;
                    border-radius: initial;
                    width: initial;
                    min-height: initial;
                    box-shadow: initial;
                    background: initial;
                    page-break-after: always;
                }
            }
            </style>
            <body onload="window.print()">`+divToPrint.innerHTML+`</body>
            </html>
        `);

		newWin.document.close();

		// setTimeout(function(){newWin.close();},10);
	});
</script>
</body>
</html>