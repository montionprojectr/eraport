<?php 

require_once("../../koneksi.php");

$kode = $_POST['kode_mapel'];
$pisah = explode(" ", $kode);

echo "<option value=''>Pilih Kelas</option>";

$queryw = mysqli_query($koneksi, "select * from tb_walikelas where kelas = '".$pisah[0]."' group by kelas, komp_keahlian");
while ($dw = mysqli_fetch_array($queryw)) { 
	?>
	<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
<?php 
	}
?>