<?php 
require_once('../../../koneksi.php');

if (isset($_POST['simpan_nilai'])) {
  $th_pelajaran = $_POST['th_pelajaran'];
  $nis = $_POST['nis'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $kode_mapel = $_POST['kode_mapel'];
  $jenis_penilaian = $_POST['jenis_penilaian'];
  $semester = $_POST['semester'];
  $nilai = $_POST['nilai'];
  $cpm = $_POST['cpm'];
  $cpp = $_POST['cpp'];

  $count = count($nis);
  for ($i=0; $i < $count ; $i++) { 
    $query = mysqli_query($koneksi, "insert into tb_penilaian(id_nilai, th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, jenis_penilaian, semester, nilai, cpm, cpp) values('','$th_pelajaran', '$nis[$i]','$kelas','$komp_keahlian','$pkelas','$kode_mapel','$jenis_penilaian','$semester','$nilai[$i]','$cpm','$cpp')");

  }

  if ($query) {
    echo "<script>
    alert('Data Nilai Siswa Berhasil diinputkan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }else{
    echo "<script>
    alert('Data Nilai Siswa Gagal diinputkan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }
}
?>