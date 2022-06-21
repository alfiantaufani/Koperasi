<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="mb-3 header-title">Tambah Produk Kadaluwarsa</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <form action="<?= base_url() ?>keranjang-kadaluwarsa/update_qty" method="post">
                                    <div class="table-responsive">
                                        <table id="tbl_keranjang" class="table table-bordered table-striped" cellspacing="0" width="100%" style="margin-top: 28px">
                                            <thead>
                                                <tr>
                                                    <th width="20%">Barcode</th>
                                                    <th width="35%">Produk</th>
                                                    <th width="10%">Qty</th>
                                                    <th width="20%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="ml-auto mr-2 mt-2">
                                            <button type="submit" class="btn btn-primary btn-lg">Cek Total Barang </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form method="post" action="<?= base_url() ?>kadaluwarsa/store" class="mt-0">
                                    <?php if (isset($_GET['cek']) == true) { ?>
                                        <?php foreach ($keranjang as $hidden) { ?>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <h3><?= $hidden->nama_produk ?></h3>
                                                </div>
                                                <div class="float-right">
                                                    <h3>
                                                        <strong> <?= $hidden->qty ?>x</strong>
                                                    </h3>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_keranjang[]" id="id_keranjang" value="<?= $hidden->id ?>">
                                            <input type="hidden" name="id_produk[]" id="id_produk" value="<?= $hidden->id_produk ?>">
                                            <input type="hidden" name="nama[]" id="nama" value="<?= $hidden->nama_produk ?>">
                                            <input type="hidden" name="qty_new[]" id="qty_new" value="<?= $hidden->qty ?>">
                                        <?php } ?>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Produk Kadaluwarsa <i class="mdi mdi-credit-card"></i></button>

                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    $(document).ready(function() {
        var tbl_keranjang = $('#tbl_keranjang').DataTable({
            processing: true,
            destroy: true,
            scrollX: true,
            language: {
                processing: "Memuat..."
            },
            serverSide: true,
            ajax: {
                url: "<?= base_url() ?>kadaluwarsa/show",
                type: 'GET'
            },
            columns: [
                {
                    data: 'barcode',
                    name: 'barcode',
                    searchable: true
                },
                {
                    data: 'nama_produk',
                    name: 'nama_produk',
                    searchable: true
                },
                {
                    width: '20%',
                    render: function(data, type, row) {
                        result = `
                            <input type="hidden" name="id[]" id="id" class="form-control" value="` + row.id + `">
                            <input type="number" class="form-control" min="1" name="qty[]" id="qty" value="` + row.qty + `" autofocus required>
                            
                            
                        `;
                        return result;
                    }
                },
                {
                    render: function(data, type, row) {
                        var btn = `
                            <button type="button" data-id="` + row.id + `" onclick="hapus_cart(this)" class="btn btn-danger btn-xs">Hapus</button>
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
            $('#tbl_keranjang').DataTable().ajax.reload();
        });

        $('#tbl_keranjang').on('click', 'tbody td .harga_beli', function() {
            const rowData = tbl_keranjang.row($(this).closest('tr')).data();
            $('.edit_harga_beli').modal('show');
            $('#edit_nama_produk').val(rowData.nama_produk);
            $('#edit_harga_beli').val(rowData.harga_beli);
            $('#edit_id').val(rowData.id_produk);
        });
    });

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
        $('#nama_produk').val($(el).data("nama"));
        $('#harga_beli').val($(el).data("harga"));
    }

    $('#add_pembelian').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

    })

    function hapus_cart(el) {
        var id = $(el).data('id');
        swal({
            title: 'Peringatan',
            text: "Apakah Anda Ingin Menghapus?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
        }).then(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>keranjang-kadaluwarsa/delete",
                method: "POST",
                data: {
                    id: id
                },
                cache: "false",
                success: function(response) {
                    if (response == "success") {
                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: 'Data Berhasil Dihapus',
                            showConfirmButton: true,
                            timer: 1500
                        }).then(
                            function() {
                                window.location.href = "<?= base_url("kadaluwarsa/create") ?>";
                            },
                            function(dismiss) {
                                if (dismiss === 'timer') {
                                    window.location.href = "<?= base_url("kadaluwarsa/create") ?>";
                                }
                            }
                        )
                    } else {
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

    <?php if (isset($_SESSION['notif']) && $_SESSION['notif'] !== '') : ?>
        swal({
            type: "<?php echo $_SESSION['notif']['status']; ?>",
            title: "<?php echo $_SESSION['notif']['status']; ?>",
            text: "<?php echo $_SESSION['notif']['message']; ?>",
            showCancelButton: false,
            timer: 1000,
        }).then(
            function() {
                location.reload();
            },
            function(dismiss) {
                if (dismiss === 'timer') {
                    location.reload();
                }
            }
        );
    <?php endif; ?>
</script>