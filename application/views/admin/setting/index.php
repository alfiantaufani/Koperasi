<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card-box">
                        <h4 class="mt-0 mb-3 header-title">Pengaturan </h4>
                        <form id="submit">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Koperas</label>
                                <input type="text" class="form-control" id="nama_kopersai" name="nama_koperasi" placeholder="Masukkan Nama Koperasi" value="<?= $setting->nama_koperasi ?>" required>
                                <input type="hidden" id="id" name="id" value="<?= $setting->id ?>">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">No. Telepon</label>
                                <input type="number" class="form-control" id="telepon" name="telepon" placeholder="Masukkan No. Telepon" value="<?= $setting->no_telepon ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="example-textarea">Alamat</label>
                                <textarea class="form-control" rows="5" id="alamat" name="alamat" placeholder="Masukkan Alamat" required><?= $setting->alamat ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
                <!-- end col -->

                <div class="col-md-5">
                    <div class="text-center card-box">
                        <h4 class="mt-0 mb-3 header-title text-left">LOGO</h4>
                        <img src="<?= base_url()?>assets/upload/logo/<?= $setting->logo ?>" width="150" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                        <form id="logo">
                            <input type="hidden" id="id" name="id" value="<?= $setting->id ?>">
                            <div class="form-group">
                                <input type="file" id="file" name="file" class="dropify" require>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
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
      $.ajax({
        url   : '<?php echo base_url() ;?>setting/update',
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
          })
        }
      });
    });

    $('#logo').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url   : '<?php echo base_url() ;?>setting/update_logo',
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
        }
      });
    });
</script>