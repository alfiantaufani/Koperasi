<?php
$total = 0;
foreach ($totals as $key => $v) {
    $total += $v['total'];
}
?>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success fade show mb-2">
                        <h4 class="alert-link">Penting!</h4>
                        <p>
                            Pembelian dilakukan ketika data produk sudah tersedia di <a href="<?= base_url('produk') ?>" class="alert-link"><b>Data Produk</b></a>.
                        </p>
                    </div>
                    <div class="card-box table-responsive">
                        <h4 class="mb-3 header-title">Pembelian</h4>
                        <div class="row">
                            <!-- <div class="col-md-4">
                                <form id="add_pembelian">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Barcode</label>
                                        <div class="input-group">
                                            <input type="text" id="barcode" disabled class="form-control" placeholder="Masukkan Barcode">
                                            <div class="input-group-append">
                                                <button class="btn btn-purple waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">PILIH PRODUK TERSEDIA</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan nama Produk" disabled required>
                                        <input type="hidden" name="id" id="id">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Harga Beli</label>
                                                <input type="number" class="form-control" id="" name="harga_beli" placeholder="Harga Beli" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Jumlah Pembelian</label>
                                                <input type="number" class="form-control" id="qty" name="qty" placeholder="Jumlah Pembelian" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select name="supplier" id="supplier" class="form-control">
                                            <option disabled selected>-- Pilih --</option>
                                            <?php foreach ($supplier as $key) : ?>
                                                <option value="<?= $key->id_tempat_produksi ?>"><?= $key->nama_tempat_produksi ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-purple btn-block">Tambahkan <i class="mdi mdi-cart-arrow-right"></i></button>
                                </form>
                            </div> -->
                            <div class="col-md-8">
                                <form action="<?= base_url() ?>keranjang-pembelian/update_qty" method="post">
                                    <div class="table-responsive">
                                        <table id="tbl_keranjang" class="table table-bordered table-striped" cellspacing="0" width="100%" style="margin-top: 28px">
                                            <thead>
                                                <tr>
                                                    <th width="35%">Produk</th>
                                                    <th width="15%">Harga Beli</th>
                                                    <th width="10%">Qty</th>
                                                    <th width="10%">Supplier</th>
                                                    <th width="20%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="ml-auto mr-2 mt-2">
                                            <button type="submit" class="btn btn-primary btn-lg">Cek Total Pembelian </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-4">
                                <form method="post" action="<?= base_url() ?>pembelian/store" class="mt-0">
                                    <?php if (isset($_GET['cek']) == true) { ?>
                                        <?php foreach ($keranjang as $hidden) { ?>
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <p><?= $hidden->nama_produk ?> | <?= $hidden->qty ?>x</p>
                                                </div>
                                                <div class="float-right">
                                                    <p>
                                                        <strong>Rp. <?= number_format($hidden->harga_beli) ?></strong>
                                                    </p>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_keranjang[]" id="id_keranjang" value="<?= $hidden->id ?>">
                                            <input type="hidden" name="id_produk[]" id="id_produk" value="<?= $hidden->id_produk ?>">
                                            <input type="hidden" name="nama[]" id="nama" value="<?= $hidden->nama_produk ?>">
                                            <input type="hidden" name="qty_new[]" id="qty_new" value="<?= $hidden->qty ?>">
                                            <input type="hidden" name="harga_asli[]" id="harga_asli" value="<?= $hidden->harga_beli ?>">
                                            <input type="hidden" name="id_supplier[]" id="id_supplier" value="<?= $hidden->id_supplier ?>">
                                        <?php } ?>

                                        <input type="hidden" name="simpan_nominal" value="<?= $total ?>">

                                        <div class="card text-white bg-info">
                                            <div class="card-body">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h3 class="text-white">Total : </h3>
                                                    </div>
                                                    <div class="float-right">
                                                        <h3 class="text-white">
                                                            <strong>Rp. <?= number_format($total) ?></strong>
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Simpan Pembelian <i class="mdi mdi-credit-card"></i></button>

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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myExtraLargeModalLabel">PILIH PRODUK</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="search-box float-right">
                        <input placeholder="Cari Produk disini..." id="cari" class="form-control">
                    </div>
                    <table id="responsive-datatable" class="table dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="padding-top: 25px !important;"> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($produk as $value) : ?>
                                <tr>
                                    <td class="list-group-item">
                                        <a href="#" data-dismiss="modal" class="user-list-item" data-id="<?= $value->id_produk ?>" data-kodeproduk="<?= $value->kode_produk ?>" data-nama="<?= $value->nama_produk ?>" data-harga="<?= $value->harga_beli ?>" data-stock="<?= $value->stock ?>" onclick="get_produk(this)">
                                            <div class="user-desc">
                                                <h5 class="name mt-0 mb-1"><?= $value->nama_produk ?></h5>
                                                <p class="desc text-muted mb-0 font-12">Stock <?= $value->stock ?> - Harga jual Rp. <?= number_format($value->harga_beli) ?> <?= $value->stock == 0 ? '<span class="badge badge-danger">Stock habis</span>' : '' ?> </p>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade edit_harga_beli" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myExtraLargeModalLabel">UBAH HARGA BELI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="update_harga">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" id="edit_nama_produk" name="edit_nama_produk" placeholder="Masukkan nama Produk" disabled required>
                        <input type="hidden" name="edit_id" id="edit_id">
                    </div>
                    <div class="form-group">
                        <label>Harga Beli</label>
                        <input type="number" class="form-control" id="edit_harga_beli" name="form_edit_harga_beli" placeholder="Masukkan Harga Beli" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
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
                url: "<?= base_url() ?>keranjang-pembelian",
                type: 'GET'
            },
            columns: [{
                    data: 'nama_produk',
                    name: 'nama_produk',
                    searchable: true
                },
                {
                    width: '20%',
                    render: function(data, type, row) {
                        result = `
                            <input type="number" class="form-control harga_beli" id="" name="harga_beli" placeholder="Harga Beli" value="` + row.harga_beli + `" required>
                        `;
                        return result;
                    }
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
                    width: '30%',
                    render: function(data, type, row) {
                        var result = `
                            <select name="supplier[]" id="supplier" class="form-control">
                                <?php foreach ($supplier as $key) : ?>
                                    <option value="<?= $key->id_tempat_produksi ?>"><?= $key->nama_tempat_produksi ?></option>
                                <?php endforeach ?>
                            </select>
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
            // alert(JSON.stringify(data));
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

    $('#update_harga').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: "<?php echo base_url(); ?>pembelian/updateharga",
            method: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                var data = JSON.parse(response);
                if (data.status == "success") {
                    swal({
                        type: 'success',
                        title: 'Sukses',
                        text: 'Barang berhasil diupdate',
                        showCancelButton: false,
                        timer: 1000,
                    }).then(
                        function() {
                            $('.edit_harga_beli').modal('hide');
                            $('#tbl_keranjang').DataTable().ajax.reload();
                        },
                        function(dismiss) {
                            if (dismiss === 'timer') {
                                $('.edit_harga_beli').modal('hide');
                                $('#tbl_keranjang').DataTable().ajax.reload();
                            }
                        }
                    );
                } else {
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
                url: "<?php echo base_url(); ?>keranjang-pembelian/delete",
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
                                window.location.href = "<?= base_url("pembelian/create") ?>";
                            },
                            function(dismiss) {
                                if (dismiss === 'timer') {
                                    window.location.href = "<?= base_url("pembelian/create") ?>";
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