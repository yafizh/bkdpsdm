<?php

if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM kenaikan_pangkat_otomatis WHERE id=" . $_GET['id']);
    $data = $result->fetch_assoc();
    $dokumen1 = $data['surat_pengantar_skpd'];
    $dokumen2 = $data['sk_pangkat_terakhir'];
    $dokumen3 = $data['skp_tahun_terakhir'];
    $dokumen4 = $data['sk_pindah_tempat_tugas'];
    $dokumen5 = $data['stlu'];
    $dokumen6 = $data['ijazah_transkip_nilai'];
    $dokumen7 = $data['sk_cpns_pns'];

    if (file_exists($dokumen1)) unlink($dokumen1);
    if (file_exists($dokumen2)) unlink($dokumen2);
    if (file_exists($dokumen3)) unlink($dokumen3);
    if (file_exists($dokumen4)) unlink($dokumen4);
    if (file_exists($dokumen5)) unlink($dokumen5);
    if (file_exists($dokumen6)) unlink($dokumen6);
    if (file_exists($dokumen7)) unlink($dokumen7);

    $sql = "DELETE FROM kenaikan_pangkat_otomatis WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Pengajuan otomatis berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='?page=otomatis';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=otomatis';</script>";
}
