<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <h5 class="mb-2">Kenaikan Pangkat</h5>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-clipboard"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_otomatis WHERE status='PENGAJUAN'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Otomatis (Pengajuan)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-check"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_otomatis WHERE status='DITERIMA'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Otomatis (Terverifikasi)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan Telah Terverifikasi</span>
                    </div>
                </div>
            </div>


            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_otomatis WHERE status='SELESAI'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Otomatis (Selesai)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan Telah Selesai</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-clipboard"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_struktural WHERE status='PENGAJUAN'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Struktural (Pengajuan)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-check"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_struktural WHERE status='DITERIMA'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Struktural (Terverifikasi)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan Telah Terverifikasi</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_struktural WHERE status='SELESAI'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Struktural (Selesai)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan Telah Selesai</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-clipboard"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_fungsional WHERE status='PENGAJUAN'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Fungsional (Pengajuan)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-check"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_fungsional WHERE status='DITERIMA'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Fungsional (Terverifikasi)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan Telah Terverifikasi</span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_fungsional WHERE status='SELESAI'"); ?>
                        <span class="info-box-text">Kenaikan Pangkat Fungsional (Selesai)</span>
                        <span class="info-box-number"><?= $result->num_rows; ?> Pengajuan Telah Selesai</span>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="mb-2">Mutasi</h5>
        <div class="row">
            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-clipboard"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM mutasi_skpd WHERE status='PENGAJUAN'"); ?>
                        <span class="info-box-text">Mutasi SKPD (Pengajuan)</span>
                        <span class="info-box-number">
                            <?= $result->num_rows; ?> Pengajuan
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-check"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM mutasi_skpd WHERE status='DITERIMA'"); ?>
                        <span class="info-box-text">Mutasi SKPD (Terverifikasi)</span>
                        <span class="info-box-number">
                            <?= $result->num_rows; ?> Pengajuan Telah Terverifikasi
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                        <?php $result = $mysqli->query("SELECT * FROM mutasi_skpd WHERE status='SELESAI'"); ?>
                        <span class="info-box-text">Mutasi SKPD (Selesai)</span>
                        <span class="info-box-number">
                            <?= $result->num_rows; ?> Pengajuan Telah Selesai
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-clipboard"></i></span>

                    <div class="info-box-content">
                        <?php $masuk = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='MASUK' AND jenis_mutasi='KAB/KOTA' AND status='PENGAJUAN'"); ?>
                        <?php $keluar = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='KELUAR' AND jenis_mutasi='KAB/KOTA' AND status='PENGAJUAN'"); ?>
                        <span class="info-box-text">Mutasi Kabupaten/Kota (Pengajuan)</span>
                        <span class="info-box-number">
                            <?= $masuk->num_rows; ?> Pengajuan Masuk
                            <br>
                            <?= $keluar->num_rows; ?> Pengajuan Keluar
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-check"></i></span>

                    <div class="info-box-content">
                        <?php $masuk = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='MASUK' AND jenis_mutasi='KAB/KOTA' AND status='DITERIMA'"); ?>
                        <?php $keluar = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='KELUAR' AND jenis_mutasi='KAB/KOTA' AND status='DITERIMA'"); ?>
                        <span class="info-box-text">Mutasi Kabupaten/Kota (Terverifikasi)</span>
                        <span class="info-box-number">
                            <?= $masuk->num_rows; ?> Pengajuan Masuk Telah Terverifikasi
                            <br>
                            <?= $keluar->num_rows; ?> Pengajuan Keluar Telah Terverifikasi
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                        <?php $masuk = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='MASUK' AND jenis_mutasi='KAB/KOTA' AND status='SELESAI'"); ?>
                        <?php $keluar = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='KELUAR' AND jenis_mutasi='KAB/KOTA' AND status='SELESAI'"); ?>
                        <span class="info-box-text">Mutasi Kabupaten/Kota (Selesai)</span>
                        <span class="info-box-number">
                            <?= $masuk->num_rows; ?> Pengajuan Masuk Telah Selesai
                            <br>
                            <?= $keluar->num_rows; ?> Pengajuan Keluar Telah Selesai
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-clipboard"></i></span>

                    <div class="info-box-content">
                        <?php $masuk = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='MASUK' AND jenis_mutasi='PROVINSI' AND status='PENGAJUAN'"); ?>
                        <?php $keluar = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='KELUAR' AND jenis_mutasi='PROVINSI' AND status='PENGAJUAN'"); ?>
                        <span class="info-box-text">Mutasi Provinsi (Pengajuan)</span>
                        <span class="info-box-number">
                            <?= $masuk->num_rows; ?> Pengajuan Masuk
                            <br>
                            <?= $keluar->num_rows; ?> Pengajuan Keluar
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-check"></i></span>

                    <div class="info-box-content">
                        <?php $masuk = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='MASUK' AND jenis_mutasi='PROVINSI' AND status='DITERIMA'"); ?>
                        <?php $keluar = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='KELUAR' AND jenis_mutasi='PROVINSI' AND status='DITERIMA'"); ?>
                        <span class="info-box-text">Mutasi Provinsi (Terverifikasi)</span>
                        <span class="info-box-number">
                            <?= $masuk->num_rows; ?> Pengajuan Masuk Telah Terverifikasi
                            <br>
                            <?= $keluar->num_rows; ?> Pengajuan Keluar Telah Terverifikasi
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-check-double"></i></span>

                    <div class="info-box-content">
                        <?php $masuk = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='MASUK' AND jenis_mutasi='PROVINSI' AND status='SELESAI'"); ?>
                        <?php $keluar = $mysqli->query("SELECT * FROM mutasi WHERE tujuan_mutasi='KELUAR' AND jenis_mutasi='PROVINSI' AND status='SELESAI'"); ?>
                        <span class="info-box-text">Mutasi Provinsi (Selesai)</span>
                        <span class="info-box-number">
                            <?= $masuk->num_rows; ?> Pengajuan Masuk Telah Selesai
                            <br>
                            <?= $keluar->num_rows; ?> Pengajuan Keluar Telah Selesai
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>