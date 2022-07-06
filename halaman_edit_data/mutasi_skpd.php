<?php
if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM mutasi_skpd WHERE id=" . $_GET['id']);
    $data = $result->fetch_assoc();
    $dokumen1 = $data['surat_pengantar_skpd'];
    $dokumen2 = $data['surat_permohonan_pns'];
    $dokumen3 = $data['sk_cpns_pns_kenaikan_pangkat'];
    $dokumen4 = $data['sk_jabatan_terakhir'];
    $dokumen5 = $data['skp_2_tahun_terakhir'];
    $dokumen6 = $data['izajah_terakhir'];
    $dokumen7 = $data['surat_pernyataan_bebas_hukuman'];
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=skpd';</script>";
}

if (isset($_POST['submit'])) {
    $id_pegawai = $_SESSION['id_pegawai'];

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

    $q = "
        UPDATE mutasi_skpd SET 
            id_pegawai=" . $_SESSION['id_pegawai'] . ",
            surat_pengantar_skpd='$dokumen1',
            surat_permohonan_pns='$dokumen2',
            sk_cpns_pns_kenaikan_pangkat='$dokumen3',
            sk_jabatan_terakhir='$dokumen4',
            skp_2_tahun_terakhir='$dokumen5',
            izajah_terakhir='$dokumen6',
            surat_pernyataan_bebas_hukuman='$dokumen7',
            tanggal_pengajuan='" . Date("Y-m-d H:i:s") . "',
            tanggal_verifikasi=NULL,
            status='PENGAJUAN' 
        WHERE 
            id=" . $_GET['id'] . "
    ";

    if ($mysqli->query($q)) {
        echo "<script>alert('Berhasil memperbaharui pengajuan mutasi SKPD');</script>";
        echo "<script>window.location.href = '?page=skpd';</script>";
    } else echo "Error: " . $q . "<br>" . $mysqli->error;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Pengajuan Mutasi SKPD</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Form Edit Pengajuan Mutasi SKPD</li>
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
                                <label for="dokumen1">Surat Pelepasan Kepala SKPD</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen1" id="dokumen1" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen1">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen2">Surat Permohonan PNS</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen2" id="dokumen2" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen2">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen3">SK CPNS, SK PNS, SK Kenaikan Pangkat</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen3" id="dokumen3" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen3">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen4">SK Jabatan Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen4" id="dokumen4" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen4">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen5">SKP 2 Tahun Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen5" id="dokumen5" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen5">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen6">Izajah Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen6" id="dokumen6" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen6">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen7">Surat Pernyataan Bebas Hukuman</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="dokumen7" id="dokumen7" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen7">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=skpd" class="btn btn-secondary ml-2">Kembali</a>
                            <button class="btn btn-primary ml-2" type="submit" name="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen Surat Pelepasan Kepala SKPD</h3>
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
                        <h3 class="card-title">Dokumen Surat Permohonan PNS</h3>
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
                        <h3 class="card-title">Dokumen SK CPNS, SK PNS, SK Kenaikan Pangkat</h3>
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
                        <h3 class="card-title">Dokumen SK Jabatan Terakhir</h3>
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
                        <h3 class="card-title">Dokumen SKP 2 Tahun Terakhir</h3>
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
                        <h3 class="card-title">Dokumen Izajah Terakhir</h3>
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
                        <h3 class="card-title">Dokumen Surat Pernyataaan Bebas Hukuman</h3>
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
            input.nextElementSibling.innerHTML = input.files[0].name;
        }
    }
</script>