<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' User > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-6">
		<div class="card collapsed-card">
			<div class="card-header bg-success">
				<h3 class="card-title">INPUT DATA GURU PEMBINA</h3>
				<div class="card-tools">
		      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
		      </button>
		    </div>
			</div>
			<div class="card-body bg-teal">
				<form action="" method="post">
					<div class="form-group">
						<label>Pilih Guru pembina</label>
						<select class="form-control-sm select2" style="width:100%;" name="id_user">
							<option value="">--Pilihan--</option>
							<?php 
							$query = mysqli_query($koneksi,"select * from tb_users x inner join tb_rolsusers y on y.id_user = x.id_user where id_levelusers = '2'");
							while ($data = mysqli_fetch_array($query)) {
								$sql = mysqli_query($koneksi, "select * from tb_rolsusers where nipy = '".$data['nipy']."' and id_levelusers = '5'");
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
						<input type="submit" name="simpan_pembina" class="btn btn-primary" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-primary">
				<h3 class="card-title">DAFTAR GURU PEMBINA</h3>
			</div>
			<div class="card-body">
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
					$query = mysqli_query($koneksi, "select * from tb_users x inner join tb_rolsusers y on y.id_user = x.id_user inner join tb_levelusers z on z.id_levelusers = y.id_levelusers where y.id_levelusers = '5'");
					while ($data = mysqli_fetch_array($query)) {
						echo "<tr>";
						echo "<td>".$no++."</td>";
						echo "<td>".$data['username']."</td>";
						echo "<td>".$data['password']."</td>";
						echo "<td>".$data['nipy']."</td>";
						echo "<td>".$data['nama_lengkap']."</td>";
						?>
						<td><a href="?view=update_guru&id=<?= $data['id_user'] ?>" class='btn btn-primary'><i class='fas fa-edit'></i></a> || <a href="?view=pembina_page&id_del=<?= $data['id_user'] ?>" class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus username <?= $data['username'] ?> ini?')"><i class='fas fa-trash'></i></a> </td>
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
<?php 
include "view/operator/id_max.php";
if(isset($_POST['simpan_pembina'])){

	$id_user = $_POST['id_user'];

	$quer = mysqli_query($koneksi, "select * from tb_users where id_user = '$id_user'");
	$dt = mysqli_fetch_array($quer);

	if ($cek = mysqli_num_rows($quer) > 0) {
			$insert = mysqli_query($koneksi, "insert into tb_users(id_user, username, password, nipy, nama_lengkap) values('$use','".$dt['username']."_pembina','".$dt['password']."_pembina','".$dt['nipy']."','".$dt['nama_lengkap']."')");

			$trigger_rol = mysqli_query($koneksi, "insert into tb_rolsusers values('','$use','".$dt['nipy']."','5')");

			if ($insert && $trigger_rol) {
				echo "<script>
				alert('DATA BERHASIL DISIMPAN');
				document.location.href = '?view=pembina_page';
				</script>";
			}else{
				echo "<script>
				alert('DATA GAGAL DISIMPAN');
				document.location.href = '?view=pembina_page';
				</script>";
			}	
	}else{
		echo "<script>
				alert('DATA GAGAL DISIMPAN');
				document.location.href = '?view=pembina_page';
				</script>";
	}

}else if (isset($_GET['id_del'])) {
	$id = $_GET['id_del'];

	$sqlcek = mysqli_query($koneksi, "select * from tb_users where id_user = '$id'");
	$cek = mysqli_fetch_array($sqlcek);
	$del_useralso = mysqli_query($koneksi, "delete from tb_users where id_user = '".$cek['id_user']."'");

	$sql = mysqli_query($koneksi, "delete from tb_rolsusers where id_user = '$id'");
	if ($del_useralso && $sql) {
	 echo "<script>
		alert('DATA BERHASIL DIHAPUS');
		document.location.href = '?view=pembina_page';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DIHAPUS');
		document.location.href = '?view=pembina_page';
		</script>";
	}
}
?>