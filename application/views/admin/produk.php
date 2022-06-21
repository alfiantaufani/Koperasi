<div class="content-page">
  <div class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card-box table-responsive">
                      <h4 class="header-title">Produk</h4> 

                      <button type='button' class="btn btn-primary mb-4 mt-3" data-toggle="modal" data-target="#myModal" id="btntbh" style="margin-bottom: 10px">Tambah Produk</button> 
                      <table id="produk" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                          <thead>
                              <tr>
                                  <th>Barcode/Kode Produk</th>
                                  <th>Foto Produk</th>
                                  <th>Nama Produk</th>
                                  <th>Harga Beli</th>
                                  <th>Harga Jual</th>
                                  <th>Kategori</th>
                                  <th>Stock</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                      </table>
                  </div>
              </div>
          </div> 

          <!-- sample modal content -->
          <div id="myModal" class="modal fade bs-example-modal-lg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel"></h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      </div>
                      <div class="modal-body">
                        <form id="submit">
                            <div class="form-group" id="barcode_ada">
                                <label>Barcode/Kode Produk</label>
                                <input type="number" name="kode_produk" id="kode_produk_submit" placeholder="Masukkan Barcode/Kode Produk" class="form-control">
                                <div class="row">
                                    <small class="ml-auto mr-2 mt-1">
                                        <a href="javascript:void(0)" onclick="showBarcode()">Buat barcode disini.</a>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group" style="display: none" id="barcode_sendiri">
                                <label for="exampleInputEmail1">Barcode/Kode Produk</label>
                                <div class="input-group">
                                    <input type="number" name="buat_barcode" id="barcode" class="form-control" placeholder="Masukkan Barcode/Kode Produk">
                                    <div class="input-group-append">
                                        <a href="javascript:void(0)" onclick="buat_barcode()" class="btn btn-purple waves-effect waves-light">GENERATE BARCODE</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <small class="ml-auto mr-2 mt-1">
                                        <a href="javascript:void(0)" class="text-danger" onclick="hideBarcode()">Batal Buat barcode.</a>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama Produk</label>
                                <input type="text" name="nama_produk" required placeholder="Masukkan Nama Produk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="text" id="harga_beli" name="harga_beli" required placeholder="Masukkan Harga Beli" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="text" id="harga_jual" name="harga_jual" required placeholder="Masukkan Harga Jual" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto Produk</label>
                                <input type="file" id="file" name="file" placeholder="Masukkan Foto Produk" class="form-control">
                            </div>
                            <div class="form-group" id="kategori">
                                <label>Kategori</label>
                                <select name="txt_kategori" id="txt_kategori" class="select2 form-control form-control-lg">
                                    <option disabled selected>-- Pilih Kategori --</option>
                                    <?php foreach ($kategori as $value) : ?>
                                        <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="row">
                                    <small class="ml-auto mr-2 mt-1">
                                        <a href="javascript:void(0)" onclick="showKategori()">Tambah kategori disni.</a>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group" id="add_kategori" style="display: none">
                                <label>Nama Kategori</label>
                                <input type="text" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" class="form-control">
                                <div class="row">
                                    <small class="ml-auto mr-2 mt-1">
                                        <a href="javascript:void(0)" class="text-danger" onclick="hideKategori()">Batal tambah kategori</a>
                                    </small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Produk</label>
                                <textarea id="txt_kandungan" name="txt_kandungan" cols="5" rows="5" placeholder="Masukkan Deskripsi Produk" class="form-control"></textarea>
                            </div>
                          <div class="modal-footer" >
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp 
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                          </div>
                        </form>
                      </div>
                  </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
          </div>

          <div class="modal fade bs-example-modal-lg edit">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Edit Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                  <form method="POST" enctype="multipart/form-data" id="edit_submit">
                      <div class="form-group">
                            <label>Barcode/Kode Produk</label>
                            <input type="text" name="kode_produk" id="kode_produk" required placeholder="Masukkan Barcode/Kode Produk" class="form-control">
                      </div>
                      <div class="form-group">
                          <input type="hidden" id="id" name="id">
                          <label>Nama Produk</label>
                          <input type="text" id="edit_txt_nama"  name="edit_nama_produk" required placeholder="Masukkan Nama Produk" class="form-control">
                      </div>
                      <div class="form-group">
                            <label>Harga Beli</label>
                            <input type="text" id="edit_harga_beli" name="edit_harga_beli" required placeholder="Masukkan Harga Beli" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" id="edit_harga_jual" name="edit_harga_jual" required placeholder="Masukkan Harga Jual" class="form-control">
                        </div>
                      <div class="form-group">
                          <label>Foto Produk</label>
                          <input type="file" id="edit_file" name="file" placeholder="Masukkan Foto Produk" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Kategori</label>
                          <select class="form-control" id="txt_kategori_edit" name="edit_txt_kategori">
                            
                          </select>
                      </div>
                      <div class="form-group">
                          <label>Deskripsi Produk</label>
                          <!-- <input type="text" id="edit_txt_kandungan" name="edit_txt_kandungan" placeholder="Masukkan Deskripsi Produk" class="form-control"> -->
                          <textarea id="edit_txt_kandungan" name="edit_txt_kandungan" cols="5" rows="5" placeholder="Masukkan Deskripsi Produk" class="form-control"></textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp 
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="modal fade bs-example-modal-lg cetak">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Edit Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                  <form class="form-cetak" method="GET">
                    <div class="form-group">
                      <label>Jumlah Cetak</label>
                      <!-- <input type="text" name="id_barcode" id="id_barcode" required placeholder="Masukkan Jumlah Cetak" class="form-control"> -->
                      <input type="text" name="jml_cetak" required placeholder="Masukkan Jumlah Cetak" class="form-control">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">CETAK</button>
                    </div>
                  </form>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://www.jqueryscript.net/demo/Input-Spinner-Plugin-Bootstrap-4/src/InputSpinner.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.select2').select2();
      var harga_beli = document.getElementById("harga_beli");
      harga_beli.addEventListener("keyup", function (e) {
          harga_beli.value = formatRupiah(this.value, "Rp. ");
      });
      var harga_jual = document.getElementById("harga_jual");
      harga_jual.addEventListener("keyup", function (e) {
          harga_jual.value = formatRupiah(this.value, "Rp. ");
      });

      
    });
    /* Fungsi formatRupiah */
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

    function showBarcode() {
      $('#barcode_sendiri').show();
      $('#barcode_ada').hide();
      $('#kode_produk_submit').val("");
    }
    function hideBarcode() {
      $('#barcode_sendiri').hide();
      $('#barcode_ada').show();
      $('#barcode').val("");
    }

    function showKategori() {
      $('#add_kategori').show();
      $('#kategori').hide();
    }

    function hideKategori() {
      $('#add_kategori').hide();
      $('#kategori').show();
      $('#nama_kategori').val("");
    }
    
    var produk = $('#produk').DataTable({
      //autoWidth : false,
      //responsive: false,
      processing: true,
      scrollX: true,
      language: {
          processing: "Memuat..."
      },
      serverSide: true,
      ajax: {
          url: "<?=base_url()?>produk/tampil",
          type : 'GET'
      },
      columns: [
          {
              data: 'kode_produk',
              render: function (data, type, row, meta) {
                if (row.barcode_sendiri == null) {
                  var barcode = row.kode_produk;
                }else{
                  var barcode = row.barcode_sendiri + `
                    <br> <a href="javascript:void(0)" data-id="`+ row.barcode_sendiri + `" onclick="modal_cetak(this)"> <small>Cetak Barcode</small> </a>
                  `;
                }
                return barcode;
              },
              width: '10%',
              searchable: true
          },
          {
              data: 'foto_produk',
              render: function (data, type, row, meta) {
                if (row.foto_produk == "") {
                  var foto = `<img src="<?= base_url('assets/images/no-image.png')?>" width="100">`;
                }else{
                  var foto = `<img src="<?= base_url('assets/upload/')?>`+row.foto_produk+`" width="100">`
                }
                return foto;
              }
          },
          {
              data: 'nama_produk',
              name: 'nama_produk',
              searchable: true
          },
          {
              data: 'harga_beli',
              render: function (data, type, row, meta) {
                return "Rp. " + meta.settings.fnFormatNumber(row.harga_beli);
              }
          },
          {
              data: 'harga_jual',
              render: function (data, type, row, meta) {
                return "Rp. " + meta.settings.fnFormatNumber(row.harga_jual);
              }
          },
          {
              data: 'nama_kategori',
              name: 'nama_kategori',
          },
          {
              data: 'stock',
              width: '10%',
              render: function (data, type, row) {
                if (row.stock == 0) {
                  var result = `<span class="badge badge-danger">Stock tidak ada</span>`    
                } else {
                  var result = row.stock;
                }
                return result;
              }
          },
          {
            render: function ( data, type, row ) {
                var btn =`
                <button type='button' class='btn btn-warning btn-sm' data-id='`+row.id_produk+`' data-kodeproduk='`+row.kode_produk+`' data-barcode='`+row.barcode_sendiri+`' data-nama='`+row.nama_produk+`' data-beli='`+row.harga_beli+`' data-jual='`+row.harga_jual+`' data-kategori='`+row.nama_kategori+`' data-kandungan='`+row.kandungan_produk+`' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button>

                <button type='button' class='btn btn-danger btn-sm' onclick='hapus(`+row.id_produk+`);'><i class='mdi mdi-delete'></i></button>
                `;
                return btn;
            }
          }
      ]
    });

    function modal_cetak(el) {
      $(".cetak").modal('show');
      $("#id_barcode").val($(el).data("id"));
      $(".form-cetak").attr('action', '<?= base_url() ?>cetak-barcode/' + $(el).data("id"));
    }
    
    refresh();
    function refresh(){
      $('#txt_nama').val('');
      $('#txt_foto').val('');
      $('#txt_kategori').val('');
      $('#txt_kandungan').val('');
      $('#txt_tempat').val('');
      $("#myModalLabel").html('Tambah Data');
      $("#bloktombol").html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>&nbsp<button type="button" class="btn btn-primary"  onclick="tambah()">Simpan</button>');  
    }

    function buat_barcode() {
      // var rnd = Math.floor(Math.random() * 1000000000);
      // $('#barcode').val(rnd);
      $.ajax({
        url   : '<?php echo base_url() ;?>produk/get_barcode',
        type  :"post",
        processData : false,
        contentType : false,
        cache       : false,
        async       : false,
        success: (response) => {
          $('#barcode').val(response);
        }
      })
    }
    
    $('#submit').submit(function (e) {
      e.preventDefault();
      $.ajax({
        url   : '<?php echo base_url() ;?>Produk/tambahproduk',
        type  :"post",
        data  : new FormData(this),
        processData : false,
        contentType : false,
        cache       : false,
        async       : false,
        success: (response) => {
          if (response.status == "success") {
            swal({
                position: 'top-end',
                type: 'success',
                title: 'Data Berhasil Disimpan',
                showConfirmButton: false,
                timer: 1500
            }).then(
                function () {
                  location.reload();
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
              text: response.message,
              type: "warning",
              dangerMode: true,
            })
          }
        },
        error: function (response) {
          swal({
            title: "PERINGATAN",
            text: response.message_default,
            type: "warning",
            dangerMode: true,
          })
        }
      });
    });


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
          url: "<?php echo base_url();?>Produk/hapusproduk",
          method: "POST",
          data: {kode: a},
          cache: "false",
          success: function(x){
            if(x == 1){
              swal({title: 'Berhasil', text: 'Data Produk Berhasil di Hapus', type: 'success'});
              // refresh();
              produk.ajax.reload();
            }else{
              swal({title: 'Gagal', text: 'Ada Masalah dengan Proses Pengahapusan !', type: 'error'});
            }
          }
        })


      })
    }

    function edit(el){
      $(".edit").modal('show');
      var edit_harga_beli = document.getElementById("edit_harga_beli");
      edit_harga_beli.addEventListener("keyup", function (e) {
          edit_harga_beli.value = formatRupiah(this.value, "Rp. ");
      });

      var edit_harga_jual = document.getElementById("edit_harga_jual");
      edit_harga_jual.addEventListener("keyup", function (e) {
          edit_harga_jual.value = formatRupiah(this.value, "Rp. ");
      });
      $(".modal #id").val($(el).data("id"));
      if ($(el).data("barcode") == null) {
        var code = $(el).data("kodeproduk");
      }else{
        var code = $(el).data("barcode");
      }
      $('.modal #kode_produk').val(code);
      $('.modal #edit_txt_nama').val($(el).data("nama"));
      $('.modal #edit_harga_beli').val($(el).data("beli"));
      $('.modal #edit_harga_jual').val($(el).data("jual"));
      $('.modal #edit_txt_stock').val($(el).data("stock"));
      
      $('.modal #edit_txt_kandungan').val($(el).data("kandungan"));
      
      $("#txt_kategori_edit").empty();
      $.getJSON("<?php echo base_url(); ?>produk/tampilkategori", function(result){
        $.each(result, function(i, kolom){
          if ($(el).data("kategori") == kolom.id_kategori) {
            $("#txt_kategori_edit").append('<option value="'+ kolom.id_kategori+'" selected>'+ kolom.nama_kategori+'</option>');      
          } else {
            $("#txt_kategori_edit").append('<option value="'+ kolom.id_kategori+'">'+ kolom.nama_kategori+'</option>');
          }
        });
      });
    }

    $('#edit_submit').submit(function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
          url: "<?php echo base_url();?>produk/updateproduk",
          method: "POST",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response){
            if (response != "error") {
              swal({
                type  :'success',
                title  :'Sukses',
                text  : 'Barang berhasil diupdate',
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
            }else{
              swal({
                title: "PERINGATAN",
                text: "Data gagal disimpan.",
                icon: "warning",
                dangerMode: true,
              })
            }
          }
      })
    })
    
</script>
    </body>
</html>