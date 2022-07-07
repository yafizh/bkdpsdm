<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pengajuan Kenaikan Pangkat Fungsional</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Pengajuan Kenaikan Pangkat Fungsional</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <?php if ($_SESSION['status'] === 'PEGAWAI') : ?>
            <div class="card-header">
                <a href="?page=fungsional&method=tambah" class="btn btn-primary float-right">Tambah Pengajuan</a>
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
                        $q = "SELECT kenaikan_pangkat_fungsional.id, kenaikan_pangkat_fungsional.status, DATE(kenaikan_pangkat_fungsional.tanggal_pengajuan) AS tanggal_pengajuan, pegawai.nama AS nama_pegawai, pegawai.nip AS nip_pegawai FROM kenaikan_pangkat_fungsional INNER JOIN pegawai ON pegawai.id=kenaikan_pangkat_fungsional.id_pegawai WHERE pegawai.id=" . $_SESSION['id_pegawai'] . " ORDER BY kenaikan_pangkat_fungsional.id";
                    elseif ($_SESSION['status'] === 'PIMPINAN')
                        $q = "SELECT kenaikan_pangkat_fungsional.id, kenaikan_pangkat_fungsional.status, DATE(kenaikan_pangkat_fungsional.tanggal_pengajuan) AS tanggal_pengajuan, pegawai.nama AS nama_pegawai, pegawai.nip AS nip_pegawai FROM kenaikan_pangkat_fungsional INNER JOIN pegawai ON pegawai.id=kenaikan_pangkat_fungsional.id_pegawai WHERE status='PENGAJUAN' ORDER BY kenaikan_pangkat_fungsional.id";
                    elseif ($_SESSION['status'] === "ADMIN")
                        $q = "SELECT kenaikan_pangkat_fungsional.id, kenaikan_pangkat_fungsional.status, DATE(kenaikan_pangkat_fungsional.tanggal_pengajuan) AS tanggal_pengajuan, pegawai.nama AS nama_pegawai, pegawai.nip AS nip_pegawai FROM kenaikan_pangkat_fungsional INNER JOIN pegawai ON pegawai.id=kenaikan_pangkat_fungsional.id_pegawai ORDER BY kenaikan_pangkat_fungsional.id";

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
                                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                <?php elseif ($row['status'] === "DITERIMA") : ?>
                                    <span class='badge badge-success'>Diterima</span>
                                <?php elseif ($row['status'] === "DITOLAK") : ?>
                                    <span class="badge badge-danger">Ditolak</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <a href="?page=fungsional&method=detail&id=<?= $row['id'] ?>" class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>