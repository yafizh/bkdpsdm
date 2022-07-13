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
				<?php if ($_POST['jenis_spj'] === 'KENAIKAN PANGKAT') : ?>
					<td>: Surat Penanggung Jawaban Kenaikan Pangkat</td>
				<?php elseif ($_POST['jenis_spj'] === 'MUTASI') : ?>
					<td>: Surat Penanggung Jawaban Mutasi</td>
				<?php else: ?>
					<td>: Surat Penanggung Jawaban Kenikan Pangkat dan Mutasi</td>
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
				<th>Tanggal Kegiatan</th>
			</thead>
			<tbody>
				<?php
				$dari = $_POST['dari'];
				$sampai = $_POST['sampai'];
				$table = "spj";
				if ($_POST['jenis_spj'] === 'KENAIKAN PANGKAT') $jenis_spj = "KENAIKAN PANGKAT";
				elseif ($_POST['jenis_spj'] === 'MUTASI') $jenis_spj = "MUTASI";
				else $jenis_spj = "";
				$q = "
					SELECT 
						$table.id, 
						tanggal_kegiatan, 
						pegawai.nama AS nama_pegawai, 
						pegawai.nip AS nip_pegawai 
					FROM 
						 $table
					INNER JOIN 
						pegawai 
					ON 
						pegawai.id=$table.id_pegawai  
					WHERE 
						$table.tanggal_kegiatan >= '$dari' AND $table.tanggal_kegiatan <= '$sampai' 
						AND 
						$table.jenis_spj LIKE '%$jenis_spj%' 
					ORDER BY 
						$table.id";

				if ($result = $mysqli->query($q)) {
				} else echo "Error: " . $q . "<br>" . $mysqli->error;
				$no = 1;
				?>
				<?php if ($result->num_rows) : ?>
					<?php while ($row = $result->fetch_assoc()) : ?>
						<tr>
							<td class="text-center"><?= $no++; ?></td>
							<td class="text-center"><?= $row['nip_pegawai']; ?></td>
							<td><?= $row['nama_pegawai']; ?></td>
							<td class="text-center"><?= explode('-', $row['tanggal_kegiatan'])[2] . " " . BULAN_DALAM_INDONESIA[explode('-', $row['tanggal_kegiatan'])[1] - 1] . " " . explode('-', $row['tanggal_kegiatan'])[0] ?></td>
						</tr>
					<?php endwhile; ?>
				<?php else : ?>
					<tr>
						<td colspan="4" class="text-center">Tidak Ada Data</td>
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