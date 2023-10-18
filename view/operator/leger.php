<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Laporan > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<!-- <div class="card collapsed-card">
	<div class="card-header bg-danger">
		<h4 class="card-title">Input Siswa Baru diLeger</h4>
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
						<th><label>NIS</label></th>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="nis" required>
							</div>
						</td>
					</tr>
					<tr>
						<th><label>Nama Siswa</label></th>
						<td>
							<div class="form-group">
								<input type="text" class="form-control" name="nama" required>
							</div>
						</td>
					</tr>
					<tr>
					<td>
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
				</td>
				<td>
				    <div class="form-group">
				      <label>Pilih Kompetensi Keahlian</label>
				      <select class="form-control-sm select2" style="width: 100%;" name="jurusan">
				      	<?php 
				      	$queryj = mysqli_query($koneksi, "select * from tb_jurusan");
				      	while ($dj = mysqli_fetch_array($queryj)) {
				      		echo "<option value='".$dj['nama_Sjurusan']."'>" . $dj['nama_Sjurusan']." - ". $dj['nama_Ljurusan'] . "</option>";
				      	}
				      	?>
				      </select>
				    </div>
				  </div>
				</td>
				<td>
				<div class="form-group">
				      <label>Pilih Kelas</label>
							
		            <select class="form-control-sm select2" style="width: 100%;" name="pemkelas">
		           		<option value="1">1</option>
				        <option value="2">2</option>
				        <option value="4">3</option>
				        <option value="4">4</option>
				      </select>
							</div>
						</td>
		            </div>			
							</div>
						</div>
					</div></td>
					</tr>
					<tr>
						<th><label>Semester</label></th>
						<td> 
							<div class="form-group">
					  <select class="form-control-sm select2" style="width: 100%;" name="semester">
				        <option value="Ganjil">Ganjil</option>
				        <option value="Genap">Genap</option>
				      </select>
							</div>
						</td>
					</tr>
					<tr>
						<th><label>Tahun Pelajaran</label></th>
						<td> 
							<div class="form-group">
					  <select class="form-control-sm select2" style="width: 100%;" name="th_pelajaran">
				        <option value="2023/2024">2023/2024</option>
				        <option value="2024/2025">2024/2025</option>
				        <option value="2025/2026">2025/2026</option>
				      </select>
							</div>
						</td>
					</tr>

				
					<tr>
						<td>
							<div class="form-group float-center">
								<button class="btn btn-primary float-center" type="submit" name="simpan"><i class="fas fa-save"></i> Simpan</button>	
								<!- <a href="#" class="btn btn-primary">Download Template</a>	
								<a href="#" class="btn btn-primary">Import Data</a>	 -->
<!-- 							</div>
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
</div> -->
<!-- <?php 
if (isset($_POST['simpan'])) {

	$nis = $_POST['nis'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$pemkelas = $_POST['pemkelas'];
	$semester = $_POST['semester'];
	$th_pelajaran = $_POST['th_pelajaran'];
	


	require_once('view/operator/id_max.php');
	$query = mysqli_query($koneksi, "insert into tb_leger(id, nis, nama, kelas, jurusan, pemkelas, semester, th_pelajaran) values('$use','$nis','$nama','$kelas', '$jurusan', '$pemkelas','$semester','$th_pelajaran')");
$kelasku=$kelas.' '.$jurusan.' '.$pemkelas;
$insert_rols = mysqli_query($koneksi, "insert into tb_siswa(id, nis, nama, kelas) values('$use','$nis','$nama', '$kelasku')");

	if ($query && $insert_rols) {
		echo "<script>
		alert('DATA BERHASIL DISIMPAN');
		document.location.href = '?view=leger';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DISIMPAN');
		document.location.href = '?view=leger';
		</script>";
	}
}
?> -->
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger"><h3 class="card-title">LEGER SISWA</h3></div>
			<div class="card-body bg-coral">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
	<th>No</th>
    <th>NIS</th>
    <th>Nama Siswa</th>
    <th>Kelas</th>	 
    <th>semester</th>
     <th>Tahun Ajaran</th>		
	<th>PABP </th>
    <th>PKn</th>
    <th>B.Indonesia</th>
    <th>Penjaskes</th>
    <th>Sejarah</th>
    <th>Seni_Budaya</th>
    <th>B.Jawa</th>
    <th>MTK</th>
    <th>B.Inggris</th>
    <th>Informatika</th>
    <th>Projek_IPAS</th>
    <th>DDK</th>

    <th>TOTAL</th>
    <th>RERATA</th>

    <th>Sakit</th>
    <th>Ijin</th>
    <th>Alpa</th>
					</tr>		
				</thead>
				<tbody>
			<?php 
					$no = 1;
					$query = mysqli_query($koneksi, "select * from tb_leger  ");
					while ($data = mysqli_fetch_array($query)) {
						echo "<tr>";
						echo "<td>".$no++."</td>";
	
						echo "<td>".$data['nis']."</td>";
						echo "<td>".$data['nama']."</td>";
						echo "<td>".$data['kelas'].' '.$data['jurusan'].' '.$data['pemkelas']."</td>";
						echo "<td>".$data['semester']."</td>";
						echo "<td>".$data['th_pelajaran']."</td>";
						echo "<td>".$data['pabp']."</td>";
						echo "<td>".$data['pkn']."</td>";
						echo "<td>".$data['b_indo']."</td>";
						echo "<td>".$data['penjas']."</td>";
						echo "<td>".$data['sejarah']."</td>";
						echo "<td>".$data['seni']."</td>";
						echo "<td>".$data['b_jawa']."</td>";
						echo "<td>".$data['mtk']."</td>";
						echo "<td>".$data['b_ing']."</td>";
						echo "<td>".$data['informatika']."</td>";
						echo "<td>".$data['projek']."</td>";
						echo "<td>".$data['dasar']."</td>";
						echo "<td>".$data['total']."</td>";
						echo "<td>".$data['rerata']."</td>";
						echo "<td>".$data['sakit']."</td>";
						echo "<td>".$data['ijin']."</td>";
						echo "<td>".$data['alpa']."</td>";

						?>
						<!-- <td><a href="?view=update_guru&id=<?= $data['id_user'] ?>" class='btn btn-primary'><i class='fas fa-edit'></i></a> || <a href="view/operator/del/delete_users_guru.php?id=<?= $data['id_user'] ?>" class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus username <?= $data['username'] ?> ini?')"><i class='fas fa-trash'></i></a> </td> -->
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