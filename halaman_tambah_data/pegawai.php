<?php
if (isset($_POST['submit'])) {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $pangkat = $_POST['pangkat'];
    $golongan = $_POST['golongan'];
    $tmt = $_POST['tmt'];
    $jabatan = $_POST['jabatan'];
    $unit_kerja = $_POST['unit_kerja'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $status = $_POST['status'];

    $target_dir = "uploads/";
    $gambar = $target_dir . Date("YmdHis") . "1." . strtolower(pathinfo(basename($_FILES["gambar"]["name"]), PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $gambar);


    $q = "
        INSERT INTO user (
            username,
            password,
            status  
        ) VALUES (
            '$username',
            '$password',
            '$status' 
        )
    ";
    if ($mysqli->query($q)) {
        $last_id = $mysqli->insert_id;
        $q = "
        INSERT INTO pegawai (
            id_user,
            nip,
            nama,
            nomor_telepon,
            tanggal_lahir,
            pangkat,
            golongan,
            tmt,
            jabatan,
            unit_kerja,
            gambar 
        ) VALUES (
            '$last_id',
            '$nip',
            '$nama',
            '$nomor_telepon',
            '$tanggal_lahir',
            '$pangkat',
            '$golongan',
            '$tmt',
            '$jabatan',
            '$unit_kerja',
            '$gambar'
        )
    ";
        if ($mysqli->query($q)) {
            echo "<script>alert('Berhasil menambah data pegawai');</script>";
            echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
        } else echo "Error: " . $q . "<br>" . $mysqli->error;
    } else echo "Error: " . $q . "<br>" . $mysqli->error;
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Form Pegawai</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<form action="" method="POST" enctype="multipart/form-data">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Identitas Pegawai</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan nip">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan nama">
                            </div>
                            <div class="form-group">
                                <label for="nomor_telepon">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan nomor telepom">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*" onchange="previewImage(this)">
                                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Jabatan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="pangkat">Pangkat</label>
                                <input type="text" class="form-control" name="pangkat" id="pangkat" placeholder="Masukkan Pangkat">
                            </div>
                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <input type="text" class="form-control" name="golongan" id="golongan" placeholder="Masukkan golongan">
                            </div>
                            <div class="form-group">
                                <label for="tmt">TMT</label>
                                <input type="date" class="form-control" name="tmt" id="tmt">
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan jabatan">
                            </div>
                            <div class="form-group">
                                <label for="unit_kerja">Unit Kerja</label>
                                <input type="text" class="form-control" id="unit_kerja" name="unit_kerja" placeholder="Masukkan unit kerja">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Preview Gambar</h3>
                        </div>
                        <div class="card-body d-flex justify-content-center" style="height: 470.5px; padding: 20px;">
                            <img id="preview" class="w-50" style="object-fit: cover;">
                        </div>
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Akun Pegawai</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Username" readonly>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" required class="form-control">
                                    <option value="ADMIN">Admin</option>
                                    <option value="PIMPINAN">Pimpinan</option>
                                    <option value="PEGAWAI" selected>Pegawai</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right" name="submit">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
    function previewImage(input) {
        input.nextElementSibling.innerHTML = input.files[0].name;

        const oFReader = new FileReader();
        oFReader.readAsDataURL(input.files[0]);

        oFReader.onload = function(oFREvent) {
            document.querySelector('#preview').src = oFREvent.target.result;
        }
    }

    document.querySelector("input[name=nip]").addEventListener('input', function() {
        document.querySelector("input[name=username]").value = this.value;
    });
</script>