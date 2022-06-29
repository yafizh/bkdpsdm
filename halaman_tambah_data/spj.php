<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Form Surat Penanggung Jawaban</h1>
            </div>
            <!-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Form Pengajuan Mutasi SKPD</li>
                </ol>
            </div> -->
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Jenis SPJ</label>
                            <select class="form-control" style="width: 100%;">
                                <option value="" disabled selected>Pilih Pegawai</option>
                                <option value="" disabled selected>SPJ Kenaikan Pangkat</option>
                                <option value="" disabled selected>SPJ Mutasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Pegawai</label>
                            <select class="form-control select2bs4" style="width: 100%;">
                                <option value="" disabled selected>Pilih Pegawai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Tanggal Kegiatan</label>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Dokumen</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputFile">Urusan Pemerintah</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Unit Organisasi</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Sub Unit Organisasi</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Kegiatan</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Keperluan</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Kode Rekening</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Jumlah Uang</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })
</script>