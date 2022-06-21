<?php
    $total = 0;
    foreach ($totals as $key => $v) {
        $total += $v['total'];
    }
?>
<div class="content-page" onload="load()">
    <div class="content">
        <div class="container-fluid">
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                Download Aplikasi Scanner untuk Kasir <strong><a target="_blank" href="https://drive.google.com/file/d/1-lOStclSyDPMsNESKzY74kCbltixfUaL/view?usp=sharing">disini</a></strong> 
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <h4 class="mb-3 header-title">Kasir</h4> 
                        <div class="row">
                            <div class="col-md-8 mt-3 pr-4">
                                <form action="<?= base_url()?>update_qty" method="post">
                                    <div class="table-responsive">
                                        <table id="tbl_keranjang" class="table table-bordered " cellspacing="0" width="100%" style="margin-top: 28px" >
                                            <thead>
                                                <tr>
                                                    <th width="40%">Produk</th>
                                                    <th width="15%">Harga</th>
                                                    <th width="15%">Qty</th>
                                                    <th width="20%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            </tbody>
                                        </table>
                                    </div>
                                    

                                    
                                    <div class="row">
                                        <div class="ml-auto mr-2 mt-2">
                                            <button type="submit" class="btn btn-primary btn-block btn-lg">CEKOUT SEKARANG <i class="mdi mdi-cart-arrow-right"></i></button> 
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <form method="post" action="<?= base_url()?>bayar" class="mt-3">               
                                    <div class="row"> 
                                        <?php if (isset($_GET['cek']) == true) { ?>
                                            <?php foreach ($keranjang as $hidden) { ?>
                                                <input type="hidden" name="id_keranjang[]" id="id_keranjang" value="<?= $hidden->id ?>">
                                                <input type="hidden" name="id_produk[]" id="id_produk" value="<?= $hidden->id_produk ?>">
                                                <input type="hidden" name="nama[]" id="nama" value="<?= $hidden->nama_produk ?>">
                                                <input type="hidden" name="qty_new[]" id="qty_new" value="<?= $hidden->qty ?>">
                                                <input type="hidden" name="harga_asli[]" id="harga_asli"  value="<?= $hidden->harga ?>">
                                            <?php } ?>
                                            
                                            <input type="hidden" name="total_belanja" value="<?= $total ?>">
                                            <span id="form_kembalian"></span>

                                            <div class="col-md-12">
                                                <label style="font-weight: 600">TIPE PEMBAYARAN</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type_pay" id="type_pay" value="tunai" checked>
                                                    <label class="form-check-label" for="type_pay">
                                                        Tunai
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="type_pay" id="type_non_pay" value="non_tunai">
                                                    <label class="form-check-label" for="type_non_pay">
                                                        Non Tunai/Piutang
                                                    </label>
                                                </div>

                                                <span id="show-pay" style="display: none">
                                                    <div class="form-group mt-3">
                                                        <label style="font-weight: 600">TANGGAL JATUH TEMPO</label>
                                                        <input class="form-control" id="tgl_jatuh_tempo" type="date" name="tgl_jatuh_tempo"> 
                                                    </div>
                                                    <div class="form-group" id="form_pelanggan">
                                                        <label style="font-weight: 600">Pilih Pelanggan</label>
                                                        <select name="pelanggan" id="pelanggan" class="js-example-basic-single form-control form-control-lg">
                                                            <option disabled selected>-- Pilih Pelanggan --</option>
                                                            <?php foreach ($pelanggan as $key) : ?>
                                                                <option value="<?= $key->id ?>"><?= $key->nama?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <div class="row">
                                                            <small class="ml-auto mr-2 mt-1">
                                                                <a href="#" onclick="showInsertPelanggan()">Nama pelanggan tidak teredia?</a>
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div id="form_insert_pelanggan" style="display: none;">
                                                        <div class="form-group">
                                                            <label style="font-weight: 600">Nama Pelanggan</label>
                                                            <input type="text" class="form-control" name="nama_pelanggan" placeholder="Masukkan nama pelanggan">
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="font-weight: 600">No. Telepon</label>
                                                            <input type="number" class="form-control" name="no_telepon" placeholder="Masukkan No. telepon aktif">
                                                            <div class="row">
                                                                <small class="ml-auto mr-2 mt-1">
                                                                    <a href="#" class="text-danger" onclick="hideInsertPelanggan()">Batal Tambah Pelanggan</a>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>

                                            <div class="col-md-12 mt-2">
                                                <label style="font-weight: 600">JUMLAH UANG (Rp.)</label>
                                                <input type="text" id="jumlah_uang" name="uang" class="form-control form-control-lg" placeholder="Masukkan Jumlah Uang" required>   
                                            </div>
                                            
                                            <div class="col-md-6" style="font-size: 20px; display: block;">
                                                <hr style="margin-top: 1rem; margin-bottom: 1rem; border: 1px solid #188ae2;">
                                                KEMBALIAN Rp. <span style="font-weight: bold;font-size: 25px" class="total-change-price" id="kembalian"></span>
                                            </div>
                                            <div class="col-md-6" style="font-size: 20px;">
                                                <hr style="margin-top: 1rem; margin-bottom: 1rem; border: 1px solid #188ae2;">
                                                TOTAL Rp. <span style="font-weight: bold;font-size: 25px" id="total_belanjan"><?= number_format($total) ?></span>
                                            </div>
                                            <div class="col-md-12" style="text-align: right">
                                                <hr style="margin-top: 1rem; margin-bottom: 1rem; border: 1px solid #188ae2;">
                                            </div>
                                            <div class="col-md-12" style="text-align: right">
                                                <strong>PILIH UKURAN KERTAS CETAK</strong> - <select id="ukuran">
                                                    <option value="80">80 mm</option>
                                                    <option value="95" selected="">95 mm</option>
                                                    <option value="210">A4 Inkjet</option>
                                                    <option value="280">A4 Dotmetrix</option>
                                                </select>
                                            </div>
                                            <div class="ml-auto mr-2 mt-4 mb-3">
                                                <button type="submit" class="btn btn-primary btn-lg">BAYAR SEKARANG <i class=" mdi mdi-credit-card"></i></button>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
  </div> 
    </div> 
</div> 

    <footer class="footer text-right">2021 Koperasi Unwaha</footer>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Input-Spinner-Plugin-Bootstrap-4/src/InputSpinner.js"></script>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>


<script type="text/javascript">
function remove_separator(x) {
    if (typeof x !== 'undefined') {
        return x.toString().replace(/\./g, '');
    }
}
function thousand_separator(x) {
    if (typeof x !== 'undefined') {
        return x.toString().replace(/\./g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
}

$(document).ready(function () {        
    $('#responsive-datatable').DataTable();
    $('#cari').on('keyup change', function () {
        $('#responsive-datatable').DataTable().search($(this).val()).draw();
    });
    
    var tbl_keranjang = $('#tbl_keranjang').DataTable({
      processing: true,
      destroy: true,
      scrollX: true,
      language: {
          processing: "Memuat..."
      },
      serverSide: true,
      ajax: {
          url: "<?=base_url()?>keranjang-kasir/show",
          type : 'GET'
      },
      columns: [
          {
              data: 'nama_produk',
              name: 'nama_produk',
              searchable: true
          },
          {
              data: 'harga',
              name: 'harga',
              searchable: true
          },
          {
              width: '20%',
              render: function (data, type, row) {
                result = `
                    <input type="hidden" name="id[]" id="id" class="form-control" value="`+row.id+`">
                    <input type="number" class="form-control" min="1" name="qty[]" id="qty" value="`+row.qty+`" autofocus required>
                    
                    
                `;
                return result;
              }
          },
          {
            render: function ( data, type, row ) {
                var btn =`
                    <button type="button" data-id="`+row.id+`" onclick="hapus_cart(this)" class="btn btn-danger btn-xs">Hapus</button>
                `;
                return btn;
            }
          }
      ]
    });

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('fcc6b0d11fd751af380d', {
    cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
        // alert(JSON.stringify(data));
        $('#tbl_keranjang').DataTable().ajax.reload();
    });

    $('.js-example-basic-single').select2();

    $('input:radio[name="type_pay"]').change(function(){
        if ($(this).is(':checked') && $(this).val() == 'tunai') {
            $('#show-pay').hide();
        }else{
            $('#show-pay').show();
        }
    });

    function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
          split = number_string.split(","),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
          separator = sisa ? "." : "";  
          rupiah += separator + ribuan.join(".");
      }
      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    var jumlah_uang = document.getElementById("jumlah_uang");
    jumlah_uang.addEventListener("keyup", function (e) {
        jumlah_uang.value = formatRupiah(this.value);
        var masuk = remove_separator(this.value);
        var get_total = <?= $total ?>;
        var hasil = masuk - get_total;
        $('#kembalian').html(thousand_separator(hasil));
        $("#form_kembalian").html(`<input type="hidden" name="kembalian_bayar" id="kembalian_bayar" value="`+hasil+`">`);
    });
});

$('.btn-plus, .btn-minus').on('click', function(e) {
  const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
  const input = $(e.target).closest('.input-group').find('input');
  if (input.is('input')) {
    input[0][isNegative ? 'stepDown' : 'stepUp']()
  }
})

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);
  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
  }
  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}

