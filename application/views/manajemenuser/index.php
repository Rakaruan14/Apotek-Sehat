<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <a href="<?= base_url('manajemenuser/tambah_pengguna') ?>" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Hak Akses</th>
                            <th>Status</th>
                            <th>Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $u) : ?>


                            <tr>
                                <td scope="row" class="text-center"><?= $no++; ?></td>
                                <td class="text-center"><img width="70px" src="<?= base_url('assets/img/profile/') . $u['image']; ?>"></td>
                                <td><?= $u['name']; ?></td>
                                <td><?= $u['email']; ?></td>
                                <?php if ($u['role'] == 'Admin') : { ?>
                                        <td class="text-center"><span class="badge badge-primary"><?= $u['role']; ?></span></td>
                                    <?php } ?>
                                    <?php else : { ?>
                                        <td class="text-center"><span class="badge badge-success"><?= $u['role']; ?></span></td>
                                    <?php } ?>
                                <?php endif ?>
                                <?php if ($u['is_active'] == 1) : {
                                        $status = 'Aktif' ?>
                                        <td class="text-center"><span class="badge badge-info"><?= $status; ?></span></td>
                                    <?php } ?>
                                    <?php else : {
                                        $status = 'Tidak Aktif' ?>
                                        <td class="text-center"><span class="badge badge-danger"><?= $status; ?></span></td>
                                    <?php } ?>
                                <?php endif ?>
                                <td class="text-center">
                                    <?php if ($u['email'] == 'manager@gmail.com') : { ?>
                                <span class="badge badge-danger">Permanen</span>
                            <?php } ?>
                            <?php else : { ?>
                                <button data-toggle="modal" data-target="#edit<?= $u['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></button>
                                <a href="<?= base_url('manajemenuser/delete/' . $u['id']); ?>" data-toggle="#ModalHapus" onclick="return confirm('Apakah anda yakin akan menghapus user <?= $u['name'] ?> ?');" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
                            <?php } ?>
                        <?php endif ?>
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
<?php foreach ($users as $u) : ?>
    <div class="modal fade" id="edit<?= $u['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('manajemenuser/edit/' . $u['id']); ?>" method="POST">
                        <div class="form-group">
                            <label>Picture</label>
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $u['image'] ?>" class="img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $u['email']; ?>" readonly>
                            <?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="name" class="form-control" name="name" value="<?= $u['name']; ?>">
                            <?= form_error('name', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="hakakses">Hak Akses</label>
                            <select class="form-control" name="role_id">
                                <option value="1">Admin</option>
                                <option value="2">Manager</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" value="1" name="is_active">
                                <label class="form-check-label" checked>Active?</label>
                            </div>
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