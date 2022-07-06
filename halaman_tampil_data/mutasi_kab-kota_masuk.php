<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pengajuan Mutasi Kab/Kota Masuk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Pengajuan Mutasi Kab/Kota Masuk</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="card">
        <?php if ($_SESSION['status'] === 'PEGAWAI') : ?>
            <div class="card-header">
                <a href="?page=kab-kota_masuk&method=tambah&jenis_mutasi=MASUK&tujuan_mutasi=KAB/KOTA" class="btn btn-primary float-right">Tambah Pengajuan</a>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">NIP</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tanggal Pengajuan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($_SESSION['status'] === 'PEGAWAI')
                        $q = "SELECT mutasi.id, mutasi.status, DATE(mutasi.tanggal_pengajuan) AS tanggal_pengajuan, pegawai.nama AS nama_pegawai, pegawai.nip AS nip_pegawai FROM mutasi INNER JOIN pegawai ON pegawai.id=mutasi.id_pegawai WHERE tujuan_mutasi='KAB/KOTA' AND jenis_mutasi='MASUK' AND pegawai.id=" . $_SESSION['id_pegawai'] . " ORDER BY mutasi.id";
                    elseif ($_SESSION['status'] === 'PIMPINAN')
                        $q = "SELECT mutasi.id, mutasi.status, DATE(mutasi.tanggal_pengajuan) AS tanggal_pengajuan, pegawai.nama AS nama_pegawai, pegawai.nip AS nip_pegawai FROM mutasi INNER JOIN pegawai ON pegawai.id=mutasi.id_pegawai WHERE tujuan_mutasi='KAB/KOTA' AND jenis_mutasi='MASUK' AND status='PENGAJUAN' ORDER BY mutasi.id";
                    elseif ($_SESSION['status'] === "ADMIN")
                        $q = "SELECT mutasi.id, mutasi.status, DATE(mutasi.tanggal_pengajuan) AS tanggal_pengajuan, pegawai.nama AS nama_pegawai, pegawai.nip AS nip_pegawai FROM mutasi INNER JOIN pegawai ON pegawai.id=mutasi.id_pegawai WHERE tujuan_mutasi='KAB/KOTA' AND jenis_mutasi='MASUK' AND ORDER BY mutasi.id";

                    if ($result = $mysqli->query($q)) {
                    } else echo "Error: " . $q . "<br>" . $mysqli->error;;
                    ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;"><?= $row['nip_pegawai'] ?></td>
                            <td style="vertical-align: middle;"><?= $row['nama_pegawai'] ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $row['tanggal_pengajuan'] ?></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <?php if ($row['status'] === "PENGAJUAN") : ?>
                                    <span class="badge badge-warning"><?= $row['status'] ?></span>
                                <?php elseif ($row['status'] === "DITERIMA") : ?>
                                    <span class="badge badge-success"><?= $row['status'] ?></span>
                                <?php elseif ($row['status'] === "DITOLAK") : ?>
                                    <span class="badge badge-danger"><?= $row['status'] ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="?page=kab-kota_masuk&method=detail&id=<?= $row['id'] ?>" class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>