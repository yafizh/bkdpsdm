<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Surat Pertunggung Jawaban Mutasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Surat Pertunggung Jawaban Mutasi</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">

    <div class="card">
        <div class="card-header">
            <a href="?page=spj_mutasi&method=tambah" class="btn btn-primary float-right">Tambah</a>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NIP Pegawai</th>
                        <th class="text-center">Nama Pegawai</th>
                        <th class="text-center">Tanggal Kegiatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $q = "SELECT spj.*, pegawai.nama, pegawai.nip FROM spj INNER JOIN pegawai ON spj.id_pegawai=pegawai.id WHERE spj.jenis_spj='MUTASI' ORDER BY spj.id DESC";
                    $no = 1;
                    if ($result = $mysqli->query($q)) {
                    } else echo "Error: " . $q . "<br>" . $mysqli->error;
                    ?>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td class="text-center" style="vertical-align: middle;"><?= $no++; ?></td>
                            <td class="text-center" style="vertical-align: middle;"><?= $row['nip'] ?></td>
                            <td style="vertical-align: middle;"><?= $row['nama'] ?></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <?= explode('-',$row['tanggal_kegiatan'])[2] ?> <?= BULAN_DALAM_INDONESIA[explode('-',$row['tanggal_kegiatan'])[1] - 1] ?> <?= explode('-',$row['tanggal_kegiatan'])[0] ?>
                            </td>
                            <td class="text-center">
                                <a href="halaman_laporan/surat_spj.php?id=<?= $row['id'] ?>" target="_blank" class="btn btn-sm btn-secondary"><i class="fas fa-file"></i></a>
                                <a href="?page=spj_mutasi&method=detail&id=<?= $row['id'] ?>" class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                                <a href="?page=spj_mutasi&method=edit&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                <form action="?page=spj_mutasi&method=hapus&id=<?= $row['id'] ?>" method="POST" class="d-inline">
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</section>