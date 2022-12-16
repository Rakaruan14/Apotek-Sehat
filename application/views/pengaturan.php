<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card shadow mb-4">
        <div class="card-body col-lg">
            <form action="<?= base_url('pengaturan/edit'); ?>" method="POST">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <div class="col">
                                <label class="col-form-label font-weight-bold">Instansi</label>
                                <input type="text" class="form-control form-control-user" id="instansi" name="instansi" placeholder="Contoh: PT.APOTEKSEHAT" value="<?= $p['instansi']; ?>">
                                <?= form_error('instansi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <label class="col-form-label font-weight-bold">Website</label>
                                <input type="text" class="form-control form-control-user" id="website" name="website" placeholder="Contoh: https://apotek.com" value="<?= $p['website']; ?>">
                                <?= form_error('website', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <label class="col-form-label font-weight-bold">Telepon</label>
                                <input type="text" class="form-control form-control-user" id="telepon" name="telepon" placeholder="Contoh: 085111222..." value="<?= $p['telepon']; ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <div class="col">
                                <label class="col-form-label font-weight-bold">Pimpinan</label>
                                <input type="text" class="form-control form-control-user" id="pimpinan" name="pimpinan" placeholder="Contoh: Ranu Wicaksana" value="<?= $p['pimpinan']; ?>">
                                <?= form_error('pimpinan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <label class="col-form-label font-weight-bold">Email</label>
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Contoh: apotek@gmail.com" value="<?= $p['email']; ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <label class=" col-form-label font-weight-bold">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" placeholder="Contoh: Jl.Merpati Surakarta Jawa Tengah 57135"><?= $p['alamat']; ?></textarea>
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="border-top"></p>
                <div class="col">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- End of Main Content -->

</div>
<!-- End of Main Content -->