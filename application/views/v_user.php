<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="dtTable" class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <!--<th style="vertical-align:middle">No.</th>-->
                            <th style="vertical-align:middle">Nama</th>
                            <th style="vertical-align:middle">Level</th>
                            <th style="vertical-align:middle">Login</th>
                            <th style="vertical-align:middle">Email</th>
                            <th style="vertical-align:middle" class="text-center"><i class="fa fa-cogs"></i></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-right">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#ModalForm">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>
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
                                <label for="">Login</label>
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Password</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_pass',
                                        'name' => 'user_pass',
                                        'class' => 'form-control',
                                        'type' => 'password',
                                        'autocomplete' => 'off'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <?php
                                    $data = array(
                                        'id' => 'user_email',
                                        'name' => 'user_email',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="level_id">Level</label>
                                <?php
                                    $data = array(
                                        'id' => 'level_id',
                                        'name' => 'level_id',
                                        'class' => 'form-control',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    $options = array(
                                        '' => ''
                                    );
                                    echo form_dropdown($data,$options);
                                ?>
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
<?php $this->load->view($Components['js']) ?>