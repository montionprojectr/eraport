<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' User > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="card collapsed-card">
	<div class="card-header bg-danger">
		<h4 class="card-title">INPUT DATA GURU</h4>
		<div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
      </button>
    </div>
	</div>
	<div class="card-body bg-dark">
		<div class="row">
		
			<div class="col-sm-6">
		<form action="" method="post">
				<table class="table table-sm">
					<tr>
						<th><label>Username</label></th>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="username" required>
							</div>
						</td>
					</tr>
					<tr>
						<th><label>Password</label></th>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="password" required>
							</div>
						</td>
					</tr>
					<tr>
						<th><label>NIPY</label></th>
						<td> 
							<div class="form-group">
								<input type="text" class="form-control" name="nipy" required>
							</div>
						</td>
					</tr>
					<tr>
						<th><label>Nama Lengkap</label></th>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="nama_lengkap" required>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group float-center">
								<button class="btn btn-primary float-center" type="submit" name="simpan"><i class="fas fa-save"></i> Simpan</button>	
								<!-- <a href="#" class="btn btn-primary">Download Template</a>	
								<a href="#" class="btn btn-primary">Import Data</a>	 -->
							</div>
						</td>
					</tr>
				</table>
		</form>
		  </div>
		
		  <div class="col-sm-6">
		  	<div class="card card-danger">
		  		<div class="card-header">
		  			<h3 class="card-title">IMPORT DATA GURU</h3>
		  		</div>
		  		<div class="card-body">
		  			<form method="post" enctype="multipart/form-data" action="view/operator/upload_file.php">
							<div class="form-group text-dark">
								<label>Pilih File</label> <a href="view/operator/file/tb_users.xls">Download Template</a>
								<input name="namafile" class="form-control" type="file" required="required"> 	
							</div> 
							<div class="form-group">
								<button class="btn btn-primary" type="submit" name="upload" value="upload">IMPORT</button>
							</div>
						</form>			
		  		</div>
		  	</div>
		  </div>
		</div>
	</div>
</div>
<?php 
if (isset($_POST['simpan'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nipy = $_POST['nipy'];
	$nama_lengkap = $_POST['nama_lengkap'];

	require_once('view/operator/id_max.php');
	$query = mysqli_query($koneksi, "insert into tb_users(id_user, username, password, nipy, nama_lengkap) values('$use','$username','$password','$nipy','$nama_lengkap')");

	$insert_rols = mysqli_query($koneksi, "insert into tb_rolsusers values('','$use','$nipy','2')");

	if ($query && $insert_rols) {
		echo "<script>
		alert('DATA BERHASIL DISIMPAN');
		document.location.href = '?view=guru';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DISIMPAN');
		document.location.href = '?view=guru';
		</script>";
	}
}
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger"><h3 class="card-title">TABLE GURU</h3></div>
			<div class="card-body bg-coral">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Password</th>
						<th>NIPY</th>
						<th>Nama Lengkap</th>
						<th>Action</th>
					</tr>		
				</thead>
				<tbody>
					<?php 
					$no = 1;
					$query = mysqli_query($koneksi, "select * from tb_users x inner join tb_rolsusers y on y.id_user = x.id_user inner join tb_levelusers z on z.id_levelusers = y.id_leveluser where id_levelusers = '2'");
					while ($data = mysqli_fetch_array($query)) {
						echo "<tr>";
						echo "<td>".$no++."</td>";
						echo "<td>".$data['username']."</td>";
						echo "<td>".$data['password']."</td>";
						echo "<td>".$data['nipy']."</td>";
						echo "<td>".$data['nama_lengkap']."</td>";
						?>
						<td><a href="?view=update_guru&id=<?= $data['id_user'] ?>" class='btn btn-primary'><i class='fas fa-edit'></i></a> || <a href="view/operator/del/delete_users_guru.php?id=<?= $data['id_user'] ?>" class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus username <?= $data['username'] ?> ini?')"><i class='fas fa-trash'></i></a> </td>
						<?php
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>