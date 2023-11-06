<table id="examp" class="table table-sm table-bordered table-striped">
	<thead>
		<tr>
			<th>Action</th>
			<th>Th. Pelajaran</th>
			<th>NIPY</th>
			<th>Nama Guru</th>
			<th>Mapel</th>
			<th>Kelas</th>
			<th>Delete</th>
		</tr>		
	</thead>
	<tbody>	
		<?php 
		include "../../koneksi.php";
		if (isset($_POST['th_pelajaran'])) {
			$th_pelajaran = $_POST['th_pelajaran'];
			$query = mysqli_query($koneksi, "select * from table_guru_mapel where th_pelajaran = '$th_pelajaran'");
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
							<?php echo $v->nama_matapelajaran; ?>
						</td>
						<td>
							<?php echo $v->kelas . " " . $v->komp; ?>
						</td>
						<td>
							<a href="" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
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