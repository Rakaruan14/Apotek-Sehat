<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <div class="card col-lg-6">
        <div class="card-body">
    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('menu/ubahpassword'); ?>" method="POST">
                <div class="form-group">
                    <label for="password_lama">Password Lama</label>
                    <input type="password" class="form-control" id="password_lama" name="password_lama">
                    <?= form_error('password_lama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password_baru">Password Baru</label>
                    <input type="password" class="form-control" id="password_baru" name="password_baru">
                    <?= form_error('password_baru', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="password_konfirmasi">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password_konfirmasi" name="password_konfirmasi">
                    <?= form_error('password_konfirmasi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->