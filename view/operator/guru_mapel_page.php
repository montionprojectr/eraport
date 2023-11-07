<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Walikelas > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<div class="card">
	<!-- collapsed-card -->
	<div class="card-header bg-danger">
		<h4 class="card-title">INPUT DATA GURU MENGAJAR MATA PELAJARAN</h4>
		<!-- <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
      </button>
    </div> -->
	</div>
	<div class="card-body bg-dark">
	<form action="" method="post">
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<a href="#" class="btn btn-default" data-toggle="modal" data-target="#modal-gurumapel">A. Input Guru Mapel</a>
							<a href="" class="btn btn-default" data-toggle="modal" data-target="#modal-gurumapelpil">B. Input Guru Mapel Pilihan</a>
						</div>
					</div>
					<div class="col-sm-6" id="show_forminputgurumapel">
						
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
	$kelas_dan_komp = $_POST['kelaskomp'];
	$pecahstring = explode(" ",$kode_mapel);

		// $sqlniipy = mysqli_query($koneksi, "select nipy from tb_users where nama_lengkap = '$nama_user_guru'");
		// $d = mysqli_fetch_array($sqlniipy);


	$jml = count($kelas_dan_komp);

	for ($i=0; $i < $jml ; $i++) { 
		$array = explode(" ", $kelas_dan_komp[$i]);

		// echo $array[1];
		$query = mysqli_query($koneksi, "insert into tb_guru_mapel(id_guru_mapel, th_pelajaran, nipy, kode_mapel, kelas, komp) values('','".$th_pelajaran."', '".$nipy."','".$pecahstring[1]."','".$array[0]."','".$array[1]."')");
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
}else if(isset($_POST['simpan_gurumappil'])){
	$th_pelajaran = $_POST['th_pelajarana'];
	$nipy = $_POST['nipy'];
	$kode_mapelsub = $_POST['kode_mapelsub'];
	$kode_mapel = 'mpp';
	$nama_kelaspil = $_POST['nama_kelaspil'];

		// $sqlniipy = mysqli_query($koneksi, "select nipy from tb_users where nama_lengkap = '$nama_user_guru'");
		// $d = mysqli_fetch_array($sqlniipy);


	$jml = count($nama_kelaspil);

	for ($i=0; $i < $jml ; $i++) {

		// echo $array[1];
		$query = mysqli_query($koneksi, "insert into tb_guru_mapel(id_guru_mapel, th_pelajaran, nipy, kode_mapel, kode_mapelsub, kelas, komp) values('','".$th_pelajaran."', '".$nipy."','".$kode_mapel."','".$kode_mapelsub."', 'XI','".$nama_kelaspil[$i]."')");
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

<div class="modal fade" id="modal-gurumapel">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="" method="post">
      <div class="modal-header bg-secondary">
        <h4 class="modal-title">INPUT GURU MAPEL</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!-- Buka form -->
      	<div class="form-group">
		      <select class="form-control-sm select2" style="width: 100%;" name="th_pelajaran" id="th_pelajaran1" required>
		      	<option value="">Pilih Th. Pelajaran</option>
		        <option value="2023/2024">Th. Pelajaran 2023/2024</option>
		        <option value="2024/2025">Th. Pelajaran 2024/2025</option>
		        <option value="2025/2026">Th. Pelajaran 2025/2026</option>
		      </select>
		    </div>
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
		    <div class="form-group">
		      <label>Pilih Mata Pelajaran</label>
		      <select class="form-control-sm select2" style="width: 100%;" name="kode_mapel" id="kode_mapel" required>
		      	<!-- ambil dari view/operator/input_ajax_gurumapel.php -->
		      </select>
		    </div>
		    <div class="form-group">
				<div class="select2-purple">
					<label>Pilih Kelas</label>
			      <select class="form-control-sm select2" multiple="multiple" data-placeholder="Select a Class" data-dropdown-css-class="select2-purple" style="width: 100%;" name="kelaskomp[]" id="kelaskomp" required>
			      	<!-- ambil dari view/operator/input_get_gurumapel.php -->
			      </select>		
				</div>
		    </div>
        <!-- Tutup form -->
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan Guru Mapel</button>
      </div>
    	</form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-gurumapelpil">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form action="" method="post">
      <div class="modal-header bg-info">
        <h4 class="modal-title">INPUT GURU MAPEL PILIHAN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<label>Th. Pelajaran</label>
		      <select class="form-control-sm select2" style="width: 100%;" name="th_pelajarana" id="th_pelajarana" required>
		      	<option value="">Pilih Th. Pelajaran</option>
		        <option value="2023/2024">Th. Pelajaran 2023/2024</option>
		        <option value="2024/2025">Th. Pelajaran 2024/2025</option>
		        <option value="2025/2026">Th. Pelajaran 2025/2026</option>
		      </select>
		    </div>
		    <div class="form-group">
		    	<label>Semester</label>
		    	<select class="form-control-sm select2" style="width:100%;" name="semester" id="semester" required>
			    	<option value="">--Pilihan--</option>
			    	<option value="ganjil">Ganjil</option>
			    	<option value="genap">Genap</option>
			    </select>
		    </div>
		    <div class="form-group">
		    	<label>Pilih Mata Pelajaran</label>
		      <select class="form-control-sm select2" style="width: 100%;" name="kode_mapelsub" id="kode_mapelsub" required>
		      	<option value="">--Pilihan--</option>
		      	<?php $no=1;
		      	$query= mysqli_query($koneksi, "select * from tb_mapelsub where kode_mapel = 'mpp'");
						while ($d = mysqli_fetch_array($query)) { ?>
							<option value="<?= $d['kode_mapelsub']; ?>"><?= $no++."). ".$d['nama_submapel']; ?></option>
						<?php }
		      	?>
		      </select>
		    </div>
		    <div class="form-group">
		    	<label>Pilih Kelas</label>
		    	<select class="form-control-sm select2" multiple="multiple" data-placeholder="Input data" data-dropdown-css-class="select2-purple" style="width: 100%;" name="nama_kelaspil[]" id="nama_kelaspil" required>
		      	<!-- view/operator/input_guru_mapelpil.php -->
		      </select>
		    </div>
		    <div class="form-group">
		      <label>Pilih Nama Guru</label>
		      <select class="form-control-sm select2" style="width: 100%;" name="nipy" required>
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
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="simpan_gurumappil">Simpan Guru Mapel Pilihan</button>
      </div>
    	</form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->