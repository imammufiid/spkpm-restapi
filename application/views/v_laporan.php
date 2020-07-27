<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">Laporan siswa yang dapat rekomendasi</h4>
            </div>
            <div class="card-body table-responsive">
                <table id="" class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Nilai dan Rekomendasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tertinggi = array(); ?>
                        <?php foreach($Rekomendasi->result() as $r) : ?>
                            <?php foreach($User->result() as $u) : ?>
                                <?php $sums1 = 0; $total_cfsf = 0;?>
                                <?php foreach($Kriteria->result() as $k) : ?>
                                    <?php if($k->kriteria_id == 1) : ?>
                                        <?php $sum = 0; ?>
                                        <?php foreach($this->m->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                                            <?php $gap = $this->m->get_nilai($u->user_id,$s->subkriteria_id)-$this->m->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                                            <?php if($s->subkriteria_keterangan == "Core") : ?>
                                            <?php $total_cfsf++ ?>
                                                <?php $bobot = $this->m->get_bobot($gap) ?>
                                                <?php $sums1+=$bobot ?>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                <?php endforeach; ?>
                                <?php $sums1/$total_cfsf ?>
                                <?php $ncf1 = $sums1/$total_cfsf; ?>
                                <?php $sums2 = 0; $total_cfsf = 0;?>
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
                                <?php $sums2/$total_cfsf; ?>
                                <?php $nsf1 = $sums2/$total_cfsf; ?>
                                <?php $n1 = (60/100)*($ncf1)+(40/100)*($nsf1) ?>
                                <?php $sums3 = 0; $total_cfsf = 0;?>
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
                                <?php $sums3/$total_cfsf ?>
                                <?php $ncf2 = $sums3/$total_cfsf; ?>
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
                                <?php $sums4/$total_cfsf; ?>
                                <?php $nsf2 = $sums4/$total_cfsf; ?>
                                <?php $n2 = (60/100)*($ncf2)+(40/100)*($nsf2) ?>
                                <?php $tertinggi[] = array($u->user_kode => round(($n1+$n2),2).' Rekomendasi '.$r->rekomendasi_kode) ?>
                                <?php $n1+$n2 ?>
                            <?php endforeach ?>
                        <?PHP endforeach ?>
                        <?php
                            $t = array_reduce($tertinggi, 'array_merge', array());
                            $tertinggi_filtered = array_search($t,$t);
                            if($this->session->userdata('level')=="Siswa") :
                                if($tertinggi_filtered==$this->session->userdata('kode')) : 
                                    $direkomendasikan = $this->m->search_user($tertinggi_filtered);
                                    foreach($direkomendasikan->result() as $dir) : 
                                        echo "<tr>";
                                        echo "<td>".$dir->user_login."</td>";
                                        echo "<td>".$dir->user_nama."</td>";
                                        echo "<td>".max(array_column($tertinggi,$dir->user_kode))."</td>";
                                        echo "</tr>";
                                    endforeach;
                                else :
                                    echo "<script>";
                                        echo "alert($(this))";
                                    echo "</script>";
                                endif;
                            else :
                                $direkomendasikan = $this->m->search_user($tertinggi_filtered);
                                foreach($direkomendasikan->result() as $dir) : 
                                    echo "<tr>";
                                    echo "<td>".$dir->user_login."</td>";
                                    echo "<td>".$dir->user_nama."</td>";
                                    echo "<td>".max(array_column($tertinggi,$dir->user_kode))."</td>";
                                    echo "</tr>";
                                endforeach;
                            endif;
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                <a target="_blank" href="<?= base_url('cetak_semua_rekomendasi') ?>" class="btn btn-sm btn-primary">Cetak</a>
            </div> -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
<?php $this->load->view($Components['js']) ?>