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
          <h3 class="card-title">DAFTAR SISWA MATA PELAJARAN PILIHAN KELAS <?= $kls['nama_kelaspil']; ?></h3>
          <?php 
          $cekkel = mysqli_query($koneksi, "SELECT * FROM tb_ruangsiswa_mappil where id_kelasmappil = '".$kls['id_kelasmappil']."'");
          if ($rows = mysqli_num_rows($cekkel) > 0 ) {
            ?>
            <div class="card-tools">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Import Data
            </button>
          </div>
            <?php
          }else{
            echo "";
          }
          ?>
        </div>
        <div class="card-body">
          <form action="view/teacher/proses/proses_input_nilai.php" method="post">
          <div class="row">
            <?php 
              $cekelas = mysqli_query($koneksi, "SELECT * FROM tb_ruangsiswa_mappil where id_kelasmappil = '".$kls['id_kelasmappil']."'");
              $dc = mysqli_fetch_array($cekelas);
                  if ($ro = mysqli_num_rows($cekelas) > 0 ) {
                    $cp = mysqli_query($koneksi, "select * from tb_penilaian where th_pelajaran = '".$dc['th_pelajaran']."' and kelas = 'XI' and kode_mapel = '".$dc['kode_mapel']."' and semester = '".$dc['semester']."' and nis = '".$dc['nis']."'");
                    while ($dcp = mysqli_fetch_array($cp)) { ?>
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label>Capaian Kompetensi Menunjukan penguasaan yang baik dalam :</label>
                      <textarea class="form-control" name="cpm" value="<?= $dcp['cpm']; ?>"><?= $dcp['cpm']; ?></textarea>
                    </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Capaian Kompetensi Perlu ditingkatkan dalam :</label>
                        <textarea class="form-control" name="cpp" value="<?= $dcp['cpp']; ?>"><?= $dcp['cpp']; ?></textarea>
                      </div>
                    </div>
                    <?php }
                  }else{
                    echo "<h3>DATA SISWA BELUM TERISI HARAP HUBUNGI OPERATOR</h3>";
                  }
              ?>
            <div class="col-sm-12">
              <div class="form-group" hidden>
                <input type="text" name="id_kelasmappil" value="<?= $kls['id_kelasmappil']; ?>">
                <input type="text" name="th_pelajaran" value="<?= $kls['th_pelajaran']; ?>">
                <input type="text" name="semester" value="<?= $kls['semester']; ?>">
                <input type="text" name="kode_mapel" value="<?= $kls['kode_mapel']; ?>">
              </div>
              <table class="table table-sm table-bordered table-striped">
                <thead>
                  <th>No</th>
                  <th>NIS</th>
                  <th>NAMA</th>
                  <th>ASAL KELAS</th>
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
                  $no=1;
                  while ($dt = mysqli_fetch_array($siswa)) { 
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_penilaian WHERE th_pelajaran = '".$dt['th_pelajaran']."' AND kelas = 'XI' AND kode_mapel = 'mpp' AND semester = '".$dt['semester']."' and nis = '".$dt['nis']."'");
                    $d = mysqli_fetch_array($sql);
                    if ($show = mysqli_num_rows($sql) > 0) {
                        ?>
                        <tr>
                          <td><?= $no++; ?></td>
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
                  <?php 
                  $cekkelas = mysqli_query($koneksi, "SELECT * FROM tb_ruangsiswa_mappil where id_kelasmappil = '".$kls['id_kelasmappil']."'");
                  if ($r = mysqli_num_rows($cekkelas) > 0 ) {
                    ?>
                    <button type="submit" class="btn btn-primary" name="simpan_datanilai">SIMPAN NILAI</button>
                    <?php
                  }else{
                    echo "";
                  }
                  ?>
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
      } ?>  
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Import Data Nilai Kelas Pilihan <?= $kls['nama_kelaspil']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body bg-dark">
              <form action="?page=buka_halaman_kelaspil" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <a href="view/teacher/file/export_penilaian_mappil.php?id=<?= $id_kelasmappil; ?>" target="_blank">Download Template Nilai Kelas Pilihan</a>
              </div>
              <div class="form-group" hidden>
                <input type="text" name="id_kelasmappil" value="<?= $kls['id_kelasmappil']; ?>">
              </div>
              <div class="input-group">
                <input type="file" name="file" class="form-control">
                <div class="input-group-prepend">
                  <button type="submit" name="import-nilaisiswampp" class="btn btn-primary">Preview</button>
                </div>  
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php }else if(isset($_POST['import-nilaisiswampp'])){
  $id_kelasmappil = $_POST['id_kelasmappil']; 
  $tbkls = mysqli_query($koneksi, "select * from tb_kelasmappil where id_kelasmappil = '$id_kelasmappil'");
  $kl = mysqli_fetch_array($tbkls);

  // $tble = mysqli_query($koneksi, "select * from tb_ruangsiswa_mappil where id_kelasmappil = '$id_kelasmappil'");
  // $tb = mysqli_fetch_array($tble); 
  ?>
<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
      <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
      <li class="active"> > Preview Import Nilai Kelas Pilihan : XI <?= $kl['nama_kelaspil']; ?></li>
    </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<?php

  //kaitkan file genered maximal baris
  // require_once('view/operator/id_max.php');
  //mengambil waktu sekarang
  $tgl_new = date('Ymd');
  //membuat nama_file xlsx
  $nama_file_new = 'data_penilaian' . $tgl_new . 'xlsx';

  //cek apakah nama file tersebut ada? jika ada di hapus atau unlink path
  if (is_file('view/operator/file/' . $nama_file_new)) 
    unlink('view/operator/file/' . $nama_file_new);
    // Ambil ekstensi filenya apa
   $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $tmp_file = $_FILES['file']['tmp_name'];

    if ($ext == 'xlsx') {
       move_uploaded_file($tmp_file, 'view/operator/file/' . $nama_file_new);
       $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load('view/operator/file/' . $nama_file_new); // Load file yang tadi diupload ke folder tmp
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


        ?>
      <form action="view/teacher/proses/proses_import_nilai.php" method="post">
        <div class="card">
          <div class="card-header bg-warning">
            <h3 class="card-title">PRIVIEW BEFORE IMPOT EXCEL</h3>
          </div>
          <div class="card-body">
            <div class="form-group">
              <input type="text" name="id_kelasmappil" value="<?= $id_kelasmappil; ?>">
              <input type="text" name="th_pelajaran" value="<?= $kl['th_pelajaran']; ?>">
              <input type="text" name="kode_mapel" value="<?= $kl['kode_mapel']; ?>">
              <input type="text" name="semester" value="<?= $kl['semester']; ?>">
            </div>
            <div class="form-group" hidden>
        <!-- Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
        ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload) -->
            <input type='text' name='namafile' class="form-control" value='<?= $nama_file_new ?>'>
            </div>
            <table class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th width="40px">No</th>
                  <th width="100px">NIS</th>
                  <th width="250px">NAMA</th>
                  <th width="100px">ASAL KELAS</th>
                  <th width="50px">Formatif</th>
                  <th width="50px">Sumatif_1</th>
                  <th width="50px">Sumatif_2</th>
                  <th width="50px">Sumatif_3</th>
                  <th width="50px">Sumatif_4</th>
                  <th width="70px">ASTS</th>
                  <th width="70px">ASAS</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $num=1;
              $numrow = 1;
              $kosong = 0;
              foreach ($sheet as $row) {
                $nis = $row['A'];
                $nama = $row['B'];
                $kelas = $row['C'];
                $formatif = $row['D'];
                $sumatif_1 = $row['E'];
                $sumatif_2 = $row['F'];
                $sumatif_3 = $row['G'];
                $sumatif_4 = $row['H'];
                $asts = $row['I'];
                $asas = $row['J'];
                if($nis == '' && $nama == '' && $kelas == '' && $formatif == '' && $sumatif_1 == '' && $sumatif_2 == '' && $sumatif_3 == '' && $sumatif_4 == '' && $asts == '' && $asas == '') continue;

                if ($numrow > 1) {
                  $nis_n = (!empty($nis))? "" : " style='background: #E07171;'";
                  $nama_n = (!empty($nama))? "" : " style='background: #E07171;'";
                  $kelas_n = (!empty($kelas))? "" : " style='background: #E07171;'";
                  $formatif_n = (!empty($formatif))? "" : " style='background: #E07171;'";
                  $sumatif1_n = (!empty($sumatif_1))? "" : " style='background: #E07171;'";
                  $sumatif2_n = (!empty($sumatif_2))? "" : " style='background: #E07171;'";
                  $sumatif3_n = (!empty($sumatif_3))? "" : " style='background: #E07171;'";
                  $sumatif4_n = (!empty($sumatif_4))? "" : " style='background: #E07171;'";
                  $asts_n = (!empty($asts))? "" : " style='background: #E07171;'";
                  $asas_n = (!empty($asas))? "" : " style='background: #E07171;'";
                  // Jika salah satu data ada yang kosong
                      if ($nis == '' or $nama == '' or $kelas == '' or $formatif == '' or $sumatif_1 == '' or $sumatif_2 == '' or $sumatif_3 == '' or $sumatif_4 == '' or $asts == '' or $asas == '') {
                          $kosong++; // Tambah 1 variabel $kosong
                      } ?>
                        <tr>
                          <td><?= $num++; ?></td>
                          <td <?= $nis_n; ?>>
                            <input type="text" name="nis[]" class="form-control" value="<?= $nis; ?>" readonly>
                          </td>
                          <td <?= $nama_n; ?>>
                            <input type="text" name="nama[]" class="form-control" value="<?= $nama; ?>" readonly>
                          </td>
                          <td <?= $kelas_n; ?>>
                            <input type="text" name="class[]" class="form-control" value="<?= $kelas; ?>" readonly>
                          </td>
                          <td <?= $formatif_n ?>>
                            <input type="number" name="formatif[]" class="form-control form-control-sm" value="<?= $formatif; ?>">
                          </td>
                          <td <?= $sumatif1_n; ?>>
                            <input type="number" name="sumatif_1[]" class="form-control form-control-sm" value="<?= $sumatif_1; ?>">
                          </td>
                          <td <?= $sumatif2_n; ?>>
                            <input type="number" name="sumatif_2[]" class="form-control form-control-sm" value="<?= $sumatif_2; ?>">
                          </td>
                          <td <?= $sumatif3_n; ?>>
                            <input type="number" name="sumatif_3[]" class="form-control form-control-sm" value="<?= $sumatif_3; ?>">
                          </td>
                          <td <?= $sumatif4_n; ?>>
                            <input type="number" name="sumatif_4[]" class="form-control form-control-sm" value="<?= $sumatif_4; ?>">
                          </td>
                          <td <?= $asts_n; ?>>
                            <input type="number" name="asts[]" class="form-control form-control-sm" value="<?= $asts; ?>">
                          </td>
                          <td <?= $asas_n; ?>>
                            <input type="number" name="asas[]" class="form-control form-control-sm" value="<?= $asas; ?>">
                          </td>
                        </tr>
         <?php }
                $numrow++; // Tambah 1 setiap kali looping
              }
              ?>
              </tbody>
            </table>
            <div class="form-group">
              <!-- Buat sebuah tombol untuk mengimport data ke database -->
            <button type='submit' name='simpan_importmappil' class='btn btn-primary'>Import</button>
            <a href='?view=guru' class='btn btn-primary'>Cencel</a>   
            </div>
          </div>
        </div>
      </form>
        <?php
    }else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
        // Munculkan pesan validasi
        echo "<div class='card card-header bg-warning' style='color: red;margin-bottom: 10px;'>
                <h3 class='card-title text-danger'>Hanya File Excel 2007 (.xlsx) yang diperbolehkan <a href='?view=guru'>Kembali</a><h3>

            </div>";
    }

}
?>