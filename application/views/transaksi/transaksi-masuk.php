<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body mt-2">
            <form action="<?= base_url('transaksi/transaksi_masuk_tambah') ?>" method="POST">
                <div class="row">
                    <div class="form-group col">
                        <label>Kode Transaksi</label>
                        <?php $token = base64_encode(random_bytes(6)); ?>
                        <input type="text" class="form-control" name="kode_masuk" value="<?= $token; ?>" readonly>
                    </div>
                    <div class="form-group col">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tgl_masuk">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Nama Suplier</label>
                        <select class="form-control" name="nama_suplier">
                            <option value="">- Pilih Suplier -</option>
                            <?php foreach ($suplier as $s) : ?>
                                <option value="<?= $s['suplier']; ?>"><?= $s['suplier']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label>Obat</label>
                        <select class="form-control" name="nama_obat">
                            <option value="">- Pilih Obat -</option>
                            <?php foreach ($obat as $o) : ?>
                                <option value="<?= $o['obat']; ?>"><?= $o['obat']; ?> | <?= $o['kategori_obat']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group col">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah">
                    </div>
                </div>
                <p class="border-bottom"></p>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Simpan</button>
                    <a href="<?= base_url('transaksi/masuk'); ?>" class="btn btn-danger"><i class="fas fa-fw fa-times"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->