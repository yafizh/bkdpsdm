<?php

if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM mutasi_skpd WHERE id=" . $_GET['id']);
    $data = $result->fetch_assoc();
    $dokumen1 = $data['surat_pengantar_skpd'];
    $dokumen2 = $data['surat_permohonan_pns'];
    $dokumen3 = $data['sk_cpns_pns_kenaikan_pangkat'];
    $dokumen4 = $data['sk_jabatan_terakhir'];
    $dokumen5 = $data['skp_2_tahun_terakhir'];
    $dokumen6 = $data['izajah_terakhir'];
    $dokumen7 = $data['surat_pernyataan_bebas_hukuman'];

    if (file_exists($dokumen1)) unlink($dokumen1);
    if (file_exists($dokumen2)) unlink($dokumen2);
    if (file_exists($dokumen3)) unlink($dokumen3);
    if (file_exists($dokumen4)) unlink($dokumen4);
    if (file_exists($dokumen5)) unlink($dokumen5);
    if (file_exists($dokumen6)) unlink($dokumen6);
    if (file_exists($dokumen7)) unlink($dokumen7);

    $sql = "DELETE FROM mutasi_skpd WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Pengajuan mutasi SKPD berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='?page=" . $_GET['page'] . "';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
}
