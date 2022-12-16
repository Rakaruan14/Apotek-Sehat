<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <a class="btn btn-primary" href="<?=base_url('transaksi/transaksi_masuk');?>"><i class="fas fa-fw fa-plus"></i> Transaksi Baru</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Kode Transaksi</th>
                            <th class="text-center">Nama Suplier</th>
                            <th class="text-center">Tanggal Masuk</th>
                            <th class="text-center">Total Belanja</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($masuk as $m) : ?>
                            <tr>
                                <td scope="row" class="text-center"><?= $no++; ?></td>
                                <td><?= $m['kode_masuk']; ?></td>
                                <td><?= $m['nama_suplier']; ?></td>
                                <td><?= $m['tgl_masuk']; ?></td>
                                <td>Rp.<?= $m['subtotal']; ?></td>
                                <td class="text-center">
                                    <a href="<?=base_url('transaksi/detail_tm/' . $m['id_masuk']);?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-eye"></i> Detail</a>
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