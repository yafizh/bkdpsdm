<?php
if (isset($_POST['submit'])) {
    $id_pegawai = $_SESSION['id_pegawai'];
    $periode = $_POST['periode'];

    $target_dir = "uploads/";

    $dokumen1 = $target_dir . Date("YmdHis") . "1." . strtolower(pathinfo(basename($_FILES["dokumen1"]["name"]), PATHINFO_EXTENSION));
    $dokumen2 = $target_dir . Date("YmdHis") . "2." . strtolower(pathinfo(basename($_FILES["dokumen2"]["name"]), PATHINFO_EXTENSION));
    $dokumen3 = $target_dir . Date("YmdHis") . "3." . strtolower(pathinfo(basename($_FILES["dokumen3"]["name"]), PATHINFO_EXTENSION));
    $dokumen4 = $target_dir . Date("YmdHis") . "4." . strtolower(pathinfo(basename($_FILES["dokumen4"]["name"]), PATHINFO_EXTENSION));
    $dokumen5 = $target_dir . Date("YmdHis") . "5." . strtolower(pathinfo(basename($_FILES["dokumen5"]["name"]), PATHINFO_EXTENSION));
    $dokumen6 = $target_dir . Date("YmdHis") . "6." . strtolower(pathinfo(basename($_FILES["dokumen6"]["name"]), PATHINFO_EXTENSION));
    $dokumen7 = $target_dir . Date("YmdHis") . "7." . strtolower(pathinfo(basename($_FILES["dokumen7"]["name"]), PATHINFO_EXTENSION));
    $dokumen8 = $target_dir . Date("YmdHis") . "8." . strtolower(pathinfo(basename($_FILES["dokumen8"]["name"]), PATHINFO_EXTENSION));

    move_uploaded_file($_FILES["dokumen1"]["tmp_name"], $dokumen1);
    move_uploaded_file($_FILES["dokumen2"]["tmp_name"], $dokumen2);
    move_uploaded_file($_FILES["dokumen3"]["tmp_name"], $dokumen3);
    move_uploaded_file($_FILES["dokumen4"]["tmp_name"], $dokumen4);
    move_uploaded_file($_FILES["dokumen5"]["tmp_name"], $dokumen5);
    move_uploaded_file($_FILES["dokumen6"]["tmp_name"], $dokumen6);
    move_uploaded_file($_FILES["dokumen7"]["tmp_name"], $dokumen7);
    move_uploaded_file($_FILES["dokumen8"]["tmp_name"], $dokumen7);
    $q = "
        INSERT INTO kenaikan_pangkat_fungsional (
            id_pegawai,
            periode,
            surat_pengantar_skpd,
            pak_asli,
            pak_sebelumnya,
            sk_pangkat_terakhir,
            sk_pengangkatan_jabatan_fungsional,
            sk_pindah_tempat_tugas,
            ijazah_transkip_nilai,
            ktp,
            tanggal_pengajuan,
            tanggal_verifikasi,
            status 
        ) VALUES (
            " . $_SESSION['id_pegawai'] . ",
            '$periode',
            '$dokumen1',
            '$dokumen2',
            '$dokumen3',
            '$dokumen4',
            '$dokumen5',
            '$dokumen6',
            '$dokumen7',
            '$dokumen8',
            '" . Date("Y-m-d H:i:s") . "',
            NULL,
            'PENGAJUAN' 
        )
    ";
    if ($mysqli->query($q)) {
        echo "<script>alert('Berhasil mengajukan kenaikan pangkat fungsional');</script>";
        echo "<script>window.location.href = '?page=fungsional';</script>";
    } else echo "Error: " . $q . "<br>" . $mysqli->error;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Pengajuan Kenaikan Pangkat Fungsional</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Form Pengajuan Kenaikan Pangkat Fungsional</li>
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
                                    <option value="April">April</option>
                                    <option value="Oktober">Oktober</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dokumen1">Surat Pengantar SKPD</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen1" name="dokumen1" accept=".pdf" onchange="preview(this)" required>
                                        <label class="custom-file-label" for="dokumen1">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen2">PAK Asli</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen2" name="dokumen2" accept=".pdf" onchange="preview(this)" required>
                                        <label class="custom-file-label" for="dokumen2">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen3">PAK Sebelumnya</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen3" name="dokumen3" accept=".pdf" onchange="preview(this)" required>
                                        <label class="custom-file-label" for="dokumen3">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen4">SK Pengangkatan Terakhir</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen4" name="dokumen4" accept=".pdf" onchange="preview(this)" required>
                                        <label class="custom-file-label" for="dokumen4">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen5">SK Pengangkatan Jabatan Fungsional</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen5" name="dokumen5" accept=".pdf" onchange="preview(this)" required>
                                        <label class="custom-file-label" for="dokumen5">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen6">SK Pindah Tempat Tugas</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen6" name="dokumen6" accept=".pdf" onchange="preview(this)" required>
                                        <label class="custom-file-label" for="dokumen6">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen7">Izajah Terakhir dan Transkip Nilai</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen7" name="dokumen7" accept=".pdf" onchange="preview(this)" required>
                                        <label class="custom-file-label" for="dokumen7">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dokumen8">KTP</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="dokumen8" name="dokumen8" accept=".pdf" onchange="preview(this)" required>
                                        <label class="custom-file-label" for="dokumen8">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <a href="?page=fungsional" class="btn btn-secondary ml-2">Kembali</a>
                            <button class="btn btn-primary ml-2" type="submit" name="submit">Ajukan</button>
                        </div>
                    </div>
                </form>

            </div>
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
                        <iframe src="" id="preview-dokumen1" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen PAK Asli</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="" id="preview-dokumen2" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen PAK Sebelumnya</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="" id="preview-dokumen3" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen SK Pengangkatan Terakhir</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="" id="preview-dokumen4" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">SK Pengangkatan Jabatan Fungsional</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="" id="preview-dokumen5" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">SK Pindah Tempat Tugas</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="" id="preview-dokumen6" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="card card-primary collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">Izajah Terakhir dan Transkip Nilai</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" style="height: 640px; display: none;">
                        <iframe src="" id="preview-dokumen7" style="width: 100%; height: 100%;" frameborder="0"></iframe>
                    </div>
                </div>
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
                        <iframe src="" id="preview-dokumen8" style="width: 100%; height: 100%;" frameborder="0"></iframe>
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