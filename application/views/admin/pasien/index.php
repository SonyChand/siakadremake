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
                                <a class="badge btn-warning" target="_blank" href="<?= base_url('output/data') . $title ?>"><i class="fa fa-download"></i> Download</a>
                            </div>
                        </div>


                        <!-- Table with stripped rows -->
                    </div>
                    <div class="modal fade" id="addRowModal" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah <?= $title ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama" id="nama" required>
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tpt_lhr" class="form-label">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tpt_lhr" id="tpt_lhr" required>
                                                <?= form_error('tpt_lhr', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="tgl_lhr" class="form-label">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" required>
                                                <?= form_error('tgl_lhr', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nik" class="form-label">NIK</label>
                                                <input type="text" class="form-control" name="nik" id="nik" required>
                                                <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="suku" class="form-label">Suku</label>
                                                <input type="text" class="form-control" name="suku" id="suku" required>
                                                <?= form_error('suku', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required>
                                                <?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="no_telp" class="form-label">No Telepon Rumah</label>
                                                <input type="tel" class="form-control" name="no_telp" id="no_telp" required>
                                                <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="no_hp" class="form-label">No Handphone/Whatsapp</label>
                                                <input type="tel" class="form-control" name="no_hp" id="no_hp" required>
                                                <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                                <select id="jk" class="form-select" name="jk" required>
                                                    <option value="" hidden>
                                                        Pilih Jenis Kelamin
                                                    </option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                                <?= form_error('jk', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="alamat1" class="form-label">Alamat Rumah</label>
                                                <textarea name="alamat1" id="alamat1" class="form-control"></textarea>
                                                <?= form_error('alamat1', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="alamat2" class="form-label">Alamat Kantor</label>
                                                <textarea name="alamat2" id="alamat2" class="form-control"></textarea>
                                                <?= form_error('alamat2', '<small class="text-danger">', '</small>'); ?>
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
                    <?= $this->session->flashdata('pasien'); ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            ID RM
                                        </th>
                                        <th>Nama</th>
                                        <th>Lahir</th>
                                        <th>NIK</th>
                                        <th>Kelamin</th>
                                        <th>Suku</th>
                                        <th>Pekerjaan</th>
                                        <th>No Telp</th>
                                        <th>No Hp</th>
                                        <th>Alamat Rumah</th>
                                        <th>Alamat Kantor</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            ID RM
                                        </th>
                                        <th>Nama</th>
                                        <th>Lahir</th>
                                        <th>NIK</th>
                                        <th>Kelamin</th>
                                        <th>Suku</th>
                                        <th>Pekerjaan</th>
                                        <th>No Telp</th>
                                        <th>No Hp</th>
                                        <th>Alamat Rumah</th>
                                        <th>Alamat Kantor</th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($dataTab as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $row->id_rm ?></td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->tpt_lhr ?>, <?= tanggal_indonesia(date('Y-m-d'), $row->tgl_lhr) ?></td>
                                            <td><?= $row->nik ?></td>
                                            <td><?= $row->jk ?></td>
                                            <td><?= $row->suku ?></td>
                                            <td><?= $row->pekerjaan ?></td>
                                            <td><?= $row->no_telp ?></td>
                                            <td><?= $row->no_hp ?></td>
                                            <td><?= $row->alamat1 ?></td>
                                            <td><?= $row->alamat2 ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/ubah') . $title . '/' . $row->id ?>">
                                                    <span class="badge bg-warning"><i class="bi bi-pencil-square me-1"></i> Ubah</span>
                                                </a>
                                                <a href="<?= base_url('admin/hapus') . $title . '/' . $row->id ?>" onclick="return confirm('Apakah anda yakin')">
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