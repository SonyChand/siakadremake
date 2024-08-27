<div class="container">
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">Laporan</h3>
            </div>
        </div>
        <div class="modal fade" id="jadwal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Download <?= $title ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="<?= base_url('output/dataJadwal') ?>" target="_blank">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select id="kelas" class="form-select" name="kelas" required>
                                        <option value="" hidden>
                                            Pilih Kelas
                                        </option>
                                        <option value="all">Semua Data</option>
                                        <?php foreach ($data3 as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success">Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="siswa" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Download <?= $title ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="<?= base_url('output/dataSiswa') ?>" target="_blank">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <select id="kelas" class="form-select" name="kelas" required>
                                        <option value="" hidden>
                                            Pilih Kelas
                                        </option>
                                        <option value="all">Semua Data</option>
                                        <?php foreach ($data3 as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success">Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="penilaian" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Download <?= $title ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="<?= base_url('output/dataNilai') ?>" target="_blank">
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="id_siswa" class="form-label">Siswa</label>
                                    <select id="id_siswa" class="form-select" name="id_siswa" required>
                                        <option value="" hidden>
                                            Pilih Siswa
                                        </option>
                                        <option value="all">Semua Data</option>
                                        <?php foreach ($data1 as $row) : ?>
                                            <option value="<?= $row->id ?>"><?= $row->nisn ?> - <?= $row->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="id_matpel" class="form-label">Mata Pelajaran</label>
                                    <select id="id_matpel" class="form-select" name="id_matpel" required>
                                        <option value="" hidden>
                                            Pilih Mata Pelajaran
                                        </option>
                                        <option value="all">Semua Data</option>
                                        <?php foreach ($data2 as $row): ?>
                                            <option value="<?= $row->id ?>"><?= $row->nama ?> - <?= $row->kode ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label for="output" class="form-label">Output</label>
                                    <select id="output" class="form-select" name="output" required>
                                        <option value="" hidden>
                                            Pilih Output
                                        </option>
                                        <option value="rekap">Rekap</option>
                                        <option value="rapor">Rapor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success">Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Download Laporan</h4>
                    </div>
                    <div class="card-body text-center">
                        <p class="demo">
                            <a class="btn btn-black" target="_blank" href="<?= base_url('output/dataGuru') ?>">Guru</a>

                            <button class="btn btn-primary" target="_blank" href="" data-bs-toggle="modal" data-bs-target="#jadwal">Jadwal Mata Pelajaran</button>


                            <a class="btn btn-secondary" target="_blank" href="<?= base_url('output/dataKelas') ?>">Kelas</a>

                            <a class="btn btn-info" target="_blank" href="<?= base_url('output/dataMataPelajaran') ?>">Mata Pelajaran</a>

                            <button class="btn btn-success" target="_blank" href="" data-bs-toggle="modal" data-bs-target="#siswa">Siswa</button>

                            <button class="btn btn-warning" target="_blank" href="" data-bs-toggle="modal" data-bs-target="#penilaian">Penilaian</button>

                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>