<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
      <div class="content">
            <div class="container-fluid">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Download Aplikasi Scanner untuk Kasir <strong><a target="_blank" href="https://drive.google.com/file/d/1-lOStclSyDPMsNESKzY74kCbltixfUaL/view?usp=sharing">disini</a></strong> 
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">Transaksi</h4> 

                            <a href="<?php echo base_url()?>pembayaran" type='button' class="btn btn-primary btn-sm"  style="margin-bottom: 10px">Tambah Transaksi</a> 
                            
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Total Harga</th>
                                        <th>Jenis Pembayaran</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->

            </div>
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
              "ajax": "<?php echo base_url()?>Kasir/Transaksi/tampil"
    });

    refresh();
    function refresh(){
      $('#txt_tanggal_tansaksi').val('');
      $('#txt_nama_produk').val('');
      $('#txt_nama').val('');
      $('#txt_jenis_pembayaran').val('');
      $('#txt_jumlah_produk').val('');
      $('#txt_harga').val('');
      $('#btntbh').attr('disabled',false);
      $("#myModalLabel").html('Tambah Data');
      $("#bloktombol").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp<button type="button" class="btn btn-primary"  onclick="tambah()">Simpan</button>');  
    }
    function tambah(){
      var tanggal_transaksi= $('#txt_tanggal_tansaksi').val();
      var nama_produk= $('#txt_nama_produk').val();
      var jumlah_produk= $('#txt_jumlah_produk').val();
      var harga= $('#txt_harga').val();
      var nama_jenis_pembayaran= $('#txt_jenis_pembayaran').val();
      var nama= $('#txt_nama').val();
      if(tanggal_transaksi == ''|| nama_produk == ''|| jumlah_produk == ''|| harga == ''|| nama_jenis_pembayaran == ''|| nama == ''){
        swal({title: 'Gagal', 
          text: 'Ada Isian yang Belum Anda Isi !', 
          type: 'error'});
        return;
      }

      $.ajax({
        url: "<?php echo base_url();?>Kasir/Transaksi/tambahtransaksi",
        method: "POST",
        data: {tanggal_transaksi: tanggal_transaksi, nama_produk : nama_produk , jumlah_produk : jumlah_produk, harga : harga , nama_jenis_pembayaran : nama_jenis_pembayaran, nama : nama},
        cache: "false",
        success: function(x){
          $('#btntbh').attr('disabled',true);
          console.log(x);
          if(x == 1){
            swal({title: 'Berhasil', text: 'Data Tempat Produksi Berhasil di Tambahkan', type: 'success'});
            $("#myModal").modal('toggle');
            tbldata.ajax.reload(null, false);
            refresh();
          }else if(x == 0){
            swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
          }
        }

      })


    }
    
    // $(document).ready(function(){
      

    //   $.getJSON("<?php echo base_url(); ?>Kasir/Transaksi/tampilproduk", function(result){
    //     $.each(result, function(i, kolom){
    //       $("#txt_nama_produk").append('\
    //         <option value="'+ kolom.id_produk+'">'+ kolom.nama_produk+'</option>\
    //       ');      
    //     });
    //   });
    //   $.getJSON("<?php echo base_url(); ?>Kasir/Transaksi/tampiljenispembayaran", function(result){
    //     $.each(result, function(i, kolom){
    //       $("#txt_jenis_pembayaran").append('\
    //         <option value="'+ kolom.id_jenis_pembayaran+'">'+ kolom.nama_jenis_pembayaran+'</option>\
    //       ');      
    //     });
    //   });
    //   $.getJSON("<?php echo base_url(); ?>Kasir/Transaksi/tampilnama", function(result){
    //     $.each(result, function(i, kolom){
    //       $("#txt_nama").append('\
    //         <option value="'+ kolom.nip+'">'+ kolom.nama_anggota+'</option>\
    //       ');      
    //     });
    //   });
    // });
</script>
</body>
</html>