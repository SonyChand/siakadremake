<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"><?= $title ?></h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="<?= base_url() ?>">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?= ucwords($this->uri->segment(1)) ?></a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#"><?= $title ?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header"><?= $title ?></div>
                    <div class="card-body">

                        <!-- Multi Columns Form -->
                        <form class="row g-3" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?= $oneData->id ?>">
                            <div class="col-md-6 mb-2">
                                <label for="nama" class="form-label">Mata Pelajaran</label>
                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $oneData->nama ?>" required>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="kode" class="form-label">Kode</label>
                                <input type="tel" class="form-control" name="kode" id="kode" value="<?= $oneData->kode ?>" required>
                                <?= form_error('kode', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" required><?= $oneData->deskripsi ?></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="silabus" class="col-form-label">Lampiran Silabus</label>
                                <!-- <div class="input-group"> -->
                                <div class="custom-file">
                                    <input class="form-control" type="file" name="silabus" id="silabus" accept=".pdf,application/pdf,.doc,application/msword,.docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                </div>
                                <a target="_blank" href="<?= base_url('assets/doc/silabus/') . $oneData->silabus; ?>" class="badge badge-warning text-decoration-none"><i class="fas fa-eye"></i> Preview</a>
                                <!-- </div> -->
                                <span class="small"><strong style="font-size: 10px;line-height:0.1;">Ukuran Foto tidak melebihi 5 MB dan Format (PDF/DOC/DOCX)</strong></span>
                            </div>
                            <h6 class="text-center mt-3">Bobot Nilai (Isi yang sesuai dan Kosongkan yang tidak perlu)</h6>
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Kehadiran</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="b1" id="b1" min="0" max="50" value="<?= $oneData->b1 ?>" />
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Tugas</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="b2" id="b2" min="0" max="50" value="<?= $oneData->b2 ?>" />
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">UTS</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="b3" id="b3" min="0" max="50" value="<?= $oneData->b3 ?>" />
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">UAS</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="b4" id="b4" min="0" max="50" value="<?= $oneData->b4 ?>" />
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Sikap</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="b5" id="b5" min="0" max="50" value="<?= $oneData->b5 ?>" />
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Quiz</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="b6" id="b6" min="0" max="50" value="<?= $oneData->b6 ?>" />
                                        <span class="input-group-text">%</span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-center mt-3">Minimal Grade Nilai</h6>
                            <div class="row mb-3">
                                <div class="form-group col-md-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">D</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="g1" id="g1" value="<?= $oneData->g1 ?>" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">C</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="g2" id="g2" value="<?= $oneData->g2 ?>" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">B</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="g3" id="g3" value="<?= $oneData->g3 ?>" />
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">A</span>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="g4" id="g4" value="<?= $oneData->g4 ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="text-end mt-5">
                                <a href="<?= base_url('akademik/matpel') ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>