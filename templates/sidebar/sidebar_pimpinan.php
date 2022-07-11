<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img style="width: 55px; height: 55px;" src="<?= $_SESSION['gambar'] == "" ? "assets/img/user2-160x160.jpg" : $_SESSION['gambar'] ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= isset($_SESSION['nama']) ? $_SESSION['nama'] : "Unknown" ?></a>
                <a href="#" class="d-block"><?= $_SESSION['status']; ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="?page=dashboard" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "dashboard") ? "active" : "")  : "active" ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">PENGAJUAN</li>
                <li class="nav-item <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['otomatis', 'struktural', 'fungsional'])) ? "menu-open" : "")  : "" ?>">
                    <a href="#" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['otomatis', 'struktural', 'fungsional'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-level-up-alt"></i>
                        <p>
                            Kenaikan Pangkat
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=otomatis" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "otomatis") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Otomatis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=struktural" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "struktural") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Struktural</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=fungsional" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "fungsional") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Fungsional</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['skpd', 'kab-kota_masuk', 'kab-kota_keluar', 'provinsi_masuk', 'provinsi_keluar'])) ? "menu-open" : "")  : "" ?>">
                    <a href="#" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['skpd', 'kab-kota_masuk', 'kab-kota_keluar', 'provinsi_masuk', 'provinsi_keluar'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-exchange-alt"></i>
                        <p>
                            Mutasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=skpd" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "skpd") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>SKPD</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=kab-kota_masuk" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "kab-kota_masuk") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kab/Kota Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=kab-kota_keluar" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "kab-kota_keluar") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kab/Kota Keluar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=provinsi_masuk" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "provinsi_masuk") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Provinsi Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=provinsi_keluar" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] === "provinsi_keluar") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Provinsi Keluar</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">