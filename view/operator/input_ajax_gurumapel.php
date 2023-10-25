<?php 
require_once("../../koneksi.php");
$no=1;
$querym = mysqli_query($koneksi, "select * from tb_mapel");
while ($dm = mysqli_fetch_array($querym)) {
	echo "<option value='".$dm['kelas']." ".$dm['kode_mapel']."'>" . $no++ . " - " . $dm['kelas']. " " . $dm['nama_mapel'] . "</option>";
}
?>