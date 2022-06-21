<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="m-t-0 header-title">Pengguna</h4> 

                        <button type='button' class="btn btn-primary mb-4 mt-3" data-toggle="modal" data-target="#myModal" id="btntbh" style="margin-bottom: 10px">Tambah Pengguna</button> 
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Username</th>
                                    <th>Nama Pengguna</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="submit">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Masukkan username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" name="nama" placeholder="Masukkan nama pengguna" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control" required>
                            <option disabled selected>-- Pilih level --</option>
                            <option value="administrator">Administrator</option>
                            <option value="pegawai">Pegawai</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="edit">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukkan username" class="form-control">
                        <input type="hidden" id="id" name="id">
                    </div>
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" id="nama" name="nama" placeholder="Masukkan nama pengguna" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" id="level" class="form-control">
                            <option disabled selected>-- Pilih level --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukkan Password" class="form-control">
                        <small id="emailHelp" class="form-text text-muted">Kosongi password bila tidak ingin dirubah</small>
                    </div>
                    <div class="form-group">
                        <label>Ulangi Password</label>
                        <input type="password" id="re_password" name="re_password" placeholder="Ulangi Password" class="form-control">
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

    var tbldata = $("#responsive-datatable").DataTable({
        "ajax": "<?php echo base_url()?>pengguna/get"
    });

    $('#submit').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url   : '<?php echo base_url() ;?>pengguna/store',
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
    
    function edit(el){
        $("#level").empty();
        $(".edit").modal('show');
        $('.modal #id').val($(el).data("id"));
        $('.modal #username').val($(el).data("username"));
        $('.modal #nama').val($(el).data("nama"));
        $('.modal #level').val($(el).data("level"));
        
        if ($(el).data("level") == 'administrator') {
        $("#level").append(`
            <option value="administrator" selected>Administrator</option>
            <option value="pegawai">Pegawai</option>
        `);      
        } else {
        $("#level").append(`
            <option value="administrator">Administrator</option>
            <option value="pegawai" selected>Pegawai</option>
        `); 
        }
    }

    $('#edit').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        if ($('#password').val() != "") {
            if ($('#password').val() == $('#re_password').val()) {
                $.ajax({
                    url   : '<?php echo base_url() ;?>pengguna/update',
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
                url   : '<?php echo base_url() ;?>pengguna/update',
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
        }
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
            url: "<?php echo base_url();?>pengguna/delete/" + a,
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