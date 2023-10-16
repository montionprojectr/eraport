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
		  			<form method="post" enctype="multipart/form-data" action="?view=guru">
							<div class="form-group text-dark">
								<label>Pilih File</label> <a href="view/operator/file/tb_users.xlsx">Download Template</a>
								<input name="file" class="form-control" type="file" required="required"> 	
							</div> 
							<div class="form-group">
								<button class="btn btn-primary" type="submit" name="preview">IMPORT PREVIEW</button>
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
}else if(isset($_POST['preview'])) {
	//kaitkan file genered maximal baris
	require_once('view/operator/id_max.php');
	//mengambil waktu sekarang
	$tgl_new = date('Ymd');
	//membuat nama_file xlsx
	$nama_file_new = 'data_guru' . $tgl_new . 'xlsx';

	//cek apakah nama file tersebut ada? jika ada di hapus atau unlink path
	if (is_file('view/operator/file/' . $nama_file_new)) 
		unlink('view/operator/file/' . $nama_file_new);
		// Ambil ekstensi filenya apa
	 $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $tmp_file = $_FILES['file']['tmp_name'];

    if ($ext == 'xlsx') {
    	 move_uploaded_file($tmp_file, 'view/operator/file/' . $nama_file_new);
    	 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load('view/operator/file/' . $nama_file_new); // Load file yang tadi diupload ke folder tmp
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


				?>
			<form action="" method="post">
				<div class="card">
					<div class="card-header bg-warning">
						<h3 class="card-title">PRIVIEW BEFORE IMPOT EXCEL</h3>
					</div>
					<div class="card-body">
						<div class="form-group">
				<!-- Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
        ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload) -->
        		<input type='text' name='namafile' class="form-control" value='<?= $nama_file_new ?>'>
						</div>
						<table id="example1" class="table table-sm table-bordered table-striped">
							<thead>
								<tr>
									<th>ID User</th>
									<th>Username</th>
									<th>Password</th>
									<th>NIPY</th>
									<th>Nama Lengkap Guru</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$numrow = 1;
			        $kosong = 0;
			        foreach ($sheet as $row) {
			        	$username = $row['A'];
			        	$password = $row['B'];
			        	$nipy = $row['C'];
			        	$nama_lengkap = $row['D'];
			        	if($username == '' && $password == '' && $nipy == '' && $nama_lengkap == '') continue;

			        	if ($numrow > 1) {
			        		$use_n = (!empty($use))? "" : " style='background: #E07171;'";
			        		$username_n = (!empty($username))? "" : " style='background: #E07171;'";
			        		$password_n = (!empty($password))? "" : " style='background: #E07171;'";
			        		$nipy_n = (!empty($nipy))? "" : " style='background: #E07171;'";
			        		$nama_lengkap_n = (!empty($nama_lengkap))? "" : " style='background: #E07171;'";
			        		// Jika salah satu data ada yang kosong
			                if ($username == '' or $password == '' or $nipy == '' or $nama_lengkap == '') {
			                    $kosong++; // Tambah 1 variabel $kosong
			                } ?>
			                	<tr>
			                		<td <?= $use_n; ?>>
			                			<input type="text" name="id_user[]" class="form-control" value="<?= $use++; ?>" readonly>
			                		</td>
			                		<td <?= $username_n; ?>>
			                			<input type="text" name="username[]" class="form-control" value="<?= $username; ?>">
			                		</td>
			                		<td <?= $password_n; ?>>
			                			<input type="text" name="password[]" class="form-control" value="<?= $password; ?>">
			                		</td>
			                		<td <?= $nipy_n ?>>
			                			<input type="text" name="nipy[]" class="form-control" value="<?= $nipy; ?>">
			                		</td>
			                		<td <?= $nama_lengkap_n; ?>>
			                			<input type="text" name="nama_lengkap[]" class="form-control" value="<?= $nama_lengkap; ?>">
			                		</td>
			                	</tr>
			   <?php }
			   				$numrow++; // Tambah 1 setiap kali looping
			        }
							?>
							</tbody>
						</table>
						<!-- Buat sebuah tombol untuk mengimport data ke database -->
            <button type='submit' name='import' class='btn btn-primary'>Import</button>
            <a href='?view=guru' class='btn btn-primary'>Cencel</a>
					</div>
				</div>
			</form>
				<?php
    }else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
        // Munculkan pesan validasi
        echo "<div class='card card-header bg-warning' style='color: red;margin-bottom: 10px;'>
                <h3 class='card-title text-danger'>Hanya File Excel 2007 (.xlsx) yang diperbolehkan <a href='?view=guru'>Kembali</a><h3>

            </div>";
    }

}else if (isset($_POST['import'])) {
	$namafile = $_POST['namafile'];
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nipy = $_POST['nipy'];
	$nama_lengkap = $_POST['nama_lengkap'];

	$count = count($id_user);
	for ($i=0; $i < $count; $i++) { 

		$query = mysqli_query($koneksi, "insert into tb_users values('$id_user[$i]','$username[$i]','$password[$i]','$nipy[$i]','$nama_lengkap[$i]')");

		$trigger_rol = mysqli_query($koneksi, "insert into tb_rolsusers values('','$id_user[$i]','$nipy[$i]','2')"); 
	}

	if ($query && $trigger_rol) {
		unlink('view/operator/file/' . $namafile);
			echo "<script>
			alert('IMPORT BERHASIL DI PROSES');
			document.location.href = '?view=guru';
			</script>";
		}else{
			echo "<script>
			alert('IMPORT GAGAL DI PROSES');
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