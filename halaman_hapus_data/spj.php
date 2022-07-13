<?php

if (isset($_GET['id'])) {
    $sql = "DELETE FROM spj WHERE id=" . $_GET['id'];
    if ($mysqli->query($sql) === TRUE) {
        echo "<script>alert('Pengajuan spj berhasil dihapus.')</script>";
        echo "<script>" .
            "window.location.href='?page=" . $_GET['page'] . "';" .
            "</script>";
    } else echo "Error: " . $sql . "<br>" . $mysqli->error;
} else {
    echo "<script>alert('id tidak ditemukan');</script>";
    echo "<script>window.location.href = '?page=" . $_GET['page'] . "';</script>";
}
