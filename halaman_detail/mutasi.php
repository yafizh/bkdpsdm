<?php
if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT mutasi.*, pegawai.nip, pegawai.nama FROM mutasi INNER JOIN pegawai ON pegawai.id=mutasi.id_pegawai WHERE mutasi.id=" . $_GET['id']);
    $data = $result->fetch_assoc();
    $dokumen1 = $data['surat_pelepasan_penerimaan'];
    $dokumen2 = $data['analisis_jabatan_dan_beban_kerja'];
    $dokumen3 = $data['surat_permohonan'];
    $dokumen4 = $data['sk_cpns_pns_kenaikan_pangkat'];
    $dokumen5 = $data['sk_jabatan_terakhir'];
    $dokumen6 = $data['izajah_terakhir'];
    $dokumen7 = $data['surat_pernyataan_bebas_hukuman'];
    $dokumen8 = $data['surat_keterangan_bebas_temuan'];
    $dokumen9 = $data['surat_pernyataan_bebas_tugas'];
    $dokumen10 = $data['skp_2_tahun_terakhir'];
    $dokumen11 = $data['nota_usul'];
    $dokumen12 = $data['sk_mutasi'];
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
}

if ($_SESSION['status'] === 'PIMPINAN') {
    if ($_GET['jenis_mutasi'] === 'MASUK') {
        if (isset($_POST['terima'])) {
            $keterangan = $_POST['keterangan_terima'];
            $q = "
            UPDATE 
                mutasi 
            SET 
                tanggal_verifikasi='" . Date("Y-m-d H:i:s") . "',
                status='DITERIMA',
                keterangan='$keterangan' 
            WHERE 
                id=" . $_GET['id'] . "
            ";
            if ($mysqli->query($q)) {
                echo "<script>alert('Berhasil menerima pengajukan mutasi');</script>";
                echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
            } else echo "Error: " . $q . "<br>" . $mysqli->error;
        }
        if (isset($_POST['tolak'])) {
            $keterangan = $_POST['keterangan_tolak'];
            $q = "
            UPDATE 
                mutasi 
            SET 
                tanggal_verifikasi='" . Date("Y-m-d H:i:s") . "',
                status='DITOLAK',
                keterangan='$keterangan' 
            WHERE 
                id=" . $_GET['id'] . "
        ";
            if ($mysqli->query($q)) {
                echo "<script>alert('Berhasil menolak pengajukan mutasi');</script>";
                echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
            } else echo "Error: " . $q . "<br>" . $mysqli->error;
        }
    } elseif ($_GET['jenis_mutasi'] === 'KELUAR') {
        if (isset($_POST['terima'])) {
            $keterangan = $_POST['keterangan_terima'];
            $q = "
            UPDATE 
                mutasi 
            SET 
                tanggal_verifikasi='" . Date("Y-m-d H:i:s") . "',
                tanggal_selesai='" . Date("Y-m-d H:i:s") . "',
                status='SELESAI',
                keterangan='$keterangan' 
            WHERE 
                id=" . $_GET['id'] . "
            ";
            if ($mysqli->query($q)) {
                echo "<script>alert('Berhasil menerima pengajukan mutasi');</script>";
                echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
            } else echo "Error: " . $q . "<br>" . $mysqli->error;
        }
        if (isset($_POST['tolak'])) {
            $keterangan = $_POST['keterangan_tolak'];
            $q = "
            UPDATE 
                mutasi 
            SET 
                tanggal_verifikasi='" . Date("Y-m-d H:i:s") . "',
                status='DITOLAK',
                keterangan='$keterangan' 
            WHERE 
                id=" . $_GET['id'] . "
        ";
            if ($mysqli->query($q)) {
                echo "<script>alert('Berhasil menolak pengajukan mutasi');</script>";
                echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
            } else echo "Error: " . $q . "<br>" . $mysqli->error;
        }
    }
}

