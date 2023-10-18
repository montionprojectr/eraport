<?php 
include "../../../koneksi.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	
	$sqlcek= mysqli_query($koneksi, "delete from tb_thpelajaran where id = '$id'");

	
	if ($sqlcek) {
	 echo "<script>
		alert('DATA BERHASIL DIHAPUS');
		document.location.href = '../../../admin?view=pembagian';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DIHAPUS');
		document.location.href = '../../../admin?view=pembagian';
		</script>";
	}
}
?>