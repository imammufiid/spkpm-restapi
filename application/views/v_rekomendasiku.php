<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Nilai Kuliah</th>
                                <th>Nilai Kerja</th>
                                <th>Nilai Wiraswasta</th>
                                <th>Rekomendasi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $tertinggi = array(); ?>
                        <?php foreach($Rekomendasi->result() as $r) : ?>
                            <?php foreach($User->result() as $u) : ?>
                                <?php $sums1 = 0; ?>
                                <?php foreach($Kriteria->result() as $k) : ?>
                                    <?php if($k->kriteria_id == 1) : ?>
                                        <?php $sum = 0; ?>
                                        <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                            <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                            <?php if($s->subkriteria_keterangan == "Core") : ?>
                                                <?php $bobot = $this->m->get_bobot($gap) ?>
                                                <?php $sums1+=$sum+=$bobot ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <?php $sums1/6 ?>
                                <?php $sums2 = 0; ?>
                                <?php foreach($Kriteria->result() as $k) : ?>
                                    <?php if($k->kriteria_id == 1) : ?>
                                        <?php $sum = 0; ?>
                                        <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                            <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                            <?php if($s->subkriteria_keterangan == "Secondary") : ?>
                                                <?php $bobot = $this->m->get_bobot($gap) ?>
                                                <?php $sums2+=$sum+=$bobot ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <?php $sums2/6 ?>
                                <?php $n1 = (60/100)*($sums1/6)+(40/100)*($sums2/6) ?>
                                <?php $sums3 = 0; ?>
                                <?php foreach($Kriteria->result() as $k) : ?>
                                    <?php if($k->kriteria_id == 2) : ?>
                                        <?php $sum = 0; ?>
                                        <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                            <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                            <?php if($s->subkriteria_keterangan == "Core") : ?>
                                                <?php $bobot = $this->m->get_bobot($gap) ?>
                                                <?php $sums3+=$sum+=$bobot ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <?php $sums3/4 ?>
                                <?php $sums4 = 0; ?>
                                <?php foreach($Kriteria->result() as $k) : ?>
                                    <?php if($k->kriteria_id == 2) : ?>
                                        <?php $sum = 0; ?>
                                        <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                            <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                            <?php if($s->subkriteria_keterangan == "Secondary") : ?>
                                                <?php $bobot = $this->m->get_bobot($gap) ?>
                                                <?php $sums4+=$sum+=$bobot ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <?php $sums4/4 ?>
                                <?php $n2 = (60/100)*($sums3/6)+(40/100)*($sums4/6) ?>
                                <?php $tertinggi[] = array($r->rekomendasi_kode => round($n1+$n2,2)) ?>
                                <?php $total = $n1+$n2 ?>
                                <td><?= round($total,2) ?></td>
                            <?php endforeach ?>
                        <?php endforeach ?>
                        <?php
                            $arr = array($tertinggi);
                            $b = 0;
                            for($i=0;$i<count($arr);$i++) :
                                for($j=0;$j<count($arr[$i]);$j++) :
                                    if ($arr[$i][$j] > $b) :
                                        $b = $arr[$i][$j];
                                    endif;
                                endfor;
                            endfor;
                            $t = array_reduce($tertinggi, 'array_merge', array());
                            $tertinggi_filtered = array_search(max($t),$t);
                            echo "<td>".$tertinggi_filtered."</td>";
                        ?>
                        </tbody>
                    </table>
                    <br />
                    <h4 class="text-center">Selamat <?= $this->session->userdata('nama') ?>, Kamu Mendapat Rekomendasi <?= $tertinggi_filtered ?></h4>
                </div>
                <div class="card-footer">
                    <a href="<?= base_url('cetak_rekomendasi') ?>" class="btn btn-success" target="_blank">Cetak Rekomendasi</a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<?php $this->load->view($Components['js']) ?>