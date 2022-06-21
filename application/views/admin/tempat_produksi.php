<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">Supplier</h4> 

                            <button type='button' class="btn btn-primary mb-4 mt-3" data-toggle="modal" data-target="#myModal" id="btntbh" style="margin-bottom: 10px">Tambah Supplier</button> 
                            
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Nama Supplier</th>
                                        <th>Alamat</th>
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
                        <div class="form-group">
                            <label for="userName">Nama Supplier</label>
                            <input type="text" name="tempat_produksi" id="txt_nama_tempat_produksi" parsley-trigger="change" required placeholder="Nama Supplier" class="form-control">
                            <input type="hidden" name="" id="txtkode">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" id="txt_alamat" parsley-trigger="change" required placeholder="Nama Supplier" class="form-control">
                            <input type="hidden" name="" id="txtkode">
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
              "ajax": "<?php echo base_url()?>Tempat_produksi/tampil"
    });

    refresh();
    function refresh(){
      $('#txt_nama_tempat_produksi').val('');
      $('#txt_alamat').val('');
      $('#btntbh').attr('disabled',false);
      $("#myModalLabel").html('Tambah Data');
      $("#bloktombol").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp<button type="button" class="btn btn-primary"  onclick="tambah()">Simpan</button>');  
    }
    function tambah(){
      var nama_tempat_produksi= $('#txt_nama_tempat_produksi').val();
      var alamat= $('#txt_alamat').val();
      if(nama_tempat_produksi == '',alamat == ''){
        swal({title: 'Gagal', 
          text: 'Ada Isian yang Belum Anda Isi !', 
          type: 'error'});
        return;
      }

      $.ajax({
        url: "<?php echo base_url();?>Tempat_produksi/tambahtempatproduksi",
        method: "POST",
        data: {ntp: nama_tempat_produksi, alamat : alamat},
        cache: "false",
        success: function(x){
          $('#btntbh').attr('disabled',true);
          console.log(x);
          if(x == 1){
            swal({title: 'Berhasil', text: 'Data Supplier Berhasil di Tambahkan', type: 'success'});
            $("#myModal").modal('toggle');
            tbldata.ajax.reload(null, false);
            refresh();
          }else if(x == 0){
            swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
          }
        }

      })


    }
    function hapus(a){
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
          url: "<?php echo base_url();?>Tempat_produksi/hapustempatproduksi",
          method: "POST",
          data: {kode: a},
          cache: "false",
          success: function(x){
            if(x == 1){
              swal({title: 'Berhasil', text: 'Data Supplier Berhasil di Hapus', type: 'success'});
              // refresh();
              tbldata.ajax.reload(null, false);
            }else{
              swal({title: 'Gagal', text: 'Ada Masalah dengan Proses Pengahapusan !', type: 'error'});
            }
          }
        })


      })
    }
    function update(){
      var id = $('#txtkode').val();
      var nama_tempat_produksi = $("#txt_nama_tempat_produksi").val();
      var alamat = $("#txt_alamat").val();
      if(id == "" || nama_tempat_produksi == ""|| alamat == "" ){
          swal({title: 'Gagal', text: 'Ada Isian yang Belum Anda Isi !', type: 'error'});
          return;
      }

      $.ajax({
          url: "<?php echo base_url();?>Tempat_produksi/updatetempatproduksi",
          method: "POST",
          data: {id: id, nama_tempat_produksi: nama_tempat_produksi, alamat : alamat},
          cache: "false",
          success: function(x){
            console.log(x);
              if(x == 1){
                  swal({title: 'Berhasil', text: 'Data Supplier Berhasil di Update', type: 'success'});
                  refresh();
                  $("#myModal").modal('toggle');
                  tbldata.ajax.reload(null, false);
              }else{
                  swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
              }
          }
      })
    }
    function edit(el){
      var kode = $(el).data("kode");
      $("#txt_tempat_produksi").val(kode);
      $.ajax({
        url: "<?php echo base_url();?>Tempat_produksi/edittempatproduksi",
        method: "POST",
        data: {kd: kode},
        cache: "false",
        success: function(x){
          var xx = x.split("|");
          if(xx[0] == 1){
            $("#txtkode").val(xx[1]);
            $("#txt_nama_tempat_produksi").val(xx[2]);
            $("#txt_alamat").val(xx[3]);
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
</script>
</body>
</html>