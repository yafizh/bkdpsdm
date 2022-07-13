DROP DATABASE IF EXISTS `db_bkdpsdm`;
CREATE DATABASE `db_bkdpsdm`;
USE `db_bkdpsdm`;

CREATE TABLE `user` (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status ENUM('ADMIN','PEGAWAI', 'PIMPINAN') NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO `user` (
    username,
    password,
    status 
) VALUES 
("198604072011012007", "198604072011012007", "ADMIN"),
("199410302018081001", "199410302018081001", "PIMPINAN"),
("196104151986081003", "196104151986081003", "PEGAWAI"),
("199510011970210001", "199510011970210001", "PEGAWAI"),
("196608121989022002", "196608121989022002", "PEGAWAI"),
("196703071986012001", "196703071986012001", "PEGAWAI"),
("196603171987031012", "196603171987031012", "PEGAWAI"),
("197605072031210005", "197605072031210005", "PEGAWAI"),
("196910131992310060", "196910131992310060", "PEGAWAI"),
("199601101890230001", "199601101890230001", "PEGAWAI");

CREATE TABLE `pegawai` (
    id INT NOT NULL AUTO_INCREMENT,
    id_user INT NOT NULL,
    nip VARCHAR(255) NOT NULL,
    nama VARCHAR(255) NOT NULL,
    pangkat VARCHAR(255) NOT NULL,
    golongan VARCHAR(255) NOT NULL,
    nomor_telepon VARCHAR(255) NOT NULL,
    tmt DATE NOT NULL,
    jabatan VARCHAR(255) NOT NULL,
    unit_kerja VARCHAR(255) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    gambar VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO `pegawai` (
    id_user,
    nip,
    nama, 
    pangkat, 
    golongan, 
    nomor_telepon, 
    tmt, 
    jabatan, 
    unit_kerja, 
    tanggal_lahir, 
    gambar  
) VALUES 
(1, "198604072011012007", "Erma Yunita S.Pd", 'Penata Muda Tk.I', 'III/b', '085753445678', '2014-10-01', '', 'SMPN 2 SUNGAI TABUK', '1986-04-07', ''),
(2, "199410302018081001", "Muhammad Pauji, S.STP", 'Penata Muda', 'III/a', '087756908544', '2020-10-01', 'Analisis Tata Praja', 'Biro Kepegawaian', '1994-10-30', ''),
(3, "196104151986081003", "Sarbani S.E., M.A.P", 'Pembina Utama Muda', 'IV/c', '082134567800', '2015-02-10', 'Kepala Badan', 'Badan Kepegawaian Daerah Pengembangan Sumber Daya Manusia Kab.Banjar', '1961-04-15', ''),
(4, "199510011970210001", "Muhammad Ardian S.Pd", 'Penata Muda', 'III/a', '085367908766', '2014-01-01', 'Pengelola kepegawaian', '', '1995-10-01', ''),
(5, "196608121989022002", "Erna Marlina M.Pd", 'Pembina Tk.I', 'IV/b', '081321446790', '2016-01-12', 'Guru Madya', 'SMAN 1 MATARAMAN', '1966-08-12', ''),
(6, "196703071986012001", "Pina Oktavia S.Sos. M.Pd", 'Pembina', 'IV/a', '085351445231', '2015-12-01', '', 'Dinas Pendidikan Kab.Banjar', '1967-03-07', ''),
(7, "196603171987031012", "Muzazi,S.Sos. M.M", 'Pembina', 'IV/a', '085251237655', '2014-12-01', 'Kabid Bina Pendidik dan Tenaga Pendidikan', 'Dinas Pendidikan Kab.Banjar', '1966-03-17', ''),
(8, "197605072031210005", "Rahmad Renaldi ST", 'Pembina', 'IV/b', '083189076657', '2019-01-10', 'Kepala Dinas', 'Dinas Pendidikan Kab.Banjar', '1976-05-07', ''),
(9, "196910131992310060", "Reza Maulana S.Pd", 'Penata Tk.I', 'III/b', '085377908765', '2015-08-13', 'Kepala Sub Bagian Umum dan Aparatur', 'Kecamatan Putussibau Utara', '1969-10-13', ''),
(10, "199601101890230001", "Hamdiah S.Pd", 'Penata Muda Tk.I', 'III/a', '089766907866', '', 'Penata Laporan Keuangan', 'Dinas Pendidikan Kab.Kapuas Hulu', '1996-01-10', '');

CREATE TABLE `kenaikan_pangkat_otomatis` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NOT NULL,
    periode VARCHAR(255) NOT NULL,
    surat_pengantar_skpd VARCHAR(255) NOT NULL,
    sk_pangkat_terakhir VARCHAR(255) NOT NULL,
    skp_tahun_terakhir VARCHAR(255) NOT NULL,
    sk_pindah_tempat_tugas VARCHAR(255) NOT NULL,
    stlu VARCHAR(255) NOT NULL,
    ijazah_transkip_nilai VARCHAR(255) NOT NULL,
    sk_cpns_pns VARCHAR(255) NOT NULL,
    tanggal_pengajuan DATETIME NOT NULL,
    tanggal_verifikasi DATETIME NULL,
    tanggal_selesai DATETIME NULL,
    status ENUM('PENGAJUAN', 'DITERIMA', 'DITOLAK', 'SELESAI') NOT NULL,
    keterangan TEXT NULL,
    sk_kenaikan_pangkat VARCHAR(255) NULL,
    PRIMARY KEY(id)
);

CREATE TABLE `kenaikan_pangkat_struktural` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NOT NULL,
    periode VARCHAR(255) NOT NULL,
    surat_pengantar_skpd VARCHAR(255) NOT NULL,
    sk_pangkat_terakhir VARCHAR(255) NOT NULL,
    sk_jabatan_spmj_spp_spmt VARCHAR(255) NOT NULL,
    ijazah_transkip_nilai VARCHAR(255) NOT NULL,
    skp VARCHAR(255) NOT NULL,
    tanggal_pengajuan DATETIME NOT NULL,
    tanggal_verifikasi DATETIME NULL,
    tanggal_selesai DATETIME NULL,
    status ENUM('PENGAJUAN', 'DITERIMA', 'DITOLAK', 'SELESAI') NOT NULL,
    keterangan TEXT NULL,
    sk_kenaikan_pangkat VARCHAR(255) NULL,
    PRIMARY KEY(id)
);

