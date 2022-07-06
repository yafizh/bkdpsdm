<?php

if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_struktural WHERE id=" . $_GET['id']);
    $data = $result->fetch_assoc();
    $dokumen1 = $data['surat_pengantar_skpd'];
    $dokumen2 = $data['sk_pangkat_terakhir'];
    $dokumen3 = $data['sk_jabatan_spmj_spp_spmt'];
    $dokumen4 = $data['ijazah_transkip_nilai'];
    $dokumen5 = $data['skp'];

    if (file_exists($dokumen1)) unlink($dokumen1);
    if (file_exists($dokumen2)) unlink($dokumen2);
    if (file_exists($dokumen3)) unlink($dokumen3);
    if (file_exists($dokumen4)) unlink($dokumen4);
    if (file_exists($dokumen5)) unlink($dokumen5);

    $sql = "DELETE FROM kenaikan_pangkat_struktural WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Pengajuan struktural berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='?page=struktural';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=struktural';</script>";
}
