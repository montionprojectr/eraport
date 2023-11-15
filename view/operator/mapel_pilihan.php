<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-primary">
				<h3 class="card-title">DAFTAR MATA PELAJARAN PILIHAN</h3>
			</div>	
			<div class="card-body">
				<div class="row">
					<div class="col-sm-8">
						<table class="table table-sm table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Mapel</th>
									<th>Nama Mapel Pilihan</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$no = 1;
								$query = mysqli_query($koneksi, "select * from tb_mapelsub where kode_mapel = 'mpp'");
								while ($data = mysqli_fetch_array($query)) { ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $data['kode_mapelsub']; ?></td>
										<td><?= $data['nama_submapel']; ?></td>
										<td>
											<a href="?view=kelas_mapelpilihan&kode_mapelsub=<?= $data['kode_mapelsub']; ?>" class="btn bg-warning"><i class="fas fa-folder-plus"></i> New Kelas</a>
										</td>
									</tr>
								<?php }
								?>
							</tbody>
						</table>
					</div>
					<div class="col-sm-4">
						<div class="card">
							<div class="card-header bg-primary">
								<h7>Tampilkan Daftar Kelas</h7>
							</div>
							<div class="card-body bg-teal">
								<div class="form-group">
										<select class="form-control-sm select2" style="width:100%;" id="th_pelajaran">
											<option value="">-- Pilih Th. Pelajaran --</option>
											<option value="2023/2024">2023/2024</option>
											<option value="2024/2025">2024/2025</option>
											<option value="2025/2026">2025/2026</option>
										</select>		
								</div>
								<div class="form-group">
									<select class="form-control-sm select2" style="width:100%;" id="semester">
											<option value="">-- Pilih Semester --</option>
											<option value="ganjil">Ganjil</option>
											<option value="genap">Genap</option>
										</select>	
								</div>
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<div class="col-sm-12" id="show-tablekelas-pil">
		<!-- view/operator/get_table_kelaspil.php -->
	</div>
</div>