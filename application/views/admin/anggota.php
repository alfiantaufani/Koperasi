<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">Pelanggan</h4> 

                            <button type='button' class="btn btn-primary mb-3 mt-3" data-toggle="modal" data-target="#myModal" id="btntbh" style="margin-bottom: 10px">Tambah Pelanggan</button> 
                            
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nomor Hp</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->

        <!-- sample modal content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <form action="#" data-parsley-validate novalidate>
                            <input type="hidden" id="id" name="kode">
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <input type="text" name="txt_nama" id="txt_nama" parsley-trigger="change" required placeholder="Tambahkan Nama Pelanggan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No Hp</label>
                                <input type="number" name="txt_no" id="txt_no" parsley-trigger="change" required placeholder="Tambahkan No Hp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Gabung</label>
                                <input type="date" name="txt_gabung" id="txt_gabung" parsley-trigger="change" required placeholder="Tambahkan No Hp" class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer" id="bloktombol">

                        </div>
                        </form>
                    </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div> <!-- container -->
</div> <!-- content -->

<footer class="footer text-right">2021 Koperasi</footer>

    </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
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
<script type="text/javascript">
    $(document).ready(function () {

        // Responsive Datatable
        $('#responsive-datatable').DataTable();
    });

    var tbldata = $("#responsive-datatable").DataTable({
              "ajax": "<?php echo base_url()?>Anggota/tampil"
    });

    refresh();
    function refresh(){
      $('#txt_nama').val('');
      $('#txt_no').val('');
      $('#txt_gabung').val('');
      $("#myModalLabel").html('Tambah Data');
      $("#bloktombol").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp<button type="button" class="btn btn-primary"  onclick="tambah()">Simpan</button>');  
    }

    function tambah(){
      var nama = $('#txt_nama').val();
      var no_hp = $('#txt_no').val();
      var tgl_gabung = $('#txt_gabung').val();
      if(nama == '' || no_hp==''|| tgl_gabung==''){
        swal({title: 'Gagal', 
          text: 'Ada Isian yang Belum Anda Isi !', 
          type: 'error'});
        return;
      }

      $.ajax({
        url: "<?php echo base_url();?>Anggota/tambahanggota",
        method: "POST",
        data: {nama: nama, no_hp: no_hp, tgl_gabung : tgl_gabung},
        cache: "false",
        success: function(x){
          $('#btntbh').attr('disabled',true);
          if (x == "success") {
            swal({
                  position: 'top-end',
                  type: 'success',
                  title: 'Data Berhasil Disimpan',
                  showConfirmButton: false,
                  timer: 1500
              }).then(
                  function () {
                     tbldata.ajax.reload(null, false);
                      $("#myModal").modal('toggle');
                  },
                  function (dismiss) {
                      if (dismiss === 'timer') {
                        tbldata.ajax.reload(null, false);
                        $("#myModal").modal('toggle');
                      }
                  }
              )
          }
        }

      })


    }

    function hapus(el){
      swal({
        title:'Hapus',
        text: "Apakah Anda Ingin Menghapus?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then(function() {

        $.ajax({
          url: "<?php echo base_url();?>Anggota/hapusanggota",
          method: "POST",
          data: {kode: $(el).data("kode")},
          cache: "false",
          success: function(x){
            if(x == 1){
              swal({
                  position: 'top-end',
                  type: 'success',
                  title: 'Data Berhasil Disimpan',
                  showConfirmButton: false,
                  timer: 1500
              }).then(
                  function () {
                     tbldata.ajax.reload(null, false);
                  },
                  function (dismiss) {
                      if (dismiss === 'timer') {
                           tbldata.ajax.reload(null, false);
                      }
                  }
              )
            }else{
              swal({title: 'Gagal', text: 'Data Pelanggan masih ada di piutang.', type: 'error'});
            }
          }
        })


      })
    }

    function edit(el){
      var kode = $(el).data("kode");
      $("#id").val(kode);
      $.ajax({
        url: "<?php echo base_url();?>Anggota/editanggota",
        method: "POST",
        data: {kd: kode},
        cache: "false",
        success: function(x){
          var xx = x.split("|");
          if(xx[0] == 1){
            $("#id").val(xx[1]);
            $("#txt_nama").val(xx[2]);
            $("#txt_no").val(xx[3]);
            $("#txt_gabung").val(xx[4]);
          }else{
            swal({title: 'Gagal', text: 'Data Yang Anda Pilih tidak Tersedia !', type: 'error'});
            refresh();
            tbldata.ajax.reload(null, false);
            return;
          }
        }
      })
      $("#myModalLabel").html('Edit Data');
      $("#bloktombol").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp<button type="button" class="btn btn-primary" onclick="update()">Update</button>')
    }

    function update(){
      var nama = $('#txt_nama').val();
      var kode = $('#id').val();
      var no_hp = $('#txt_no').val();
      var tgl_gabung = $('#txt_gabung').val();
      

      if(nama == "" || no_hp == "" || tgl_gabung == "" ){
          swal({title: 'Gagal', text: 'Ada Isian yang Belum Anda Isi !', type: 'error'});
          return;
      }

      $.ajax({
          url: "<?php echo base_url();?>Anggota/updateanggota",
          method: "POST",
          data: {kode: kode, nama: nama, no_hp: no_hp, tgl_gabung : tgl_gabung},
          cache: "false",
          success: function(x){
              if(x == 1){
                swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Data Berhasil Disimpan',
                    showConfirmButton: false,
                    timer: 1500
                }).then(
                    function () {
                      tbldata.ajax.reload(null, false);
                        $("#myModal").modal('toggle');
                    },
                    function (dismiss) {
                        if (dismiss === 'timer') {
                          tbldata.ajax.reload(null, false);
                          $("#myModal").modal('toggle');
                        }
                    }
                )
              }else{
                  swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
              }
          }
      })
    }

</script>


    </body>
</html>