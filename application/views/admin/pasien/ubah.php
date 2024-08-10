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
                        <form class="row g-3" method="post">
                            <input type="hidden" name="id" value="<?= $oneData->id ?>">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $oneData->nama ?>" required>
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="tpt_lhr" class="form-label">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tpt_lhr" id="tpt_lhr" value="<?= $oneData->tpt_lhr ?>" required>
                                    <?= form_error('tpt_lhr', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="tgl_lhr" class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" value="<?= date('Y-m-d', $oneData->tgl_lhr) ?>" required>
                                    <?= form_error('tgl_lhr', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" class="form-control" name="nik" id="nik" value="<?= $oneData->nik ?>" required>
                                    <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="suku" class="form-label">Suku</label>
                                    <input type="text" class="form-control" name="suku" id="suku" value="<?= $oneData->suku ?>" required>
                                    <?= form_error('suku', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= $oneData->pekerjaan ?>" required>
                                    <?= form_error('pekerjaan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="no_telp" class="form-label">No Telepon Rumah</label>
                                    <input type="tel" class="form-control" name="no_telp" id="no_telp" value="<?= $oneData->no_telp ?>" required>
                                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="no_hp" class="form-label">No Handphone/Whatsapp</label>
                                    <input type="tel" class="form-control" name="no_hp" id="no_hp" value="<?= $oneData->no_hp ?>" required>
                                    <?= form_error('no_hp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select id="jk" class="form-select" name="jk" required>
                                        <option value="<?= $oneData->jk ?>" hidden>
                                            <?php if ($oneData->jk == "L") : ?>
                                                Laki-laki
                                            <?php else : ?>
                                                Perempuan
                                            <?php endif; ?>
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
                                    <textarea name="alamat1" id="alamat1" class="form-control"><?= $oneData->alamat1 ?></textarea>
                                    <?= form_error('alamat1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-md-6">
                                    <label for="alamat2" class="form-label">Alamat Kantor</label>
                                    <textarea name="alamat2" id="alamat2" class="form-control"><?= $oneData->alamat2 ?></textarea>
                                    <?= form_error('alamat2', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="text-end mt-5">
                                <a href="<?= base_url('admin/pasien') ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>