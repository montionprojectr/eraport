<table id="examp" class="table table-sm table-bordered table-striped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Th. Pelajaran</th>
			<th>NIPY</th>
			<th>Nama Guru</th>
			<th>Mapel</th>
			<th>No.</th>
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
		$no = 1; $nom=1;
		foreach ($arr as $key => $val) {
			foreach ($val as $k => $v) { ?>
				<tr>
					<?php 
					if ( $k == 0) { ?>
						<td rowspan="<?= count($val); ?>">
							<?= $no++;  ?>
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
						<td><?= $nom++; ?></td>
						<td>
							<?php echo $v->kelas . " " . $v->komp; ?>
						</td>
						<td>
							<a href="view/operator/del/delete_guru_mapel.php?idgrmpl=<?= $v->id_guru_mapel; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data mapel <?= $v->nama_matapelajaran." Kelas: ".$v->kelas." ".$v->komp." Milik Bpk/Ibu: ".$v->nama_lengkap; ?>')"><i class="fas fa-trash"></i> Delete</a>
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