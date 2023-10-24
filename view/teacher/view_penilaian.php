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
        <div class="form-group">
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="jenis_penilaian" value="Formatif">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control" name="cpm"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control" name="cpp"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select * from tb_siswa where kelas = '$kelas' and jurusan = '$komp_keahlian' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran'");
              while ($data = mysqli_fetch_array($sql)) {
                $array[] = array(
                  'nis' => $data['nis'],
                  'nama' => $data['nama']
                );
              }
              foreach ($array as $key) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><input type="text" name="nis[]" class="form-control" value="<?= $key['nis']; ?>"></td>
                  <td><input type="text" name="nama[]" class="form-control" value="<?= $key['nama']; ?>"></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai[]" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_nilai" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
<?php }else if($type_test == 'sumatif_1'){ ?>
    <!-- Penilaian Sumatif_1 -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="jenis_penilaian" value="Sumatif_1">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control" name="cpm"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control" name="cpp"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select * from tb_siswa where kelas = '$kelas' and jurusan = '$komp_keahlian' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran'");
              while ($data = mysqli_fetch_array($sql)) {
                $array[] = array(
                  'nis' => $data['nis'],
                  'nama' => $data['nama']
                );
              }
              foreach ($array as $key) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><input type="text" name="nis[]" class="form-control" value="<?= $key['nis']; ?>"></td>
                  <td><input type="text" name="nama[]" class="form-control" value="<?= $key['nama']; ?>"></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai[]" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_nilai" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
  <?php }else if($type_test == 'sumatif_2'){ ?>
    <!-- Penilaian Sumatif_2 -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="jenis_penilaian" value="Sumatif_2">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control" name="cpm"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control" name="cpp"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select * from tb_siswa where kelas = '$kelas' and jurusan = '$komp_keahlian' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran'");
              while ($data = mysqli_fetch_array($sql)) {
                $array[] = array(
                  'nis' => $data['nis'],
                  'nama' => $data['nama']
                );
              }
              foreach ($array as $key) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><input type="text" name="nis[]" class="form-control" value="<?= $key['nis']; ?>"></td>
                  <td><input type="text" name="nama[]" class="form-control" value="<?= $key['nama']; ?>"></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai[]" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_nilai" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
  <?php }else if($type_test == 'sumatif_3'){ ?>
    <!-- Penilaian Sumatif_3 -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="jenis_penilaian" value="Sumatif_3">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control" name="cpm"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control" name="cpp"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select * from tb_siswa where kelas = '$kelas' and jurusan = '$komp_keahlian' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran'");
              while ($data = mysqli_fetch_array($sql)) {
                $array[] = array(
                  'nis' => $data['nis'],
                  'nama' => $data['nama']
                );
              }
              foreach ($array as $key) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><input type="text" name="nis[]" class="form-control" value="<?= $key['nis']; ?>"></td>
                  <td><input type="text" name="nama[]" class="form-control" value="<?= $key['nama']; ?>"></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai[]" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_nilai" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
  <?php }else if($type_test == 'sumatif_4'){ ?>
    <!-- Penilaian Sumatif_4 -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="jenis_penilaian" value="Sumatif_4">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control" name="cpm"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control" name="cpp"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select * from tb_siswa where kelas = '$kelas' and jurusan = '$komp_keahlian' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran'");
              while ($data = mysqli_fetch_array($sql)) {
                $array[] = array(
                  'nis' => $data['nis'],
                  'nama' => $data['nama']
                );
              }
              foreach ($array as $key) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><input type="text" name="nis[]" class="form-control" value="<?= $key['nis']; ?>"></td>
                  <td><input type="text" name="nama[]" class="form-control" value="<?= $key['nama']; ?>"></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai[]" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_nilai" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
  <?php }else if($type_test == 'asas_nontest'){ ?>
    <!-- Penilaian ASAS_nontest -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="jenis_penilaian" value="ASAS_nontest">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control" name="cpm"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control" name="cpp"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select * from tb_siswa where kelas = '$kelas' and jurusan = '$komp_keahlian' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran'");
              while ($data = mysqli_fetch_array($sql)) {
                $array[] = array(
                  'nis' => $data['nis'],
                  'nama' => $data['nama']
                );
              }
              foreach ($array as $key) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><input type="text" name="nis[]" class="form-control" value="<?= $key['nis']; ?>"></td>
                  <td><input type="text" name="nama[]" class="form-control" value="<?= $key['nama']; ?>"></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai[]" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_nilai" name="SIMPAN NILAI FORMATIF">
        </div>
      </div>
    </div>
  </form>
  </div>
</div>
  <?php }else if($type_test == 'asas_test'){ ?>
    <!-- Penilaian ASAS_test -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b>PENILAIAN KELAS ( <?= $kelas." ".$komp_keahlian." ".$pkelas; ?> ). Mata Pelajaran : <?= "(".$kode_mapel.") ".$nama_mapel; ?></b></h3>
  </div>
  <div class="card-body">
  <form action="view/teacher/proses/proses_input_nilai.php" method="post">
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
          <input type="text" name="kelas" value="<?= $kelas; ?>">
          <input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
          <input type="text" name="pkelas" value="<?= $pkelas; ?>">
          <input type="text" name="kode_mapel" value="<?= $kode_mapel ?>">
          <input type="text" name="jenis_penilaian" value="ASAS_test">
          <input type="text" name="semester" value="<?= $semester ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
          <textarea class="form-control" name="cpm"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
          <textarea class="form-control" name="cpp"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $sql = mysqli_query($koneksi, "select * from tb_siswa where kelas = '$kelas' and jurusan = '$komp_keahlian' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran'");
              while ($data = mysqli_fetch_array($sql)) {
                $array[] = array(
                  'nis' => $data['nis'],
                  'nama' => $data['nama']
                );
              }
              foreach ($array as $key) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><input type="text" name="nis[]" class="form-control" value="<?= $key['nis']; ?>"></td>
                  <td><input type="text" name="nama[]" class="form-control" value="<?= $key['nama']; ?>"></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai[]" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
          <input type="submit" class="btn btn-primary" name="simpan_nilai" name="SIMPAN NILAI FORMATIF">
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