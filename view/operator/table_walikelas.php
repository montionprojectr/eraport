<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>No</th>
			<th>Th. Pelajaran</th>
			<th>Kelas</th>
			<th>Guru/Wali</th>
			<th>Edit</th>
		</tr>		
	</thead>
	<tbody>
		<?php 
		include "../../koneksi.php";
		if (isset($_POST['th_pelajaran'])) {
			$th_pelajaran = $_POST['th_pelajaran'];
			$query = mysqli_query($koneksi, "select * from tb_walikelas where th_pelajaran = '$th_pelajaran'");
		}
		
		$no = 1;
		while ($data = mysqli_fetch_array($query)) { 
			echo "<tr>";
			echo "<td>".$no++."</td>";
			echo "<td>".$data['th_pelajaran']."</td>";
			echo "<td class='bg-grey'><b>".$data['kelas']." " . $data['komp_keahlian'] ." " . $data['pkelas']."</b></td>";
			echo "<td>".$data['user_guru']."</td>";
			echo "<td><a href='admin?view=up_walikelas&up=".$data['id_walikelas']."' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>";
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