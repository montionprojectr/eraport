<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="card collapsed-card">
  <div class="card-header bg-success">
    <h4 class="card-title">INPUT DATA SISWA BARU</h4>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
      </button>
    </div>
  </div>
  <div class="card-body bg-teal">
    <div class="row">
    
      <div class="col-sm-6">
    <form action="" method="post">
        <table class="table table-sm">
          <tr>
            <th><label>NIS</label></th>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="nis" required>
              </div>
            </td>
          </tr>
          <tr>
            <tr>
            <th><label>NISN</label></th>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="nisn" required>
              </div>
            </td>
          </tr>
          <tr>
            <th><label>Nama Siswa</label></th>
            <td>
              <div class="form-group">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </td>
          </tr>
           <tr>
            <th><label>Jenis Kelamin</label></th>
            <td>
              <div class="form-group">
                <select class="form-control-sm select2" style="width: 100%;" name="kelamin">
                  <option value=""></option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>

              </select>
              </div>
            </td>

          <tr>
          <td>
            <div class="form-group">
              <label>Pilih Kelas</label>
              <select class="form-control-sm select2" style="width: 100%;" name="kelas">
                <?php 
                $queryk = mysqli_query($koneksi, "select * from tb_kelas");
                while ($dk = mysqli_fetch_array($queryk)) {
                  echo "<option value='".$dk['nama_kelas']."'> Kelas " . $dk['nama_kelas'] . "</option>";
                }
                ?>
              </select>
            </div>
        </td>
        <td>
            <div class="form-group">
              <label>Pilih Kompetensi Keahlian</label>
              <select class="form-control-sm select2" style="width: 100%;" name="jurusan">
                <?php 
                $queryj = mysqli_query($koneksi, "select * from tb_jurusan");
                while ($dj = mysqli_fetch_array($queryj)) {
                  echo "<option value='".$dj['nama_Sjurusan']."'>" . $dj['nama_Sjurusan']." - ". $dj['nama_Ljurusan'] . "</option>";
                }
                ?>
              </select>
            </div>
          </div>
        </td>
        <td>
        <div class="form-group">
              <label>Pilih Kelas</label>
                <!-- radio -->
                <select class="form-control-sm select2" style="width: 100%;" name="pemkelas">
                  <option value="1">1</option>
                <option value="2">2</option>
                <option value="4">3</option>
                <option value="4">4</option>
              </select>
              </div>
            </td>
                </div>      
              </div>
            </div>
          </div></td>
          </tr>
  <tr>
            <th><label>Semester</label></th>
            <td> 
              <div class="form-group">
            <select class="form-control-sm select2" style="width: 100%;" name="semester">
                 <option value="Ganjil">Ganjil</option>
                <option value="Genap">Genap</option>
              </select>
              </div>
            </td>
          </tr> 
          <tr>
            <th><label>Tahun Pelajaran</label></th>
            <td> 
              <div class="form-group">
            <select class="form-control-sm select2" style="width: 100%;" name="th_pelajaran">
               <?php 
                $queryk = mysqli_query($koneksi, "select * from tb_thpelajaran");
                while ($dk = mysqli_fetch_array($queryk)) {
                  
                  echo "<option value='".$dk['tahun_pelajaran']."'>" . $dk['tahun_pelajaran'] ."</option>";

                }
                ?>
                            
              </select>
          
              </div>
            </td>
          </tr>

        
          <tr>
            <td>
              <div class="form-group float-center">
                <button class="btn btn-primary float-center" type="submit" name="simpan"><i class="fas fa-save"></i> Simpan</button>
                <a href="view/operator/del/delete_semua_siswa.php" onclick="javascript: return confirm('Anda yakin ingin menghapus semua data peserta didik ?')" class="btn btn-danger">Hapus Semua Siswa</a>  
            <!--     <a href="#" class="btn btn-primary">Import Data</a>  -->
              </div>

            </td>
          </tr>
        </table>
        INFORMASI !!! Input Data ini juga tersimpan kedalam LEGER dan untuk melengkapi Data peserta didik bisa update dengan klik icon <i class='fas btn-primary fa-edit'></i> pada setiap peserta didik
    </form>
      </div>
    
      <div class="col-sm-6">
       <div class="card">
          <div class="card-header bg-success">
            <h3 class="card-title">IMPORT DATA SISWA BARU</h3>
          </div>
          <div class="card-body bg-light">
           <form method="post" enctype="multipart/form-data" action="view/operator/proses_upload.php">
              <div class="form-group text-dark">
                <label>Pilih File</label> <a href="view/operator/file/data_siswa.xls">Download Template</a>
                <input name="filedata" class="form-control" type="file" required="required">  
              </div> 
              <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload" value="upload">MULAI IMPORT</button>
              </div>
            </form>     
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
if (isset($_POST['simpan'])) {

  $nis = $_POST['nis'];
  $nisn = $_POST['nisn'];
  $nama = $_POST['nama'];
  $kelamin = $_POST['kelamin'];
  $kelas = $_POST['kelas'];
  $jurusan = $_POST['jurusan'];
  $pemkelas = $_POST['pemkelas'];
  $semester = $_POST['semester'];
  $th_pelajaran = $_POST['th_pelajaran'];
  


  require_once('view/operator/id_max.php');
  $query = mysqli_query($koneksi, "insert into tb_leger(id, nis, nama,  kelas, jurusan, pemkelas, semester, th_pelajaran) values('','$nis','$nama', '$kelas', '$jurusan', '$pemkelas','$semester','$th_pelajaran')");
$kelasku= $kelas.' '.$jurusan.' '.$pemkelas;
$insert_rols = mysqli_query($koneksi, "insert into tb_siswa(id, nis, nisn, nama, kelamin, kel, kelas, jurusan, pemkelas, semester,th_pelajaran) values('','$nis','$nisn','$nama', '$kelamin', '$kelasku', '$kelas','$jurusan','$pemkelas','$semester','$th_pelajaran')");

  if ($query && $insert_rols) {
    /*input trigger*/
        $insertkelas = mysqli_query($koneksi, "insert tb_siswa_kelas(nis, kelas, jurusan, pemkelas, th_pelajaran) values('$nis','$kelas','$jurusan','$pemkelas','$th_pelajaran')");

          if ($kelas == 'X') {
              
             $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel not like '%dd%' group by kode_mapel, semester");
             $da = mysqli_num_rows($sqla);
             while ($dt = mysqli_fetch_array($sqla)) {
                  $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
             }

             //1. kondisi jika jurusan PPLG
             if ($jurusan == 'PPLG') {
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_pplg' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                          $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
                        
              //2. kondisi jika jurusan TE
             }else if ($jurusan == 'TE') {
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_te' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                          $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");

                     }
  
              //3. kondisi jika jurusan TSM
             }else if ($jurusan == 'TSM') {
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_oto' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                         $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
 
              //4. kondisi jika jurusan TKR
             }else if ($jurusan == 'TKR') {
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_oto' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                         $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
 
              //5. kondisi jika jurusan TMI
             }else if ($jurusan == 'TMI') {
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_tmi' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                         $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
 
             }/*tutup kondisi $jurusan*/
          
          /*Tutup if($kelas == 'X')*/
          }else if($kelas == 'XI'){
              $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel not like '%kons%' and kode_mapel not like 'mpp' group by kode_mapel, semester");
              $da = mysqli_num_rows($sqla);
                 while ($dt = mysqli_fetch_array($sqla)) {
                      $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                 }

              /*membuat kondisi jika $jurusan == PPLG */
              if ($jurusan == 'PPLG') {
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_pplg' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                          $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
                  
              }else if($jurusan == 'TE'){
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_te' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                          $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
              }else if($jurusan == 'TSM'){
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_tsm' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                          $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
              }else if($jurusan == 'TKR'){
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_tkr' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                          $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
              }else if($jurusan == 'TMI'){
                  $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_tmi' group by semester");
                     $da = mysqli_num_rows($sqla);
                     while ($dt = mysqli_fetch_array($sqla)) {
                          $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis', '$kelas','$jurusan','$pemkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                     }
              }

          }/*Tutup else if($kelas == 'XI')*/
    /* tutup resource trigger*/

    echo "<script>
    alert('DATA BERHASIL DISIMPAN');
    document.location.href = '?view=siswa';
    </script>";
  }else{
    echo "<script>
    alert('DATA GAGAL DISIMPAN');
    document.location.href = '?view=siswa';
    </script>";
  }
}
?>
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header bg-primary"><h3 class="card-title">DAFTAR PESERTA DIDIK</h3></div>
      <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
    <th>No</th>
     <th>NIS</th>
    <th>NISN</th>
    <th>NAMA</th>
    <th>KELAS</th>
    <th>TTL</th>
    <th>Jenis Kelamin</th>
    <th>Agama</th>
    <th>Status Keluarga</th>
    <th>Anak Ke-</th>
    <th>Alamat Siswa</th>
    <th>HP Siswa</th>
    <th>Asal Sekolah</th>
    <th>tgl Diterima</th>
    <th>Nama Ayah </th>
    <th>Nama Ibu</th>
    <th>Alamat Ortu</th>
    <th>HP Ortu</th>
    <th>Pekerjaan Ayah</th>
    <th>Pekerjaan Ibu</th>
    <th>Nama Wali</th>
    <th>Alamat Wali</th>
     <th>HP Wali</th>
     <th>Pekerjaan Wali</th>
     <th>Semester</th>
     <th>Tahun Pelajaran</th>
     <th>ACTION</th>

        </thead>
        <tbody>
    <?php 
          $no = 1;
          $query = mysqli_query($koneksi, "select * from tb_siswa  ");
          while ($data = mysqli_fetch_array($query)) {
            echo "<tr>";
            echo "<td>".$no++."</td>";
  
            echo "<td>".$data['nis']."</td>";
            echo "<td>".$data['nisn']."</td>";
            echo "<td>".$data['nama']."</td>";          
            echo "<td>".$data['kelas'].' '.$data['jurusan'].' '.$data['pemkelas']."</td>";
            echo "<td>".$data['ttl']."</td>";
            echo "<td>".$data['kelamin']."</td>";
            echo "<td>".$data['agama']."</td>";
            echo "<td>".$data['status']."</td>";
            echo "<td>".$data['anak_ke']."</td>";
            echo "<td>".$data['alamat_siswa']."</td>";
            echo "<td>".$data['hp_siswa']."</td>";
            echo "<td>".$data['asal_sekolah']."</td>";
            echo "<td>".$data['tgl_terima']."</td>";
            echo "<td>".$data['ayah']."</td>";
            echo "<td>".$data['ibu']."</td>";
            echo "<td>".$data['alamat_ortu']."</td>";
            echo "<td>".$data['hp_ortu']."</td>";
            echo "<td>".$data['kerja_ayah']."</td>";
            echo "<td>".$data['kerja_ibu']."</td>";
            echo "<td>".$data['nama_wali']."</td>";
            echo "<td>".$data['alamat_wali']."</td>";
            echo "<td>".$data['hp_wali']."</td>";
            echo "<td>".$data['kerja_wali']."</td>";
            echo "<td>".$data['th_pelajaran']."</td>";
            echo "<td>".$data['semester']."</td>";


      

            ?>
            <td><a href="?view=update_siswa&id=<?= $data['id'] ?>" class='btn btn-primary' ><i class='fas fa-edit'></i></a>  ||  <a href="pdf/cover.php?id=<?= $data['id'] ?>" class='btn btn-primary'><i class='fas fa-print'></i></a>  ||  <a href="view/operator/del/delete_users_siswa.php?id=<?= $data['id'] ?>&nis=<?= $data['nis'] ?>" class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus nama <?= $data['nama'] ?> ini?')"><i class='fas fa-trash'></i></a>  </td> 
            <?php
            echo "</tr>";
          }
          ?>

        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>