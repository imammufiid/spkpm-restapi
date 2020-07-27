<!-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('portal') ?>" class="brand-link text-center">
        <span class="brand-text font-weight-light"><?= $this->session->userdata('AppInfo') ?></span>
    </a> -->
    <!-- Sidebar -->
    <!-- <div class="sidebar"> -->
        <!-- Sidebar Menu -->
        <!-- <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if($_SESSION['level']=="Master" OR $_SESSION['level']=="Admin" OR $_SESSION['level']=="BK" OR $_SESSION['level']=="Siswa") : ?>
                    <?php if($_SESSION['level']=="Master" OR $_SESSION['level']=="Admin") : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('project') ?>" class="nav-link <?php if($Title=="PROJECT") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Project</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('kriteria') ?>" class="nav-link <?php if($Title=="KRITERIA") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kriteria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('subkriteria') ?>" class="nav-link <?php if($Title=="SUBKRITERIA") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Subkriteria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('rekomendasi') ?>" class="nav-link <?php if($Title=="REKOMENDASI") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jenis Rekomendasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('rekomendasi_nilai') ?>" class="nav-link <?php if($Title=="REKOMENDASI NILAI") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rekomendasi Nilai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('bobot') ?>" class="nav-link <?php if($Title=="BOBOT NILAI") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bobot Nilai</p>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if($_SESSION['level']=="Master" OR $_SESSION['level']=="Admin") : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('pengguna') ?>" class="nav-link <?php if($Title=="PENGGUNA") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if($_SESSION['level']=="Master" OR $_SESSION['level']=="Admin" OR $_SESSION['level']=="BK" OR $_SESSION['level']=="Siswa") : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('siswa') ?>" class="nav-link <?php if($Title=="SISWA") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Siswa</p>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if($_SESSION['level']=="Master" OR $_SESSION['level']=="Admin") : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('nilai_siswa') ?>" class="nav-link <?php if($Title=="NILAI SISWA") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nilai Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?php if ($Nav=="PERHITUNGAN") : echo "menu-open"; endif; ?>">
                            <a href="#" class="nav-link <?php if ($Nav=="PERHITUNGAN") : echo "active"; endif; ?>">
                                <i class="nav-icon far fa-circle"></i>
                                <p>
                                    Perhitungan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('nilai_gap') ?>" class="nav-link <?php if($Title=="NILAI GAP") : echo "active"; endif; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Nilai GAP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('bobot_gap') ?>" class="nav-link <?php if($Title=="BOBOT GAP") : echo "active"; endif; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Bobot GAP</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('faktor') ?>" class="nav-link <?php if($Title=="FAKTOR") : echo "active"; endif; ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Faktor & Hasil Akhir</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    <?php endif ?>
                    <?php if($_SESSION['level']!="Siswa") : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('laporan') ?>" class="nav-link <?php if($Title=="LAPORAN") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                    <?php endif ?>
                    <?php if($_SESSION['level']=="Siswa") : ?>
                        <li class="nav-item">
                            <a href="<?= base_url('rekomendasiku') ?>" class="nav-link <?php if($Title=="REKOMENDASIKU") : echo "active"; endif; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rekomendasi</p>
                            </a>
                        </li>
                    <?php endif ?>
                <?php endif ?>
            </ul>
        </nav> -->
        <!-- /.sidebar-menu -->
    <!-- </div> -->
    <!-- /.sidebar -->
<!-- </aside> -->