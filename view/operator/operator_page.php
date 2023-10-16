<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' User > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<!-- card -->
<div class="card">
	<div class="card-header bg-danger">
		<h3 class="card-title">INPUT DATA OPERATOR</h3>
	</div>
	<div class="card-body">
		<form action="" method="post">
			<div class="form-group">
				<label>Pilih User Guru</label>
				<select class="form-control-sm select2" style="width:100%;" name="id_user">
					<?php 
					$query = mysqli_query($koneksi,"select * from tb_users");
					while ($data = mysqli_fetch_array($query)) {
						$sql = mysqli_query($koneksi, "select * from tb_rolsusers where nipy = '".$data['nipy']."' and id_leveluser = '1'");
						$cek = mysqli_num_rows($sql);
							if ($cek > 0) {
								echo "";
							}else{
								echo "<option value='".$data['id_user']."'>".$data['nama_lengkap']."</option>";
							}
						}
					 ?>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" name="simpan" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
			</div>
		</form>
	</div>
</div>
<!-- /card -->

<?php 
if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];

	$sql = mysqli_query($koneksi, "select * from tb_users where id_user = '$id_user'");
	$view = mysqli_fetch_array($sql);

	require_once('view/operator/id_max.php');

	$insert_user = mysqli_query($koneksi, "insert into tb_users values('$use','".$view['username']."_admin','".$view['password']."_admin','".$view['nipy']."','".$view['nama_lengkap']."')");

	$id_leveluser = '1';
	$insert_rols = mysqli_query($koneksi, "insert into tb_rolsusers values('','$use','".$view['nipy']."','$id_leveluser')");

	if ($insert_user && $insert_rols) {
		echo "<script>
		alert('DATA OPERATOR BERHASIL DISIMPAN');
		document.location.href = '?view=operator';
		</script>";
	}else{
		echo "<script>
		alert('DATA OPERATOR GAGAL DISIMPAN');
		document.location.href = '?view=operator';
		</script>";
	}
}
?>

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger"><h3 class="card-title">TABLE OPERATOR</h3></div>
			<div class="card-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Password</th>
							<th>Niyp</th>
							<th>Nama Lengkap</th>
							<th>Action</th>
						</tr>		
					</thead>
					<tbody>
						<?php 
						$sql = mysqli_query($koneksi, "select * from tb_users x inner join tb_rolsusers y on y.id_user = x.id_user inner join tb_levelusers z on z.id_levelusers = y.id_leveluser where id_levelusers = '1'");
						while ($rest = mysqli_fetch_array($sql)) { ?>
							<tr>
							<td><?= $rest['id_rolsuser'] ?></td>
							<td><?= $rest['username'] ?></td>
							<td><?= $rest['password'] ?></td>
							<td><?= $rest['nipy'] ?></td>
							<td><?= $rest['nama_lengkap'] ?></td>
							<td>
								<!-- <a href="?view=update_operator&id=<?= $rest['id_rolsuser'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a> 
								||  -->
								<a href="view/operator/del/delete_rols_operator.php?id=<?= $rest['id_rolsuser'] ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data <?= $rest['nama_lengkap'] ?> sebagai operator?')"><i class="fas fa-trash"></i></a>
							</td>
						</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>