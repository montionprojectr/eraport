<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Daftar Kelas Pilihan > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	// $th = $_GET['th'];
	// $sms = $_GET['sms'];
	// $kd_mpsub = $_GET['kd_mpsub'];
	// $namakls = $_GET['namakls'];
// && isset($_GET['th']) && isset($_GET['sms']) && isset($_GET['kd_mpsub']) && isset($_GET['namakls'])
	// and th_pelajaran = '$th' and semester = '$sms' and y.kode_mapelsub = '$kd_mpsub' and nama_kelaspil = '$namakls'
	
	$query = mysqli_query($koneksi, "select id_kelasmappil, y.th_pelajaran, semester, y.kode_mapel, y.kode_mapelsub, nama_submapel, nama_kelaspil from tb_mapelsub x inner join tb_kelasmappil y on y.kode_mapelsub = x.kode_mapelsub where id_kelasmappil = '$id'");
$d = mysqli_fetch_array($query);

?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger">
				<h3 class="card-title">DAFTAR SISWA MAPPIL (<?= $d['th_pelajaran']." ".$d['semester']." ".$d['nama_submapel']." ".$d['nama_kelaspil']; ?>)</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-sm-6">
						<form class="form-group" action="" method="post">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<a href="?view=mapel_pilihan" class="btn btn-danger">Kembali</a>
									<button class="btn btn-outline-primary bg-primary form-control" type="submit" name="simpan">Simpan</button>
								</div>
								<select class="custom-select select2 form-control-sm" multiple="multiple" data-placeholder="--Pilih Data Siswa--" data-dropdown-css-class="select2-purple" name="nis_kel[]" id="inputGroupSelect03">
									<option value="">--Pilih Data Siswa--</option>
									<?php 
									$no=1;
									$sql = mysqli_query($koneksi, "select x.nis, nama, x.kelas, x.jurusan, x.pemkelas from tb_siswa_kelas x inner join tb_siswa y on y.nis = x.nis where x.kelas = 'XI' group by x.nis asc");
									while ($data = mysqli_fetch_array($sql)) { 
										$cek = mysqli_query($koneksi, "select * from tb_ruangsiswa_mappil where th_pelajaran = '".$d['th_pelajaran']."' and semester = '".$d['semester']."' and nis = '".$data['nis']."'");
										$dcek = mysqli_fetch_array($cek);
											if ($dcek['nis'] != $data['nis']) {
												?>
										<option value="<?= $data['nis']." ".$data['kelas']; ?>"><?= $no++."). ".$data['kelas']." ".$data['jurusan']." ".$data['pemkelas']." ".$data['nis']." :: ".$data['nama']; ?></option>
									<?php
											}else if($data['nis'] != $dcek['nis']){

											}
										 }
									?>
								</select>
							</div>
						</form>
					</div>
					<div class="col-sm-6">
						<div class="card collapsed-card">
							<div class="card-header bg-danger">
								<h3 class="card-title">Import Data siswa</h3>
								<div class="card-tools">
						      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
						      </button>
						    </div>
							</div>
							<div class="card-body bg-dark">
								<div class="form-group">
									<a href="view/operator/file/template_daftar_siswa_pilihan.xlsx" target="_blank">Download Template untuk Kelas <?= $d['nama_kelaspil']; ?></a>
								</div>
								<form action="?view=preview_kelaspil" method="post" enctype="multipart/form-data">
									<div class="form-group" hidden>
										<input type="text" name="id_kelasmappil" value="<?= $d['id_kelasmappil']; ?>">
										<input type="text" name="th_pelajaran" value="<?= $d['th_pelajaran']; ?>">
										<input type="text" name="semester" value="<?= $d['semester']; ?>">
										<input type="text" name="kode_mapel" value="<?= $d['kode_mapel']; ?>">
										<input type="text" name="kode_mapelsub" value="<?= $d['kode_mapelsub']; ?>">
									</div>
									<div class="input-group">
										<input type="file" name="file" class="form-control">
										<div class="input-group-prepend">
											<button type="submit" name="import-siswampp" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">Import</button>
										</div>	
									</div>
								</form>			
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<table id="example1" class="table table-sm table-bordered table-striped">
									<thead>
										<tr>
											<th>NIS</th>
											<th>NAMA</th>
											<th>ASAL KELAS</th>
											<th>ACTION</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$sqlsow = mysqli_query($koneksi, "select id_ruangsiswa_mappil,x.th_pelajaran, x.semester, kode_mapelsub, x.nis, nama, z.kelas, z.jurusan, z.pemkelas from tb_ruangsiswa_mappil x inner join tb_siswa y on y.nis = x.nis inner join tb_siswa_kelas z ON z.nis = y.nis where id_kelasmappil = '".$d['id_kelasmappil']."'");
										while ($dt = mysqli_fetch_array($sqlsow)) { ?>
											<tr>
												<td><?= $dt['nis']; ?></td>
												<td><?= $dt['nama']; ?></td>
												<td><?= $dt['kelas']." ".$dt['jurusan']." ".$dt['pemkelas']; ?></td>
												<td>
													<a href="?view=data_siswa_pilihan&id=<?= $_GET['id']; ?>&id_siswapil=<?php echo $dt['id_ruangsiswa_mappil']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
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
			</div>
		</div>
	</div>
</div>
<?php 

	if (isset($_POST['simpan'])) {
				$ide = $d['id_kelasmappil'];
				$th_pelajaran = $d['th_pelajaran'];
				$semester = $d['semester'];
				$kode_mapel = $d['kode_mapel'];
				$kode_mapelsub = $d['kode_mapelsub'];
				$nis = $_POST['nis_kel'];

				$con = count($nis);
				for ($i=0; $i < $con; $i++) { 
					$pisah = explode(' ', $nis[$i]);
					$cek = mysqli_query($koneksi, "select * from tb_ruangsiswa_mappil where id_kelasmappil = '$id' and th_pelajaran = '$th_pelajaran' and semester = '$semester' and kode_mapelsub = '$kode_mapelsub' and nis = '".$pisah[0]."'");
					$sqlc = mysqli_num_rows($cek);
					if ($sqlc > 0) {
						echo "<script>
						alert('Data siswa sudah ada');
						document.location.href = '?view=data_siswa_pilihan&id=".$id."&th=".$th_pelajaran."&sms=".$semester."&kd_mpsub=".$kode_mapelsub."&namakls=".$d['nama_kelaspil']."';
						</script>";
					}else{
						$list = mysqli_query($koneksi, "select x.nis, nama, x.kelas, x.jurusan, x.pemkelas from tb_siswa_kelas x inner join tb_siswa y on y.nis = x.nis where x.th_pelajaran = '$th_pelajaran' and x.nis = '".$pisah[0]."' and x.kelas = 'XI' group by x.nis asc");
						while ($in = mysqli_fetch_array($list)) {
							$inst = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','".$in['nis']."','".$in['kelas']."','".$in['jurusan']."','".$in['pemkelas']."','$kode_mapel','$semester')");
						}

						$insert = mysqli_query($koneksi, "insert into tb_ruangsiswa_mappil(id_ruangsiswa_mappil, id_kelasmappil, th_pelajaran, semester, kode_mapel, kode_mapelsub, nis) values('','$ide','$th_pelajaran','$semester','$kode_mapel','$kode_mapelsub','".$pisah[0]."')");

						if ($insert && $inst) {
							echo "<script>
							document.location.href = '?view=data_siswa_pilihan&id=".$id."&th=".$th_pelajaran."&sms=".$semester."&kd_mpsub=".$kode_mapelsub."&namakls=".$d['nama_kelaspil']."';
							</script>";
						}
						
					}

				}
				
			}else if(isset($_GET['id']) && isset($_GET['id_siswapil'])){
				$id = $_GET['id'];
				$id_siswapil = $_GET['id_siswapil'];

				$sql = mysqli_query($koneksi, "select * from tb_ruangsiswa_mappil where id_ruangsiswa_mappil = '$id_siswapil'");
				$data = mysqli_fetch_array($sql);

				$delete = mysqli_query($koneksi, "delete from tb_penilaian where th_pelajaran = '".$data['th_pelajaran']."' and nis = '".$data['nis']."' and semester = '".$data['semester']."'");

				if ($delete) {
					$delet = mysqli_query($koneksi, "delete from tb_ruangsiswa_mappil where id_ruangsiswa_mappil = '$id_siswapil'");
					if ($delet) {
						echo "<script>
						document.location.href = '?view=data_siswa_pilihan&id=".$id."';
						</script>";	
					}
				}

			}

}

?>