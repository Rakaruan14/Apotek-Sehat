<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button data-toggle="modal" data-target="#tambahjenis" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Jenis Obat</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Jenis</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jenis as $j) : ?>
                            <tr>
                                <td scope="row" class="text-center"><?= $no++; ?></td>
                                <td><?= $j['jenis']; ?></td>
                                <td class="text-center">
                                    <button data-toggle="modal" data-target="#editjenis<?= $j['id_jenis']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></button>
                                    <a href="<?= base_url('master/delete_jenis/' . $j['id_jenis']); ?>" data-toggle="#ModalHapus" onclick="return confirm('Apakah anda yakin akan menghapus Data Jenis <?= $j['jenis'] ?> ?');" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
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

<!-- Modal Edit -->
<?php foreach ($jenis as $j) : ?>
    <div class="modal fade" id="tambahjenis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jenis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/tambah_jenis'); ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Jenis Obat</label>
                            <input type="text" class="form-control" name="jenis">
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

    <div class="modal fade" id="editjenis<?= $j['id_jenis']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Jenis</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/edit_jenis/' . $j['id_jenis']); ?>" method="POST">
                        <div class="form-group">
                            <label>Nama Jenis Obat</label>
                            <input type="text" class="form-control" name="jenis" value="<?= $j['jenis']; ?>">
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