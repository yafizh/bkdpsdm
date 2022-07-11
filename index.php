<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once "templates/header.php";
include_once "utils/utils.php";
include_once "database/koneksi.php";
if (isset($_SESSION['status'])) {
    include_once "templates/navbar.php";
    if ($_SESSION['status'] == 'ADMIN') include_once "templates/sidebar/sidebar_admin.php";
    else if ($_SESSION['status'] == 'PEGAWAI') include_once "templates/sidebar/sidebar_pegawai.php";
    else if ($_SESSION['status'] == 'PIMPINAN') include_once "templates/sidebar/sidebar_pimpinan.php";
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "pegawai":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/pegawai.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/pegawai.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/pegawai.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/pegawai.php";
                } else
                    include_once "halaman_tampil_data/pegawai.php";
                break;
            case "otomatis":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/kenaikan_pangkat_otomatis.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/kenaikan_pangkat_otomatis.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/kenaikan_pangkat_otomatis.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/kenaikan_pangkat_otomatis.php";
                } else
                    include_once "halaman_tampil_data/kenaikan_pangkat_otomatis.php";
                break;
            case "struktural":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/kenaikan_pangkat_struktural.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/kenaikan_pangkat_struktural.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/kenaikan_pangkat_struktural.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/kenaikan_pangkat_struktural.php";
                } else
                    include_once "halaman_tampil_data/kenaikan_pangkat_struktural.php";
                break;
            case "fungsional":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/kenaikan_pangkat_fungsional.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/kenaikan_pangkat_fungsional.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/kenaikan_pangkat_fungsional.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/kenaikan_pangkat_fungsional.php";
                } else
                    include_once "halaman_tampil_data/kenaikan_pangkat_fungsional.php";
                break;
            case "skpd":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/mutasi_skpd.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/mutasi_skpd.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/mutasi_skpd.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/mutasi_skpd.php";
                } else
                    include_once "halaman_tampil_data/mutasi_skpd.php";
                break;
            case "kab-kota_masuk":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/mutasi.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/mutasi.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/mutasi.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/mutasi.php";
                } else
                    include_once "halaman_tampil_data/mutasi_kab-kota_masuk.php";
                break;
            case "kab-kota_keluar":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/mutasi.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/mutasi.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/mutasi.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/mutasi.php";
                } else
                    include_once "halaman_tampil_data/mutasi_kab-kota_keluar.php";
                break;
            case "provinsi_masuk":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/mutasi.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/mutasi.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/mutasi.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/mutasi.php";
                } else
                    include_once "halaman_tampil_data/mutasi_provinsi_masuk.php";
                break;
            case "provinsi_keluar":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/mutasi.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/mutasi.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/mutasi.php";
                    elseif ($_GET['method'] === 'detail')
                        include_once "halaman_detail/mutasi.php";
                } else
                    include_once "halaman_tampil_data/mutasi_provinsi_keluar.php";
                break;
            case "spj_mutasi":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/spj.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/spj.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/spj.php";
                } else
                    include_once "halaman_tampil_data/spj_mutasi.php";
                break;
            case "spj_kenaikan_pangkat":
                if (isset($_GET['method'])) {
                    if ($_GET['method'] === 'tambah')
                        include_once "halaman_tambah_data/spj.php";
                    elseif ($_GET['method'] === 'edit')
                        include_once "halaman_edit_data/spj.php";
                    elseif ($_GET['method'] === 'hapus')
                        include_once "halaman_hapus_data/spj.php";
                } else
                    include_once "halaman_tampil_data/spj_kenaikan_pangkat.php";
                break;
            case "laporan":
                include_once "halaman_laporan/index.php";
                break;
            default:
                include_once "beranda.php";
        }
    } else include_once "beranda.php";
} else header('Location: halaman_auth/login.php');
include_once "templates/footer.php";
