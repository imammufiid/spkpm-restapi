<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <?php if($this->session->userdata('level')!='Siswa') : ?>
                    <table id="dtTable" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th style="vertical-align:middle">NIS</th>
                                <th style="vertical-align:middle">Nama</th>
                                <th style="vertical-align:middle">Jurusan</th>
                                <th style="vertical-align:middle">Angkatan</th>
                                <th style="vertical-align:middle">Jenis Kelamin</th>
                                <th style="vertical-align:middle">Tempat Lahir</th>
                                <th style="vertical-align:middle">Tanggal Lahir</th>
                                <th style="vertical-align:middle">Alamat</th>
                                <th style="vertical-align:middle">Nomor Telepon</th>
                                <th style="vertical-align:middle">Email</th>
                                <th style="vertical-align:middle" class="text-center"><i class="fa fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                <?php else : ?>
                    Nomor Induk Siswa : <?= $Siswa->user_login ?><br />
                    NAMA : <?= $Siswa->user_nama ?><br />
                    Email : <?= $Siswa->user_email ?><br />
                    Jurusan : <?= $Siswa->user_jurusan ?><br />
                    Angkatan : <?= $Siswa->user_tahun_angkatan ?><br />
                    Jenis Kelamin : <?= $Siswa->user_jenis_kelamin ?><br />
                    Tempat Lahir : <?= $Siswa->user_tempat_lahir ?><br />
                    Tanggal Lahir : <?= $Siswa->user_tanggal_lahir ?><br />
                    Alamat : <?= $Siswa->user_alamat ?><br />
                    Nomor Telepon : <?= $Siswa->user_nomor_telepon ?><br />
                <?php endif ?>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                <?php if($this->session->userdata('level')!="Siswa") : ?>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ModalForm">
                        <i class="fas fa-plus"></i> Tambah Data
                    </button>
                <?php elseif($this->session->userdata('level')=="Siswa") : ?>
                    <button type="button" id="nilai" class="btn btn-success btn-sm" data="<?= $Siswa->user_id ?>">Lihat Nilai</button>
                    <button type="button" id="edit" class="btn btn-warning btn-sm" data="<?= $Siswa->user_id ?>">Edit</button>
                <?php endif ?>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<div class="modal fade" id="ModalForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Form Data</h4>
            </div>
            <?= form_open("#",array('id' => 'Frm')) ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_id',
                                        'name' => 'user_id',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'style' => 'display:none'
                                    );
                                    echo form_input($data);
                                ?>
                                <?php
                                    $data = array(
                                        'id' => 'user_nama',
                                        'name' => 'user_nama',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NIS</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_login',
                                        'name' => 'user_login',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jurusan</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_jurusan',
                                        'name' => 'user_jurusan',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Angkatan</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_tahun_angkatan',
                                        'name' => 'user_tahun_angkatan',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_jenis_kelamin',
                                        'name' => 'user_jenis_kelamin',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    $options = array(
                                        '' => '',
                                        'Pria' => 'Pria',
                                        'Wanita' => 'Wanita'
                                    );
                                    echo form_dropdown($data,$options);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_tempat_lahir',
                                        'name' => 'user_tempat_lahir',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_tanggal_lahir',
                                        'name' => 'user_tanggal_lahir',
                                        'class' => 'form-control',
                                        'type' => 'date',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_alamat',
                                        'name' => 'user_alamat',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_email',
                                        'name' => 'user_email',
                                        'class' => 'form-control',
                                        'type' => 'email',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nomor Telepon</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_nomor_telepon',
                                        'name' => 'user_nomor_telepon',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<div class="modal fade" id="ModalNilai">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Nilai</h4>
            </div>
            <div class="modal-body">
                <span id="subkriteria"></span>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<?php $this->load->view($Components['js']) ?>