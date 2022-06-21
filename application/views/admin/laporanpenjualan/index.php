<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    </div>
                    <div class="card-box table-responsive">
                        <h4 class="mt-2 mb-4 header-title">LAPORAN PENJUALAN</h4>
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
                        <div class="row">
                            <div class="ml-auto mb-3 mt-2 mr-2" id="btn_excel" style="display: none">
                                <a href="#" class="btn btn-success"><i class="mdi mdi-file-excel"></i> PRINT EXCEL</a>
                            </div>
                        </div>
                        <table id="laporan_penjualan" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Tanggal Pembelian</th>
                                    <th>Nota</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Total Transaksi</th>
                                    <th>Pelanggan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot align="left" style="background-color: #35b8e0; color: #fff">
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
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
        laporan_penjualan.ajax.url('<?= base_url()?>laporan-penjualan/json?tgl_awal='+tgl_awal+'&tgl_akhir='+ tgl_akhir).load();
        $('#btn_excel').show();
    });
    
    var laporan_penjualan = $('#laporan_penjualan').DataTable({
        processing: true,
        scrollX: true,
        language: {
            processing: "Memuat..."
        },
        serverSide: true,
        ajax: {
            url: "<?=base_url()?>laporan-penjualan/json",
            type : 'GET'
        },
        columns: [
            {
                data: 'created_at',
                name: 'created_at',
                width: '15%',
                searchable: true
            },
            {
                data: 'nota',
                name: 'nota',
                width: '15%',
                searchable: true
            },
            {
                data: 'type_pembayaran',
                render: function (data, type, row, meta) {
                    if (row.type_pembayaran == 'tunai') {
                        var result = 'TUNAI'
                    } else {
                        var result = 'NON TUNAI/PIUTANG'
                    }
                    return result;
                },
                searchable: true
            },
            {
                data: 'total_belanja',
                render: function (data, type, row, meta) {
                    return "Rp. " + meta.settings.fnFormatNumber(row.total_belanja);
                }
            },
            {
                data: 'nama',
                name: 'nama',
                width: '15%',
                searchable: true
            },
            {
                render: function ( data, type, row ) {
                    var btn =`
                        <a href="#" class='btn btn-primary' data-id='`+row.id_transaksi+`' data-nota="`+row.nota+`" data-bayar="`+row.total_belanja+`" data-pembeli="`+row.nama+`"  data-type="`+row.type_pembayaran+`" data-totalbayar="`+row.total_bayar+`" data-kembalian="`+row.kembalian+`" data-tgl="`+row.created_at+`" onclick="cetak(this)"> <i class=' mdi mdi-printer'></i> Cetak</a>
                    `;
                    return btn;
                }
            }
        ],
        "footerCallback": function ( row, data, start, end, display, meta ) {
            var api = this.api();
            var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var monTotal = api
                .column( 1 )
                .data()
                .reduce( function (a, b) {
                    return '';
                }, 0 );
				
	        var tueTotal = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    var x = parseFloat(a) || 0;
                    var y = parseFloat(b) || 0;
                    return x + y;
                }, 0 );
				
				
            // Update footer by showing the total with the reference of the column index 
            $( api.column( 0 ).footer() ).html('Total');
            $( api.column( 1 ).footer() ).html('');
            $( api.column( 2 ).footer() ).html('');
            $( api.column( 3 ).footer() ).html(numFormat(tueTotal));
            $( api.column( 4 ).footer() ).html('');
            $( api.column( 5 ).footer() ).html('');
        },
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