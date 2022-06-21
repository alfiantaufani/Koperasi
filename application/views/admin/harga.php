<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">Harga Produk</h4> 

                            <button type='button' class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="btntbh" style="margin-bottom: 10px">Tambah Harga Produk</button> 
                            
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                      
                                        <th>Produk</th>
                                        <th>Harga</th>
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
                            <label>Nama Produk</label>
                            <select class="form-control " id="txt_nama_produk" style="width: 10cm" >
                            <option value="">Select</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" id="txt_harga" parsley-trigger="change" required placeholder="Tambahkan Harga" class="form-control">
                            <input type="hidden" id="txt_id_harga" >
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

<footer class="footer text-right">2021 Koperasi Unwaha</footer>

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
              "ajax": "<?php echo base_url()?>Harga/tampil"
    });

    refresh();
    function refresh(){
      $('#txt_nama_produk').val('');
      $('#txt_harga').val('');
      $("#myModalLabel").html('Tambah Data');
      $("#bloktombol").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp<button type="button" class="btn btn-primary"  onclick="tambah()">Simpan</button>');  
    }

    function tambah(){
      var nama_produk = $('#txt_nama_produk').val();
      var harga = $('#txt_harga').val();
      if(nama_produk == '' || harga == '' ){
        swal({title: 'Gagal', 
          text: 'Ada Isian yang Belum Anda Isi !', 
          type: 'error'});
        return;
      }

      $.ajax({
        url: "<?php echo base_url();?>Harga/tambahharga",
        method: "POST",
        data: {nama_produk: nama_produk, harga : harga },
        cache: "false",
        success: function(x){
          console.log(x);
          if(x == 1){
            swal({title: 'Berhasil', text: 'Data Produk Berhasil di Tambahkan', type: 'success'});
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
          url: "<?php echo base_url();?>Harga/hapusharga",
          method: "POST",
          data: {kode: a},
          cache: "false",
          success: function(x){
            if(x == 1){
              swal({title: 'Berhasil', text: 'Data Harga Berhasil di Hapus', type: 'success'});
              // refresh();
              tbldata.ajax.reload(null, false);
            }else{
              swal({title: 'Gagal', text: 'Ada Masalah dengan Proses Pengahapusan !', type: 'error'});
            }
          }
        })


      })
    }
    function edit(el){
      var kode = $(el).data("kode");
      $("#txt_id_harga").val(kode);
      $.ajax({
        url: "<?php echo base_url();?>Harga/editharga",
        method: "POST",
        data: {kd: kode},
        cache: "false",
        success: function(x){
          var xx = x.split("|");
          if(xx[0] == 1){
            $("#txt_nama_produk").val(xx[1]);
            $("#txt_harga").val(xx[2]);
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
      var nama_produk = $('#txt_nama_produk').val();
      var harga = $('#txt_harga').val();
      var id_harga = $('#txt_id_harga').val();
      

      if(nama_produk== "" || harga == ""){
          swal({title: 'Gagal', text: 'Ada Isian yang Belum Anda Isi !', type: 'error'});
          return;
      }

      $.ajax({
          url: "<?php echo base_url();?>Harga/updateharga",
          method: "POST",
          data: {id_harga : id_harga, nama_produk: nama_produk, harga: harga},
          cache: "false",
          success: function(x){
              if(x == 1){
                  swal({title: 'Berhasil', text: 'Data Anggota Berhasil di Update', type: 'success'});
                  refresh();
                  $("#myModal").modal('toggle');
                  tbldata.ajax.reload(null, false);
              }else{
                  swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
              }
          }
      })
    }
    $(document).ready(function(){
      

      $.getJSON("<?php echo base_url(); ?>Harga/tampilproduk", function(result){
        $.each(result, function(i, kolom){
          $("#txt_nama_produk").append('\
            <option value="'+ kolom.id_produk+'">'+ kolom.nama_produk+'</option>\
          ');      
        });
      });
    });
</script>


    </body>
</html>