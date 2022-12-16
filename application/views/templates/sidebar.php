<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dashboard'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-prescription-bottle-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Apotek Sehat</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <style>
        .aktif {
            color: white;
            font-weight: 800;
        }
    </style>

    <!-- QUERY MENU -->
    <!-- Nav Item - Dashboard -->
    <li class="nav-item warna">
        <a class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') echo 'aktif'; ?>" href="<?= base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Admin -->
    <?php if ($user['role_id'] == 1) : { ?>
            <li class="nav-item">
                <a class="nav-link collapsed <?php if ($this->uri->segment(1) == 'master') echo 'aktif'; ?>" href="#" data-toggle="collapse" data-target="#collapseMasterData" aria-expanded="true" aria-controls="collapseMasterData">
                    <i class="fas fa-fw fa-th-large"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseMasterData" class="collapse" aria-labelledby="headingMasterData" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Master Data:</h6>
                        <a class="collapse-item" href="<?= base_url('master/satuan'); ?>">Data Satuan</a>
                        <a class="collapse-item" href="<?= base_url('master/jenis'); ?>">Data Jenis</a>
                        <a class="collapse-item" href="<?= base_url('master/kategori'); ?>">Data Kategori</a>
                        <a class="collapse-item" href="<?= base_url('master/obat'); ?>">Data Obat</a>
                        <a class="collapse-item" href="<?= base_url('master/suplier'); ?>">Data Suplier</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed <?php if ($this->uri->segment(1) == 'transaksi') echo 'aktif'; ?>" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Transaksi:</h6>
                        <a class="collapse-item" href="<?= base_url('transaksi/masuk'); ?>">Obat Masuk</a>
                        <a class="collapse-item" href="<?= base_url('transaksi/keluar'); ?>">Obat Keluar</a>
                    </div>
                </div>
            </li>
        <?php } ?>
    <?php endif ?>

    <!-- Nav Item - Manager -->
    <?php if ($user['role_id'] == 2) : { ?>
            <li class="nav-item">
                <a class="nav-link <?php if ($this->uri->segment(1) == 'manajemenuser') echo 'aktif'; ?>" href="<?= base_url('manajemenuser'); ?>">
                    <i class="fas fa-fw fa-user-tie"></i>
                    <span>Manajemen User</span>
                </a>
            </li>
        <?php } ?>
    <?php endif ?>

    <!-- Nav Item - Laporan -->
    <li class="nav-item">
        <a class="nav-link <?php if ($this->uri->segment(1) == 'laporan') echo 'aktif'; ?>" href="<?= base_url('laporan'); ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
    </li>

    <!-- Nav Item - Pengaturan -->
    <?php if ($user['role_id'] == 2) : { ?>
            <li class="nav-item">
                <a class="nav-link <?php if ($this->uri->segment(1) == 'pengaturan') echo 'aktif'; ?>" href="<?= base_url('pengaturan'); ?>">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
        <?php } ?>
    <?php endif ?>

    <!-- Nav Item - Keluar -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->