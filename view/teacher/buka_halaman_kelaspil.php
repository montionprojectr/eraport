<?php 
if (isset($_POST['semester'])) {
  $th_pelajaran = $_POST['th_pelajaran'];
  $semester = $_POST['semester'];
  $kode_mapel = $_POST['kode_mapel'];
  $kode_mapelsub = $_POST['kode_mapelsub'];
  $nipy = $_POST['nipy'];

  ?>
<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span> Mata Pelajaran Pilihan</span>
      </li>
      <li class="active">
        <i class="fas fa-angle-right"></i> 
        <span> Th. Pelajaran : <?= $th_pelajaran; ?></span> 
      </li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span> Semester : <?= $semester; ?></span> 
      </li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span> Kode Mapel : <?= $kode_mapelsub; ?></span>
      </li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
  <?php 
  $query = mysqli_query($koneksi, "SELECT * FROM tb_guru_mapel X INNER JOIN tb_mapelsub Y ON y.kode_mapelsub = x.kode_mapelsub WHERE th_pelajaran = '$th_pelajaran' and nipy = '$nipy'");
  while ($data = mysqli_fetch_array($query)) { 
      $sql = mysqli_query($koneksi, "SELECT * FROM tb_kelasmappil where th_pelajaran = '".$data['th_pelajaran']."' and semester = '$semester' and nama_kelaspil = '".$data['komp']."'");
      while ($d =mysqli_fetch_array($sql)) {
       ?>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header bg-danger">
          <h3 class="card-title">KELAS : <?= $d['nama_kelaspil']." '".$data['nama_submapel']."'"; ?></h3>
        </div>
        <div class="card-body">
          <a href="guru" class="btn btn-primary">Kembali</a>
          <a href="?page=buka_halaman_kelaspil&id_kelasmappil=<?= $d['id_kelasmappil']; ?>" class="btn btn-primary" >Buka Kelas</a>
        </div>
      </div>
    </div>
  <?php } 
      }
  ?>
</div>
  <?php 
}else if (isset($_GET['id_kelasmappil'])) {
      $id_kelasmappil = $_GET['id_kelasmappil'];
      $query = mysqli_query($koneksi, "select * from tb_kelasmappil where id_kelasmappil = '$id_kelasmappil'");
      $kls = mysqli_fetch_array($query);

      if ($row = mysqli_num_rows($query) > 0) { ?>
      <div class="card">
        <div class="card-header bg-danger">
          <h3 class="card-title">DAFTAR SISWA KELAS <?= $kls['nama_kelaspil']; ?></h3>
        </div>
        <div class="card-body">
          <form action="view/teacher/proses/proses_input_nilai.php" method="post">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group" hidden>
                <input type="text" name="id_kelasmappil" value="<?= $kls['id_kelasmappil']; ?>">
                <input type="text" name="th_pelajaran" value="<?= $kls['th_pelajaran']; ?>">
                <input type="text" name="semester" value="<?= $kls['semester']; ?>">
                <input type="text" name="kode_mapel" value="<?= $kls['kode_mapel']; ?>">
              </div>
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
              <table class="table table-sm table-bordered table-striped">
                <thead>
                  <th>NIS</th>
                  <th>NAMA</th>
                  <th>KELAS</th>
                  <th width="70px;">Formatif</th>
                  <th width="50px;">Sumatif_1</th>
                  <th width="50px;">Sumatif_2</th>
                  <th width="50px;">Sumatif_3</th>
                  <th width="50px;">Sumatif_4</th>
                  <th width="70px;">ASTS</th>
                  <th width="70px;">ASAS</th>
                </thead>
                <tbody>
                  <?php 
                  $siswa = mysqli_query($koneksi, "SELECT * FROM tb_ruangsiswa_mappil X INNER JOIN tb_siswa Y ON y.nis = x.nis where id_kelasmappil = '$id_kelasmappil'");
                  while ($dt = mysqli_fetch_array($siswa)) { 
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_penilaian WHERE th_pelajaran = '".$dt['th_pelajaran']."' AND kelas = 'XI' AND kode_mapel = 'mpp' AND semester = '".$dt['semester']."' and nis = '".$dt['nis']."'");
                    $d = mysqli_fetch_array($sql);
                    if ($show = mysqli_num_rows($sql) > 0) {
                        ?>
                        <tr>
                          <td>
                            <input type="text" name="nis[]" class="form-control form-control-sm" value="<?= $dt['nis']; ?>" readonly>
                          </td>
                          <td><?= $dt['nama']; ?>
                          </td>
                          <td hidden>
                            <input type="text" name="kelas[]" value="<?= $d['kelas']; ?>">
                            <input type="text" name="komp_keahlian[]" value="<?= $d['komp_keahlian']; ?>">
                            <input type="text" name="pkelas[]" value="<?= $d['pkelas']; ?>">
                          </td>
                          <td><?= $d['kelas']." ".$d['komp_keahlian']." ".$d['pkelas']; ?></td>
                          <td><input type="number" name="formatif[]" class="form-control form-control-sm" value="<?= $d['Formatif']; ?>"></td>
                          <td><input type="number" name="sumatif_1[]" class="form-control form-control-sm" value="<?= $d['Sumatif_1']; ?>"></td>
                          <td><input type="number" name="sumatif_2[]" class="form-control form-control-sm" value="<?= $d['Sumatif_2']; ?>"></td>
                          <td><input type="number" name="sumatif_3[]" class="form-control form-control-sm" value="<?= $d['Sumatif_3']; ?>"></td>
                          <td><input type="number" name="sumatif_4[]" class="form-control form-control-sm" value="<?= $d['Sumatif_4']; ?>"></td>
                          <td><input type="number" name="asts[]" class="form-control form-control-sm" value="<?= $d['ASTS']; ?>"></td>
                          <td><input type="number" name="asas[]" class="form-control form-control-sm" value="<?= $d['ASAS']; ?>"></td>
                        </tr>
                      <?php 
                    }
                  }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <td colspan="10">
                  <a href="guru" class="btn btn-primary">Kembali</a>
                  <button type="submit" class="btn btn-primary" name="simpan_datanilai">SIMPAN NILAI</button>
                  </td>
                </tr>      
                </tfoot>
              </table>
            </div>
          </div>
          </form>
        </div>
      </div>
      <?php }else{
        echo "<script>document.location.href = 'guru'</script>";
      }
}
?>