CREATE TABLE `kenaikan_pangkat_fungsional` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NOT NULL,
    periode VARCHAR(255) NOT NULL,
    surat_pengantar_skpd VARCHAR(255) NOT NULL,
    pak_asli VARCHAR(255) NOT NULL,
    pak_sebelumnya VARCHAR(255) NOT NULL,
    sk_pangkat_terakhir VARCHAR(255) NOT NULL,
    sk_pengangkatan_jabatan_fungsional VARCHAR(255) NOT NULL,
    sk_pindah_tempat_tugas VARCHAR(255) NOT NULL,
    ijazah_transkip_nilai VARCHAR(255) NOT NULL,
    ktp VARCHAR(255) NOT NULL,
    tanggal_pengajuan DATETIME NOT NULL,
    tanggal_verifikasi DATETIME NULL,
    tanggal_selesai DATETIME NULL,
    status ENUM('PENGAJUAN', 'DITERIMA', 'DITOLAK', 'SELESAI') NOT NULL,
    keterangan TEXT NULL,
    sk_kenaikan_pangkat VARCHAR(255) NULL,
    PRIMARY KEY(id)
);

CREATE TABLE `mutasi_skpd` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NOT NULL,
    surat_pengantar_skpd VARCHAR(255) NOT NULL,
    surat_permohonan_pns VARCHAR(255) NOT NULL,
    sk_cpns_pns_kenaikan_pangkat VARCHAR(255) NOT NULL,
    sk_jabatan_terakhir VARCHAR(255) NOT NULL,
    skp_2_tahun_terakhir VARCHAR(255) NOT NULL,
    izajah_terakhir VARCHAR(255) NOT NULL,
    surat_pernyataan_bebas_hukuman VARCHAR(255) NOT NULL,
    tanggal_pengajuan DATETIME NOT NULL,
    tanggal_verifikasi DATETIME NULL,
    tanggal_selesai DATETIME NULL,
    status ENUM('PENGAJUAN', 'DITERIMA', 'DITOLAK', 'SELESAI') NOT NULL,
    keterangan TEXT NULL,
    nota_usul VARCHAR(255) NULL,
    sk_mutasi VARCHAR(255) NULL,
    PRIMARY KEY(id)
);

CREATE TABLE `mutasi` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NOT NULL,
    tujuan_mutasi ENUM('PROVINSI', 'KAB/KOTA') NOT NULL,
    jenis_mutasi ENUM('MASUK', 'KELUAR') NOT NULL,
    surat_pelepasan_penerimaan VARCHAR(255) NOT NULL,
    analisis_jabatan_dan_beban_kerja VARCHAR(255) NOT NULL,
    surat_permohonan VARCHAR(255) NOT NULL,
    sk_cpns_pns_kenaikan_pangkat VARCHAR(255) NOT NULL,
    sk_jabatan_terakhir VARCHAR(255) NOT NULL,
    izajah_terakhir VARCHAR(255) NOT NULL,
    surat_pernyataan_bebas_hukuman VARCHAR(255) NOT NULL,
    surat_keterangan_bebas_temuan VARCHAR(255) NOT NULL,
    surat_pernyataan_bebas_tugas VARCHAR(255) NOT NULL,
    skp_2_tahun_terakhir VARCHAR(255) NOT NULL,
    tanggal_pengajuan DATETIME NOT NULL,
    tanggal_verifikasi DATETIME NULL,
    tanggal_selesai DATETIME NULL,
    status ENUM('PENGAJUAN', 'DITERIMA', 'DITOLAK', 'SELESAI') NOT NULL,
    keterangan TEXT NULL,
    nota_usul VARCHAR(255) NULL,
    sk_mutasi VARCHAR(255) NULL,
    PRIMARY KEY(id)
);

CREATE TABLE `spj` (
    id INT NOT NULL AUTO_INCREMENT,
    id_pegawai INT NOT NULL,
    urusan_pemerintah VARCHAR(255) NOT NULL,
    program VARCHAR(255) NOT NULL,
    keperluan VARCHAR(255) NOT NULL,
    kode_rekening VARCHAR(255) NOT NULL,
    unit_organisasi VARCHAR(255) NOT NULL,
    sub_unit_organisasi VARCHAR(255) NOT NULL,
    kegiatan VARCHAR(255) NOT NULL,
    jumlah_uang BIGINT NOT NULL,
    tanggal_kegiatan DATE NOT NULL,
    jenis_spj ENUM('MUTASI', 'KENAIKAN PANGKAT') NOT NULL,
    PRIMARY KEY(id)
);
