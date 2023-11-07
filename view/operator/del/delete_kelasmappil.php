<?php 
include "../../../koneksi.php";

if (isset($_GET['id'])) {
	$id_kelasmappil = $_GET['id'];

	$cek = mysqli_query($koneksi, "select * from tb_kelasmappil where id_kelasmappil = '$id_kelasmappil'");
	$d = mysqli_fetch_array($cek);

	$gurupil = mysqli_query($koneksi, "delete from tb_guru_mapel where komp = '".$d['nama_kelaspil']."'");

	if ($gurupil) {
		$query = mysqli_query($koneksi, "delete from tb_kelasmappil where id_kelasmappil = '$id_kelasmappil'");
		if ($query) {
			echo "<script>
		alert('DATA KELAS PILIHAN DAN MAPEL GURU PILIHAN BERHASIL DIHAPUS');
		document.location.href = '../../../admin?view=mapel_pilihan';
		</script>";	
		}else{
			echo "<script>
		alert('DATA GAGAL DIHAPUS');
		document.location.href = '../../../admin?view=mapel_pilihan';
		</script>";	
		}
		
	}else{
		echo "<script>
		alert('DATA MAPEL GURU PIL GAGAL DIHAPUS');
		document.location.href = '../../../admin?view=mapel_pilihan';
		</script>";	
		}
	
}
?>