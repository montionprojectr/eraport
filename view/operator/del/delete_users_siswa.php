<?php 
include "../../../koneksi.php";
if (isset($_GET['nis'])) {
	$nis = $_GET['nis'];

	$sqlcek = mysqli_query($koneksi, "select * from tb_siswa where nis = '$nis'");
	$cek = mysqli_fetch_array($sqlcek);
	$del_useralso = mysqli_query($koneksi, "delete from tb_leger where nis = '".$cek['nis']."'");

	$sql = mysqli_query($koneksi, "delete from tb_siswa where nis = '$nis'");
	if ($del_useralso && $sql) {
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