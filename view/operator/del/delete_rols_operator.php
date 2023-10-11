<?php 
include "../../../koneksi.php";
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sqlcek = mysqli_query($koneksi, "select * from tb_rolsusers where id_rolsuser = '$id'");
	$cek = mysqli_fetch_array($sqlcek);
	$del_useralso = mysqli_query($koneksi, "delete from tb_users where id_user = '".$cek['id_user']."'");

	
	if ($del_useralso) {
	$sql = mysqli_query($koneksi, "delete from tb_rolsusers where id_rolsuser = '$id'");
	 echo "<script>
		alert('DATA BERHASIL DIHAPUS');
		document.location.href = '../../../admin?view=operator';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DIHAPUS');
		document.location.href = '../../../admin?view=operator';
		</script>";
	}
}
?>