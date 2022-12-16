<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <a class="btn btn-primary" href="<?= base_url('transaksi/transaksi_keluar'); ?>"><i class="fas fa-fw fa-plus"></i> Transaksi Baru</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Transaksi</th>
                            <th class="text-center">Nama Obat</th>
                            <th class="text-center">Tanggal Keluar</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($keluar as $k) : ?>
                            <tr>
                                <td scope="row" class="text-center"><?= $no++; ?></td>
                                <td><?= $k['kode_keluar']; ?></td>
                                <td><?= $k['nama_obat']; ?></td>
                                <td><?= $k['tgl_keluar']; ?></td>
                                <td>Rp.<?= $k['subtotal']; ?></td>
                                <td class="text-center">
                                    <a href="<?=base_url('transaksi/detail_tk/' . $k['id_keluar']);?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i> Detail</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->