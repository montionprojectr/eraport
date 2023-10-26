<?php 
include "../../../koneksi.php";

if (isset($_GET['th']) && isset($_GET['kelas']) && isset($_GET['jrs']) && isset($_GET['pkelas']) ) {

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Templatenilai_".$_GET['kelas'].$_GET['jrs'].$_GET['pkelas'].".xls");
?>
<table border="1">
	<thead>
		<tr>
			<th>NIS</th>
			<th>Nama</th>
			<th>Kelas</th>
			<th>Formatif</th>
			<th>Sumatif_1</th>
			<th>Sumatif_2</th>
			<th>Sumatif_3</th>
			<th>Sumatif_4</th>
			<th>ASTS</th>
			<th>ASAS</th>
			<th>cpm</th>
			<th>cpp</th>
		</tr>
	</thead>
	<tbody>
		<?php 
$data = mysqli_query($koneksi,"select x.nis as nis, nama, concat_ws(' ', x.kelas, jurusan, pemkelas) as class, Formatif, Sumatif_1, Sumatif_2, Sumatif_3, Sumatif_4, ASTS, ASAS, cpm, cpp from tb_siswa x left join tb_penilaian y on y.nis = x.nis where x.th_pelajaran = '".$_GET['th']."' and x.kelas = '".$_GET['kelas']."' and jurusan = '".$_GET['jrs']."' and pemkelas = '".$_GET['pkelas']."'");

while($d = mysqli_fetch_array($data)){ ?>
	<tr>
    <td><?= $d['nis']; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['class']; ?></td>
    <td><?= $d['Formatif']; ?></td>    
    <td><?= $d['Sumatif_1']; ?></td>
    <td><?= $d['Sumatif_2']; ?></td>
    <td><?= $d['Sumatif_3']; ?></td>    
    <td><?= $d['Sumatif_4']; ?></td>
    <td><?= $d['ASTS']; ?></td>    
    <td><?= $d['ASAS']; ?></td>
    <td><?= $d['cpm']; ?></td>    
    <td><?= $d['cpp']; ?></td>
	</tr>
<?php }
?>
	</tbody>
</table>
<?php 
 
}
?>