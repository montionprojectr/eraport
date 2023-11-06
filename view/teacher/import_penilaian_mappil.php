<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['page'] ?: 'Dashboard'; ?></li>
	    <li> > Th. Pelajaran: <?= $_GET['th']." > Kelas: ".$_GET['kelas']." ".$_GET['jrs']." ".$_GET['pkelas']." > Kode Mapel: ".$_GET['kodmapel']; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<?php 
$query = mysqli_query($koneksi, "select * from tb_mapel where kode_mapel = '".$_GET['kodmapel']."' ");
$data = mysqli_fetch_array($query);
?>
<div class="card">
	<div class="card-header bg-warning">
		<h3 class="card-title">IMPORT PENILAIAN Mata Pelajaran : <b><u><?= $data['nama_mapel']; ?></ul></b></h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6 bg-dark card elevation-3 p-3">
				<div class="form-group">
					<a href="view/operator/file/export_penilaian.php?th=<?= $_GET['th']."&kelas=".$_GET['kelas']."&jrs=".$_GET['jrs']."&pkelas=".$_GET['pkelas']; ?>" target="_blank">Download Template Nilai</a>
				</div>
				<form action="" method="post">
					<div class="form-group">
						<label>Pilih Semester</label>
						<select class="form-control-sm select2" style="width:100%;">
							<option value="kosong">-- Pilihan Semester--</option>
							<option value="Ganjil">Ganjil</option>
							<option value="Genap">Genap</option>
						</select>
					</div>
					<div class="form-group">
						<label>Ambil file</label>
						<input type="file" name="filenilai" class="form-control">
					</div>
					<div class="form-group">
						<a href="?page=home" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>
						<input type="submit" name="simpan_ganjil" class="btn btn-primary" value="Mulai Import">
					</div>
				</form>
			</div>
			<!-- <div class="col-sm-6 bg-secondary card elevation-3">
				<form action="" method="post">
					<div class="form-group">
						<label>Semester</label>
						<select class="form-control-sm select2"style="width:100%;">
							<option value="Genap">Genap</option>
						</select>
					</div>
					<div class="form-group">
						<label>Ambil file</label>
						<input type="file" name="filenilai" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="simpan_genap" class="btn btn-primary">
					</div>
				</form>
			</div> -->
		</div>
	</div>
</div>