function get_produk(el) {
    $('#id').val($(el).data("id"));
    $('#kode_produk').val($(el).data("kodeproduk"));
    $('#nama_produk').val($(el).data("nama"));
    $('#harga').val($(el).data("harga"));
    $('#stock').val($(el).data("stock"));
}

function hapus_cart(el) {
    var id = $(el).data('id');
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
          url: "<?php echo base_url();?>keranjang-kasir/delete",
          method: "POST",
          data: {id: id},
          cache: "false",
          success: function(response){
            if (response == "success") {
                swal({
                    position: 'top-end',
                    type: 'success',
                    title: 'Data Berhasil Dihapus',
                    showConfirmButton: true,
                    timer: 1500
                }).then(
                    function () {
                        window.location.href = "<?= base_url("kasir")?>";
                    },
                    function (dismiss) {
                        if (dismiss === 'timer') {
                            window.location.href = "<?= base_url("kasir")?>";
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

function showInsertPelanggan(){
    $('#form_pelanggan').hide();
    $('#form_insert_pelanggan').show();
}

function hideInsertPelanggan(){
    $('#form_pelanggan').show();
    $('#form_insert_pelanggan').hide();
}


<?php if(isset($_SESSION['notif']) && $_SESSION['notif'] !== ''): ?>
    swal({
        type  : "<?php echo $_SESSION['notif']['status']; ?>",
        title  : "<?php echo $_SESSION['notif']['status']; ?>",
        text  : "<?php echo $_SESSION['notif']['message']; ?>",
        showCancelButton :false,
        timer: 1000,
    }).then(
        function () {
            location.reload();
        },
        function (dismiss) {
            if (dismiss === 'timer') {
                location.reload();
            }
        }
    );
<?php endif; ?>
  
</script>
</body>
</html>