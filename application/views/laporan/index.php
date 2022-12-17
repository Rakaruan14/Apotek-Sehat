<!-- Begin Page Content -->
<style>
    .bayangan:hover {
        box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
    }
</style>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 font-weight-bold"><?= $title ?></h1>

            <!-- Laporan Data Obat -->
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header text-center">
                        <h5 class="card-title font-weight-bold text-primary my-auto">Laporan Data Obat</h5>
                    </div>
                    <div class="card-body">
                        <div class="card bayangan col-lg-6 mx-auto">
                            <div class="card-body col">
                                <h5 class="card-title font-weight-bold text-center">Laporan Semua Data Obat</h5>
                                <p class="border-top"></p>
                                <div class="text-center">
                                    <a href="<?= base_url('laporan/cetak_obat'); ?>" class="btn btn-primary btn-block"><i class="fas fa-fw fa-print"></i> Cetak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Laporan Transaksi -->
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <div class="card-header text-center">
                        <h5 class="card-title font-weight-bold text-primary my-auto">Laporan Transaksi</h5>
                    </div>
                    <div class="row">
                        <div class="card-body">
                            <div class="card bayangan col-lg mx-auto">
                                <div class="card-body col">
                                    <h5 class="card-title font-weight-bold text-center">Laporan Transaksi Obat Masuk</h5>
                                    <p class="border-top"></p>
                                    <div class="text-center">
                                        <a href="<?= base_url('laporan/cetak_obm'); ?>" class="btn btn-primary btn-block"><i class="fas fa-fw fa-print"></i> Cetak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card bayangan col-lg mx-auto">
                                <div class="card-body col">
                                    <h5 class="card-title font-weight-bold text-center">Laporan Transaksi Obat Keluar</h5>
                                    <p class="border-top"></p>
                                    <div class="text-center">
                                        <a href="<?= base_url('laporan/cetak_obk'); ?>" class="btn btn-primary btn-block"><i class="fas fa-fw fa-print"></i> Cetak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->