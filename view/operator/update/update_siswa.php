<?php
include_once('koneksi.php');
$id = $_GET["id"];
?>
  

<!DOCTYPE html>
        <html lang="en">
        
        <head>
 <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Edit</title>
            <!-- import bootstrap  -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
                integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        </head>
        
        <body>
            <br>
 <div class="container col-lg-30">
                <!-- membuat tulisan alert berwarna hijau dengan tulisan di tengah  -->
                <h3 class="alert alert-success text-center" role="alert">
                    Edit Data Peserta Didik
                </h3>
 
<hr />

<hr />
 
<form method="post" action=''>
<table class="table ">
<thead class="thead-dark">
<?php
        include "koneksi.php";
        $no=1;
        $sql = "SELECT * FROM tb_siswa WHERE id='$id'";
  $query = mysqli_query($koneksi, $sql);
  $row = mysqli_fetch_array($query);{
          
 
  ?>
   
  <tbody id="myTable">
  
    <tr>
      <td>NIS </td>
      <td>: <?php echo "<input type='text'size='10' name='nis' value='$row[nis]'>"; ?></td>
    </tr>
    <tr>
      <td>NISN</td>
      <td>: <?php echo "<input type='text'size='20' name='nisn' value='$row[nisn]'>"; ?></td>
    </tr>
    <tr>
      <td>Nama Siswa</td>
      <td>: <?php echo "<input type='text'size='50' name='nama' value='$row[nama]'>"; ?></td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td>:
          
           
           
              <select name="kelas">
                <option value="<?php echo "$row[kelas]"?>"><?php echo "$row[kelas]"?></option>
                <option value="X">X</option>
                <option value="XI">XI</option>
                <option value="XII">XII</option>
           
              </select>
           
        
          

              <select name="jurusan">
                <option value="<?php echo "$row[jurusan]"?>"><?php echo "$row[jurusan]"?></option>
                <option value="PPLG">PPLG</option>
                <option value="TE">TE</option>
                <option value="TKR">TKR</option>
                <option value="TMI">TMI</option>
                <option value="TSM">TSM</option>
              </select>
       
      
     
              <select name="pemkelas">
                <option value="<?php echo "$row[pemkelas]"?>"><?php echo "$row[pemkelas]"?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="4">3</option>
                <option value="4">4</option>
              </select>
           
             </td>
         
    </tr>
    <tr>
      <td>Tempat Tanggal Lahir</td>
      <td>: <?php echo "<input type='text'size='50' name='ttl' value='$row[ttl]'>"; ?></td>
    </tr>
    <tr>
      <td>Jenis Kelamin (L/P)</td>
      <td>: <?php echo "<input type='text'size='1' name='kelamin' value='$row[kelamin]'>"; ?></td>
     </tr>
    <tr>
      <td>Agama</td>
      <td>: <?php echo "<input type='text'size='10' name='agama' value='$row[agama]'>"; ?></td>
    </tr>
    <tr>
      <td>Status Keluarga</td>
      <td>: <?php echo "<input type='text'size='40' name='status' value='$row[status]'>"; ?></td>
    </tr>
    <tr>
      <td>Anak Ke </td>
      <td>: <?php echo "<input type='text'size='2' name='anak_ke' value='$row[anak_ke]'>"; ?></td>
    </tr>
    <tr>
      <td>Alamat Peserta Didik</td>
      <td>: <?php echo "<input type='text' size='90' name='alamat_siswa' value='$row[alamat_siswa]'>"; ?></td>
    </tr>
    <tr>
      <td>Nomor Telepon Rumah</td>
      <td>: <?php echo "<input type='text'size='40' name='hp_siswa' value='$row[hp_siswa]'>"; ?></td>
    </tr>
    <tr>
      <td>Asal Sekolah</td>
      <td>: <?php echo "<input type='text'size='40' name='asal_sekolah' value='$row[asal_sekolah]'>"; ?></td>
    </tr>
    <tr>
      <td>Diterima Disekolah ini </td>
      <td>: <?php echo "<input type='text'size='20' name='tgl_terima' value='$row[tgl_terima]'>"; ?></td>
    </tr>
    <tr>
      <td>Ayah</td>
      <td>: <?php echo "<input type='text' size='50' name='ayah' value='$row[ayah]'>"; ?></td>
    </tr>
    <tr>
      <td>Ibu</td>
      <td>: <?php echo "<input type='text' size='50' name='ibu' value='$row[ibu]'>"; ?></td>
    </tr>
   <tr>
      <td>Alamat Orang Tua</td>
      <td>: <?php echo "<input type='text' size='90' name='alamat_ortu' value='$row[alamat_ortu]'>"; ?></td>
    </tr>
    <tr>
      <td>Nomor Telepon Rumah</td>
      <td>: <?php echo "<input type='text'size='40' name='hp_ortu' value='$row[hp_ortu]'>"; ?></td>
    </tr>
    <tr>
      <td>Pekerjaan Ayah</td>
      <td>: <?php echo "<input type='text' size='40' name='kerja_ayah' value='$row[kerja_ayah]'>"; ?></td>
    </tr>
    <tr>
      <td>Pekerjaan Ibu</td>
      <td>: <?php echo "<input type='text'size='40' name='kerja_ibu' value='$row[kerja_ibu]'>"; ?></td>
    </tr>
    </tr>
    <tr>
      <td>Nama Wali</td>
      <td>: <?php echo "<input type='text' size='50' name='nama_wali' value='$row[nama_wali]'>"; ?></td>
    </tr>
    <tr>
      <td>Alamat Wali</td>
      <td>: <?php echo "<input type='text'size='90' name='alamat_wali' value='$row[alamat_wali]'>"; ?></td>
    </tr>
    <tr>
      <td>Nomor Telepon Wali</td>
      <td>: <?php echo "<input type='text'size='40' name='hp_wali' value='$row[hp_wali]'>"; ?></td>
    </tr>
    <tr>
      <td>Pekerjaan Wali</td>
      <td>: <?php echo "<input type='text'size='40' name='kerja_wali' value='$row[kerja_wali]'>"; ?></td>
    </tr>
     <tr>
      <td>Semester</td>
      <td>: <?php echo "<input type='text'size='40' name='semester' value='$row[semester]'>"; ?></td>
    </tr>
    <tr>
      <td>Tahun Pelajaran</td>
      <td>: <?php echo "<input type='text'size='40' name='th_pelajaran' value='$row[th_pelajaran]'>"; ?></td>
    </tr>

<tr>
  <div class="form-group float-center">
                    <td><button class="btn btn-primary float-center" type="submit" name="simpan_perubahan"><i class="fas fa-save"></i> Simpan Perubahan</button>  </td>
                    <!-- <a href="#" class="btn btn-primary">Download Template</a>  
                    <a href="#" class="btn btn-primary">Import Data</a>  -->
                  </div>  
    </tr>
   </tbody>
 </thead>

 </form>


   <?php
 
 } ?>
