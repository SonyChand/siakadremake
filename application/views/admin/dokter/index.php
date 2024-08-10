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
                                                <label for="id_user" class="form-label">Akun Pengguna</label>
                                                <select id="id_user" class="form-select" name="id_user" required>
                                                    <option value="" hidden>
                                                        Pilih Akun
                                                    </option>
                                                    <option value="buatkan">Buatkan Akun</option>
                                                    <?php foreach ($data1 as $row) : ?>
                                                        <option value="<?= $row->id ?>"><?= $row->email ?> (<?= $row->nama ?>)</option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?= form_error('id_user', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="nama" id="nama" required>
                                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="spesialisasi" class="form-label">Spesialisasi</label>
                                                <input type="text" class="form-control" name="spesialisasi" id="spesialisasi" required>
                                                <?= form_error('spesialisasi', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="sip" class="form-label">Surat Izin Praktek</label>
                                                <input type="text" class="form-control" name="sip" id="sip">
                                                <?= form_error('sip', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="str" class="form-label">Surat Tanda Registrasi</label>
                                                <input type="text" class="form-control" name="str" id="str">
                                                <?= form_error('str', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="no_hp" class="form-label">No Handphone</label>
                                                <input type="tel" class="form-control" name="no_hp" id="no_hp" required>
                                                <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <label for="alamat" class="form-label">Alamat Rumah/Praktek</label>
                                                <textarea name="alamat" id="alamat" class="form-control" required><?= $oneData->alamat ?></textarea>
                                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="image" class="col-form-label">Foto Profil</label>
                                                <!-- <div class="input-group"> -->
                                                <div class="custom-file">
                                                    <input class="form-control" type="file" name="image" id="image" accept="image/*" required>
                                                </div>
                                                <!-- </div> -->
                                                <span class="small"><strong style="font-size: 10px;line-height:0.1;">Ukuran Foto tidak melebihi 5 MB dan Rekomendasi Rasio Aspek 1:1, Format (JPG/PNG/GIF)</strong></span>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="status" class="form-label">Status</label>
                                                <select id="status" class="form-select" name="status" required>
                                                    <option value="" hidden>
                                                        Pilih Status
                                                    </option>
                                                    <option value="1">Aktif</option>
                                                    <option value="0">Nonaktif</option>
                                                </select>
                                                <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
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
                    <?= $this->session->flashdata('dokter'); ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            Akun Pengguna
                                        </th>
                                        <th>Nama</th>
                                        <th>Spesialisasi</th>
                                        <th>SIP</th>
                                        <th>STR</th>
                                        <th>No Hp</th>
                                        <th>Status</th>
                                        <th>Foto Profil</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>
                                            Akun Pengguna
                                        </th>
                                        <th>Nama</th>
                                        <th>Spesialisasi</th>
                                        <th>SIP</th>
                                        <th>STR</th>
                                        <th>No Hp</th>
                                        <th>Status</th>
                                        <th>Foto Profil</th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($dataTab as $row) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>
                                                <?php $akun = $this->db->get_where('pengguna', ['id' => $row->id_user])->row();
                                                if ($akun) {
                                                    echo $akun->email;
                                                } else {
                                                    echo 'Belum dikaitkan';
                                                }
                                                ?>
                                            </td>
                                            <td><?= $row->nama ?></td>
                                            <td><?= $row->spesialisasi ?></td>
                                            <td><?= $row->sip ?></td>
                                            <td><?= $row->str ?></td>
                                            <td><?= $row->no_hp ?></td>
                                            <td>
                                                <?php
                                                if ($row->status == 1) {
                                                    echo 'Aktif';
                                                } else {
                                                    echo 'Nonaktif';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($akun->image == 'default') {
                                                    $link = base_url('assets/img/user/default/') . $akun->jenis_kelamin . '.jpg';
                                                } else {
                                                    $link = base_url('assets/img/user/') . $akun->image;
                                                }
                                                ?>
                                                <img src="<?= $link ?>" class="img-thumbnail">
                                            </td>
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