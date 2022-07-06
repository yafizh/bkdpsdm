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

    if (file_exists($dokumen1)) unlink($dokumen1);
    if (file_exists($dokumen2)) unlink($dokumen2);
    if (file_exists($dokumen3)) unlink($dokumen3);
    if (file_exists($dokumen4)) unlink($dokumen4);
    if (file_exists($dokumen5)) unlink($dokumen5);
    if (file_exists($dokumen6)) unlink($dokumen6);
    if (file_exists($dokumen7)) unlink($dokumen7);
    if (file_exists($dokumen8)) unlink($dokumen8);
    if (file_exists($dokumen9)) unlink($dokumen9);
    if (file_exists($dokumen10)) unlink($dokumen10);

    $sql = "DELETE FROM mutasi WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Pengajuan mutasi berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='?page=" . $_GET['page'] . "';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
}
