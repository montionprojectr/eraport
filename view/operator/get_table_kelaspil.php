<div class="card">
<div class="card-header bg-danger">
	<h3 class="card-title">DAFTAR KELAS PILIHAN</h3>
</div>
<div class="card-body">
	<table id="example1" class="table table-sm table-bordered table-striped">
		<thead>
			<tr>
				<th>Th. Pelajaran</th>
				<th>Nama Mapel Pilihan</th>
				<th>Nama Kelas Pilihan</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			include "../../koneksi.php";
		if (isset($_POST['th_pelajaran']) && isset($_POST['semester'])) {

			$semester = $_POST['semester'];
			$th_pelajaran = $_POST['th_pelajaran'];
			$sql = mysqli_query($koneksi, "select id_kelasmappil, y.th_pelajaran, semester,y.kode_mapel, y.kode_mapelsub, nama_submapel, nama_kelaspil  from tb_mapelsub x inner join tb_kelasmappil y on y.kode_mapelsub = x.kode_mapelsub where th_pelajaran = '$th_pelajaran' and semester = '$semester'");

			$array[] = array();
			while ($row = mysqli_fetch_object($sql)) { 
				$array[$row->nama_submapel][] = $row;
			}

			foreach ($array as $key => $val) {
				foreach ($val as $k => $v) { ?>
				<tr>
				<?php 
				if ($k == 0) { ?>
					<td rowspan="<?= count($val); ?>">
						<?= $v->th_pelajaran; ?>
					</td>
					<td rowspan="<?= count($val); ?>">
						<?= $v->nama_submapel; ?>
					</td>
				<?php }
				?>
				<td><?= $v->nama_kelaspil ?></td>
				<td>
					<a href="?view=data_siswa_pilihan&id=<?= $v->id_kelasmappil ?>" class="btn btn-primary"><i class="fas fa-user"></i> Data Siswa</a>
					<a href="view/operator/del/delete_kelasmappil.php?id=<?= $v->id_kelasmappil; ?>" onclick="return confirm('Yakin Hapus Kelas <?= $v->nama_kelaspil; ?>?')" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
				</td>
				</tr>			
				<?php }
			}
		}
			?>
		</tbody>
	</table>
</div>
</div>