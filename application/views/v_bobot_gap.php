<div class="row">
    <?php foreach($Rekomendasi->result() as $r) : ?>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4><?= $r->rekomendasi_kode ?></h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="" class="table table-bordered table-sm">
                        <thead class="text-center">
                            <tr>
                                <th rowspan="2" style="vertical-align:middle">Nama</th>
                                <?php foreach($Kriteria->result() as $k) : ?>
                                    <th colspan="<?= $this->m->get_subkriteria($k->kriteria_id)->num_rows() ?>"><?= $k->kriteria_nama ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <?php foreach($Kriteria->result() as $k) : ?>
                                    <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                        <th style="background-color: #FFC107;"><?= $s->subkriteria_kode ?></th>
                                    <?php endforeach ?>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($User->result() as $u) : ?>
                                <tr>
                                    <td><?= $u->user_nama ?></td>
                                    <?php foreach($Kriteria->result() as $k) : ?>
                                        <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                            <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                            <th class="text-center"><?= $this->m->get_bobot($gap) ?></th>
                                        <?php endforeach ?>
                                    <?php endforeach; ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    <?php endforeach ?>
    <!-- /.col -->
</div>
<!-- /.row -->
<?php $this->load->view($Components['js']) ?>