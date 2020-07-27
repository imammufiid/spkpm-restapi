<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <img class="img-responsive" width="100%" height="200px" src="<?= base_url('assets/img/back.jpeg') ?>">
                    </div>
                    <div class="col-8">
                        <h4 class="text-center">SELAMAT DATANG, <?= strtoupper($this->session->userdata('nama')) ?></h4>
                        <div class="text-center">
                            <?php if($_SESSION['level']=="Master" OR $_SESSION['level']=="Admin") : ?>
                                <a href="<?= base_url('pengguna') ?>" class="btn btn-primary mt-2">Pengguna</a>
                                <a href="<?= base_url('siswa') ?>" class="btn btn-secondary mt-2">Data Siswa</a>
                                <a href="<?= base_url('nilai_siswa') ?>" class="btn btn-success mt-2">Data Nilai</a>
                                <a href="<?= base_url('kriteria') ?>" class="btn btn-warning mt-2">Kriteria</a>
                                <a href="<?= base_url('subkriteria') ?>" class="btn btn-danger mt-2">Subkriteria</a>
                                <a href="<?= base_url('bobot') ?>" class="btn btn-dark mt-2">Bobot</a>
                                <a href="<?= base_url('laporan') ?>" class="btn btn-info mt-2">Laporan</a>
                            <?php elseif($_SESSION['level']=="BK") : ?>
                                <a href="<?= base_url('siswa') ?>" class="btn btn-secondary mt-2">Data Siswa</a>
                                <a href="<?= base_url('nilai_siswa') ?>" class="btn btn-success mt-2">Data Nilai</a>
                                <a href="<?= base_url('laporan') ?>" class="btn btn-info mt-2">Laporan</a>
                            <?php elseif($_SESSION['level']=="Siswa") : ?>
                                <a href="<?= base_url('siswa') ?>" class="btn btn-secondary mt-2">Data Siswa</a>
                                <a href="<?= base_url('nilai_siswa') ?>" class="btn btn-success mt-2">Data Nilai</a>
                                <a href="<?= base_url('rekomendasiku') ?>" class="btn btn-info mt-2">Rekomendasi</a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view($Components['js']) ?>