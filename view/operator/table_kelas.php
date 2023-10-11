<table id="example1" class="table table-sm table-bordered table-striped">
<thead>
	<tr>
		<th>ID Mapel</th>
		<th>Nama Mata Pelajaran</th>
		<th>Kelas</th>
		<th>Edit</th>
	</tr>		
</thead>
<tbody>
	<?php
	include "../../koneksi.php";
	$no = 1;
	if (isset($_POST['mapel'])) {
		$cari= $_POST['mapel'];
		$query = mysqli_query($koneksi, "select * from tb_mapel where kelas = '".$cari."' group by id_mapel asc");	
	}else{
		$query = mysqli_query($koneksi, "select * from tb_mapel group by id_mapel asc");
	}
	

	while ($data = mysqli_fetch_array($query)) { 
		echo "<tr>";
		echo "<td>".$data['id_mapel']."</td>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['kelas']."</td>";
		echo "<td><a href='' class='btn btn-primary'><i class='fas fa-edit'></i></a></td>";
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