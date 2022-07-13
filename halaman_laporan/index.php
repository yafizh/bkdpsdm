<section class="content pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Kenaikan Pangkat Otomatis</h3>
                    </div>
                    <form action="halaman_laporan/kenaikan_pangkat.php?kenaikan_pangkat=otomatis" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <select class="form-control" id="periode" name="periode">
                                    <option value="">Semua Periode</option>
                                    <option value="April">April</option>
                                    <option value="Oktober">Oktober</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Mutasi SKPD</h3>
                    </div>
                    <form action="halaman_laporan/mutasi.php?mutasi=skpd" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Surat Pertanggung Jawaban</h3>
                    </div>
                    <form action="halaman_laporan/spj.php" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="jenis_spj">Jenis SPJ</label>
                                <select class="form-control" id="jenis_spj" name="jenis_spj">
                                    <option value="">Semua Jenis</option>
                                    <option value="KENAIKAN PANGKAT">Kenaikan Pangkat</option>
                                    <option value="MUTASI">Mutasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Kenaikan Pangkat Struktural</h3>
                    </div>
                    <form action="halaman_laporan/kenaikan_pangkat.php?kenaikan_pangkat=struktural" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <select class="form-control" id="periode" name="periode">
                                    <option value="">Semua Periode</option>
                                    <option value="April">April</option>
                                    <option value="Oktober">Oktober</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Mutasi Kabupaten/Kota Masuk</h3>
                    </div>
                    <form action="halaman_laporan/mutasi.php?mutasi=kab-kota_masuk&jenis_mutasi=MASUK&tujuan_mutasi=KAB/KOTA" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Mutasi Mutasi Provinsi Masuk</h3>
                    </div>
                    <form action="halaman_laporan/mutasi.php?mutasi=provinsi_masuk&jenis_mutasi=MASUK&tujuan_mutasi=PROVINSI" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Kenaikan Pangkat Fungsional</h3>
                    </div>
                    <form action="halaman_laporan/kenaikan_pangkat.php?kenaikan_pangkat=fungsional" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="periode">Periode</label>
                                <select class="form-control" id="periode" name="periode">
                                    <option value="">Semua Periode</option>
                                    <option value="April">April</option>
                                    <option value="Oktober">Oktober</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Mutasi Kabupaten/Kota Keluar</h3>
                    </div>
                    <form action="halaman_laporan/mutasi.php?mutasi=kab-kota_keluar&jenis_mutasi=KELUAR&tujuan_mutasi=KAB/KOTA" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Laporan Mutasi Provinsi Keluar</h3>
                    </div>
                    <form action="halaman_laporan/mutasi.php?mutasi=provinsi_masuk&jenis_mutasi=KELUAR&tujuan_mutasi=PROVINSI" method="POST" target="_blank">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dari">Dari</label>
                                <input type="date" class="form-control" id="dari" name="dari" value="<?= Date("Y-m-d") ?>">
                            </div>
                            <div class="form-group">
                                <label for="sampai">Sampai</label>
                                <input type="date" class="form-control" id="sampai" name="sampai" value="<?= Date("Y-m-d") ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Cetak</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>