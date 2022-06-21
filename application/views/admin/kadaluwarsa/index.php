<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Download Aplikasi Scanner untuk scan produk Kadaluwarsa <strong><a target="_blank" href="https://drive.google.com/file/d/1-lOStclSyDPMsNESKzY74kCbltixfUaL/view?usp=sharing">disini</a></strong> 
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">Data Kadaluwarsa</h4> 

                        <a href="<?= base_url() ?>/kadaluwarsa/create" class="btn btn-primary mb-4 mt-3" id="btntbh" style="margin-bottom: 10px">Tambah Produk Kadaluwarsa</a> 
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Banyaknya Produk</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach ($data as $value) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <?php
                                        if ($value->barcode_sendiri == null) {
                                            echo '<td>'.$value->kode_produk.'</td>';
                                        }else{
                                            echo '<td>'.$value->barcode_sendiri.'</td>';
                                        }
                                    ?>
                                    <td><?= $value->nama_produk ?></td>
                                    <td><?= $value->qty ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?= $value->id ?>);"><i class="mdi mdi-delete"></i></button>

                                        <!-- <button type="button" class="btn btn-warning btn-sm" data-id="83" data-qty="<?= $value->qty ?>" data-idproduk="<?= $value->idproduk ?>" onclick="edit(this)"> <i class="mdi mdi-pencil"></i></button> -->
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Produk Kadaluwarsa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="edit">
                    <div class="form-group">
                        <label>Banyaknya Produk</label>
                        <input type="number" id="qty" name="qty" placeholder="Masukkan Banyaknya Produk" class="form-control" min="1">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="idproduk" name="idproduk">
                    </div>
                    <div class="modal-footer" id="bloktombol">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
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
    $(document).ready(function () {
        $('#responsive-datatable').DataTable();
    });

    // var tbldata = $("#responsive-datatable").DataTable({
    //     "ajax": "<?php echo base_url()?>pengguna/get"
    // });
    
    function edit(el){
        $(".edit").modal('show');
        $('.modal #id').val($(el).data("id"));
        $('.modal #qty').val($(el).data("qty"));
        $('.modal #idproduk').val($(el).data("idproduk"));

    }

    $('#edit').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url   : '<?php echo base_url() ;?>kadaluwarsa/update',
            type  :"post",
            data  : formData,
            cache: false,
            contentType: false,
            processData: false,
            async       : false,
            success: (response) => {
                if (response == "success") {
                    swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Data Berhasil Disimpan',
                        showConfirmButton: true,
                        timer: 1500
                    }).then(
                        function () {
                        },
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                location.reload();
                            }
                        }
                    )
                }else{
                    swal({
                        title: "PERINGATAN",
                        text: "Data gagal disimpan.",
                        showConfirmButton: false,
                        type: "warning",
                        dangerMode: true,
                        timer: 1500
                    })
                }
            },
            error: function (response) {
                swal({
                    title: "PERINGATAN",
                    text: "Data gagal disimpan.",
                    icon: "warning",
                    dangerMode: true,
                    timer: 1500
                })
            }
        });
    }); 

    function hapus(a){
      swal({
        title:'Peringatan',
        text: "Apakah Anda Ingin Menghapus?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'OK'
      }).then(function() {
        $.ajax({
            url: "<?php echo base_url();?>kadaluwarsa/delete/" + a,
            method: "POST",
            cache: "false",
            success: (response) => {
                if (response == "success") {
                    swal({
                        position: 'top-end',
                        type: 'success',
                        title: 'Data Berhasil Dihapus',
                        showConfirmButton: true,
                        timer: 1500
                    }).then(
                        function () {
                        },
                        function (dismiss) {
                            if (dismiss === 'timer') {
                                location.reload();
                            }
                        }
                    )
                }else{
                    swal({
                        title: "PERINGATAN",
                        text: "Data gagal disimpan.",
                        showConfirmButton: false,
                        type: "warning",
                        dangerMode: true,
                        timer: 1500
                    })
                }
            }
        })
      })
    }
</script>