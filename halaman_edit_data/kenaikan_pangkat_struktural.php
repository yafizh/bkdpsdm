<?php
if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_struktural WHERE id=" . $_GET['id']);
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

    $q = "
        UPDATE kenaikan_pangkat_struktural SET 
            id_pegawai= " . $_SESSION['id_pegawai'] . ",
            periode='$periode',
            surat_pengantar_skpd='$dokumen1',
            sk_pangkat_terakhir='$dokumen2',
            sk_jabatan_spmj_spp_spmt='$dokumen3',
            ijazah_transkip_nilai='$dokumen4',
            skp='$dokumen5',
            tanggal_pengajuan='" . Date("Y-m-d H:i:s") . "',
            tanggal_verifikasi=NULL,
            status='PENGAJUAN' 
        WHERE 
            id=" . $_GET['id'] . "
    ";

    if ($mysqli->query($q)) {
        echo "<script>alert('Berhasil memperbaharui kenaikan pangkat struktural');</script>";
        echo "<script>window.location.href = '?page=struktural';</script>";
    } else echo "Error: " . $q . "<br>" . $mysqli->error;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Pengajuan Kenaikan Pangkat Struktural</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Form Edit Pengajuan Kenaikan Pangkat Struktural</li>
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
                                <label for="dokumen2">Surat Pangkat Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen2" name="dokumen2" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen2">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen3">SK Jabatan, SPMJ, SPP, dan SPMT</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen3" name="dokumen3" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen3">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen4">Izajah Terakhir dan Transkip Nilai</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen4" name="dokumen4" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen4">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen5">SKP Tahun Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen5" name="dokumen5" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen5">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                        <a href="?page=struktural" class="btn btn-secondary ml-2">Kembali</a>
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