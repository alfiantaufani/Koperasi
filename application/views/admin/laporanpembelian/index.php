<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    </div>
                    <div class="card-box table-responsive">
                        <h4 class="mt-2 mb-4 header-title">LAPORAN PEMBELIAN</h4>
                        <form action="#" class="form-horizontal mb-3" method="post" id="filter">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4  col-form-label" for="example-input-normal">Periode Tanggal Awal:</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="date" placeholder="Masukkan Tanggal Awal" name="tgl_awal" class="form-control tgl_awal" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-4  col-form-label" for="example-input-normal">Periode Tanggal Akhir:</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <input type="date" placeholder="Masukkan Tanggal Akhir" name="tgl_akhir" class="form-control tgl_akhir" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="ml-auto mr-2">
                                            <button type="submit" class='btn btn-info'><i class="mdi mdi-filter-variant"></i> Filter Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <table id="laporan_pembelian" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>No Pembelian</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Total Pembelian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

        <footer class="footer text-right">2021 Koperasi</footer>
    </div>
</div>

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
                                        <strong id="invoice"></strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="float-right mt-3">
                                        <p><strong>Tanggal : </strong> <span id="tgl"></span></p>
                                        <p><strong>Id Pembelian : </strong> <span id="invoice2"></span></p>
                                    </div>
                                </div><!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table mt-4">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Nama Produk</th>
                                                    <th width="10%">QTY</th>
                                                    <th>Supplier</th>
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
    $('#filter').submit(function (e) {
        e.preventDefault();
        var tgl_awal = $('.tgl_awal').val();
        var tgl_akhir = $('.tgl_akhir').val();
        laporan_pembelian.ajax.url('<?= base_url()?>laporan-pembelian/json?tgl_awal='+tgl_awal+'&tgl_akhir='+ tgl_akhir).load();
    });
    
    var laporan_pembelian = $('#laporan_pembelian').DataTable({
        processing: true,
        scrollX: true,
        language: {
            processing: "Memuat..."
        },
        serverSide: true,
        ajax: {
            url: "<?=base_url()?>laporan-pembelian/json",
            type : 'GET'
        },
        columns: [
            {
                data: 'id_pembelian',
                name: 'id_pembelian',
                width: '15%',
                searchable: true
            },
            {
                data: 'created_at',
                name: 'created_at',
                width: '15%',
                searchable: true
            },
            {
                data: 'total_uang',
                render: function (data, type, row, meta) {
                    return "Rp. " + meta.settings.fnFormatNumber(row.total_uang);
                }
            },
            {
                render: function ( data, type, row ) {
                    var btn =`
                        <a href="javascript:void(0)" class='btn btn-primary' data-id='`+row.id_pembelian+`' onclick="cetak(this)"> <i class='mdi mdi-information-outline'></i> Detail</a>
                    `;
                    // var btn =`
                    //     <a href="<?= base_url() ?>cetak-laporan-pembelian/`+row.id+`" target="_blank" class='btn btn-primary' data-id='`+row.id+`'> <i class=' mdi mdi-printer'></i> Cetak</a>
                    // `;
                    return btn;
                }
            }
        ]
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function cetak(el) {
        $.ajax({
            url   : '<?php echo base_url() ;?>cetak-laporan-pembelian/' + $(el).data('id'),
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
                    var invoice = "";
                    var tgl = "";
                    $.each(JSON.parse(response), function(index, item) {
                        invoice = item.nota_pembelian;
                        tgl = item.created_at;
                        if (item.nama_tempat_produksi == null) {
                            var sup = '';
                        } else {
                            var sup = item.nama_tempat_produksi;
                        }
                        tbl += `
                            <tr>
                                <td>`+item.nama_produk+`</td>
                                <td>`+item.total_stock+`</td>
                                <td>`+sup+`</td>
                                <td>Rp. `+numberWithCommas(item.harga_beli)+`</td>
                            </tr>
                        `;
                        total = item.total_uang;
                    });
                    tbl += `
                        <tr style="background-color: #fff;">
                            <th colspan="3"><h3><b>TOTAL PEMBELIAN</h3></b></th>
                            <th colspan="1"><h3><b>Rp. `+numberWithCommas(total)+`</h3></b></th>
                        </tr>`;
                    $('#tbl').html(tbl);
                    $('#invoice').html(invoice);
                    $('#invoice2').html(invoice);
                    $('#tgl').html(tgl);
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