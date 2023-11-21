<?php
include "../../../koneksi.php";
 
mysqli_query($koneksi,"TRUNCATE TABLE tb_siswa");
mysqli_query($koneksi,"TRUNCATE TABLE tb_leger");
mysqli_query($koneksi,"TRUNCATE TABLE tb_penilaian");
mysqli_query($koneksi,"TRUNCATE TABLE tb_ruangsiswa_mappil");
mysqli_query($koneksi,"TRUNCATE TABLE tb_siswa_kelas");
mysqli_query($koneksi,"TRUNCATE TABLE tb_capaian");
echo "<script>window.alert('data berhasil di hapus!')</script>";
echo "<script>window.location='".$_SERVER['HTTP_REFERER']."'</script>";
?>