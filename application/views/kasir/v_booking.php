<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box table-responsive">
                            <h4 class="m-t-0 header-title">Booking</h4> 
                            
                            <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Tanggal Booking</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Produk</th>
                                        <th>jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div> <!-- end row -->

                <!-- sample modal content -->
                <div id="myModalku" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Modal Heading</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">
                              <div class="form-group">
                                <input type="hidden" name="" id="id_status_edit">
                                  <label>Ubah Status</label>
                                  <select class="form-control " name="txt_ubah_status" id="txt_ubah_status" style="width: 10cm"  >
                                  <option value="Ditolak">Tolak</option> 
                                  <option value="Menunggu Pembayaran">Setujui</option>   
                                  </select>
                              </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="simpan_status()">Simpan</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

        <!-- sample modal content -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">BAYAR BOOKING</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="refresh()">×</button>
                    </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Pembeli</label>
                            <div id="blokotsdm"></div>
                            <input type="text" name="txt_nama_pembeli" id="txt_nama_pembeli" parsley-trigger="change" required placeholder="Nama Pembeli" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Jenis Pembayaran</label>
                            <select class="form-control " name="txt_jenis_pembayaran" id="txt_jenis_pembayaran" style="width: 10cm" onclick= "logika2()" >
                            <option value="">Select</option>  
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Diskon</label>
                            <select class="form-control " id="txt_diskon" name="txt_diskon" style="width: 10cm" onchange ="hitungdiskon()" >
                              <option value="">-------Pilih Diskon--------</option> 
                              <option value="0">Tidak Ada Diskon</option> 
                            </select>

                            <input type="hidden" id="tdiskon" value="0">
                        </div>
                        <div class="form-group">
                            <label>Saldo Bulanan</label>
                            <input type="text" name="txt_sisa" id="txt_sisa" class="form-control col-3 " disabled value="0">
                        </div>

                        <div class="form-group">
                            <label>Total Diskon</label>
                            <input type="number" name="txt_diskonbelanja" id="txt_diskonbelanja" class="form-control" disabled>
                        </div>

                        <div class="form-group">
                            <label>Total Belanja</label>
                            <input type="number" name="txt_total_belanja" id="txt_total_belanja" parsley-trigger="change" required placeholder="Total" class="form-control">
                            <input type="hidden" name="txtkode" id="txtkode">
                            <input type="hidden" name="txt_harga" id="txt_harga">
                            <input type="hidden" name="txt_id_produk" id="txt_id_produk">
                            <input type="hidden" name="txt_jumlah" id="txt_jumlah">
                            <input type="hidden" name="txt_nip" id="txt_nip">
                            <input type="hidden" name="txt_no_booking" id="txt_no_booking">

                        </div>
                        <div class="form-group">
                            <label>Bayar</label>
                            <input type="number" name="txt_bayar" id="txt_bayar" parsley-trigger="change" required placeholder="Bayar" class="form-control" onchange ="logika3()">
                        </div>

                        <div class="form-group">
                            <label>Kembalian</label>
                            <input type="number" name="txt_kembalian" id="txt_kembalian" parsley-trigger="change" required placeholder="Kembalian" class="form-control">
                        </div>
                      <div class="modal-footer" id="bloktombol"></div>
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
              "ajax": "<?php echo base_url()?>Kasir/Booking/tampil"
    });

    refresh();
    function refresh(){
      $("#txtkode").val('');
      $("#txt_harga").val('');
      $("#txt_nama_pembeli").val('');
      $("#txt_nip").val('');
      $("#txt_id_produk").val('');
      $("#txt_jumlah").val('');
      $("#txt_total_belanja").val('');
      $("#txt_kembalian").val('');
      $("#txt_bayar").val('');
      $("#txt_diskonbelanja").val(0);
      $("#txt_jenis_pembayaran").val('').change();
      $("#txt_sisa").val(0);

      $("#myModalLabel").html('Tambah Data');
      $("#bloktombol").html('<button type="button" class="btn btn-primary"  onclick="tambah()">Simpan</button>');  
    }

    function setuju(a){
      swal({
        title:'Setuju',
        text: "Apakah Booking Disetujui?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then(function() {

        $.ajax({
          url: "<?php echo base_url();?>Kasir/Booking/setuju",
          method: "POST",
          data: {kode: a},
          cache: "false",
          success: function(x){
            if(x == 1){
              swal({title: 'Berhasil', text: 'booking disetujui', type: 'success'});
              // refresh();
              tbldata.ajax.reload(null, false);
            }else{
              swal({title: 'Gagal', text: 'booking ditolak', type: 'error'});
            }
          }
        })


      })

    }
    
    function tolak(b){
      swal({
        title:'Tolak',
        text: "Apakah Booking Ditolak?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then(function() {

        $.ajax({
          url: "<?php echo base_url();?>Kasir/Booking/tolak",
          method: "POST",
          data: {kode: b},
          cache: "false",
          success: function(x){
            if(x == 1){
              swal({title: 'Berhasil', text: 'Booking Ditolak', type: 'success'});
              // refresh();
              tbldata.ajax.reload(null, false);
            }else{
              swal({title: 'Gagal', text: 'booking ditolak', type: 'error'});
            }
          }
        })


      })
      
    }

    function lanjut_status(el){
        $("#myModalku").modal('toggle');
        $('#id_status_edit').val(el);

        $.ajax({
          url: "<?php echo base_url();?>Kasir/Booking/cek_edit_status",
          method: "POST",
          data: {kd: el},
          cache: "false",
          success: function(x){
            console.log(x);
            var xx = x.split("|");
            if(xx[0] == 1){
              $("#txt_ubah_status").val(xx[1]);
              
              logika_diskon();
            }else{
              swal({title: 'Gagal', text: 'Data Yang Anda Pilih tidak Tersedia !', type: 'error'});
              refresh();
              tbldata.ajax.reload(null, false);
              return;
            }
          }
        })
    }

    function simpan_status(){
      var a =  $('#id_status_edit').val();
      var b =  $('#txt_ubah_status').val();
      $.ajax({
        url: "<?php echo base_url();?>Kasir/Booking/simpan_status_edit",
        method: "POST",
        data: {a:a, b:b },
        cache: "false",
        success: function(x){
          $('#btntbh').attr('disabled',true);
          console.log(x);
          if(x == 1){
            $("#myModalku").modal('toggle');
            swal({title: 'Berhasil', text: 'Edit Booking Berhasil', type: 'success'});
            tbldata.ajax.reload(null, false);
            refresh();
          }else if(x == 0){
            swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
          }
        }

      })

    }


    
    function lanjut_bayar(el){
        $("#myModal").modal('toggle');
        $.getJSON("<?php echo base_url(); ?>Kasir/Booking/nomor_transaksi", function(result){
          $.each(result, function(i, kolom){
            $("#blokotsdm").html('\
              <input type="hidden" id="txt_iddm"  value="'+ kolom.id_transaksi+'">');         
          });
        });

        $.ajax({
          url: "<?php echo base_url();?>Kasir/Booking/lanjut_bayar",
          method: "POST",
          data: {kd: el},
          cache: "false",
          success: function(x){
            console.log(x);
            var xx = x.split("|");
            if(xx[0] == 1){
              $("#txtkode").val(xx[1]);
              $("#txt_harga").val(xx[2]);
              $("#txt_nama_pembeli").val(xx[3]);
              $("#txt_nip").val(xx[4]);
              $("#txt_id_produk").val(xx[5]);
              $("#txt_jumlah").val(xx[6]);
              $("#txt_total_belanja").val(xx[7]);
              
              logika_diskon();
            }else{
              swal({title: 'Gagal', text: 'Data Yang Anda Pilih tidak Tersedia !', type: 'error'});
              refresh();
              tbldata.ajax.reload(null, false);
              return;
            }
          }
        })


    }
    function logika2(){
      var a = $("#txt_nip").val();
      var b = $('#txt_jenis_pembayaran').val();
      if(b == '1'){
        $.ajax({
          url: "<?php echo base_url();?>Kasir/Booking/sisa",
          method: "POST",
          data: {a: a},
          cache: "false",
          success: function(x){
            var xx = x.split("|");
            console.log(x);
            if(xx[0] == 1){
              $("#txt_sisa").val(xx[1]);
            }else{
              swal({title: 'Gagal', text: 'Data Yang Anda Pilih tidak Tersedia !', type: 'error'});
              refresh();
              tbldata.ajax.reload(null, false);
              return;
            }
          }
        })
        
      }else{
        $('#txt_sisa').val('0');
      }
    }
    function logika3() {
      var a = $("#txt_total_belanja").val();
      var b = $("#txt_diskonbelanja").val();
      var c = $("#txt_sisa").val(); 
      var d = $("#txt_bayar").val();

      var k = Number(d) + Number(c) + Number(b) - Number(a);

      $("#txt_kembalian").val(k);

    }

    function logika_diskon(){
      var a = $('#txt_nip').val();
      $.ajax({
        url: "<?php echo base_url();?>Kasir/Booking/diskonku",
        method: "POST",
        data: {a: a},
        cache: "false",
        dataType : 'json',
        success: function(x){
          console.log(x);
          var hasil = "<option value=''>-------Pilih Diskon--------</option> \
                        <option value='0'>Tidak Ada Diskon</option> ";
          $.each(x, function(i, kolom){
            hasil = hasil + '<option value="'+ kolom.kode_diskon +'">'+ kolom.keterangan+'</option>'
          });
          $('#txt_diskon').html(hasil);
         
        }
      })
    }



    function tambah(){
      var id_transaksi = $('#txt_iddm').val();
      var total_harga = $('#txt_total_belanja').val();
      var jenis_pembayaran = $('#txt_jenis_pembayaran').val();
      var nip = $('#txt_nip').val();
      var booking = $('#txtkode').val();
      var id_diskon = $('#txt_diskon').val();

      var id_produk = $('#txt_id_produk').val();
      var jumlah = $('#txt_jumlah').val();
      var harga = $('#txt_harga').val();
      if(total_harga=='' || id_produk == '' ||jumlah==''||harga==''||jenis_pembayaran==''||nip==''||booking==''){
        swal({title: 'Gagal', 
          text: 'Ada Isian yang Belum Anda Isi !', 
          type: 'error'});
        return;
      }

      $.ajax({
        url: "<?php echo base_url();?>Kasir/Booking/tambahbayar",
        method: "POST",
        data: {id_transaksi:id_transaksi,total_harga:total_harga, jenis_pembayaran:jenis_pembayaran, nip:nip, booking:booking, id_diskon:id_diskon, id_produk:id_produk,jumlah:jumlah, harga:harga    },
        cache: "false",
        success: function(x){
          $('#btntbh').attr('disabled',true);
          console.log(x);
          if(x == 1){
            swal({title: 'Berhasil', text: 'Pembayaran Booking Berhasil', type: 'success'});
            $("#myModal").modal('toggle');
            tbldata.ajax.reload(null, false);
            refresh();
          }else if(x == 0){
            swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
          }
        }

      })

    }


    function hitungdiskon(){
      var a = $('#txt_diskon').val();
      if(a == '' || a == '0'){
        $("#tdiskon").val('0'); 
            hitungdiskon2();

      }else{
        $.ajax({
          url: "<?php echo base_url();?>Kasir/Booking/hitungdiskon",
          method: "POST",
          data: {a:a},
          cache: "false",
          success: function(x){
            var xx = x.split("|");
            if(xx[0] == 1){
              $("#tdiskon").val(xx[1]);
            hitungdiskon2();

            }else if(x == 0){
              swal({title: 'Gagal', text: 'Ada Beberapa Masalah dengan Data yang Anda Isikan !', type: 'error'});
            }
          }

        })
      }
      
    }

    function hitungdiskon2() {
      var a = $('#txt_total_belanja').val();
      var b = $('#tdiskon').val();
      var c = 100;

      var x = b/c;
      var z = x*a;

      $('#txt_diskonbelanja').val(z);

    }


    $(document).ready(function(){

      $.getJSON("<?php echo base_url(); ?>Kasir/Booking/tampilnama", function(result){
        $.each(result, function(i, kolom){
          $("#txt_nama_anggota").append('\
            <option value="'+ kolom.nip+'">'+ kolom.nama_anggota+'</option>\
          ');      
        });
      });
      $.getJSON("<?php echo base_url(); ?>Kasir/Booking/tampil_jenis_pembayaran", function(result){
        $.each(result, function(i, kolom){
          $("#txt_jenis_pembayaran").append('\
            <option value="'+ kolom.id_jenis_pembayaran+'">'+ kolom.nama_jenis_pembayaran+'</option>\
          ');      
        });
      });
    });
</script>


    </body>
</html>