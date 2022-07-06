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
("admin", "admin", "ADMIN"),
("pimpinan", "pimpinan", "PIMPINAN"),
("nuril", "nuril", "PEGAWAI");

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
(3, "1111", "Nuril Maulida", 'pangkat', 'gol', 'nomor_telepon', '2020-01-01', 'jabatan', 'unit_kerja', '1980-01-01', '');

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
    status ENUM('PENGAJUAN', 'DITERIMA', 'DITOLAK', 'SELESAI') NOT NULL,
    keterangan TEXT NULL,
    nota_usul VARCHAR(255) NULL,
    sk_mutasi VARCHAR(255) NULL,
    PRIMARY KEY(id)
);