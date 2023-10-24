<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Walikelas & Guru > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<div class="card collapsed-card">
	<div class="card-header bg-danger">
		<h4 class="card-title">INPUT DATA GURU MATA PELAJARAN</h4>
		<div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
      </button>
    </div>
	</div>
	<div class="card-body bg-dark">
	<form action="" method="post">
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
		      <select class="form-control-sm select2" style="width: 100%;" name="th_pelajaran" required>
		      	<option value="">Pilih Th. Pelajaran</option>
		        <option value="2023/2024">Th. Pelajaran 2023/2024</option>
		        <option value="2024/2025">Th. Pelajaran 2024/2025</option>
		        <option value="2025/2026">Th. Pelajaran 2025/2026</option>
		      </select>
		    </div>
			</div>
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
				      <label>Pilih Nama Guru</label>
				      <select class="form-control-sm select2" style="width: 100%;" name="nipy">
				      	<option value="">Pilih Data</option>
				      	<?php 
				      	$queryu = mysqli_query($koneksi, "select * from tb_users group by nama_lengkap asc");
				      	while ($du = mysqli_fetch_array($queryu)) { ?>
				      		<option value="<?= $du['nipy'] ?>"><?= $du['nama_lengkap'] ?></option>
				      	<?php }
				      	?>
				      </select>
				    </div>
				  </div>
					<div class="col-sm-4">
						<div class="form-group">
				      <label>Pilih Mata Pelajaran</label>
				      <select class="form-control-sm select2" style="width: 100%;" name="kode_mapel" required>
				      	<option value=''>Pilih Data</option>
				      	<?php 
				      	$no=1;
				      	$querym = mysqli_query($koneksi, "select * from tb_mapel");
				      	while ($dm = mysqli_fetch_array($querym)) {
				      		echo "<option value='".$dm['kode_mapel']."'>" . $no++ . " - " . $dm['kelas']. " " . $dm['nama_mapel'] . "</option>";
				      	}
				      	?>
				      </select>
				    </div>
				    <div class="form-group">
							<div class="select2-purple">
								<label>Pilih Kelas</label>
					      <select class="form-control-sm select2" multiple="multiple" data-placeholder="Select a Class" data-dropdown-css-class="select2-purple" style="width: 100%;" name="kelas_dan_komp[]" required>
					      	<option value=""></option>
					      	<?php 
					      	$queryw = mysqli_query($koneksi, "select * from tb_walikelas group by kelas, komp_keahlian");
					      	while ($dw = mysqli_fetch_array($queryw)) { ?>
					      		<option value="<?= $dw['kelas']." ".$dw['komp_keahlian']?>"><?= $dw['kelas']." ".$dw['komp_keahlian']?></option>
					      	<?php }
					      	?>
					      </select>		
							</div>
				    </div>
					</div>
					<div class="col-sm-4 p-5">
						<div class="form-group float-center">
							<button class="btn btn-primary float-center" type="submit" name="simpan"><i class="fas fa-save"></i> Simpan</button>	
							<a href="#" class="btn btn-primary">Download Template</a>	
							<a href="#" class="btn btn-primary">Import Data</a>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>

<?php 

if (isset($_POST['simpan'])) {
	$th_pelajaran = $_POST['th_pelajaran'];
	$nipy = $_POST['nipy'];
	$kode_mapel = $_POST['kode_mapel'];
	$kelas_dan_komp = $_POST['kelas_dan_komp'];


		// $sqlniipy = mysqli_query($koneksi, "select nipy from tb_users where nama_lengkap = '$nama_user_guru'");
		// $d = mysqli_fetch_array($sqlniipy);


	$jml = count($kelas_dan_komp);

	for ($i=0; $i < $jml ; $i++) { 
		$array = explode(" ", $kelas_dan_komp[$i]);

		// echo $array[1];
		$query = mysqli_query($koneksi, "insert into tb_guru_mapel(id_guru_mapel, th_pelajaran, nipy, kode_mapel, kelas, komp) values('','".$th_pelajaran."', '".$nipy."','".$kode_mapel."','".$array[0]."','".$array[1]."')");
		if ($query) {
            echo "<script>
                alert('Data berhasil tersimpan');
                document.location.href = 'admin?view=guru_mapel';
            </script>";
        }else{
        	echo "<script>
                alert('Data gagal tersimpan');
                document.location.href = 'admin?view=guru_mapel';
            </script>";
        }
	}
}
?>
<!-- Table Walikelas -->
<div class="card">
	<div class="card-header bg-danger">
		<h3 class="card-title">TABLE GURU MATA PELAJARAN</h3>
		<div class="form-group float-right">
			<select class="form-control-sm select2" style="width:100%" id="th_pelajaran2">
				<option value="">Pilih Th. Pelajaran</option>
				<option value="2023/2024">2023/2024</option>
				<option value="2024/2025">2024/2025</option>
				<option value="2025/2026">2025/2026</option>
			</select>
		</div>
	</div>
	<div class="card-body table-responsive" id="tampil_guru_mapel">
		<!-- tampil_kelas dari 'view/operator/table_guru_mapel.php' -->
	</div>
</div>