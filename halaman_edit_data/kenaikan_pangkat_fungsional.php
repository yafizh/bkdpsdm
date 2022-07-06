<?php
if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_fungsional WHERE id=" . $_GET['id']);
    $data = $result->fetch_assoc();
    $dokumen1 = $data['surat_pengantar_skpd'];
    $dokumen2 = $data['pak_asli'];
    $dokumen3 = $data['pak_sebelumnya'];
    $dokumen4 = $data['sk_pangkat_terakhir'];
    $dokumen5 = $data['sk_pengangkatan_jabatan_fungsional'];
    $dokumen6 = $data['sk_pindah_tempat_tugas'];
    $dokumen7 = $data['ijazah_transkip_nilai'];
    $dokumen8 = $data['ktp'];
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=fungsional';</script>";
}
if (isset($_POST['submit'])) {
    $id_pegawai = $_SESSION['id_pegawai'];
    $periode = $_POST['periode'];

    $target_dir = "uploads/";

    if ($_FILES['dokumen1']['error'] != 4) {
        if (file_exists($dokumen1)) unlink($dokumen1);
        $dokumen1 = $target_dir . Date("YmdHis") . "1." . strtolower(pathinfo(basename($_FILES["dokumen1"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen1"]["tmp_name"], $dokumen1);
    }

    if ($_FILES['dokumen2']['error'] != 4) {
        if (file_exists($dokumen2)) unlink($dokumen2);
        $dokumen2 = $target_dir . Date("YmdHis") . "2." . strtolower(pathinfo(basename($_FILES["dokumen2"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen2"]["tmp_name"], $dokumen2);
    }
    if ($_FILES['dokumen3']['error'] != 4) {
        if (file_exists($dokumen3)) unlink($dokumen3);
        $dokumen3 = $target_dir . Date("YmdHis") . "3." . strtolower(pathinfo(basename($_FILES["dokumen3"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen3"]["tmp_name"], $dokumen3);
    }
    if ($_FILES['dokumen4']['error'] != 4) {
        if (file_exists($dokumen4)) unlink($dokumen4);
        $dokumen4 = $target_dir . Date("YmdHis") . "4." . strtolower(pathinfo(basename($_FILES["dokumen4"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen4"]["tmp_name"], $dokumen4);
    }
    if ($_FILES['dokumen5']['error'] != 4) {
        if (file_exists($dokumen5)) unlink($dokumen5);
        $dokumen5 = $target_dir . Date("YmdHis") . "5." . strtolower(pathinfo(basename($_FILES["dokumen5"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen5"]["tmp_name"], $dokumen5);
    }
    if ($_FILES['dokumen6']['error'] != 4) {
        if (file_exists($dokumen6)) unlink($dokumen6);
        $dokumen6 = $target_dir . Date("YmdHis") . "6." . strtolower(pathinfo(basename($_FILES["dokumen6"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen6"]["tmp_name"], $dokumen6);
    }
    if ($_FILES['dokumen7']['error'] != 4) {
        if (file_exists($dokumen7)) unlink($dokumen7);
        $dokumen7 = $target_dir . Date("YmdHis") . "7." . strtolower(pathinfo(basename($_FILES["dokumen7"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen7"]["tmp_name"], $dokumen7);
    }
    if ($_FILES['dokumen8']['error'] != 4) {
        if (file_exists($dokumen8)) unlink($dokumen8);
        $dokumen8 = $target_dir . Date("YmdHis") . "8." . strtolower(pathinfo(basename($_FILES["dokumen8"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen8"]["tmp_name"], $dokumen7);
    }


    $q = "
        UPDATE kenaikan_pangkat_fungsional SET 
            id_pegawai=$id_pegawai,
            periode='$periode',
            surat_pengantar_skpd='$dokumen1',
            pak_asli='$dokumen2',
            pak_sebelumnya='$dokumen3',
            sk_pangkat_terakhir='$dokumen4',
            sk_pengangkatan_jabatan_fungsional='$dokumen5',
            sk_pindah_tempat_tugas='$dokumen6',
            ijazah_transkip_nilai='$dokumen7',
            ktp='$dokumen8',
            tanggal_pengajuan= '" . Date("Y-m-d H:i:s") . "',
            tanggal_verifikasi=NULL,
            status='PENGAJUAN' 
        WHERE 
            id=" . $_GET['id'] . "
    ";
    if ($mysqli->query($q)) {
        echo "<script>alert('Berhasil memperbaharui pengajukan kenaikan pangkat fungsional');</script>";
        echo "<script>window.location.href = '?page=fungsional';</script>";
    } else echo "Error: " . $q . "<br>" . $mysqli->error;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Pengajuan Kenaikan Pangkat Fungsional</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Form Edit Pengajuan Kenaikan Pangkat Fungsional</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST" enctype="multipart/form-data">
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
                                <label for="dokumen1">Surat Pengantar SKPD</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen1" name="dokumen1" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen1">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen2">PAK Asli</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen2" name="dokumen2" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen2">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen3">PAK Sebelumnya</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen3" name="dokumen3" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen3">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen4">SK Pengangkatan Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen4" name="dokumen4" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen4">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen5">SK Pengangkatan Jabatan Fungsional</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen5" name="dokumen5" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen5">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen6">SK Pindah Tempat Tugas</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen6" name="dokumen6" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen6">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen7">Izajah Terakhir dan Transkip Nilai</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen7" name="dokumen7" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen7">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen8">KTP</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen8" name="dokumen8" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen8">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=fungsional" class="btn btn-secondary ml-2">Kembali</a>
                            <button class="btn btn-primary ml-2" type="submit" name="submit">Simpan</button>
                        </div>
                    </div>
                </form>

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Surat Pengantar SKPD</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen1; ?>" id="preview-dokumen1" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen PAK Asli</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen2; ?>" id="preview-dokumen2" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen PAK Sebelumnya</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen3; ?>" id="preview-dokumen3" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen SK Pengangkatan Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen4; ?>" id="preview-dokumen4" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">SK Pengangkatan Jabatan Fungsional</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen5; ?>" id="preview-dokumen5" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">SK Pindah Tempat Tugas</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen6; ?>" id="preview-dokumen6" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Izajah Terakhir dan Transkip Nilai</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen8; ?>" id="preview-dokumen7" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <!-- /.card -->

                <!-- general form elements -->
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Doumen KTP</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="<?= $dokumen1; ?>" id="preview-dokumen8" style="width: 100%; height: 100%;" frameborder="0"></iframe>
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