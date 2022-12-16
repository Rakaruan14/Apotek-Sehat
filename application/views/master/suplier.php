<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button data-toggle="modal" data-target="#tambahsuplier" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Telepon</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($suplier as $s) : ?>
                            <tr>
                                <td scope="row" class="text-center"><?= $no++; ?></td>
                                <td><?= $s['suplier']; ?></td>
                                <td><?= $s['telepon']; ?></td>
                                <td><?= $s['alamat']; ?></td>
                                <td><?= $s['keterangan']; ?></td>
                                <td class="text-center">
                                    <button data-toggle="modal" data-target="#editsuplier<?= $s['id_suplier']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></button>
                                    <a href="<?= base_url('master/delete_suplier/' . $s['id_suplier']); ?>" data-toggle="#ModalHapus" onclick="return confirm('Apakah anda yakin akan menghapus Data Suplier <?= $s['suplier'] ?> ?');" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
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
<?php foreach ($suplier as $s) : ?>
    <div class="modal fade" id="tambahsuplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Suplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/tambah_suplier'); ?>" method="POST">
                        <div class="row">
                            <div class="form-group col">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="suplier" placeholder="Nama">
                            </div>
                            <div class="form-group col">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="telepon" placeholder="Telepon">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" placeholder="Keterangan"></textarea>
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

    <div class="modal fade" id="editsuplier<?= $s['id_suplier']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Suplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/edit_suplier/' . $s['id_suplier']); ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Suplier</label>
                            <input type="text" class="form-control" name="suplier" value="<?= $s['suplier']; ?>">
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" class="form-control" name="telepon" value="<?= $s['telepon']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $s['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" value="<?= $s['keterangan']; ?>">
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