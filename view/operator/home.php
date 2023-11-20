<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > Dashboard</li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<div class="row">
	<div class="col-sm-12">
	<form class="form-group" action="" method="post">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<button class="btn btn-outline-primary bg-primary" type="submit" name="selectoption">Tampil</button>
			</div>
			<select class="custom-select" name="pilihan_tahunpel" id="inputGroupSelect03">
				<option value="2023/2024">Th. Pelajaran 2023/2024</option>
				<option value="2024/2025">Th. Pelajaran 2024/2025</option>
				<option value="2025/2026">Th. Pelajaran 2025/2026</option>
			</select>
		</div>
	</form>
	</div>
	<?php 
	$sql = mysqli_query($koneksi, "select * from tb_select_tahunpel");
	$sel = mysqli_fetch_array($sql);
	$array = array('X' => 'X', 'XI' => 'XI', 'XII' => 'XII' );
	foreach ($array as $key => $value) { 
		$query = mysqli_query($koneksi, "select th_pelajaran, concat_ws(' ', kelas, komp_keahlian, pkelas) as class, kelas, komp_keahlian, pkelas,nama_lengkap from tb_walikelas x inner join tb_users y on y.nipy = x.nipy where kelas = '$value' and th_pelajaran = '".$sel['select_tahunpel']."' group by id_walikelas"); ?>
		<div class="col-sm-4">
			<div class="card">
				<div class="card-header bg-danger">
					<h3 class="card-title">KELAS <?= $value; ?></h3>
				</div>
				<div class="card-body bg-secondary">
					<?php while ($row = mysqli_fetch_array($query)){
						if ($row['kelas'] == $value) { 
							$sql1 = mysqli_query($koneksi, "select count(x.id) as id FROM tb_siswa_kelas X INNER JOIN tb_siswa Y ON y.nis = x.nis where x.kelas = '".$value."' and x.jurusan = '".$row['komp_keahlian']."' and x.pemkelas = '".$row['pkelas']."' and x.th_pelajaran = '".$row['th_pelajaran']."'");
// $sql = mysqli_query($koneksi, "select count(id) as id from tb_siswa where kelas = '".$value."' and jurusan = '".$row['komp_keahlian']."' and pemkelas = '".$row['pkelas']."' and th_pelajaran = '".$row['th_pelajaran']."'");
					$dsql = mysqli_fetch_array($sql1);
							?>
							<a href="admin?view=data_kelas&kelas=<?php echo $row['kelas']."&jurusan=".$row['komp_keahlian']."&pkelas=".$row['pkelas']."&thpel=".$row['th_pelajaran'];?>">
							<div class="info-box bg-dark">
					      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

					      <div class="info-box-content text-sm">
					        <div class=""><?= $row['nama_lengkap']; ?></div>
					        <span class="info-box-number">
					          <?= $row['class']; ?>
					        </span>
					        <span class="info-box-number"><?= $dsql['id']; ?> Siswa</span>
					      </div>
					      <!-- /.info-box-content -->
					    </div>
					  	</a>
						<?php }
					}
					?>
				</div>
			</div>		
		</div>
	<?php }
	?>
</div>

<?php 
if (isset($_POST['selectoption'])) {
	$select = $_POST['pilihan_tahunpel'];
	$query = mysqli_query($koneksi, "update tb_select_tahunpel set select_tahunpel = '$select' where id = '1'");
	if ($query) {
		echo "<script>window.location.href = 'admin'</script>";	
	}
}
?>