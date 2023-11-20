<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Laporan > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<?php 
if (isset($_GET['th_pelajaran'])) {
$th_pelajaran = $_GET['th_pelajaran'];
$array = array('X' => 'X', 'XI' => 'XI', 'XII' => 'XII');
?>
<div class="row">
	<?php 
	foreach ($array as $key => $value) { ?>
	<div class="col-sm-4">
		<div class="card">
			<div class="card-header bg-danger">
				<h3 class="card-title">STATUS KELAS <?= $value." ".$th_pelajaran; ?></h3>
			</div>
			<div class="card-body bg-secondary">
				<ol>
				<?php 
				$jurusan = mysqli_query($koneksi, "select kelas, jurusan, status from tb_leger where status != '' and th_pelajaran = '$th_pelajaran' group by status, jurusan");
				while ($res= mysqli_fetch_array($jurusan)) {
					if ($res['status'] == $value) { ?>
						<li><a href="?view=siswa_kenaikan&kelas=<?= $res['status']."&jurusan=".$res['jurusan']."&th=".$th_pelajaran; ?>" class="btn btn-light btn-outline-primary"><?= $res['jurusan']; ?></a></li>
					<?php }
				}
				?>
				</ol>
			</div>
		</div>
	</div>
	<?php }
	?>
</div>
<?php }else if (isset($_GET['kelas']) && isset($_GET['jurusan']) && isset($_GET['th'])) { 
	$kelas_skr = $_GET['kelas'];
	$jurusan = $_GET['jurusan'];
	$th = $_GET['th'];
$sql = mysqli_query($koneksi, "select nis, nama, kelas, jurusan, pemkelas, th_pelajaran, semester, status from tb_leger where th_pelajaran = '$th' and semester = 'genap' and jurusan = '$jurusan' and status = '$kelas_skr'");
	?>
	<div class="card">
		<div class="card-header bg-primary">
			<h3 class="card-title">Daftar siswa berdasarkan status kenaikan kelas Th. <?= $th; ?></h3>
		</div>
		<div class="card-body">
			<form action="?view=siswa_kenaikan" method="post">
				<table class="table table-sm table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nis</th>
							<th>Nama</th>
							<th>Kelas Sebelumnya</th>
							<th>Walikelas</th>
							<th>Status Kelas</th>		
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						while ($sis = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $sis['nis']; ?>
									<input type="text" name="nis[]" value="<?= $sis['nis']; ?>" hidden>
								</td>
								<td><?= $sis['nama']; ?></td>
								<td><?= $sis['kelas']." ".$sis['jurusan']." ".$sis['pemkelas']; ?></td>
								<?php 
								$wali = mysqli_query($koneksi, "select * from tb_walikelas x inner join tb_users y on y.nipy = x.nipy where kelas = '".$sis['kelas']."' and komp_keahlian = '".$sis['jurusan']."' and pkelas = '".$sis['pemkelas']."' and th_pelajaran = '".$sis['th_pelajaran']."'");
								$dt = mysqli_fetch_array($wali);
								?>
								<td><?= $dt['nama_lengkap']; ?></td>
								<td><?= $sis['status']." ".$sis['jurusan']; ?>
								<input type="text" name="kelas" value="<?= $sis['status'] ?>" hidden>
									<input type="text" name="jurusan" value="<?= $sis['jurusan']; ?>" hidden>
									<input type="text" name="th_pelajaran" value="<?= $th; ?>" hidden>
								</td>
							</tr>
						<?php }
						?>
					</tbody>
				</table>
				<div class="form-group">
					<a href="?view=siswa_kenaikan&th_pelajaran=<?= $th; ?>" class="btn btn-primary">Kembali</a>
					<button type="submit" class="btn btn-danger" name="simpanke_database" onclick="return confirm('PERINGATAN!!! Data siswa yg sudah dimasukan ke database tidak bisa dihapus!. Klik Cencel untuk batal.')">SIMPAN DATA KE DATABASE</button>
				</div>
			</form>
		</div>
	</div>
<?php }else if (isset($_POST['simpanke_database'])) {
	$th_pelajaran = $_POST['th_pelajaran'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$nis = $_POST['nis'];

	$pisah = explode('/', $th_pelajaran);
	$th1 = $pisah[0] + 1;
	$th2 = $pisah[1] + 1;
	$tahun = $th1."/".$th2;

	$count = count($nis);
	for ($i=0; $i < $count; $i++) { 

		$ceksql = mysqli_query($koneksi, "SELECT * FROM tb_siswa_kelas WHERE nis = '$nis[$i]' AND kelas = '$kelas' AND jurusan = '$jurusan' AND th_pelajaran = '$tahun'");
		$cek = mysqli_num_rows($ceksql);
		if ($cek > 0) {
			echo "<script>
			alert('DATA SUDAH ADA');
			document.location.href = '?view=siswa_kenaikan';
			</script>";	
		}else{
			$insert = mysqli_query($koneksi, "insert into tb_siswa_kelas (id, nis, kelas, jurusan, pemkelas, th_pelajaran) values('','$nis[$i]','$kelas','$jurusan','','$tahun')");	
		}
		
	}

	if ($insert) {
		echo "<script>
		alert('DATA BEHASIL DISIMPAN');
		document.location.href = '?view=siswa_kenaikan';
		</script>";	
	}else{
		echo "<script>
		alert('DATA GAGAL DISIMPAN');
		document.location.href = '?view=siswa_kenaikan';
		</script>";
	}
	
}
else{ ?>
<div class="card">
	<div class="card-body">
		<ol>
			<?php 
			$query = mysqli_query($koneksi, "select th_pelajaran from tb_leger group by th_pelajaran asc");
			while ($d = mysqli_fetch_array($query)) {
				echo "<li><a href='?view=siswa_kenaikan&th_pelajaran=".$d['th_pelajaran']."'>".$d['th_pelajaran']."</a></li>";
			}
			?>
		</ol>
	</div>
</div>
<?php }
?>