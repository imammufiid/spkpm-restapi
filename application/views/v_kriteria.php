<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="dtTable" class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <!--<th>No.</th>-->
                            <th>Project</th>
                            <th>Nama</th>
                            <th><i class="fa fa-cogs"></i></th>
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama</label>
                                <?php
                                    $data = array(
                                        'id' => 'kriteria_id',
                                        'name' => 'kriteria_id',
                                        'class' => 'form-control form-control-sm',
                                        'autocomplete' => 'off',
                                        'style' => 'display:none'
                                    );
                                    echo form_input($data);
                                ?>
                                <?php
                                    $data = array(
                                        'id' => 'kriteria_nama',
                                        'name' => 'kriteria_nama',
                                        'class' => 'form-control form-control-sm',
                                        'autocomplete' => 'off',
                                        'required' => 'true'
                                    );
                                    echo form_input($data);
                                ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Project</label>
                                <?php
                                    $data = array(
                                        'id' => 'project_id',
                                        'name' => 'project_id',
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