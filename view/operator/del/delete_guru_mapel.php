<?php 
include "../../../koneksi.php";

if (isset($_GET['idgrmpl'])) {
	$id = $_GET['idgrmpl'];
	$query = mysqli_query($koneksi, "delete from tb_guru_mapel where id_guru_mapel = '".$id."'");

	if ($query) {
		echo "<script>
		alert('DATA MAPEL GURU BERHASIL DIHAPUS');
		document.location.href = '../../../admin?view=guru_mapel';
		</script>";
	}else{
		echo "<script>
		alert('DATA MAPEL GURU GAGAL DIHAPUS');
		document.location.href = '../../../admin?view=guru_mapel';
		</script>";
	}
}

?>