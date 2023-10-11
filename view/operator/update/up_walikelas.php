<?php 

if (isset($_GET['up'])) {
	$up = $_GET['up'];

	$query = mysqli_query($koneksi, "select * from tb_walikelas where id_walikelas = '".$up."'");
	$data = mysqli_fetch_array($query);
?>
<div class="card">
	<div class="card-header bg-warning">
		<h3 class="card-title">EDIT DATA WALIKELAS</h3>
	</div>
	<div class="card-body">
		<form action="" method="post">
			<div class="form-group" hidden>
				<input type="text" name="id_walikelas" value="<?= $data['id_walikelas'] ?>">
			</div>
			<div class="form-group">
				<label>Th. Pelajaran</label>
				<select class="form-control-sm select2" style="width: 100%;" name="th_pelajaran">
				<?php 
				$arr = array('2023/2024' => '2023/2024' , '2024/2025' => '2024/2025', '2025/2026' => '2025/2026');
				foreach ($arr as $key => $value) { 
					if ($value == $data['th_pelajaran']) {
						echo "<option value='". $value ."' selected>". $value."</option>";
					}else{
						echo "<option value='". $value ."'>". $value ."</option>";	
					} ?>	
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label>Nama Guru</label>
				<select class="form-control-sm select2" name="user_guru">
					<?php 
					$query1 = mysqli_query($koneksi,"select * from tb_users");
					while ($data1 = mysqli_fetch_array($query1)) {
						if ($data1['nama_lengkap'] == $data['user_guru'] ) {
							echo "<option value='".$data1['nama_lengkap']."' selected>".$data1['nama_lengkap']."</option>";
						}else{
							echo "<option value='".$data1['nama_lengkap']."'>".$data1['nama_lengkap']."</option>";
						}
					}
					 ?>
				</select>
			</div>
			<div class="form-group">
				<label>Kelas</label>
				<select class="form-control-sm select2" style="width: 100%;" name="kelas">
					<?php 
					$query2 = mysqli_query($koneksi,"select * from tb_kelas");
					while ($data2 = mysqli_fetch_array($query2)) {
						if ($data2['nama_kelas'] == $data['kelas'] ) {
							echo "<option value='".$data2['nama_kelas']."' selected>".$data2['nama_kelas']."</option>";
						}else{
							echo "<option value='".$data2['nama_kelas']."'>".$data2['nama_kelas']."</option>";
						}
					}
					 ?>
				</select>
			</div>
			<div class="form-group">
				<label>Kompetensi Kejuruan</label>
				<select class="form-control-sm select2" style="width: 100%;" name="komp_keahlian">
			      	<?php 
			      	$queryj = mysqli_query($koneksi, "select * from tb_jurusan");
			      	while ($dj = mysqli_fetch_array($queryj)) {
			      		if ($dj['nama_Sjurusan'] == $data['komp_keahlian']) {
			      			echo "<option value='".$dj['nama_Sjurusan']."' selected>" . $dj['nama_Sjurusan']." - ". $dj['nama_Ljurusan'] . "</option>";
			      		}else{
			      		echo "<option value='".$dj['nama_Sjurusan']."'>" . $dj['nama_Sjurusan']." - ". $dj['nama_Ljurusan'] . "</option>";
			      		}
			      	}
			      	?>
			      </select>
			</div>
						<!-- radio -->
            <div class="form-group card bg-light p-3">
            	<label><u>Pembagian Kelas</u></label>
            	<?php 
            	$array = array('1' => 1, '2' => 2, '3' => 3, '4' => 4 );

            	foreach ($array as $ke => $val) { 
            		if ($val == $data['pkelas']) { ?>
            		<div class="form-check">
		                <input class="form-check-input" type="radio" name="pkelas" value="<?= $val; ?>" checked>
		                <label class="form-check-label"><?= $val; ?></label>
		              </div>
            		<?php }else{ ?>
            		<div class="form-check">
		                <input class="form-check-input" type="radio" name="pkelas" value="<?= $val; ?>">
		                <label class="form-check-label"><?= $val; ?></label>
		              </div>
            		<?php }
            		?>
            		
            	<?php }
            	?>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit" name="simpan"><i class="fas fa-save"></i> Simpan Perubahan</button>
            	<a href="admin?view=walikelas" class="btn btn-primary"> Kembali</a>
            </div>
		</form>
	</div>
</div>

<?php 
}

if (isset($_POST['simpan'])) {
	$id_walikelas = $_POST['id_walikelas'];
	$th_pelajaran = $_POST['th_pelajaran'];
	$user_guru = $_POST['user_guru'];
	$kelas = $_POST['kelas'];
	$komp_keahlian = $_POST['komp_keahlian'];
	$pkelas = $_POST['pkelas'];

	$sqledit = mysqli_query($koneksi, "update tb_walikelas set th_pelajaran = '$th_pelajaran', user_guru = '$user_guru', kelas = '$kelas', komp_keahlian = '$komp_keahlian', pkelas = '$pkelas' where id_walikelas = '$id_walikelas'");

	if ($sqledit) {
		echo "<script>
		alert('DATA BERHASIL DIPERBARUI');
		document.location.href = 'admin?view=walikelas';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DIPERBARUI');
		document.location.href = 'admin?view=walikelas';
		</script>";
	}
}
?>