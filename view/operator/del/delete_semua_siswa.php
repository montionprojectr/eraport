<?php
include "../../../koneksi.php";
 
mysqli_query($koneksi,"TRUNCATE TABLE tb_siswa");
mysqli_query($koneksi,"TRUNCATE TABLE tb_leger");
echo "<script>window.alert('data berhasil di hapus!')</script>";
echo "<script>window.location='".$_SERVER['HTTP_REFERER']."'</script>";
?>