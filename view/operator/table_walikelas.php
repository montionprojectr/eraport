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
			$query = mysqli_query($koneksi, "select id_walikelas, th_pelajaran, concat_ws(' ', kelas, komp_keahlian, pkelas) as class, y.nipy, nama_lengkap from tb_walikelas x inner join tb_users y on y.nipy = x.nipy where th_pelajaran = '$th_pelajaran' group by id_walikelas");
		}
		
		$no = 1;
		while ($data = mysqli_fetch_array($query)) { 
			echo "<tr>";
			echo "<td>".$no++."</td>";
			echo "<td>".$data['th_pelajaran']."</td>";
			echo "<td class='bg-grey'><b>".$data['class']."</b></td>";
			echo "<td>".$data['nama_lengkap']."</td>";
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