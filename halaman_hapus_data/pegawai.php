<?php

if (isset($_GET['id'])) {
    $result = $mysqli->query("SELECT * FROM pegawai WHERE id=" . $_GET['id']);
    $data = $result->fetch_assoc();

    $sql_user = "DELETE FROM user WHERE id=" . $data['id_user'];
    $sql_pegawai = "DELETE FROM pegawai WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql_user) === TRUE && $mysqli->query($sql_pegawai) === TRUE) {
        if (file_exists($data['gambar'])) unlink($data['gambar']);
        echo "<script>alert('Pegawai berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='?page=" . $_GET['page'] . "';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
}
