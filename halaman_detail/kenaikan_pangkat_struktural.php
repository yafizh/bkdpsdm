<?php
if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT kenaikan_pangkat_struktural.*, pegawai.nip, pegawai.nama FROM kenaikan_pangkat_struktural INNER JOIN pegawai ON pegawai.id=kenaikan_pangkat_struktural.id_pegawai WHERE kenaikan_pangkat_struktural.id=" . $_GET['id']);
    $data = $result->fetch_assoc();
    $dokumen1 = $data['surat_pengantar_skpd'];
    $dokumen2 = $data['sk_pangkat_terakhir'];
    $dokumen3 = $data['sk_jabatan_spmj_spp_spmt'];
    $dokumen4 = $data['ijazah_transkip_nilai'];
    $dokumen5 = $data['skp'];
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=struktural';</script>";
}

if ($_SESSION['status'] === 'PIMPINAN') {
    if (isset($_POST['terima'])) {
        $keterangan = $_POST['keterangan_terima'];
        $q = "
        UPDATE 
            kenaikan_pangkat_struktural 
        SET 
            tanggal_verifikasi='" . Date("Y-m-d H:i:s") . "',
            status='DITERIMA',
            keterangan='$keterangan' 
        WHERE 
            id=" . $_GET['id'] . "
        ";
        if ($mysqli->query($q)) {
            echo "<script>alert('Berhasil menerima pengajukan kenaikan pangkat');</script>";
            echo "<script>window.location.href = '?page=struktural';</script>";
        } else echo "Error: " . $q . "<br>" . $mysqli->error;
    }
    if (isset($_POST['tolak'])) {
        $keterangan = $_POST['keterangan_tolak'];
        $q = "
        UPDATE 
            kenaikan_pangkat_struktural 
        SET 
            tanggal_verifikasi='" . Date("Y-m-d H:i:s") . "',
            status='DITOLAK',
            keterangan='$keterangan' 
        WHERE 
            id=" . $_GET['id'] . "
    ";
        if ($mysqli->query($q)) {
            echo "<script>alert('Berhasil menolak pengajukan kenaikan pangkat');</script>";
            echo "<script>window.location.href = '?page=struktural';</script>";
        } else echo "Error: " . $q . "<br>" . $mysqli->error;
    }
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajuan Kenaikan Pangkat Struktural</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Pengajuan Kenaikan Pangkat Struktural</li>
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
                            <h3 class="card-title">Dokumen</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <select name="periode" id="periode" required class="form-control">
                                    <option value="" disabled selected>Pilih Periode</option>
                                    <option <?= $data['periode'] === 'April' ? "selected" : ""; ?> value="April">April</option>
                                    <option <?= $data['periode'] === 'Oktober' ? "selected" : ""; ?> value="Oktober">Oktober</option>
                                </select>
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
                                    <?php
                                    if ($data['status'] == "PENGAJUAN") {
                                        echo "<span class='badge badge-warning'>Menunggu Konfirmasi</span>";
                                    } elseif ($data['status'] == "DITOLAK") {
                                        echo "<span class='badge badge-danger'>Ditolak</span>";
                                    } elseif ($data['status'] == "DITERIMA") {
                                        echo "<span class='badge badge-success'>Diterima</span>";
                                    }
                                    ?>
                                </label>
                            </div>
                            <?php if ($data['status'] == "DITERIMA" || $data['status'] == "DITOLAK") : ?>
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
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=struktural" class="btn btn-secondary ml-2">Kembali</a>
                            <?php if ($data['status'] == "PENGAJUAN" || $data['status'] == "DITOLAK") : ?>
                                <a href="?page=struktural&method=edit&id=<?= $data['id'] ?>" class="btn btn-warning ml-2 mr-2">Edit</a>
                                <form action="?page=struktural&method=hapus&id=<?= $data['id'] ?>" method="POST" class="d-inline">
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
                                <label for="periode">Periode</label>
                                <select name="periode" id="periode" required class="form-control" disabled>
                                    <option value="" disabled selected>Pilih Periode</option>
                                    <option <?= $data['periode'] === 'April' ? "selected" : ""; ?> value="April">April</option>
                                    <option <?= $data['periode'] === 'Oktober' ? "selected" : ""; ?> value="Oktober">Oktober</option>
                                </select>
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
                            <a href="?page=struktural" class="btn btn-secondary mr-2">Kembali</a>
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
            <?php endif; ?>
            <div class="col-md-6">
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Surat Pengantar SKPD</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen1; ?>" id="preview-dokumen1" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen SK Pangkat Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen2; ?>" id="preview-dokumen2" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen SK Jabatan, SPMJ, SPP, dan SPMT</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen3; ?>" id="preview-dokumen3" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Izajah Terakhir dan Transkip Nilai</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen4; ?>" id="preview-dokumen4" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">SKP Tahun Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen5; ?>" id="preview-dokumen5" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const preview = (input) => {
        const preview = document.querySelector('#preview-' + input.getAttribute('id'));

        let already_open = false;
        document.querySelectorAll(".btn-tool").forEach(element => {
            if (
                element.children[0].getAttribute("class").split(" ")[1] === "fa-minus" &&
                element.parentElement.parentElement.nextElementSibling.children[0].getAttribute("id") != ("preview-" + input.getAttribute('id'))
            ) element.click();
            if (
                element.children[0].getAttribute("class").split(" ")[1] === "fa-minus" &&
                element.parentElement.parentElement.nextElementSibling.children[0].getAttribute("id") == ("preview-" + input.getAttribute('id'))
            ) already_open = true;
        });
        const oFReader = new FileReader();
        oFReader.readAsDataURL(input.files[0]);
        oFReader.onload = function(oFREvent) {
            preview.src = oFREvent.target.result;
            if (!already_open) preview.parentElement.previousElementSibling.children[1].children[0].click();
            input.nextElementSibling.innerHTML = input.value;
        }
    }
</script>