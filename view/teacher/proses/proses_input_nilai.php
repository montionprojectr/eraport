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
}else if (isset($_POST['sinkron'])) {
    $th_pelajaran = $_POST['th_pelajaran'];
    $kelas = $_POST['kelas'];
    $komp_keahlian = $_POST['komp_keahlian'];
    $pkelas = $_POST['pkelas'];
    $kode_mapel = $_POST['kode_mapel'];
    $semester = $_POST['semester'];
    $nis = $_POST['nis'];
    $nilai_raport = $_POST['nilai_raport'];
    $nama_mapel = $_POST['nama_mapel'];
    $cpm = $_POST['cpm'];
    $cpp = $_POST['cpp'];

    if ($kode_mapel == 'pabp') {
      $mapel_cpm = 'pabp_cpm';
      $mapel_cpp = 'pabp_cpp';
    }else if ($kode_mapel == 'pkn') {
      $mapel_cpm = 'pkn_cpm';
      $mapel_cpp = 'pkn_cpp';
    }else if ($kode_mapel == 'b_indo') {
      $mapel_cpm = 'b_indo_cpm';
      $mapel_cpp = 'b_indo_cpp';
    }else if ($kode_mapel == 'pjok') {
      $mapel_cpm = 'penjas_cpm';
      $mapel_cpp = 'penjas_cpp';
    }else if ($kode_mapel == 'sejarah') {
      $mapel_cpm = 'sejarah_cpm';
      $mapel_cpp = 'sejarah_cpp';
    }else if ($kode_mapel == 'seni') {
      $mapel_cpm = 'seni_cpm';
      $mapel_cpp = 'seni_cpp';
    }else if ($kode_mapel == 'b_jawa') {
      $mapel_cpm = 'b_jawa_cpm';
      $mapel_cpp = 'b_jawa_cpp';
    }else if ($kode_mapel == 'mtk') {
      $mapel_cpm = 'mtk_cpm';
      $mapel_cpp = 'mtk_cpp';
    }else if ($kode_mapel == 'b_ing') {
      $mapel_cpm = 'b_ing_cpm';
      $mapel_cpp = 'b_ing_cpp';
    }else if ($kode_mapel == 'iftk') {
      $mapel_cpm = 'informatika_cpm';
      $mapel_cpp = 'informatika_cpp';
    }else if ($kode_mapel == 'ipas' or $kode_mapel == 'pkk') {
      $mapel_cpm = 'projek_cpm';
      $mapel_cpp = 'projek_cpp';
    }else if ($kode_mapel == 'dd_tmi' or $kode_mapel == 'dd_oto' or $kode_mapel == 'dd_te' or $kode_mapel == 'dd_pplg' or $kode_mapel == 'kons_tmi' or $kode_mapel == 'kons_tsm' or $kode_mapel == 'kons_tkr' or $kode_mapel == 'kons_te' or $kode_mapel == 'kons_pplg') {
      $mapel_cpm = 'dasar_cpm';
      $mapel_cpp = 'dasar_cpp';
    }else if ($kode_mapel == 'b_arab') {
      $mapel_cpm = 'b_arab_cpm';
      $mapel_cpp = 'b_arab_cpp';
    }else if($kode_mapel == 'mpp'){
      $mapel_cpm = 'mapel_pilihan_cpm';
      $mapel_cpp = 'mapel_pilihan_cpp';
    }

    $count = count($nis);

    for ($i=0; $i < $count; $i++) { 
      $query = mysqli_query($koneksi, "update tb_leger set ".$nama_mapel." = '$nilai_raport[$i]' where th_pelajaran = '$th_pelajaran' and kelas = '$kelas[$i]' and jurusan = '$komp_keahlian[$i]' and pemkelas = '$pkelas[$i]' and semester = '$semester' and nis = '$nis[$i]'"); 

      $cp = mysqli_query($koneksi, "update tb_capaian set ".$mapel_cpm." = '$cpm', ".$mapel_cpp." = '$cpp' where th_pelajaran = '$th_pelajaran' and semester = '$semester' and nis = '$nis[$i]'");
    }

      if ($query) {
        echo "<script>
        alert('BERHASIL SINKRONISASI DATA RAPORT.');
        document.location.href = '../../../guru?page=home';
        </script>";
      }else{
        echo "<script>
        alert('GAGAL SINKRONISASI DATA RAPORT.');
        document.location.href = '../../../guru?page=home';
        </script>";
      }
}
?>