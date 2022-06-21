<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">Barang Masuk</h4> 

                            <button type='button' class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" id="btntbh" style="margin-bottom: 10px">Tambah Barang Masuk</button> 
                            
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Tanggal</th>
                                        <th>Jumlah</th>
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
                           <!--  <label>Id Pemasukan</label>
                            <input type="text"  id="txt_id" parsley-trigger="change" required placeholder="id Pemasukan" class="form-control"> -->
                        </div>
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <select class="form-control " id="txt_nama_produk" style="width: 10cm" >
                            <option value="">Select</option>  
                            </select>
                            <input type="hidden" id="txt_id">
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" id="txt_tanggal" parsley-trigger="change" required placeholder="Tambahkan PTanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" id="txt_jumlah" parsley-trigger="change" required placeholder="Tambahkan Jumlah" class="form-control">
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
              "ajax": "<?php echo base_url()?>Kasir/Barang_masuk/tampil"
    });

    refresh();
    function refresh(){
      $('#txt_id').val('');
      $('#txt_nama_produk').val('');
      $('#txt_tanggal').val('');
      $('#txt_jumlah').val('');
      $("#myModalLabel").html('Tambah Data');
      $("#bloktombol").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp<button type="button" class="btn btn-primary"  onclick="tambah()">Simpan</button>');  
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
          url: "<?php echo base_url();?>Kasir/Barang_masuk/hapusbarangmasuk",
          method: "POST",
          data: {kode: a},
          cache: "false",
          success: function(x){
            if(x == 1){
              swal({title: 'Berhasil', text: 'Data Barang Masuk Berhasil di Hapus', type: 'success'});
              // refresh();
              tbldata.ajax.reload(null, false);
            }else{
              swal({title: 'Gagal', text: 'Ada Masalah dengan Proses Pengahapusan !', type: 'error'});
            }
          }
        })


      })
    }

    function tambah(){
      var id_pemasukan = $('#txt_id').val();
      var nama_produk = $('#txt_nama_produk').val();
      var tanggal = $('#txt_tanggal').val();
      var jumlah = $('#txt_jumlah').val();
      if(nama_produk == '' || tanggal == '' || jumlah==''){
        swal({title: 'Gagal', 
          text: 'Ada Isian yang Belum Anda Isi !', 
          type: 'error'});
        return;
      }

      $.ajax({
        url: "<?php echo base_url();?>Kasir/Barang_masuk/tambahbarangmasuk",
        method: "POST",
        data: {id_pemasukan : id_pemasukan , nama_produk: nama_produk, tanggal: tanggal, jumlah : jumlah},
        cache: "false",
        success: function(x){
          // $('#btntbh').attr('disabled',true);
          console.log(x);
          if(x == 1){
            swal({title: 'Berhasil', text: 'Data Barang masuk Berhasil di Tambahkan', type: 'success'});
            $("#myModal").modal('toggle');
            tbldata.ajax.reload(null, false);
            refresh();
          }else if(x == 0){
            swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
          }
        }

      })


    }
    function edit(el){
      var kode = $(el).data("kode");
      $("#txt_id").val(kode);
      $.ajax({
        url: "<?php echo base_url();?>Kasir/Barang_masuk/editbarangmasuk",
        method: "POST",
        data: {kode: kode},
        cache: "false",
        success: function(x){
          var xx = x.split("|");
          if(xx[0] == 1){
            $("#txt_nama_produk").val(xx[1]);
            $("#txt_tanggal").val(xx[2]);
            $("#txt_jumlah").val(xx[3]);
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
      var id_pemasukan = $('#txt_id').val();
      var nama_produk = $('#txt_nama_produk').val();
      var tanggal = $('#txt_tanggal').val();
      var jumlah = $('#txt_jumlah').val();
      if(nama_produk == "" || tanggal == "" || jumlah == "" ){
          swal({title: 'Gagal', text: 'Ada Isian yang Belum Anda Isi !', type: 'error'});
          return;
      }

      $.ajax({
          url: "<?php echo base_url();?>Kasir/Barang_masuk/updatebarangmasuk",
          method: "POST",
          data: {id_pemasukan : id_pemasukan ,nama_produk: nama_produk, tanggal: tanggal, jumlah: jumlah},
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
      

      $.getJSON("<?php echo base_url(); ?>Kasir/Barang_masuk/tampilproduk", function(result){
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