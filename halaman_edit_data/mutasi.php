<?php
if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM mutasi WHERE id=" . $_GET['id']);
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
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=skpd';</script>";
}

if (isset($_POST['submit'])) {
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
        move_uploaded_file($_FILES["dokumen8"]["tmp_name"], $dokumen8);
    }

    if ($_FILES['dokumen9']['error'] != 4) {
        if (file_exists($dokumen9)) unlink($dokumen9);
        $dokumen9 = $target_dir . Date("YmdHis") . "9." . strtolower(pathinfo(basename($_FILES["dokumen9"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen9"]["tmp_name"], $dokumen9);
    }

    if ($_FILES['dokumen10']['error'] != 4) {
        if (file_exists($dokumen10)) unlink($dokumen10);
        $dokumen10 = $target_dir . Date("YmdHis") . "10." . strtolower(pathinfo(basename($_FILES["dokumen10"]["name"]), PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["dokumen10"]["tmp_name"], $dokumen10);
    }

    $q = "
        UPDATE mutasi SET 
            surat_pelepasan_penerimaan='$dokumen1',            
            analisis_jabatan_dan_beban_kerja='$dokumen2',            
            surat_permohonan='$dokumen3',            
            sk_cpns_pns_kenaikan_pangkat='$dokumen4',            
            sk_jabatan_terakhir='$dokumen5',            
            izajah_terakhir='$dokumen6',            
            surat_pernyataan_bebas_hukuman='$dokumen7',            
            surat_keterangan_bebas_temuan='$dokumen8',            
            surat_pernyataan_bebas_tugas='$dokumen9',
            skp_2_tahun_terakhir='$dokumen10',
            tanggal_pengajuan='" . Date("Y-m-d H:i:s") . "', 
            tanggal_verifikasi=NULL,
            status='PENGAJUAN' 
        WHERE 
            id=" . $_GET['id'] . "
    ";

    if ($mysqli->query($q)) {
        echo "<script>alert('Berhasil memperbaharui pengajukan mutasi');</script>";
        echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
    } else echo "Error: " . $q . "<br>" . $mysqli->error;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Edit Pengajuan Mutasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Form Edit Pengajuan Mutasi</li>
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
                                <label for="dokumen1">Surat Pelepasan dan Surat Penerimaan</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen1" name="dokumen1" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen1">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen2">Analasis Jabatan dan Beban Kerja Instansi Asal dan Penerima</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen2" name="dokumen2" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen2">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen3">Surat Permohonan</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen3" name="dokumen3" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen3">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen4">SK CPNS, PNS, Kenaikan Pangkat Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen4" name="dokumen4" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen4">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen5">SK Jabatan Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen5" name="dokumen5" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen5">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen6">Izajah Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen6" name="dokumen6" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen6">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen7">Surat Pernyataan Bebas Hukuman</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen7" name="dokumen7" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen7">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen8">Surat Keterangan Bebas Temuan</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen8" name="dokumen8" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen8">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen9">Surat Pernyataan Bebas Tugas</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen9" name="dokumen9" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen9">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen10">SKP 2 Tahun Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen10" name="dokumen10" accept=".pdf" onchange="preview(this)">
                                        <label class="custom-file-label" for="dokumen10">Pilih file baru untuk mengganti file lama</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=mutasi" class="btn btn-secondary ml-2">Kembali</a>
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