if ($_SESSION['status'] === 'ADMIN' && $_GET['jenis_mutasi'] === 'MASUK') {
    if (isset($_POST['selesai'])) {

        $target_dir = "uploads/";

        if (file_exists($dokumen11)) unlink($dokumen11);
        $dokumen11 = $target_dir . Date("YmdHis") . "11." . strtolower(pathinfo(basename($_FILES["sk_mutasi"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["sk_mutasi"]["tmp_name"], $dokumen11);

        if (file_exists($dokumen12)) unlink($dokumen12);
        $dokumen12 = $target_dir . Date("YmdHis") . "12." . strtolower(pathinfo(basename($_FILES["nota_usul"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["nota_usul"]["tmp_name"], $dokumen12);

        $q = "
        UPDATE 
            mutasi 
        SET 
            tanggal_selesai='" . Date("Y-m-d H:i:s") . "',
            sk_mutasi='$dokumen11',
            nota_usul='$dokumen12',
            status='SELESAI'  
        WHERE 
            id=" . $_GET['id'] . "
        ";
        if ($mysqli->query($q)) {
            echo "<script>alert('Berhasil menyerahkan SK Mutasi dan Nota Usul');</script>";
            echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
        } else echo "Error: " . $q . "<br>" . $mysqli->error;
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajuan Mutasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pengajuan Mutasi</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php if ($_SESSION['status'] === 'PEGAWAI') : ?>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Riwayat Pengajuan</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tanggal_pengajuan">Tanggal Pengajaun</label>
                                <input type="text" class="form-control" id="tanggal_pengajuan" value="<?= date_format(date_create(explode(" ", $data['tanggal_pengajuan'])[0]), "d-m-Y"); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="waktu_pengajuan">Waktu Pengajuan</label>
                                <input type="text" class="form-control" id="waktu_pengajuan" value="<?= explode(" ", $data['tanggal_pengajuan'])[1]; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Status Pengajuan</label>
                                <label>
                                    <?php if ($data['status'] === "PENGAJUAN") : ?>
                                        <span class='badge badge-warning'>Menunggu Konfirmasi</span>
                                    <?php elseif ($data['status'] === "DITERIMA") : ?>
                                        <span class='badge badge-success'>Diterima</span>
                                        <span class='badge badge-warning'>Menunggu SK Mutasi</span>
                                        <span class='badge badge-warning'>Menunggu Nota Usul</span>
                                    <?php elseif ($data['status'] === "DITOLAK") : ?>
                                        <span class='badge badge-danger'>Ditolak</span>
                                    <?php elseif ($data['status'] === "SELESAI") : ?>
                                        <span class='badge badge-success'>Selesai</span>
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php if ($data['status'] !== "PENGAJUAN") : ?>
                                <div class="form-group">
                                    <label for="tanggal_verifikasi">Tanggal Verifikasi</label>
                                    <input type="text" class="form-control" id="tanggal_verifikasi" value="<?= date_format(date_create(explode(" ", $data['tanggal_verifikasi'])[0]), "d-m-Y"); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_verifikasi">Waktu Verifikasi</label>
                                    <input type="text" class="form-control" id="waktu_verifikasi" value="<?= explode(" ", $data['tanggal_verifikasi'])[1]; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_pengajuan">Keterangan</label>
                                    <textarea class="form-control" cols="30" rows="3" readonly><?= $data['keterangan']; ?></textarea>
                                </div>
                            <?php endif; ?>
                            <?php if ($data['status'] === "SELESAI") : ?>
                                <div class="form-group">
                                    <label for="tanggal_selesai">Tanggal Disetujui</label>
                                    <input type="text" class="form-control" id="tanggal_selesai" value="<?= date_format(date_create(explode(" ", $data['tanggal_selesai'])[0]), "d-m-Y"); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_selesai">Waktu Disetujui</label>
                                    <input type="text" class="form-control" id="waktu_selesai" value="<?= explode(" ", $data['tanggal_selesai'])[1]; ?>" disabled>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=<?= $_GET['page']; ?>" class="btn btn-secondary ml-2">Kembali</a>
                            <?php if ($data['status'] == "PENGAJUAN" || $data['status'] == "DITOLAK") : ?>
                                <a href="?page=<?= $_GET['page']; ?>&method=edit&id=<?= $data['id'] ?>" class="btn btn-warning ml-2 mr-2">Edit</a>
                                <form action="?page=<?= $_GET['page']; ?>&method=hapus&id=<?= $data['id'] ?>" method="POST" class="d-inline">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php elseif ($_SESSION['status'] === 'PIMPINAN') : ?>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Dokumen</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" value="<?= $data['nip'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Pegawai</label>
                                <input type="text" class="form-control" id="nama" value="<?= $data['nama'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_pengajuan">Tanggal Pengajaun</label>
                                <input type="text" class="form-control" id="tanggal_pengajuan" value="<?= date_format(date_create(explode(" ", $data['tanggal_pengajuan'])[0]), "d-m-Y"); ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="waktu_pengajuan">Waktu Pengajuan</label>
                                <input type="text" class="form-control" id="waktu_pengajuan" value="<?= explode(" ", $data['tanggal_pengajuan'])[1]; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="waktu_pengajuan">Keterangan</label>
                                <textarea id="keterangan" class="form-control" cols="30" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=<?= $_GET['page'] ?>" class="btn btn-secondary mr-2">Kembali</a>
                            <form action="" method="POST" class="d-inline">
                                <textarea name="keterangan_tolak" hidden></textarea>
                                <button type="submit" name="tolak" class="btn btn-danger" onclick="return confirm('Are you sure?')">Tolak</button>
                            </form>
                            <div class="mr-2"></div>
                            <form action="" method="POST" class="d-inline">
                                <textarea name="keterangan_terima" hidden></textarea>
                                <button type="submit" name="terima" class="btn btn-success" onclick="return confirm('Are you sure?')">Terima</button>
                            </form>
                        </div>
                        <script>
                            document.querySelector("#keterangan").addEventListener('input', function() {
                                document.querySelector("textarea[name=keterangan_terima]").value = this.value;
                                document.querySelector("textarea[name=keterangan_tolak]").value = this.value;
                            })
                        </script>
                    </div>
                </div>
            <?php elseif ($_SESSION['status'] === 'ADMIN') : ?>
                <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Riwayat Pengajuan</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" class="form-control" id="nip" value="<?= $data['nip'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Pegawai</label>
                                    <input type="text" class="form-control" id="nama" value="<?= $data['nama'] ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pengajuan">Tanggal Pengajaun</label>
                                    <input type="text" class="form-control" id="tanggal_pengajuan" value="<?= date_format(date_create(explode(" ", $data['tanggal_pengajuan'])[0]), "d-m-Y"); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_pengajuan">Waktu Pengajuan</label>
                                    <input type="text" class="form-control" id="waktu_pengajuan" value="<?= explode(" ", $data['tanggal_pengajuan'])[1]; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="d-block">Status Pengajuan</label>
                                    <label>
                                        <?php if ($data['status'] === "PENGAJUAN") : ?>
                                            <span class='badge badge-warning'>Menunggu Konfirmasi</span>
                                        <?php elseif ($data['status'] === "DITERIMA") : ?>
                                            <span class='badge badge-success'>Diterima</span>
                                            <span class='badge badge-warning'>Menunggu SK Mutasi</span>
                                            <span class='badge badge-warning'>Menunggu Nota Usul</span>
                                        <?php elseif ($data['status'] === "DITOLAK") : ?>
                                            <span class='badge badge-danger'>Ditolak</span>
                                        <?php elseif ($data['status'] === "SELESAI") : ?>
                                            <span class='badge badge-success'>Selesai</span>
                                        <?php endif; ?>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_verifikasi">Tanggal Verifikasi</label>
                                    <input type="text" class="form-control" id="tanggal_verifikasi" value="<?= date_format(date_create(explode(" ", $data['tanggal_verifikasi'])[0]), "d-m-Y"); ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_verifikasi">Waktu Verifikasi</label>
                                    <input type="text" class="form-control" id="waktu_verifikasi" value="<?= explode(" ", $data['tanggal_verifikasi'])[1]; ?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="waktu_pengajuan">Keterangan</label>
                                    <textarea id="keterangan" class="form-control" cols="30" rows="3" disabled><?= $data['keterangan'] ?></textarea>
                                </div>
                                <?php if ($_GET['jenis_mutasi'] === 'MASUK') : ?>
                                    <div class="form-group">
                                        <label for="sk_mutasi">SK Mutasi</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="sk_mutasi" name="sk_mutasi" accept=".pdf" onchange="preview(this)" required>
                                                <label class="custom-file-label" for="sk_mutasi">Pilih File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nota_usul">Nota Usul</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="nota_usul" name="nota_usul" accept=".pdf" onchange="preview(this)" required>
                                                <label class="custom-file-label" for="nota_usul">Pilih File</label>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer d-flex justify-content-end">
                                <a href="?page=<?= $_GET['page'] ?>" class="btn btn-secondary mr-2">Kembali</a>
                                <?php if ($_GET['jenis_mutasi'] === 'MASUK') : ?>
                                    <button type="submit" name="selesai" class="btn btn-primary" onclick="return confirm('Are you sure?')">Simpan</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
            <div class="col-md-6">
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Surat Pelepasan dan Penerimaan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen1 ?>" id="preview-dokumen1" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Analisis Jabatan dan Beban Kerja</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen2 ?>" id="preview-dokumen2" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Surat Permohonan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen3 ?>" id="preview-dokumen3" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen SK CPNS, PNS, Kenaikan Pangkat Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen4 ?>" id="preview-dokumen4" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen SK Jabatan Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen5 ?>" id="preview-dokumen5" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Ijazah Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen6 ?>" id="preview-dokumen6" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Surat Pernyataan Bebas Hukuman</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen7 ?>" id="preview-dokumen7" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Surat Keterangan Bebas Temuan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen8 ?>" id="preview-dokumen8" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Surat Pernyataan Bebas Tugas</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen9 ?>" id="preview-dokumen9" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>

                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen SKP 2 Tahun Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen10 ?>" id="preview-dokumen10" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <?php if ($_GET['jenis_mutasi'] === 'MASUK') : ?>
                    <?php if ($_SESSION['status'] === 'PEGAWAI' && $data['status'] === "SELESAI") : ?>
                        <div class="card card-success collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Dokumen SK Mutasi</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" onclick="download(this, 'SK Mutasi')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="height: 640px; display: none;">
                                <iframe src="<?= $dokumen11; ?>" id="preview-sk_mutasi" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div class="card card-success collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Dokumen Nota Usul</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" onclick="download(this, 'Nota Usul')">
                                        <i class="fas fa-download"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="height: 640px; display: none;">
                                <iframe src="<?= $dokumen12; ?>" id="preview-nota_usul" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($_SESSION['status'] === 'ADMIN') : ?>
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Dokumen SK Mutasi</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="height: 640px; display: none;">
                                <iframe src="<?= $dokumen11; ?>" id="preview-sk_mutasi" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Dokumen Nota Usul</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="height: 640px; display: none;">
                                <iframe src="<?= $dokumen12; ?>" id="preview-nota_usul" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/document-preview.js"></script>