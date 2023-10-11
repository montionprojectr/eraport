<?php 

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$query = mysqli_query($koneksi, "select * from tb_users where id_user = '".$id."'");
	$data = mysqli_fetch_array($query);
	?>
	<div class="card">
	<div class="card-header">
		<h3 class="card-title">Edit data user guru</h3>
	</div>
	<div class="card-body">
	<form action="" method="post">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-6">
						<table class="table table-sm">
							<tr>
								<th><label>Username</label></th>
								<td>
									<div class="form-group">
										<input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" required>
									</div>
								</td>
							</tr>
							<tr>
								<th><label>Password</label></th>
								<td>
									<div class="form-group">
										<input type="text" class="form-control" name="password" value="<?= $data['password'] ?>" required>
									</div>
								</td>
							</tr>
							<tr>
								<th><label>NIPY</label></th>
								<td> 
									<div class="form-group">
										<input type="text" class="form-control" name="nipy" value="<?= $data['nipy'] ?>" required>
									</div>
								</td>
							</tr>
							<tr>
								<th><label>Nama Lengkap</label></th>
								<td>
									<div class="form-group">
										<input type="text" class="form-control" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" style="width: 100%;" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group float-center">
										<button class="btn btn-primary float-center" type="submit" name="simpan_perubahan"><i class="fas fa-save"></i> Simpan Perubahan</button>	
										<!-- <a href="#" class="btn btn-primary">Download Template</a>	
										<a href="#" class="btn btn-primary">Import Data</a>	 -->
									</div>			
								</td>
							</tr>
						</table>
				  </div>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>
<?php }

if (isset($_POST['simpan_perubahan'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nipy = $_POST['nipy'];
	$nama_lengkap = $_POST['nama_lengkap'];

	$update = mysqli_query($koneksi, "update tb_users set username = '$username', password = '$password', nipy = '$nipy', nama_lengkap = '$nama_lengkap' where id_user = '".$data['id_user']."'");

	if ($update) {
		echo "<script>
		alert('DATA PERUBAHAN BERHASIL DISIMPAN');
		document.location.href = '?view=guru';
		</script>";
	}else{
		echo "<script>
		alert('DATA PERUBAHAN GAGAL DISIMPAN');
		document.location.href = '?view=guru';
		</script>";
	}
}
?>
