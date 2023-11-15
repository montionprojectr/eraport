<?php 
require_once('../../koneksi.php');
if (isset($_POST['type_test'])) {
  $type_test = $_POST['type_test'];
  $th_pelajaran = $_POST['th_pelajaran'];
  $semester = $_POST['semester'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $nama_mapel = $_POST['nama_mapel'];
  $kode_mapel = $_POST['kode_mapel'];

  if ($type_test == 'formatif') { ?>
  <!-- Penilaian formatif -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group" hidden>
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <?php 
      $cp = mysqli_query($koneksi, "SELECT x.th_pelajaran, x.nis, nama, x.kelas, komp_keahlian, pkelas, kode_mapel, x.semester, cpp, cpm FROM tb_penilaian X 
INNER JOIN tb_siswa Y ON y.nis = x.nis 
WHERE x.th_pelajaran = '$th_pelajaran' 
AND x.kelas = '$kelas' 
AND komp_keahlian = '$komp_keahlian' 
AND pkelas = '$pkelas' 
AND kode_mapel = '$kode_mapel' 
AND x.semester = '$semester' GROUP BY kelas, komp_keahlian, pkelas");
      while ($cpi = mysqli_fetch_array($cp)) { ?>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control" name="cpm" value="<?= $cpi['cpm']; ?>"><?= $cpi['cpm']; ?></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control" name="cpp" value="<?= $cpi['cpp']; ?>"><?= $cpi['cpp']; ?></textarea>
        </div>
      </div>  
      <?php }
      ?>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th width="10px">No</th>
                <th width="80px">NIS</th>
                <th width="300px">Nama</th>
                <th width="150px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select x.th_pelajaran, x.nis, nama, x.kelas, komp_keahlian, pkelas, kode_mapel, x.semester, Formatif, Sumatif_1, Sumatif_2, Sumatif_3, Sumatif_4, ASTS, ASAS, cpp, cpm from tb_penilaian x inner join tb_siswa y on y.nis = x.nis where x.th_pelajaran = '$th_pelajaran' and x.kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and x.semester = '$semester'");
              while ($data = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                  <td class="bg-dark"><?= $no++; ?></td>
                  <td class="bg-dark">
                    <input type="text" name="nis[]" class="form-control" value="<?= $data['nis']; ?>" readonly>
                  </td>
                  <td class="bg-dark">
                    <input type="text" name="nama[]" class="form-control" value="<?= $data['nama']; ?>" readonly>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="formatif[]" class="form-control form-control-sm" value="<?= $data['Formatif']; ?>">    
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_formatif" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
<?php }else if($type_test == 'sumatif'){ ?>
    <!-- Penilaian Sumatif -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group" hidden>
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th width="10px">No</th>
                <th width="100px">NIS</th>
                <th width="250px">Nama</th>
                <th width="80px">Nilai Suma1</th>
                <th width="80px">Nilai Suma2</th>
                <th width="80px">Nilai Suma3</th>
                <th width="80px">Nilai Suma4</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select x.th_pelajaran, x.nis, nama, x.kelas, komp_keahlian, pkelas, kode_mapel, x.semester, Formatif, Sumatif_1, Sumatif_2, Sumatif_3, Sumatif_4, ASTS, ASAS, cpp, cpm from tb_penilaian x inner join tb_siswa y on y.nis = x.nis where x.th_pelajaran = '$th_pelajaran' and x.kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and x.semester = '$semester'");
              while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                  <td class="bg-dark"><?= $no++; ?></td>
                  <td class="bg-dark"><input type="text" name="nis[]" class="form-control form-control-sm" value="<?= $data['nis']; ?>" readonly></td>
                  <td class="bg-dark"><input type="text" name="nama[]" class="form-control form-control-sm w-100" value="<?= $data['nama']; ?>" readonly></td>
                  <td class="table-info">
                    <div class="form-group">
                      <input type="number" name="nilai_suma1[]" class="form-control form-control-sm" value="<?= $data['Sumatif_1']; ?>">    
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai_suma2[]" class="form-control form-control-sm" value="<?= $data['Sumatif_2']; ?>">    
                    </div>
                  </td>
                  <td class="table-info">
                    <div class="form-group">
                      <input type="number" name="nilai_suma3[]" class="form-control form-control-sm" value="<?= $data['Sumatif_3']; ?>">    
                    </div>
                  </td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai_suma4[]" class="form-control form-control-sm" value="<?= $data['Sumatif_4']; ?>">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_sumatif" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
  <?php }else if($type_test == 'asts'){ ?>
    <!-- Penilaian ASTS-->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group" hidden>
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th width="10px">No</th>
                <th width="80px">NIS</th>
                <th width="200px">Nama</th>
                <th width="100px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select x.th_pelajaran, x.nis, nama, x.kelas, komp_keahlian, pkelas, kode_mapel, x.semester, Formatif, Sumatif_1, Sumatif_2, Sumatif_3, Sumatif_4, ASTS, ASAS, cpp, cpm from tb_penilaian x inner join tb_siswa y on y.nis = x.nis where x.th_pelajaran = '$th_pelajaran' and x.kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and x.semester = '$semester'");
              while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                  <td class="bg-dark"><?= $no++; ?></td>
                  <td class="bg-dark"><input type="text" name="nis[]" class="form-control" value="<?= $data['nis']; ?>" readonly></td>
                  <td class="bg-dark"><input type="text" name="nama[]" class="form-control" value="<?= $data['nama']; ?>" readonly></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai_asts[]" class="form-control form-control-sm" value="<?= $data['ASTS']; ?>">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_asts" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
  <?php }else if($type_test == 'asas'){ ?>
    <!-- Penilaian ASAS -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group" hidden>
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="jenis_penilaian" value="ASAS">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th width="10px">No</th>
                <th width="80px">NIS</th>
                <th width="200px">Nama</th>
                <th width="100px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select x.th_pelajaran, x.nis, nama, x.kelas, komp_keahlian, pkelas, kode_mapel, x.semester, Formatif, Sumatif_1, Sumatif_2, Sumatif_3, Sumatif_4, ASTS, ASAS, cpp, cpm from tb_penilaian x inner join tb_siswa y on y.nis = x.nis where x.th_pelajaran = '$th_pelajaran' and x.kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and x.semester = '$semester'");
              while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                  <td class="bg-dark"><?= $no++; ?></td>
                  <td class="bg-dark"><input type="text" name="nis[]" class="form-control" value="<?= $data['nis']; ?>" readonly></td>
                  <td class="bg-dark"><input type="text" name="nama[]" class="form-control" value="<?= $data['nama']; ?>" readonly></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai_asas[]" class="form-control form-control-sm" value="<?= $data['ASAS']; ?>">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_asas" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
  <?php }else{
    echo "<h1>Data Ditak ada<h1>";
  }

}

?>