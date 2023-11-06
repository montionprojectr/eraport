<?php 
require_once('../../../koneksi.php');

if (isset($_POST['simpan_formatif'])) {
  $th_pelajaran = $_POST['th_pelajaran'];
  $nis = $_POST['nis'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $kode_mapel = $_POST['kode_mapel'];
  $semester = $_POST['semester'];
  $nilai = $_POST['formatif'];
  $cpm = $_POST['cpm'];
  $cpp = $_POST['cpp'];

  $count = count($nis);
  for ($i=0; $i < $count ; $i++) { 
    $query = mysqli_query($koneksi, "update tb_penilaian set Formatif = '".$nilai[$i]."', cpm = '".$cpm."', cpp = '".$cpp."' where th_pelajaran = '$th_pelajaran' and nis = '".$nis[$i]."' and kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and semester = '$semester'");

  }

  if ($query) {
    echo "<script>
    alert('Data Nilai Siswa Berhasil disimpan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }else{
    echo "<script>
    alert('Data Nilai Siswa Gagal disimpan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }
}else if (isset($_POST['simpan_sumatif'])) {
  $th_pelajaran = $_POST['th_pelajaran'];
  $nis = $_POST['nis'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $kode_mapel = $_POST['kode_mapel'];
  $semester = $_POST['semester'];
  $nilai1 = $_POST['nilai_suma1'];
  $nilai2 = $_POST['nilai_suma2'];
  $nilai3 = $_POST['nilai_suma3'];
  $nilai4 = $_POST['nilai_suma4'];

  $count = count($nis);
  for ($i=0; $i < $count ; $i++) { 
    $query = mysqli_query($koneksi, "update tb_penilaian set Sumatif_1 = '".$nilai1[$i]."', Sumatif_2 = '".$nilai2[$i]."', Sumatif_3 = '".$nilai3[$i]."', Sumatif_4 = '".$nilai4[$i]."'  where th_pelajaran = '$th_pelajaran' and nis = '".$nis[$i]."' and kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and semester = '$semester'");

  }

  if ($query) {
    echo "<script>
    alert('Data Nilai Siswa Berhasil disimpan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }else{
    echo "<script>
    alert('Data Nilai Siswa Gagal disimpan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }
}else if(isset($_POST['simpan_asts'])){
  $th_pelajaran = $_POST['th_pelajaran'];
  $nis = $_POST['nis'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $kode_mapel = $_POST['kode_mapel'];
  $semester = $_POST['semester'];
  $nilai = $_POST['nilai_asts'];

  $count = count($nis);
  for ($i=0; $i < $count ; $i++) { 
    $query = mysqli_query($koneksi, "update tb_penilaian set ASTS = '".$nilai[$i]."' where th_pelajaran = '$th_pelajaran' and nis = '".$nis[$i]."' and kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and semester = '$semester'");

  }

  if ($query) {
    echo "<script>
    alert('Data Nilai Siswa Berhasil disimpan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }else{
    echo "<script>
    alert('Data Nilai Siswa Gagal disimpan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  } 
}else if(isset($_POST['simpan_asas'])){
  $th_pelajaran = $_POST['th_pelajaran'];
  $nis = $_POST['nis'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $kode_mapel = $_POST['kode_mapel'];
  $semester = $_POST['semester'];
  $nilai = $_POST['nilai_asas'];

  $count = count($nis);
  for ($i=0; $i < $count ; $i++) { 
    $query = mysqli_query($koneksi, "update tb_penilaian set ASAS = '".$nilai[$i]."' where th_pelajaran = '$th_pelajaran' and nis = '".$nis[$i]."' and kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and semester = '$semester'");

  }

  if ($query) {
    echo "<script>
    alert('Data Nilai Siswa Berhasil disimpan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }else{
    echo "<script>
    alert('Data Nilai Siswa Gagal disimpan.');
    document.location.href = '../../../guru?page=home';
    </script>";
  }
}
?>