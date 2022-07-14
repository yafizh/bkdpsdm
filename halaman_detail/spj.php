<?php
if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM spj WHERE id=" . $_GET['id']);
    $data = $result->fetch_assoc();
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Surat Pertanggung Jawaban</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Surat Pertanggung Jawaban</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<form action="" method="POST">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Surat Pertanggung Jawaban</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="jenis_spj">Jenis SPJ</label>
                                <input type="text" name="jenis_spj" id="jenis_spj" value="<?= $_GET['page'] === "spj_kenaikan_pangkat" ? 'KENAIKAN PANGKAT' : 'MUTASI'; ?>" hidden>
                                <input type="text" class="form-control" value="<?= $_GET['page'] === "spj_kenaikan_pangkat" ? 'Kenaikan Pangkat' : 'Mutasi'; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="id_pegawai">Pegawai</label>
                                <?php
                                $q = "SELECT * FROM pegawai";

                                if ($result = $mysqli->query($q)) {
                                } else echo "Error: " . $q . "<br>" . $mysqli->error;
                                ?>
                                <select class="form-control select2bs4" name="id_pegawai" id="id_pegawai" required disabled>
                                    <?php while ($row = $result->fetch_assoc()) : ?>
                                        <?php if ($row['id'] == $data['id_pegawai']) : ?>
                                            <option value="<?= $row['id']; ?>" selected><?= $row['nama']; ?></option>
                                        <?php else : ?>
                                            <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                <input type="date" class="form-control" id="tanggal_kegiatan" name="tanggal_kegiatan" required value="<?= $data['tanggal_kegiatan']; ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="kegiatan">Kegiatan</label>
                                <input type="text" class="form-control" id="kegiatan" name="kegiatan" required value="<?= $data['kegiatan']; ?>" disabled>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Isi Surat Pertanggung Jawaban</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="urusan_pemerintah">Urusan Pemerintah</label>
                                        <input type="text" class="form-control" id="urusan_pemerintah" name="urusan_pemerintah" required value="<?= $data['urusan_pemerintah']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="unit_organisasi">Unit Organisasi</label>
                                        <input type="text" class="form-control" id="unit_organisasi" name="unit_organisasi" required value="<?= $data['unit_organisasi']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_unit_organisasi">Sub Unit Organisasi</label>
                                        <input type="text" class="form-control" id="sub_unit_organisasi" name="sub_unit_organisasi" required value="<?= $data['sub_unit_organisasi']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="program">Program</label>
                                        <input type="text" class="form-control" id="program" name="program" required value="<?= $data['program']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="kode_rekening">Kode Rekening</label>
                                        <input type="text" class="form-control" id="kode_rekening" name="kode_rekening" required value="<?= $data['kode_rekening']; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_uang">Jumlah Uang</label>
                                        <input type="text" class="form-control" id="jumlah_uang" name="jumlah_uang" required value="<?= $data['jumlah_uang']; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="keperluan">Keperluan</label>
                                        <textarea class="form-control" name="keperluan" id="keperluan" rows="5" disabled><?= $data['keperluan']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
    $('.select2').select2()

    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>