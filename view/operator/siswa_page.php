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
			<div class="card-header bg-danger"><h3 class="card-title">Data Siswa</h3></div>
			<div class="card-body">
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>NIS</th>
						<th>NISN</th>
						<th>Nama</th>
						<th>Kelas</th>
						<th>TTL</th>
						<th>J.Kel</th>
						<th>Agama</th>
						<th>Status</th>
						<th>Anak Ke</th>
						<th>Alamat Siswa</th>
						<th>Hp Siswa</th>
						<th>Asal Sekolah</th>
						<th>Tgl Terima</th>
						<th>Ayah Ibu</th>
						<th>Alamat Ortu</th>
						<th>Hp Ortu</th>
						<th>Kerja Ayah & Ibu</th>
						<th>Nama Wali</th>
						<th>Alamat Wali</th>
						<th>Hp Wali</th>
						<th>Kerja Wali</th>
					</tr>		
				</thead>
				<tbody>
					<?php 
					$no=1;
					$query = mysqli_query($koneksi, "select * from tb_siswa");
					while ($data = mysqli_fetch_array($query)) { ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['nis'] ?></td>
							<td><?= $data['nisn'] ?></td>
							<td><?= $data['nama'] ?></td>
							<td><?= $data['kelas'] ?></td>
							<td><?= $data['ttl'] ?></td>
							<td><?= $data['kelamin'] ?></td>
							<td><?= $data['agama'] ?></td>
							<td><?= $data['status'] ?></td>
							<td><?= $data['anak_ke'] ?></td>
							<td><?= $data['alamat_siswa'] ?></td>
							<td><?= $data['hp_siswa'] ?></td>
							<td><?= $data['asal_sekolah'] ?></td> 
							<td><?= $data['tgl_terima'] ?></td>
							<td><?= $data['ayah']." ".$data['ibu']; ?></td>
							<td><?= $data['alamat_ortu'] ?></td>
							<td><?= $data['hp_ortu'] ?></td>
							<td><?= $data['kerja_ayah']." ".$data['kerja_ibu']; ?></td>
							<td><?= $data['nama_wali'] ?></td>
							<td><?= $data['alamat_wali'] ?></td>
							<td><?= $data['hp_wali'] ?></td>
							<td><?= $data['kerja_wali'] ?></td>
						</tr>	
					<?php }
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>