<?php 
require_once('../../../koneksi.php');
if(isset($_POST['simpan_importmappil'])){
  $id_kelasmappil = $_POST['id_kelasmappil'];
  $th_pelajaran = $_POST['th_pelajaran'];
  $kode_mapel = $_POST['kode_mapel'];
  $semester = $_POST['semester'];
  $nis = $_POST['nis'];
  $class = $_POST['class'];
  $formatif = $_POST['formatif'];
  $sumatif_1 = $_POST['sumatif_1'];
  $sumatif_2 = $_POST['sumatif_2'];
  $sumatif_3 = $_POST['sumatif_3'];
  $sumatif_4 = $_POST['sumatif_4'];
  $asts = $_POST['asts'];
  $asas = $_POST['asas'];
  $namafile = $_POST['namafile'];
  
  $count = count($nis);
  for ($i=0; $i < $count ; $i++) { 
    $pecahstring = explode(" ", $class[$i]);

    $query = mysqli_query($koneksi, "update tb_penilaian set Formatif = '$formatif[$i]', Sumatif_1 = '$sumatif_1[$i]', Sumatif_2 = '$sumatif_1[$i]', Sumatif_3 = '$sumatif_3[$i]', Sumatif_4 = '$sumatif_4[$i]', ASTS = '$asts[$i]', ASAS = '$asas[$i]' where nis = '$nis[$i]'and th_pelajaran = '$th_pelajaran' and kelas = '$pecahstring[0]' and komp_keahlian = '$pecahstring[1]' and pkelas = '$pecahstring[2]' and kode_mapel = '$kode_mapel' and semester = '$semester'");  
  }

  if ($query) {
    unlink('../../../view/operator/file/' . $namafile);
    echo "<script>
    alert('DATA BERHASIL DIIMPORT');
    document.location.href = '../../../guru?page=buka_halaman_kelaspil&id_kelasmappil=".$id_kelasmappil."';
    </script>";
  }else{
    echo "<script>
    alert('DATA GAGAL DIIMPORT');
    document.location.href = '../../../guru?page=buka_halaman_kelaspil&id_kelasmappil=".$id_kelasmappil."';
    </script>";
  }

}
?>