</table>
<?php



if(isset($_POST["simpan_perubahan"])){
 $id = $_GET["id"];
 $nis = $_POST["nis"];
 $nisn = $_POST["nisn"];
 $nama = $_POST["nama"];
 $kelas = $_POST["kelas"];
 $jurusan = $_POST["jurusan"];
 $pemkelas = $_POST["pemkelas"];
 $ttl = $_POST["ttl"];
 $kelamin = $_POST["kelamin"];
 $agama = $_POST["agama"];
 $status = $_POST["status"];
 $anak_ke = $_POST["anak_ke"];
 $alamat_siswa = $_POST["alamat_siswa"];
 $hp_siswa =  $_POST["hp_siswa"];
 $asal_sekolah = $_POST["asal_sekolah"];
 $tgl_terima = $_POST["tgl_terima"];
 $ayah = $_POST["ayah"];
 $ibu = $_POST["ibu"];
 $alamat_ortu = $_POST["alamat_ortu"];
 $hp_ortu = $_POST["hp_ortu"];
 $kerja_ayah = $_POST["kerja_ayah"];
 $kerja_ibu = $_POST["kerja_ibu"];
 $nama_wali = $_POST["nama_wali"];
 $alamat_wali = $_POST["alamat_wali"];
 $hp_wali = $_POST["hp_wali"];
 $kerja_wali = $_POST["kerja_wali"];
  $semester = $_POST["semester"];
 $th_pelajaran = $_POST["th_pelajaran"];

 
 $update= "UPDATE tb_siswa SET  nis='$nis', nisn='$nisn',nama='$nama', kelas='$kelas',jurusan='$jurusan',pemkelas='$pemkelas',ttl='$ttl', kelamin='$kelamin',agama='$agama', status='$status', anak_ke='$anak_ke', alamat_siswa='$alamat_siswa', hp_siswa='$hp_siswa', asal_sekolah='$asal_sekolah',tgl_terima='$tgl_terima', ayah='$ayah',ibu='$ibu',alamat_ortu='$alamat_ortu',hp_ortu='$hp_ortu',kerja_ayah='$kerja_ayah',kerja_ibu='$kerja_ibu', nama_wali='$nama_wali',alamat_wali='$alamat_wali',hp_wali='$hp_wali',kerja_wali='$kerja_wali', semester='$semester', th_pelajaran='$th_pelajaran' WHERE id='$id'";
  mysqli_query($koneksi, $update);
 $leger= "UPDATE tb_leger SET  nis='$nis',nama='$nama', kelas='$kelas',jurusan='$jurusan',pemkelas='$pemkelas',semester='$semester', th_pelajaran='$th_pelajaran'  WHERE id='$id'";
 mysqli_query($koneksi, $leger);
  if ($update && $leger) {
    echo "<script>
    alert('DATA PERUBAHAN BERHASIL DISIMPAN');
    document.location.href = '?view=siswa';
    </script>";
  }else{
    echo "<script>
    alert('DATA PERUBAHAN GAGAL DISIMPAN');
    document.location.href = '?view=siswa';
    </script>";
  }
}

?> 