<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button data-toggle="modal" data-target="#tambahsatuan" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Satuan Obat</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Satuan</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($satuan as $s) : ?>
                            <tr>
                                <td scope="row" class="text-center"><?= $no++; ?></td>
                                <td><?= $s['satuan']; ?></td>
                                <td class="text-center">
                                    <button data-toggle="modal" data-target="#editsatuan<?= $s['id_satuan']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></button>
                                    <a href="<?= base_url('master/delete_satuan/' . $s['id_satuan']); ?>" data-toggle="#ModalHapus" onclick="return confirm('Apakah anda yakin akan menghapus Data Satuan <?= $s['satuan'] ?> ?');" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
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

<!-- Modal Edit -->
<?php foreach ($satuan as $s) : ?>
    <div class="modal fade" id="tambahsatuan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Satuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/tambah_satuan'); ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Satuan Obat</label>
                            <input type="text" class="form-control" name="satuan">
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editsatuan<?= $s['id_satuan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Satuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/edit_satuan/' . $s['id_satuan']); ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Satuan Obat</label>
                            <input type="text" class="form-control" name="satuan" value="<?= $s['satuan']; ?>">
                            <?= form_error('satuan', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

</div>
<!-- End of Main Content -->