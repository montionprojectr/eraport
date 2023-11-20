<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['page'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<?php 
if (isset($_GET['id_walikelas'])) {
	$id = $_GET['id_walikelas'];
	$query = mysqli_query($koneksi, "select * from tb_walikelas where id_walikelas = '$id'");
	$res = mysqli_fetch_array($query);
?>
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title">DAFTAR RIWAYAT WALIKELAS Th. Pelajaran : <?= $res['th_pelajaran'].", KELAS : ".$res['kelas']." ".$res['komp_keahlian']." ".$res['pkelas']; ?></h3>
	</div>
	<div class="card-body">
		<ol class="p-2 text-bold">
			<li class="nav-item m-2">
				<a href="?page=ekskul_absen&id_walikelas=<?= $res['id_walikelas']; ?>" class="btn btn-light btn-outline-primary text-bold">Ekstrakurikuler dan Presensi</a>
			</li>
			<li class="nav-item m-2">
				<a href="?page=leger&id_walikelas=<?= $res['id_walikelas']; ?>" class="btn btn-light btn-outline-primary text-bold">Data Leger</a>
			</li>
			<li class="nav-item m-2">
				<a href="?page=walikelas&id_walikelas=<?= $res['id_walikelas']; ?>" class="btn btn-light btn-outline-primary text-bold">Cetak Cover & Raport</a>
			</li>
			<li class="nav-item m-2">
				<a href="?page=status&id_walikelas=<?= $res['id_walikelas']; ?>" class="btn btn-light btn-outline-primary text-bold">Kontrol Kenaikan Siswa</a>
			</li>
		</ol>
	</div>
</div>
<?php 
}
?>