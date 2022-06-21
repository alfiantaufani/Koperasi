<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    </div>
                    <div class="card-box table-responsive">
                        <h4 class="mt-2 mb-4 header-title">LAPORAN LABA PENJUALAN</h4>
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
                        <table id="laporan_laba" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>Tanggal Pembelian</th>
                                    <th>Nota</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tfoot align="left" style="background-color: #35b8e0; color: #fff">
                                <tr>
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
        
        laporan_laba.ajax.url('<?= base_url()?>laporan-laba/json?tgl_awal='+tgl_awal+'&tgl_akhir='+ tgl_akhir).load();
        $('#btn_excel').show();
    });
    
    var laporan_laba = $('#laporan_laba').DataTable({
        processing: true,
        scrollX: true,
        language: {
            processing: "Memuat..."
        },
        serverSide: true,
        ajax: {
            url: "<?=base_url()?>laporan-laba/json",
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
                searchable: true,
            },
            // {data: 'harga_beli'},
            {
                data: 'harga_jual',
                render: function (data, type, row, meta) {
                    var hasil = row.harga_jual - row.harga_beli;
                    return "Rp. " + meta.settings.fnFormatNumber(hasil);
                }
            },
        ],
        columnDefs:[
            {
                "targets": [ 2 ],
                "visible": true
            }
        ],
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api();
            var numFormat = $.fn.dataTable.render.number( '\,', '.', 0, 'Rp. ' ).display;
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
	        var tueTotal = api
                .column( 2 )
                .data()
                .reduce( function (a, b) {
                    console.log(data);
                    return intVal(a) + intVal(b);
                }, 0 );
				
				
            // Update footer by showing the total with the reference of the column index 
            $( api.column( 0 ).footer() ).html('Total');
            $( api.column( 1 ).footer() ).html('');
            $( api.column( 2 ).footer() ).html(numFormat(tueTotal));
        },
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>