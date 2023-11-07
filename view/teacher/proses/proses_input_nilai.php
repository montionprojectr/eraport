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
}else if(isset($_POST['simpan_datanilai'])){
  $id_kelasmappil = $_POST['id_kelasmappil'];
  $th_pelajaran = $_POST['th_pelajaran'];
  $semester = $_POST['semester'];
  $kode_mapel = $_POST['kode_mapel'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $cpm = $_POST['cpm'];
  $cpp = $_POST['cpp'];
  $nis = $_POST['nis'];
  $formatif = $_POST['formatif'];
  $sumatif_1 = $_POST['sumatif_1'];
  $sumatif_2 = $_POST['sumatif_2'];
  $sumatif_3 = $_POST['sumatif_3'];
  $sumatif_4 = $_POST['sumatif_4'];
  $asts = $_POST['asts'];
  $asas = $_POST['asas'];

  $count = count($nis);
  for ($i=0; $i < $count ; $i++) { 
    $query = mysqli_query($koneksi, "update tb_penilaian set Formatif = '".$formatif[$i]."', Sumatif_1 = '".$sumatif_1[$i]."', Sumatif_2 = '".$sumatif_2[$i]."', Sumatif_3 = '".$sumatif_3[$i]."', Sumatif_4 = '".$sumatif_4[$i]."', ASTS = '".$asts[$i]."', ASAS = '".$asas[$i]."', cpm = '".$cpm."', cpp = '".$cpp."' where th_pelajaran = '$th_pelajaran' and nis = '".$nis[$i]."' and kelas = '".$kelas[$i]."' and komp_keahlian = '".$komp_keahlian[$i]."' and pkelas = '".$pkelas[$i]."' and kode_mapel = '$kode_mapel' and semester = '$semester'");
  }
  if ($query) {
    echo "<script>
    alert('DATA NILAI BERHASIL DISIMPAN');
    document.location.href = '../../../guru?page=buka_halaman_kelaspil&id_kelasmappil=".$id_kelasmappil."';
    </script>";
  }else{
    echo "<script>
    alert('DATA NILAI GAGAL DISIMPAN');
    document.location.href = '../../../guru?page=buka_halaman_kelaspil&id_kelasmappil=".$id_kelasmappil."';
    </script>";
  }
}
?>