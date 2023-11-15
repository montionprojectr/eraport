  <?php 
include "../../koneksi.php";
  $th_pelajaran = $_POST['th_pelajaran'];
  $nipy = $_POST['nipy'];

  $query = mysqli_query($koneksi, "select * from tb_guru_mapel x inner join tb_mapel y on y.kode_mapel = x.kode_mapel where nipy = '$nipy' and th_pelajaran = '$th_pelajaran' group by id_guru_mapel");
  while ($data = mysqli_fetch_array($query)) {
    
    // where before = CONCAT_WS(' ', kelas, komp_keahlian) = '".$data['kelas_dan_komp']."'
    $kelas = mysqli_query($koneksi, "select kelas, komp_keahlian, concat_ws(' ', kelas, komp_keahlian) as kel, pkelas from tb_walikelas where kelas = '".$data['kelas']."' and komp_keahlian = '".$data['komp']."'");
      
    while ($dkelas = mysqli_fetch_array($kelas)) {
      if ($dkelas['komp_keahlian'] == 'PPLG') {
        $bg = 'bg-warning';
      }else if ($dkelas['komp_keahlian'] == 'TE') {
        $bg = 'bg-danger';
      }else if ($dkelas['komp_keahlian'] == 'TSM') {
        $bg = 'bg-success';
      }else if ($dkelas['komp_keahlian'] == 'TKR') {
        $bg = 'bg-primary';
      }else if ($dkelas['komp_keahlian'] == 'TMI') {
        $bg = 'bg-info';
      }
      ?>
      <div class="col-lg-3 col-6">
        <form action="?page=buka_halaman" method="post">
      <!-- small box -->
      <div class="small-box <?= $bg; ?>">
        <div class="inner">
          <div class="form-group">
            <h3><?= $dkelas['kel']." ".$dkelas['pkelas']; ?></h3><b>MAPEL: <?= $data['nama_mapel'] ?></b>  
          </div>
          <div class="form-group">
            <label>Import Penilaian</label>
            <a href="?page=import_penilaian&th=<?= $th_pelajaran."&kelas=".$dkelas['kelas']."&jrs=".$dkelas['komp_keahlian']."&pkelas=".$dkelas['pkelas']."&kodmapel=".$data['kode_mapel']; ?>" class="btn btn-outline-light btn-dark">Import Penilaian</a>
          </div>
          <div class="form-group" hidden>
            <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
            <input type="text" name="kelas" value="<?= $dkelas['kelas'] ?>">
            <input type="text" name="komp_keahlian" value="<?= $dkelas['komp_keahlian'] ?>">
            <input type="text" name="pkelas" value="<?= $dkelas['pkelas'] ?>">
            <input type="text" name="nama_mapel" value="<?= $data['nama_mapel'] ?>">
            <input type="text" name="kode_mapel" value="<?= $data['kode_mapel'] ?>">
          </div>
          <div class="form-group">
            <label class="text-16">Pilih Semester</label>
            <select class="form-control form-control-sm select2" style="width: 100%;" name="semester">
              <option value="Ganjil">Semester 1</option>
              <option value="Genap">Semester 2</option>
            </select>
          </div>
          <div class="form-group">
            <label>Pilih Penilaian</label>
            <select class="form-control form-control-sm select2" style="width: 100%;" name="jenis_penilaian">
              <option value="Formatif">Formatif</option>
              <option value="Sumatif">Sumatif</option>
              <option value="Sumatif_Akhir">Sumatif Akhir</option>
            </select>
          </div>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer" onclick="$(this).closest('form').submit()" type="submit"  name="buka">Buka halaman <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </form>
    </div>
    <?php
      }
     
  }

   // where before = CONCAT_WS(' ', kelas, komp_keahlian) = '".$data['kelas_dan_komp']."'
    $klspil = mysqli_query($koneksi, "select * from tb_guru_mapel x inner join tb_mapelsub y on y.kode_mapelsub = x.kode_mapelsub where th_pelajaran = '$th_pelajaran' and nipy = '$nipy' group by nipy asc");
    while ($dkelas = mysqli_fetch_array($klspil)) {
      // if ($dkelas['komp_keahlian'] == 'PPLG') {
      //   $bg = 'bg-warning';
      // }else if ($dkelas['komp_keahlian'] == 'TE') {
      //   $bg = 'bg-danger';
      // }else if ($dkelas['komp_keahlian'] == 'TSM') {
      //   $bg = 'bg-success';
      // }else if ($dkelas['komp_keahlian'] == 'TKR') {
      //   $bg = 'bg-primary';
      // }else if ($dkelas['komp_keahlian'] == 'TMI') {
      //   $bg = 'bg-info';
      // }
      ?>
      <div class="col-lg-3 col-6">
        <form action="?page=buka_halaman_kelaspil" method="post">
      <!-- small box -->
      <div class="small-box bg-secondary">
        <div class="inner">
          <div class="form-group">
            <b>MAPEL: <?= $dkelas['nama_submapel'] ?></b>  
          </div>
          <div class="form-group" hidden>
            <input type="text" name="nipy" value="<?= $dkelas['nipy']; ?>">
            <input type="text" name="th_pelajaran" value="<?= $dkelas['th_pelajaran']; ?>">
            <input type="text" name="kode_mapel" value="<?= $dkelas['kode_mapel']; ?>">
            <input type="text" name="kode_mapelsub" value="<?= $dkelas['kode_mapelsub']; ?>">
          </div>
          <div class="form-group">
            <label class="text-16">Pilih Semester</label>
            <select class="form-control form-control-sm select2" style="width: 100%;" name="semester">
              <option value="Ganjil">Semester 1</option>
              <option value="Genap">Semester 2</option>
            </select>
          </div>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer" onclick="$(this).closest('form').submit()" type="submit"  name="buka">Buka halaman <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </form>
    </div>
    <?php
}
  ?>