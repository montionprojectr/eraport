<?php 
require_once("../../koneksi.php");
$semester = $_POST['semester'];
$th_pelajaran = $_POST['th_pelajarana'];
$kode_mapelsub = $_POST['kode_mapelsub'];

$query= mysqli_query($koneksi, "select * from tb_kelasmappil where th_pelajaran = '$th_pelajaran' and semester = '$semester' and kode_mapelsub = '$kode_mapelsub'");
while ($d = mysqli_fetch_array($query)) { ?>
	<option value="<?= $d['nama_kelaspil'] ?>"><?= $d['nama_kelaspil']; ?></option>
<?php }
?>