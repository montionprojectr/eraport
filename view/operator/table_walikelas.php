<table id="example1" class="table table-sm table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Th. Pelajaran</th>
			<th>Kelas</th>
			<th>Nipy</th>
			<th>Guru/Wali</th>
			<th>Action</th>
		</tr>		
	</thead>
	<tbody>
		<?php 
		include "../../koneksi.php";
		if (isset($_POST['th_pelajaran'])) {
			$th_pelajaran = $_POST['th_pelajaran'];
			$query = mysqli_query($koneksi, "select id_walikelas, th_pelajaran, concat_ws(' ', kelas, komp_keahlian, pkelas) as class, y.nipy, nama_lengkap from tb_walikelas x inner join tb_users y on y.nipy = x.nipy where th_pelajaran = '$th_pelajaran' group by id_walikelas");
		}
		
		$no = 1;
		while ($data = mysqli_fetch_array($query)) { 
			echo "<tr>";
			echo "<td>".$no++."</td>";
			echo "<td>".$data['th_pelajaran']."</td>";
			echo "<td class='bg-grey'><b>".$data['class']."</b></td>";
			echo "<td>".$data['nipy']."</td>";
			echo "<td>".$data['nama_lengkap']."</td>";
			?>
			<td><a href='admin?view=up_walikelas&up=<?= $data['id_walikelas']; ?>' class='btn btn-primary'><i class='fas fa-edit'></i></a>
				<a href='view/operator/del/delete_walikelas.php?id=<?= $data['id_walikelas']; ?>' class='btn btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus data walikelas?')"><i class='fas fa-trash'></i></a>
			</td>
			<?php
			echo "</tr>";
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