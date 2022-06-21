<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title mt-3 mb-3">Piutang Pelanggan</h4> 
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="15%">Tanggal</th>
                                    <th>Nota</th>
                                    <th>Sisa Piutang</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Status</th>
                                    <th>Pelanggan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="8" class="bg-primary text-white text-center"><b>LUNAS</b> </td>
                                </tr>
                                <?php $no=1; foreach ($piutang as $value) : ?>
                                    <?php if ($value->status == 'LUNAS') { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value->created_at ?></td>
                                            <td><?= $value->nota ?></td>
                                            <td>Rp. <?= number_format($value->total_piutang) ?></td>
                                            <td><?= $value->tgl_jatuh_tempo ?></td>
                                            <td><?php 
                                                    if ($value->status == 'BELUM LUNAS') {
                                                        if ( date('Y-m-d') > $value->tgl_jatuh_tempo ) {
                                                            echo '<span class="text-warning"><b> JATUH TEMPO</b></span>';
                                                        }else{
                                                            echo '<span class="text-danger"><b> BELUM LUNAS</b></span>';
                                                        }
                                                    } else {
                                                        echo '<span class="text-success"><b> LUNAS</b></span>';
                                                    }
                                                ?>
                                            </td>
                                            <td><?= $value->nama ?></td>
                                            <td>
                                                <?php if ($value->status == 'BELUM LUNAS') { ?>
                                                    <button type='button' class='btn btn-primary' data-id="<?=$value->id_transaksi?>" data-total="<?=$value->total_piutang?>" onclick='bayar(this);'><i class='mdi mdi-credit-card-plus'></i> Bayar</button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php }?> 
                                <?php endforeach ?> 
                                
                                <tr>
                                    <td colspan="8" class="bg-danger text-white text-center"><b>BELUM LUNAS</b> </td>
                                </tr>
                                <?php $no=1; foreach ($piutang as $value) : ?>
                                    <?php if ($value->status == 'BELUM LUNAS') { ?>
                                        <?php if ( date('Y-m-d') < $value->tgl_jatuh_tempo ) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value->created_at ?></td>
                                                <td><?= $value->nota ?></td>
                                                <td>Rp. <?= number_format($value->total_piutang) ?></td>
                                                <td><?= $value->tgl_jatuh_tempo ?></td>
                                                <td><?php 
                                                        echo '<span class="text-danger"><b> BELUM LUNAS</b></span>';
                                                    ?>
                                                </td>
                                                <td><?= $value->nama ?></td>
                                                <td>
                                                    <?php if ($value->status == 'BELUM LUNAS') { ?>
                                                        <button type='button' class='btn btn-primary' data-id="<?=$value->id_transaksi?>" data-total="<?=$value->total_piutang?>" onclick='bayar(this);'><i class='mdi mdi-credit-card-plus'></i> Bayar</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    <?php }?> 
                                <?php endforeach ?>

                                <tr>
                                    <td colspan="8" class="bg-warning text-white text-center"><b>JATUH TEMPO</b> </td>
                                </tr>
                                <?php $no=1; foreach ($piutang as $value) : ?>
                                    <?php if ($value->status == 'BELUM LUNAS') { ?>
                                        <?php if ( date('Y-m-d') >= $value->tgl_jatuh_tempo ) { ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $value->created_at ?></td>
                                                <td><?= $value->nota ?></td>
                                                <td>Rp. <?= number_format($value->total_piutang) ?></td>
                                                <td><?= $value->tgl_jatuh_tempo ?></td>
                                                <td><?php 
                                                        echo '<span class="text-warning"><b> JATUH TEMPO</b></span>';
                                                    ?>
                                                </td>
                                                <td><?= $value->nama ?></td>
                                                <td>
                                                    <?php if ($value->status == 'BELUM LUNAS') { ?>
                                                        <button type='button' class='btn btn-primary' data-id="<?=$value->id_transaksi?>" data-total="<?=$value->total_piutang?>" onclick='bayar(this);'><i class='mdi mdi-credit-card-plus'></i> Bayar</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    <?php }?> 
                                <?php endforeach ?>
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

<div id="bayar" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> Bayar Piutang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h3 class="text-white">Total Piutang : <span id="total_piutang"></span></h3>
                    </div>
                </div>
                <form id="submit">
                    <div class="form-group">
                        <label>Jumlah Bayar</label>
                        <input type="text" name="jml_bayar" id="jml_bayar" required placeholder="Masukkan Jumlah Bayar" class="form-control form-control-lg">
                        <input type="hidden" id="id_transaksi" name="id_transaksi">
                    </div>
                <div class="modal-footer" >
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp 
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Bayar</button>
                </div>
                </form>
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
$(document).ready(function () {
    $('#responsive-datatable').DataTable();
});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }
    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function bayar(el) {
    $('#bayar').modal('show');
    var jml_bayar = document.getElementById("jml_bayar");
        jml_bayar.addEventListener("keyup", function (e) {
        jml_bayar.value = formatRupiah(this.value, "Rp. ");
    });
    $('.modal #id_transaksi').val($(el).data("id"));
    $('.modal #total_piutang').html("Rp. " + numberWithCommas($(el).data("total")));
}

$('#submit').submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);
    console.log(formData)
    $.ajax({
        url: "<?php echo base_url();?>piutang/bayar",
        method: "POST",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response){
            if (response == "success") {
                swal({
                    type  :'success',
                    title  :'Sukses',
                    text  : 'Barang berhasil diupdate',
                    showCancelButton :false,
                    timer: 1000,
                }).then(
                    function () {
                    location.reload();
                    },
                    function (dismiss) {
                        if (dismiss === 'timer') {
                            location.reload();
                        }
                    }
                );
            }else if(response == "error_jml"){
                swal({
                    title: "PERINGATAN",
                    text: "Jumlah Bayar harus pas.",
                    type: "warning",
                    dangerMode: true,
                })
            }else{
                swal({
                    title: "PERINGATAN",
                    text: "Data gagal disimpan.",
                    type: "warning",
                    dangerMode: true,
                })
            }
        }
    })
    
})
</script>