<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "select * from tb_guru_mapel where nipy = '$id' group by nipy asc");
	$data = mysqli_fetch_array($query);

?>
<div class="card">
	<div class="card-header bg-warning">
		<h3 class="card-title">UPDATE DATA GURU MAPEL</h3>
	</div>
	<div class="card-body">
		<h4><?= $data['nama_user_guru']; ?></h4>
	</div>
</div>
<?php } ?>