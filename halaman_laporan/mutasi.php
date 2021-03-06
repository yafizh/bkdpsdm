<?php include_once("../database/koneksi.php"); ?>
<?php include_once("../utils/utils.php"); ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laporan</title>
	<link href="bootstrap.min.css" rel="stylesheet">
</head>

<body>

	<header class="text-center py-0">
		<img src="../assets/img/logo.png" width="100" class="position-absolute start-0 top-0">
		<div class="flex-grow-1 d-flex flex-column justify-content-center">
			<h5>BADAN KEPEGAWAIAN DAERAH</h5>
			<h5>DAN PENGEMBANGAN SUMBER DAYA MANUSIA</h5>
			<h5>KABUPATEN BANJAR</h5>
			<h6 style="font-weight: normal;">Jl. Menteri Empat No.26, Sungai Paring, Kec. Martapura,</h6>
			<h6 style="font-weight: normal;">Kabupaten Banjar, Kalimantan Selatan 70614</h6>
		</div>
	</header>
	<hr>
	<?php

	?>
	<section id="filter" class="my-4">
		<table>
			<tr>
				<td>Laporan</td>
				<?php if ($_GET['mutasi'] === 'skpd') : ?>
					<td>: Mutasi SKPD</td>
				<?php elseif ($_GET['mutasi'] === 'kab-kota_masuk') : ?>
					<td>: Mutasi Kabupaten/Kota Masuk</td>
				<?php elseif ($_GET['mutasi'] === 'kab-kota_keluar') : ?>
					<td>: Mutasi Kabupaten/Kota Keluar</td>
				<?php elseif ($_GET['mutasi'] === 'provinsi_masuk') : ?>
					<td>: Mutasi Provinsi Masuk</td>
				<?php elseif ($_GET['mutasi'] === 'provinsi_keluar') : ?>
					<td>: Mutasi Provinsi Keluar</td>
				<?php endif; ?>
			</tr>
			<tr>
				<td>Dari</td>
				<td>: <?= explode('-', $_POST['dari'])[2] . " " . BULAN_DALAM_INDONESIA[explode('-', $_POST['dari'])[1] - 1] . " " . explode('-', $_POST['dari'])[0] ?></td>
			</tr>
			<tr>
				<td>Sampai</td>
				<td>: <?= explode('-', $_POST['sampai'])[2] . " " . BULAN_DALAM_INDONESIA[explode('-', $_POST['sampai'])[1] - 1] . " " . explode('-', $_POST['sampai'])[0] ?></td>
			</tr>
		</table>
	</section>
	<section id="data">
		<table class="table table-bordered">
			<thead class="text-center">
				<th>No</th>
				<th>NIP</th>
				<th>Nama</th>
				<th>Tanggal Pengajuan</th>
				<th>Tanggal Verifikasi</th>
				<th>Tanggal Selesai</th>
			</thead>
			<tbody>
				<?php
				$dari = $_POST['dari'];
				$sampai = $_POST['sampai'];
				$table = "";
				if ($_GET['mutasi'] === 'skpd') $table = "mutasi_skpd";
				else $table = "mutasi";
				$q = "
					SELECT 
						$table.id, 
						DATE($table.tanggal_pengajuan) AS tanggal_pengajuan, 
						DATE($table.tanggal_verifikasi) AS tanggal_verifikasi, 
						DATE($table.tanggal_selesai) AS tanggal_selesai, 
						pegawai.nama AS nama_pegawai, 
						pegawai.nip AS nip_pegawai 
					FROM 
						 $table
					INNER JOIN 
						pegawai 
					ON 
						pegawai.id=$table.id_pegawai  
					WHERE 
						(DATE($table.tanggal_pengajuan) >= '$dari' AND DATE($table.tanggal_pengajuan) <= '$sampai') " .
					((isset($_GET['jenis_mutasi']) && isset($_GET['tujuan_mutasi'])) ? "AND $table.tujuan_mutasi='" . $_GET['tujuan_mutasi'] . "' AND $table.jenis_mutasi='" . $_GET['jenis_mutasi'] . "'" : "")
					. " 
					ORDER BY 
						$table.id";

				if ($result = $mysqli->query($q)) {
				} else die("Error: " . $q . "<br>" . $mysqli->error);
				$no = 1;
				?>
				<?php if ($result->num_rows) : ?>
					<?php while ($row = $result->fetch_assoc()) : ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td class="text-center"><?= $row['nip_pegawai']; ?></td>
							<td><?= $row['nama_pegawai']; ?></td>
							<td class="text-center"><?= explode('-', $row['tanggal_pengajuan'])[2] . " " . BULAN_DALAM_INDONESIA[explode('-', $row['tanggal_pengajuan'])[1] - 1] . " " . explode('-', $row['tanggal_pengajuan'])[0] ?></td>
							<td class="text-center"><?= explode('-', $row['tanggal_verifikasi'])[2] . " " . BULAN_DALAM_INDONESIA[explode('-', $row['tanggal_verifikasi'])[1] - 1] . " " . explode('-', $row['tanggal_verifikasi'])[0] ?></td>
							<td class="text-center"><?= explode('-', $row['tanggal_selesai'])[2] . " " . BULAN_DALAM_INDONESIA[explode('-', $row['tanggal_selesai'])[1] - 1] . " " . explode('-', $row['tanggal_selesai'])[0] ?></td>
						</tr>
					<?php endwhile; ?>
				<?php else : ?>
					<tr>
						<td colspan="7" class="text-center">Tidak Ada Data</td>
					</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</section>
	<?php include_once("signature.php"); ?>

	<script>
		window.print();
	</script>
</body>

</html>