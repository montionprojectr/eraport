<?php 
include "../../../koneksi.php";
if (isset($_GET['id']) && isset($_GET['nis'])) {
	$id = $_GET['id'];
	$nis = $_GET['nis'];

	$sqlcek = mysqli_query($koneksi, "select * from tb_siswa where id = '$id' and nis = '$nis'");
	$cek = mysqli_fetch_array($sqlcek);
	$del_useralso = mysqli_query($koneksi, "delete from tb_leger where nis = '".$cek['nis']."'");

	$del_siswapenilaian = mysqli_query($koneksi, "delete from tb_penilaian where nis = '".$cek['nis']."' and kel = '".$cek['kel']."'");
	$del_rsiswamappil = mysqli_query($koneksi, "delete from tb_ruangsiswa_mappil where nis = '".$cek['nis']."'");

	$sql = mysqli_query($koneksi, "delete from tb_siswa where id = '$id'");

	$sqlkelas = mysqli_query($koneksi, "delete from tb_siswa_kelas where id = '$id'");

	if ($del_useralso && $sql && $del_siswapenilaian && $del_rsiswamappil && $sqlkelas) {
	 echo "<script>
		alert('DATA BERHASIL DIHAPUS');
		document.location.href = '../../../admin?view=siswa';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DIHAPUS');
		document.location.href = '../../../admin?view=siswa';
		</script>";
	}
}
?>