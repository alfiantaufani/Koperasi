<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box table-responsive">
                        <h4 class="mt-3 mb-4 header-title">Retur Pembelian</h4> 
                        <a href="<?= base_url()?>pembelian/create" class="btn btn-info mb-4"> Cari Nota</a>
                        <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap" cellspacing="0" width="100%" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Pembelian</th>
                                    <th>Total Pembelian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 
                                <tr>
                                    <td>1</td>
                                    <td>21 Maret 2021</td>
                                    <td>40.000</td>
                                    <td>
                                        <button type='button' class='btn btn-warning btn-sm' data-id='`+row.id_produk+`' data-nama='`+row.nama_produk+`' data-beli='`+row.harga_beli+`' data-jual='`+row.harga_jual+`' data-kategori='`+row.nama_kategori+`' data-kandungan='`+row.kandungan_produk+`' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button>
                                        <button type='button' class='btn btn-danger btn-sm' onclick='hapus(`+row.id_produk+`);'><i class='mdi mdi-delete'></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>22 Maret 2021</td>
                                    <td>56.200</td>
                                    <td>
                                        <button type='button' class='btn btn-warning btn-sm' data-id='`+row.id_produk+`' data-nama='`+row.nama_produk+`' data-beli='`+row.harga_beli+`' data-jual='`+row.harga_jual+`' data-kategori='`+row.nama_kategori+`' data-kandungan='`+row.kandungan_produk+`' onclick='edit(this)'> <i class='mdi mdi-pencil'></i></button>
                                        <button type='button' class='btn btn-danger btn-sm' onclick='hapus(`+row.id_produk+`);'><i class='mdi mdi-delete'></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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