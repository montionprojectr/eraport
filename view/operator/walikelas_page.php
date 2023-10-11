<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Walikelas & Guru > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
	<div class="col-sm-12">
	<form action="" method="post">
		<div class="card collapsed-card">
			<div class="card-header bg-danger">
				<h4 class="card-title">INPUT DATA GURU WALIKELAS</h4>
				<div class="card-tools">
		      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
		      </button>
		    </div>
			</div>
			<div class="card-body bg-dark">
				<div class="row">
					<div class="col-sm-5">
						<div class="form-group">
				      <label>Th. Pelajaran</label>
				      <select class="form-control-sm select2" style="width: 100%;" name="th_pelajaran">
				        <option value="2023/2024">2023/2024</option>
				        <option value="2024/2025">2024/2025</option>
				        <option value="2025/2026">2025/2026</option>
				      </select>
				    </div>
						<div class="form-group">
				      <label>Pilih Nama Guru</label>
				      <select class="form-control-sm select2" style="width: 100%;" name="user_guru">
				      	<?php 
				      	$queryu = mysqli_query($koneksi, "select * from tb_users group by nama_lengkap asc");
				      	while ($du = mysqli_fetch_array($queryu)) {
				      		echo "<option value='".$du['nama_lengkap']."'>" . $du['nama_lengkap'] . "</option>";
				      	}
				      	?>
				      </select>
				    </div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
				      <label>Pilih Kelas</label>
				      <select class="form-control-sm select2" style="width: 100%;" name="kelas">
				      	<?php 
				      	$queryk = mysqli_query($koneksi, "select * from tb_kelas");
				      	while ($dk = mysqli_fetch_array($queryk)) {
				      		echo "<option value='".$dk['nama_kelas']."'> Kelas " . $dk['nama_kelas'] . "</option>";
				      	}
				      	?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label>Pilih Kompetensi Keahlian</label>
				      <select class="form-control-sm select2" style="width: 100%;" name="komp_keahlian">
				      	<?php 
				      	$queryj = mysqli_query($koneksi, "select * from tb_jurusan");
				      	while ($dj = mysqli_fetch_array($queryj)) {
				      		echo "<option value='".$dj['nama_Sjurusan']."'>" . $dj['nama_Sjurusan']." - ". $dj['nama_Ljurusan'] . "</option>";
				      	}
				      	?>
				      </select>
				    </div>
				  </div>
					<div class="col-sm-2">
						<div class="card bg-primary">
							<div class="card-header"><p class="card-title">Pembagian Kelas</p></div>
							<div class="card-body">
								<!-- radio -->
		            <div class="form-group">
		              <div class="form-check">
		                <input class="form-check-input" type="radio" name="pkelas" value="1">
		                <label class="form-check-label">1</label>
		              </div>
		              <div class="form-check">
		                <input class="form-check-input" type="radio" name="pkelas" value="2">
		                <label class="form-check-label">2</label>
		              </div>
		              <div class="form-check">
		                <input class="form-check-input" type="radio" name="pkelas" value="3">
		                <label class="form-check-label">3</label>
		              </div>
		              <div class="form-check">
		                <input class="form-check-input" type="radio" name="pkelas" value="4">
		                <label class="form-check-label">4</label>
		              </div>
		            </div>			
							</div>
						</div>
						<button type="submit" class="btn btn-primary" name="save_walikelas" confirm="alert('Yakin ?')">Save</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>
<?php 
if (isset($_POST['save_walikelas'])) {
	$th_pelajaran = $_POST['th_pelajaran'];
	$user_guru = $_POST['user_guru'];
	$kelas = $_POST['kelas'];
	$komp_keahlian = $_POST['komp_keahlian'];
	$pkelas = $_POST['pkelas'];

	$sqlniipy = mysqli_query($koneksi, "select nipy from tb_users where nama_lengkap = '$user_guru'");
	$d = mysqli_fetch_array($sqlniipy);

	$query = mysqli_query($koneksi, "insert into tb_walikelas (id_walikelas, th_pelajaran, nipy, user_guru, kelas, komp_keahlian, pkelas) values('','$th_pelajaran', '".$d['nipy']."','$user_guru','$kelas','$komp_keahlian','$pkelas')");

	if ($query) {
		echo "<script>
		alert('DATA BERHASIL DISIMPAN');
		document.location.href = 'admin?view=walikelas';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DISIMPAN');
		document.location.href = 'admin?view=walikelas';
		</script>";
	}
}
?>
<!-- Table Walikelas -->
<div class="card">
	<div class="card-header bg-danger"><h3 class="card-title">TABLE WALIKELAS</h3></div>
	<div class="card-body">
		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Th. Pelajaran</th>
					<th>NIPY</th>
					<th>Guru/Wali</th>
					<th>Kelas</th>
					<th>Edit</th>
				</tr>		
			</thead>
			<tbody>
				<?php 
				$no = 1;
				$query = mysqli_query($koneksi, "select * from tb_walikelas group by id_walikelas desc");
				while ($data = mysqli_fetch_array($query)) { 
					echo "<tr>";
					echo "<td>".$no++."</td>";
					echo "<td>".$data['th_pelajaran']."</td>";
					echo "<td>".$data['nipy']."</td>";
					echo "<td>".$data['user_guru']."</td>";
					echo "<td>".$data['kelas']." " . $data['komp_keahlian'] ." " . $data['pkelas']."</td>";
					echo "<td><a href='admin?view=up_walikelas&up=".$data['id_walikelas']."' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</div>