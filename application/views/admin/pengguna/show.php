<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                        <h4 class="mt-0 mb-3 header-title">Edit Akun </h4>
                        <form class="form-horizontal" id="submit">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="username" placeholder="Username" value="<?= $pengguna->username ?>">
                                    <input type="hidden" name="id" value="<?= $pengguna->id ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Pengguna</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="inputEmail3" name="nama" placeholder="Nama Pengguna" value="<?= $pengguna->nama ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                    <small id="emailHelp" class="form-text text-muted">Kosongi password bila tidak ingin dirubah</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword5" class="col-sm-3 col-form-label">Ulangi Password</label>
                                <div class="col-sm-9">
                                    <input type="password" id="re_password" class="form-control" id="inputPassword5" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-sm-12 ">
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Simpan</button>
                                </div>
                            </div>
                        </form>
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
    $('#submit').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        if ($('#password').val() != "") {
            if ($('#password').val() == $('#re_password').val()) {
                $.ajax({
                    url   : '<?php echo base_url() ;?>pengguna/update_id',
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
                                    window.location.replace("<?= base_url() ?>logout");
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
            }else{
                swal({
                    title: "PERINGATAN",
                    text: "Password anda tidak sama.",
                    icon: "warning",
                    dangerMode: true,
                    timer: 1500
                })
            }
        } else {  
            $.ajax({
                url   : '<?php echo base_url() ;?>pengguna/update_id',
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
                                window.location.replace("<?= base_url() ?>logout");
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
        }
    });
</script>