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

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="p-1 flex-grow-1">
                                <h4 class="card-title"><?= $title ?></h4>
                            </div>
                            <div class="p-1">
                                <a href="" class="badge btn-primary" data-bs-toggle="modal" data-bs-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add
                                </a>
                            </div>
                            <div class="p-1">
                                <a class="badge btn-warning" target="_blank" href="<?= base_url('output/data') . str_replace(' ', '', $title) ?>"><i class="fa fa-download"></i> Download</a>
                            </div>
                        </div>


                        <!-- Table with stripped rows -->
                    </div>
                    <div class="modal fade" id="addRowModal" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah <?= $title ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="kode" class="form-label">Kode</label>
                                                <input type="text" class="form-control" name="kode" id="kode" required>
                                                <?= form_error('kode', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama" class="form-label">Mata Pelajaran</label>
                                                <input type="text" class="form-control" name="nama" id="nama" required>
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
                                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="silabus" class="col-form-label">File Silabus</label>
                                                <!-- <div class="input-group"> -->
                                                <div class="custom-file">
                                                    <input class="form-control" type="file" name="silabus" id="silabus" accept=".pdf,application/pdf,.doc,application/msword,.docx,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                </div>
                                                <!-- </div> -->
                                                <span class="small"><strong style="font-size: 10px;line-height:0.1;">Ukuran File tidak melebihi 5 MB dan Format (PDF/DOC/DOCX)</strong></span>
                                            </div>
                                        </div>

                                        <h6 class="text-center mt-3">Bobot Nilai (Isi yang sesuai dan Kosongkan yang tidak perlu)</h6>
                                        <div class="row mb-3">
                                            <div class="form-group col-md-4">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Kehadiran</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="b1" id="b1" min="0" max="50" />
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Tugas</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="b2" id="b2" min="0" max="50" />
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">UTS</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="b3" id="b3" min="0" max="50" />
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
                                                        name="b4" id="b4" min="0" max="50" />
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Sikap</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="b5" id="b5" min="0" max="50" />
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">Quiz</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="b6" id="b6" min="0" max="50" />
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
                                                        name="g1" id="g1" />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">C</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="g2" id="g2" />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">B</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="g3" id="g3" />
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">A</span>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="g4" id="g4" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" name="submit<?= $title ?>" class="btn btn-outline-success" value="Tambah">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End Basic Modal-->
                    <?= $this->session->flashdata('matpel'); ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            Kode
                                        </th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Lampiran Silabus</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            Kode
                                        </th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Lampiran Silabus</th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($dataTab as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->kode ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->deskripsi ?></td>
                                            <td>
                                                <?php
                                                if ($row->silabus != null) {
                                                    $link = base_url('assets/doc/silabus/') . $row->silabus;
                                                    echo '<a target="_blank" class="badge badge-warning text-decoration-none" href="' . $link . '">Download</a>';
                                                } else {
                                                    echo 'Tidak ada';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('akademik/ubahMatpel/') . $row->id ?>">
                                                    <span class="badge bg-warning"><i class="bi bi-pencil-square me-1"></i> Ubah</span>
                                                </a>
                                                <a href="<?= base_url('akademik/hapusMatpel/') . $row->id ?>" onclick="return confirm('Apakah anda yakin')">
                                                    <span class="badge bg-danger"><i class="bi bi-trash me-1"></i> Hapus</span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>