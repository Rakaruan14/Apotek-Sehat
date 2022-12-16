<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('transaksi/transaksi_keluar_tambah'); ?>" method="POST">
                <div class="row">
                    <div class="form-group col">
                        <label>Kode Transaksi</label>
                        <?php $token = base64_encode(random_bytes(6)); ?>
                        <input type="text" class="form-control" name="kode_keluar" value="<?= $token; ?>" readonly>
                    </div>
                    <div class="form-group col">
                        <label>Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tgl_keluar">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Obat</label>
                        <select class="form-control" name="nama_obat">
                            <option value="">- Pilih Obat -</option>
                            <?php foreach ($obat as $o) : ?>
                                <option value="<?= $o['obat']; ?>"><?= $o['obat']; ?> | <?= $o['kategori_obat']; ?> | Stok: <?= $o['stok']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" name="jumlah" placeholder="Jumlah">
                    </div>
                </div>
                <p class="border-bottom"></p>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Simpan</button>
                    <a href="<?= base_url('transaksi/keluar'); ?>" class="btn btn-danger"><i class="fas fa-fw fa-times"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->