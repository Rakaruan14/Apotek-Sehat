<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

    <?= $this->session->flashdata('pesan') ?>

    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <button data-toggle="modal" data-target="#tambahobat" class="btn btn-primary"><i class="fas fa-fw fa-plus"></i> Tambah Data Obat</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Jenis</th>
                            <th class="text-center">Satuan</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($obat as $o) : ?>
                            <tr>
                                <td scope="row" class="text-center"><?= $no++; ?></td>
                                <td><?= $o['obat']; ?></td>
                                <td><?= $o['kategori_obat']; ?></td>
                                <td><?= $o['jenis_obat']; ?></td>
                                <td><?= $o['satuan_obat']; ?></td>
                                <td><?= $o['stok']; ?></td>
                                <td class="text-center">
                                    <button data-toggle="modal" data-target="#editobat<?= $o['id_obat']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i></button>
                                    <a href="<?= base_url('master/delete_obat/' . $o['id_obat']); ?>" data-toggle="#ModalHapus" onclick="return confirm('Apakah anda yakin akan menghapus Data Obat <?= $o['obat'] ?> ?');" class="btn btn-danger btn-sm"><i class="fas fa-fw fa-trash"></i></a>
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
<?php foreach ($obat as $o) : ?>
    <div class="modal fade" id="tambahobat" tabindex="-1" aria-labelledby="tambahModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModal">Tambah Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/tambah_obat'); ?>" method="POST">
                        <div class="row">
                            <div class="form-group col">
                                <label>Kode Obat</label>
                                <?php $token = base64_encode(random_bytes(6)); ?>
                                <input type="text" class="form-control" name="kode_obat" value="<?= $token; ?>" readonly>
                            </div>
                            <div class="form-group col">
                                <label>Kategori Obat</label>
                                <select class="form-control" name="kategori_obat">
                                    <option value="">- Pilih Kategori -</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['kategori']; ?>"><?= $k['kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Jenis Obat</label>
                                <select class="form-control" name="jenis_obat">
                                    <option value="">- Pilih Jenis -</option>
                                    <?php foreach ($jenis as $j) : ?>
                                        <option value="<?= $j['jenis']; ?>"><?= $j['jenis']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label>Satuan Obat</label>
                                <select class="form-control" name="satuan_obat">
                                    <option value="">- Pilih Satuan -</option>
                                    <?php foreach ($satuan as $s) : ?>
                                        <option value="<?= $s['satuan']; ?>"><?= $s['satuan']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama Obat</label>
                            <input type="text" class="form-control" name="obat" placeholder="Contoh : DECADRYL EKSPEKTORAN SIRUP 120mL">
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <input type="text" class="form-control" name="brand" placeholder="Contoh : Harsen">
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Dosis</label>
                                <input type="text" class="form-control" name="dosis" placeholder="Contoh : 3x1Hari">
                            </div>
                            <div class="form-group col">
                                <label>Kemasan</label>
                                <input type="text" class="form-control" name="kemasan" placeholder="Contoh : Sirup 120mL x 1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Harga Beli</label>
                                <input type="number" class="form-control" name="hrg_beli" placeholder="0">
                            </div>
                            <div class="form-group col">
                                <label>Harga Jual</label>
                                <input type="number" class="form-control" name="hrg_jual" placeholder="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Indikasi</label>
                            <textarea class="form-control" id="indikasi" name="indikasi" placeholder="Contoh : Batuk, pilek, asma, sesak nafas, gangguan perut"></textarea>
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

    <div class="modal fade" id="editobat<?= $o['id_obat']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('master/edit_obat/' . $o['id_obat']); ?>" method="POST">
                        <div class="row">
                            <div class="form-group col">
                                <label>Kode Obat</label>
                                <input type="text" class="form-control" name="kode_obat" value="<?= $o['kode_obat']; ?>" readonly>
                            </div>
                            <div class="form-group col">
                                <label>Stok</label>
                                <input type="text" class="form-control" name="stok" value="<?= $o['stok']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Nama Obat</label>
                                <input type="text" class="form-control" name="obat" value="<?= $o['obat']; ?>">
                            </div>
                            <div class="form-group col">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori_obat">
                                    <option value="<?= $o['kategori_obat']; ?>"><?= $o['kategori_obat']; ?></option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['kategori']; ?>"><?= $k['kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Jenis</label>
                                <select class="form-control" name="jenis_obat">
                                    <option value="<?= $o['jenis_obat']; ?>"><?= $o['jenis_obat']; ?></option>
                                    <?php foreach ($jenis as $j) : ?>
                                        <option value="<?= $j['jenis']; ?>"><?= $j['jenis']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label>Satuan</label>
                                <select class="form-control" name="satuan_obat">
                                    <option value="<?= $o['satuan_obat']; ?>"><?= $o['satuan_obat']; ?></option>
                                    <?php foreach ($satuan as $s) : ?>
                                        <option value="<?= $s['satuan']; ?>"><?= $s['satuan']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Harga Beli</label>
                                <input type="number" class="form-control" name="hrg_beli" value="<?= $o['hrg_beli']; ?>">
                            </div>
                            <div class="form-group col">
                                <label>Harga Jual</label>
                                <input type="number" class="form-control" name="hrg_jual" value="<?= $o['hrg_jual']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Brand</label>
                                <input type="text" class="form-control" name="brand" value="<?= $o['brand']; ?>">
                            </div>
                            <div class="form-group col">
                                <label>Kemasan</label>
                                <input type="text" class="form-control" name="kemasan" value="<?= $o['kemasan']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label>Dosis</label>
                                <input type="text" class="form-control" name="dosis" value="<?= $o['dosis']; ?>">
                            </div>
                            <div class="form-group col">
                                <label>Indikasi</label>
                                <textarea type="text" class="form-control" name="indikasi" value="<?= $o['indikasi']; ?>"><?= $o['indikasi']; ?></textarea>
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