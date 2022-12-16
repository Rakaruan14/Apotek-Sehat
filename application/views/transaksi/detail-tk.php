<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <a class="btn btn-warning" href="<?= base_url('transaksi/keluar'); ?>"><i class="fas fa-fw fa-chevron-left"></i> Keluar</a>
            </div>
            <div class="mb-4">
                <hr>
                <p><span class="font-weight-bold">Kode Transaksi</span> : <?= $ok['kode_keluar']; ?></p>
                <hr>
                <p><span class="font-weight-bold">Tanggal Keluar</span> : <?= $ok['tgl_keluar']; ?></p>
                <hr>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Obat</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Jenis</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row" class="text-center">1</td>
                            <td><?= $ok['nama_obat']; ?></td>
                            <td><?= $ok['kategori_obat']; ?></td>
                            <td><?= $ok['jenis_obat']; ?></td>
                            <td><?= $ok['satuan_obat']; ?></td>
                            <td><?= $ok['jumlah']; ?></td>
                            <td>Rp.<?= $ok['harga_jual']; ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="font-weight-bold">
                            <td class="text-center" colspan="6">TOTAL</td>
                            <td>Rp.<?= $ok['subtotal']; ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->