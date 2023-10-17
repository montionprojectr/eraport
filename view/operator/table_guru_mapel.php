<table id="examp" class="table table-sm table-bordered table-striped">
	<thead>
		<tr>
			<th>Action</th>
			<th>Th. Pelajaran</th>
			<th>NIPY</th>
			<th>Nama Guru</th>
			<th>Mapel</th>
			<th>Kelas</th>
		</tr>		
	</thead>
	<tbody>	
		<?php 
		include "../../koneksi.php";
		if (isset($_POST['th_pelajaran'])) {
			$th_pelajaran = $_POST['th_pelajaran'];
			$query = mysqli_query($koneksi, "select th_pelajaran, x.nipy, nama_lengkap, x.kode_mapel, nama_mapel, x.kelas, komp from tb_guru_mapel x inner join tb_users y on y.nipy = x.nipy inner join tb_mapel z on z.kode_mapel = x.kode_mapel where th_pelajaran = '$th_pelajaran' group by id_guru_mapel");
		}

		$arr[] = array();
		while ($row = mysqli_fetch_object($query)) { 
			$arr[$row->nama_lengkap][] = $row;
		}

		foreach ($arr as $key => $val) {
			foreach ($val as $k => $v) { ?>
				<tr>
					<?php 
					if ( $k == 0) { ?>
						<td rowspan="<?= count($val); ?>">
							<a href="?view=update_guru_mapel&id=<?= $v->nipy; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
						</td>
						<td rowspan="<?= count($val); ?>">
							<?php echo $v->th_pelajaran; ?>
						</td>
						<td rowspan="<?= count($val); ?>">
							<?php echo $v->nipy; ?>
						</td>
						<td rowspan="<?= count($val); ?>">
							<?php echo $v->nama_lengkap; ?>
						</td>
					<?php } ?>
						<td>
							<?php echo $v->nama_mapel; ?>
						</td>
						<td>
							<?php echo $v->kelas . " " . $v->komp; ?>
						</td>
				</tr>
				<?php }
		}
		?>	
	</tbody>
</table>

<!-- DataTables -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#examp").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
});
</script>