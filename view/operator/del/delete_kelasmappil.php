<?php 
include "../../../koneksi.php";

if (isset($_GET['id'])) {
	$nama_mappil = $_GET['id'];

	$query = mysqli_query($koneksi, "delete from tb_kelasmappil where nama_kelaspil = '$nama_mappil'");
	if ($query) {
		echo "<script>
		alert('DATA BERHASIL DIHAPUS');
		document.location.href = '../../../admin?view=mapel_pilihan';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DIHAPUS');
		document.location.href = '../../../admin?view=mapel_pilihan';
		</script>";
	}
}
?>