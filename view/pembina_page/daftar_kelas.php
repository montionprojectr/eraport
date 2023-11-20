<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="pembina" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= '' . $_GET['page'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<div class="card">
	<div class="card-header bg-primary">
		<h4 class="card-title">Daftar Kelas Th. Pelajaran <?= $_GET['th']; ?></h4>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<table id="example1" class="table table-sm table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Kelas</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no=1;
						$kelas = mysqli_query($koneksi, "SELECT * FROM tb_walikelas X INNER JOIN tb_users Y ON y.nipy = x.nipy WHERE th_pelajaran = '$_GET[th]' GROUP BY id_walikelas");
						while ($data = mysqli_fetch_array($kelas)) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td>
									<div class="info-box bg-dark">
							      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

							      <div class="info-box-content text-sm">
							        <div class=""><?= $data['nama_lengkap']; ?></div>
							        <span class="info-box-number">
							          <?= $data['kelas']." ".$data['komp_keahlian']." ".$data['pkelas']; ?>
							        </span>
							        <span class="info-box-number">1 Siswa</span>
							      </div>
							      <!-- /.info-box-content -->
							    </div>
								</td>
								<td class="text-center">
									<a href="?page=ekskul&id_walikelas=<?= $data['id_walikelas']; ?>" class="btn btn-primary">Buka Kelas</a>
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