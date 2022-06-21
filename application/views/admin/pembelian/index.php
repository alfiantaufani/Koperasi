<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Download Aplikasi Scanner untuk Scan produk pembelian <strong><a target="_blank" href="https://drive.google.com/file/d/1-lOStclSyDPMsNESKzY74kCbltixfUaL/view?usp=sharing">disini</a></strong> 
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="mt-3 mb-4 header-title">Pembelian</h4> 
                        <a href="<?= base_url()?>pembelian/create" class="btn btn-info mb-3"> Tambah Pembelian</a>
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="10%">No Pembelian</th>
                                    <th width="15%">Tanggal Pembelian</th>
                                    <th>Total Pembelian</th>
                                    <th width="25%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($pembelian as $value) :?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value->id_pembelian ?></td>
                                        <td><?= $value->created_at ?></td>
                                        <td>Rp. <?= number_format($value->total_uang) ?></td>
                                        <td>
                                            <a href="#" class='btn btn-primary' data-id='<?= $value->id_pembelian ?>' onclick="detail(this)"> <i class='mdi mdi-file-table-outline'></i> Lihat pembelian</a>
                                        </td>
                                    </tr>
                                <?php endforeach?>
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

<div class="modal fade bs-example-modal-lg detail" data-animation="fadein" data-plugin="custommodal" data-overlayColor="#xxx". tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Detail Pembelian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
        <div class="modal-body">
            <div class="table-responsive">
                <table class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th width="17%">Tanggal Pembelian</th>
                            <th width="15%">No. Pembelian</th>
                            <th width="20%">Nama Produk</th>
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
    $(document).ready(function () {
        $('#responsive-datatable').DataTable();
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function detail(el) {
        $('.detail').modal('show');
        var nota = $(el).data("id");
        $.ajax({
        url   : '<?php echo base_url() ;?>pembelian/get_detail/'+nota,
        method  : "POST",
        processData : false,
        contentType : false,
        cache       : false,
        async       : false,
        success: (response) => {
            if(response.data != ""){
                var tbl = "";
                var total = "";
                $.each(JSON.parse(response), function(index, item) {
                    if (item.nama_tempat_produksi == null) {
                        var sup = '';
                    } else {
                        var sup = item.nama_tempat_produksi;
                    }
                    tbl += `
                        <tr>
                            <td>`+item.created_at+`</td>
                            <td>`+item.nota_pembelian+`</td>
                            <td>`+item.nama_produk+`</td>
                            <td>`+item.total_stock+`</td>
                            <td>`+sup+`</td>
                            <td>Rp. `+numberWithCommas(item.harga_beli)+`</td>
                        </tr>
                    `;
                    total = item.total_uang;
                });
                tbl += `
                    <tr style="background-color: #10c46987;">
                        <th colspan="5"><h3><b>TOTAL PEMBELIAN</h3></b></th>
                        <th colspan="1"><h3><b>Rp. `+numberWithCommas(total)+`</h3></b></th>
                    </tr>`;
                $('#tbl').html(tbl);
            }
        },
        error: function (response) {
          swal({
            title: "PERINGATAN",
            text: "Gagal memanggil",
            type: "warning",
            dangerMode: true,
          })
        }
      });
    }
</script>