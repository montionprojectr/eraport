<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<?php 
if (isset($_GET['kelas']) && isset($_GET['jurusan']) && isset($_GET['pkelas']) && isset($_GET['thpel'])) {
	$kelas = $_GET['kelas'];
	$jurusan = $_GET['jurusan'];
	$pkelas = $_GET['pkelas'];
	$th_pelajaran = $_GET['thpel'];
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-danger">
				<h3 class="card-title">Kelas <?= $kelas." ".$jurusan." ".$pkelas; ?>. Th. Pelajaran : <?= $th_pelajaran; ?></h3>
			</div>
			<div class="card-body">
				<table class="table table-sm table-bordered table-striped">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIS</th>
							<th>NAMA</th>
							<th>ALAMAT</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						$sql = mysqli_query($koneksi, "select * from tb_siswa where kelas = '$kelas' and jurusan = '$jurusan' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran'");
						while ($data = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $data['nis']; ?></td>
								<td><?= $data['nama']; ?></td>
								<td><?= $data['alamat_siswa']; ?></td>
							</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php } ?>