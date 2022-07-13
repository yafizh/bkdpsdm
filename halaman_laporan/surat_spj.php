<?php include_once("../database/koneksi.php"); ?>
<?php include_once("../utils/utils.php"); ?>
<?php
$q = "SELECT spj.*, pegawai.nama, pegawai.nip FROM spj INNER JOIN pegawai ON pegawai.id=spj.id_pegawai WHERE spj.id=" . $_GET['id'];

if ($result = $mysqli->query($q)) {
} else echo "Error: " . $q . "<br>" . $mysqli->error;

$data = $result->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan</title>
    <link href="bootstrap.min.css" rel="stylesheet">
</head>
<style>
    @page {
        margin: 0;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row gx-0 p-4">
            <div class="col-auto">
                <img src="../assets/img/logo.png" alt="" width="100">
            </div>
            <div class="col">
                <div class="row p-4">
                    <div class="col-12 text-center">
                        <h5>PEMERINTAH DAERAH KABUPATEN BANJAR</h5>
                    </div>
                    <div class="col-12 text-center">
                        <h5>SURAT BUKTI PENGELUARAN/BELANJA</h5>
                    </div>
                    <div class="col-3">
                        Nomor
                    </div>
                    <div class="col-9">
                        : 
                    </div>
                    <div class="col-3">
                        Tanggal
                    </div>
                    <div class="col-9">
                        : <?= Date("d") ?> <?= BULAN_DALAM_INDONESIA[Date("m") - 1] ?> <?= Date("Y") ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gx-0 px-4">
            <div class="col-4">Urusan Pemerintah</div>
            <div class="col-8">
                : <?= $data['urusan_pemerintah']; ?>
            </div>
            <div class="col-4">Unit Organisasi</div>
            <div class="col-8">
                : <?= $data['unit_organisasi']; ?>
            </div>
            <div class="col-4">Sub Unit Organisasi</div>
            <div class="col-8">
                : <?= $data['sub_unit_organisasi']; ?>
            </div>
        </div>
        <div class="row gx-0 px-4 py-3">
            <div class="col-12">Telah Terima dari bendahara pengeluaran uang sejumlah Rp. <?= number_format($data['jumlah_uang'],0,",","."); ?>.-</div>
            <div class="col-4">Terbilang: </div>
            <div class="col-8">
                <?php
                $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");

                function penyebut($nilai)
                {
                    $nilai = abs($nilai);
                    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
                    $temp = "";
                    if ($nilai < 12) {
                        $temp = " " . $huruf[$nilai];
                    } else if ($nilai < 20) {
                        $temp = penyebut($nilai - 10) . " belas";
                    } else if ($nilai < 100) {
                        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
                    } else if ($nilai < 200) {
                        $temp = " seratus" . penyebut($nilai - 100);
                    } else if ($nilai < 1000) {
                        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
                    } else if ($nilai < 2000) {
                        $temp = " seribu" . penyebut($nilai - 1000);
                    } else if ($nilai < 1000000) {
                        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
                    } else if ($nilai < 1000000000) {
                        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
                    } else if ($nilai < 1000000000000) {
                        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
                    } else if ($nilai < 1000000000000000) {
                        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
                    }
                    return $temp;
                }

                function terbilang($nilai)
                {
                    if ($nilai < 0) {
                        $hasil = "minus " . trim(penyebut($nilai));
                    } else {
                        $hasil = trim(penyebut($nilai));
                    }
                    return $hasil;
                }
                ?>
                : <b class="text-capitalize"><?= terbilang(abs($data['jumlah_uang'])); ?> Rupiah</b>
            </div>
        </div>
        <div class="row gx-0 px-4">
            <div class="col-12">
                Yaitu Untuk Pembayaran
            </div>
            <div class="col-4">Program</div>
            <div class="col-8">
                : <?= $data['program']; ?>
            </div>
            <div class="col-4">Kegiatan</div>
            <div class="col-8">
                : <?= $data['kegiatan']; ?>
            </div>
            <div class="col-4">Kode Rekening</div>
            <div class="col-8">
                : <?= $data['kode_rekening']; ?>
            </div>
            <div class="col-4">Untuk Keperluan</div>
            <div class="col-8">
                : <?= $data['keperluan']; ?>
            </div>
        </div>
        <div class="row gx-0 py-4">
            <div class="col-6 text-center">Yang berhak menerima pembayaran</div>
            <div class="col-6"></div>
            <br><br><br><br><br>
            <div class="col-6 text-center"><b><?= $data['nama']; ?></b></div>
            <div class="col-6"></div>
            <div class="col-6 text-center">NIP. <?= $data['nip']; ?></div>
            <div class="col-6"></div>
        </div>
        <div class="row gx-0">
            <div class="col-4 text-center">Mengetahui,</div>
            <div class="col-8"></div>
            <br>
            <div class="col-4 text-center">Kepala Badan Kepegawaian dan Pengembangan SDM</div>
            <div class="col-4 text-center">Bendahara Pengeluaran</div>
            <div class="col-4 text-center">Pejabat Pelaksaan Teknis Kegiatan</div>

            <br><br><br><br><br>

            <div class="col-4 text-center" style="font-size: 14px;"><b>RAKHATI DHANY, S.IP M.AP MIDS</b></div>
            <div class="col-4 text-center" style="font-size: 14px;"><b>ANNISA APRILIA, S.Ak</b></div>
            <div class="col-4 text-center" style="font-size: 14px;"><b>Dr. Ahmad Yaseer Noor Hafidz. M.Pd</b></div>
            <div class="col-4 text-center" style="font-size: 14px;">NIP. 197410051993111001</div>
            <div class="col-4 text-center" style="font-size: 14px;">NIP. 199004292011012001</div>
            <div class="col-4 text-center" style="font-size: 14px;">NIP. 198501292010011018</div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>