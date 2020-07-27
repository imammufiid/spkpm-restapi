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
<table border=2 style="margin: auto">
  <thead>
    <tr>
      <th>Biodata</th>
      <th>Nilai Kuliah</th>
      <th>Nilai Kerja</th>
      <th>Nilai Wiraswasta</th>
      <th>Rekomendasi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        NAMA : <?= $Siswa->user_nama ?><br />
        Email : <?= $Siswa->user_email ?><br />
        Jurusan : <?= $Siswa->user_jurusan ?><br />
        Angkatan : <?= $Siswa->user_tahun_angkatan ?><br />
        Jenis Kelamin : <?= $Siswa->user_jenis_kelamin ?><br />
        Tempat Lahir : <?= $Siswa->user_tempat_lahir ?><br />
        Tanggal Lahir : <?= $Siswa->user_tanggal_lahir ?><br />
        Alamat : <?= $Siswa->user_alamat ?><br />
        Nomor Telepon : <?= $Siswa->user_nomor_telepon ?><br />
      </td>
      <?php $tertinggi = array(); ?>
      <?php foreach($Rekomendasi->result() as $r) : ?>
          <?php foreach($User->result() as $u) : ?>
              <?php $sums1 = 0; ?>
              <?php foreach($Kriteria->result() as $k) : ?>
                  <?php if($k->kriteria_id == 1) : ?>
                      <?php $sum = 0; ?>
                      <?php foreach($this->n->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                          <?php $gap = $this->n->get_nilai($u->user_id,$s->subkriteria_id)-$this->n->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                          <?php if($s->subkriteria_keterangan == "Core") : ?>
                              <?php $bobot = $this->n->get_bobot($gap) ?>
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
                      <?php foreach($this->n->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                          <?php $gap = $this->n->get_nilai($u->user_id,$s->subkriteria_id)-$this->n->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                          <?php if($s->subkriteria_keterangan == "Secondary") : ?>
                              <?php $bobot = $this->n->get_bobot($gap) ?>
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
                      <?php foreach($this->n->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                          <?php $gap = $this->n->get_nilai($u->user_id,$s->subkriteria_id)-$this->n->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                          <?php if($s->subkriteria_keterangan == "Core") : ?>
                              <?php $bobot = $this->n->get_bobot($gap) ?>
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
                      <?php foreach($this->n->get_subkriteria($k->kriteria_id)->result() as $s) : ?>
                          <?php $gap = $this->n->get_nilai($u->user_id,$s->subkriteria_id)-$this->n->get_rekomendasi_nilai($k->kriteria_id,$s->subkriteria_id,$r->rekomendasi_id) ?>
                          <?php if($s->subkriteria_keterangan == "Secondary") : ?>
                              <?php $bobot = $this->n->get_bobot($gap) ?>
                              <?php $sums4+=$sum+=$bobot ?>
                          <?php endif ?>
                      <?php endforeach ?>
                  <?php endif ?>
              <?php endforeach; ?>
              <?php $sums4/4 ?>
              <?php $n2 = (60/100)*($sums3/6)+(40/100)*($sums4/6) ?>
              <?php $tertinggi[] = array($r->rekomendasi_kode => $n1+$n2) ?>
              <?php $total = $n1+$n2 ?>
              <td><b><?= round($total,2) ?></b></td>
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
          echo "<td><b>".$tertinggi_filtered."</b></td>";
      ?>
    </tr>
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