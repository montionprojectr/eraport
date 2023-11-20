<?php 
require_once('../../../koneksi.php');

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$del = mysqli_query($koneksi, "delete from tb_walikelas where id_walikelas = '$id'");

	if ($del) {
		echo "<script>
		alert('DATA BERHASIL DIHAPUS');
		document.location.href = '../../../admin?view=walikelas';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DIHAPUS');
		document.location.href = '../../../admin?view=walikelas';
		</script>";
	}
}
?>