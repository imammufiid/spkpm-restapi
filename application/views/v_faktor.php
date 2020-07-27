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
                                <th rowspan="3" style="vertical-align:middle">Nama</th>
                                <?php foreach($Kriteria->result() as $k) : ?>
                                    <th colspan="3"><?= $k->kriteria_nama ?></th>
                                <?php endforeach; ?>
                            </tr>
                            <tr>
                                <th>NCF</th>
                                <th>NSF</th>
                                <th>N1</th>
                                <th>NCF</th>
                                <th>NSF</th>
                                <th>N2</th>
                                <th>NTot</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tertinggi = array(); ?>
                            <?php foreach($User->result() as $u) : ?>
                                <tr>
                                    <td><?= $u->user_nama ?></td>
                                    <?php $sums1 = 0; $total_cfsf = 0; ?>
                                    <?php foreach($Kriteria->result() as $k) : ?>
                                        <?php if($k->kriteria_id == 1) : ?>
                                            <?php $sum = 0; ?>
                                            <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                                <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                                <?php if($s->subkriteria_keterangan == "Core") : ?>
                                                    <?php $total_cfsf++; ?>
                                                    <?php $bobot = $this->m->get_bobot($gap) ?>
                                                    <?php $sums1+=$bobot ?>
                                                <?php //var_dump($sums1); ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                    <?php $ncf1 = round(($sums1/$total_cfsf),2) ?>
                                    <td><?= round(($sums1/$total_cfsf),2) ?></td>
                                    <?php $sums2 = 0; $total_cfsf = 0; ?>
                                    <?php foreach($Kriteria->result() as $k) : ?>
                                        <?php if($k->kriteria_id == 1) : ?>
                                            <?php $sum = 0; ?>
                                            <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                                <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                                <?php if($s->subkriteria_keterangan == "Secondary") : ?>
                                                    <?php $total_cfsf++; ?>
                                                    <?php $bobot = $this->m->get_bobot($gap) ?>
                                                    <?php $sums2+=$bobot ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                    <?php $nsf1 = round(($sums2/$total_cfsf),2) ?>
                                    <td><?= round(($sums2/$total_cfsf),2) ?></td>
                                    <td><?= round(($n1 = (60/100)*($ncf1)+(40/100)*($nsf1)),2) ?></td>
                                    <?php $sums3 = 0; $total_cfsf = 0?>
                                    <?php foreach($Kriteria->result() as $k) : ?>
                                        <?php if($k->kriteria_id == 2) : ?>
                                            <?php $sum = 0; ?>
                                            <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                                <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                                <?php if($s->subkriteria_keterangan == "Core") : ?>
                                                    <?php $total_cfsf++; ?>
                                                    <?php $bobot = $this->m->get_bobot($gap) ?>
                                                    <?php $sums3+=$bobot ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                    <?php $ncf2 = round(($sums3/$total_cfsf),2) ?>
                                    <td><?= round(($sums3/$total_cfsf),2) ?></td>
                                    <?php $sums4 = 0; $total_cfsf = 0;?>
                                    <?php foreach($Kriteria->result() as $k) : ?>
                                        <?php if($k->kriteria_id == 2) : ?>
                                            <?php $sum = 0; ?>
                                            <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                                <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                                <?php if($s->subkriteria_keterangan == "Secondary") : ?>
                                                    <?php $total_cfsf++; ?>
                                                    <?php $bobot = $this->m->get_bobot($gap) ?>
                                                    <?php $sums4+=$bobot ?>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    <?php endforeach; ?>
                                    <?php $nsf2 = round(($sums4/$total_cfsf),2) ?>
                                    <td><?= $sums4/$total_cfsf ?></td>
                                    <td><?= round(($n2 = (60/100)*($ncf2)+(40/100)*($nsf2)),2) ?></td>
                                    <?php $tertinggi[] = array($u->user_nama => $n1+$n2) ?>
                                    <td><?= round(($n1+$n2),2) ?></td>
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