<main>
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">

            <?php if ($this->session->userdata('nik')): ?>
                <div class="col-md-12 mb-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?= $title ?></h4>
                        </div>
                        <div class="card-body">

                            <?= $this->session->flashdata('historit'); ?>
                            <div class="table-responsive">
                                <table id="multi-filter-select" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>
                                                Nama Pasien
                                            </th>
                                            <th>Nomor Registrasi Medik</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>
                                                Nama Pasien
                                            </th>
                                            <th>Nomor Registrasi Medik</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>

                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $dataTab = $this->db->get_where('medik', ['id_pasien' => $this->session->userdata('id_pasien')])->result();
                                        ?>
                                        <?php foreach ($dataTab as $row) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <?php
                                                    $pasien = $this->db->get_where('pasien', ['id' => $row->id_pasien])->row();
                                                    echo hideName($pasien->nama);
                                                    ?>
                                                </td>
                                                <td><?= hideNoRM($row->no_rm) ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url('output/historiRM/') . $row->id ?>" target="_blank">
                                                        <span class="badge bg-secondary"><i class="fas fa-download me-1"></i> Download</span>
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


            <?php endif; ?>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <!-- <img src="<?= base_url('assets/backend/nice/assets') ?>/img/logo.png" alt=""> -->
                                <!-- <span class="d-none d-lg-block">Ubah Text Nya ya</span> -->
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Histori Rekam Medis</h5>
                                    <p class="text-center small">Input NIK atau Nomor Registrasi Medis</p>
                                </div>
                                <?= $this->session->flashdata('histori'); ?>
                                <form class="row g-3" action="" method="POST">

                                    <div class="col-12">
                                        <label for="histori" class="form-label">NIK / No RM</label>
                                        <input type="text" name="histori" class="form-control" id="histori" required>
                                        <?= form_error('histori', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Cari</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
</main><!-- End #main -->