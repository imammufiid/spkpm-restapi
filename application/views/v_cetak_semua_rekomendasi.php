<style>
  table {
    width:100%;
  }
  table th {
    padding: 1%;
    text-align: center;
  }
  table td {
    padding: 1%;
    text-align: center;
  }
</style>
<div style="text-align: center;border: 2px solid black;pading: 5%">
  <h1 style="margin:0">SMK NEGERI 1 CIREBON</h1>
  <span>Jl. Perjuangan, Karyamulya, Kec. Kesambi, Kota Cirebon, Jawa Barat 45131</span>
</div>
<br />
<table border=2 style="margin: auto;">
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
                    echo "<td><b>".max(array_column($tertinggi,$dir->user_kode))."</b></td>";
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
                  echo "<td><b>".max(array_column($tertinggi,$dir->user_kode))."</b></td>";
                  echo "</tr>";
              endforeach;
          endif;
      ?>
  </tbody>
</table>
<br />
<div style="float: right;text-align: center">
    Mengetahui<br />
    Kepala Sekolah SMK NEGERI 1 CIREBON<br />
    KOTA CIREBON<br />
    <br />
    <br />
    <br />
    Dr. A. Hendi Suhendi M.Pd.
</div>