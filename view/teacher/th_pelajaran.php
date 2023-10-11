<?php
	include 'koneksi.php';

	echo "<option value=''>-- Pilih Th. Pelajaran-- </option>";

	$array = array('2023/2024' => '2023/2024' , '2024/2025' => '2024/2025', '2025/2026' => '2025/2026' );

	foreach ($array as $key => $value) {
		echo "<option>".$value."</option>";
	}
	// $query = mysqli_query($koneksi, "SELECT * FROM ekstrakurikuler WHERE id_ekstra = 'EKS001'");
	// while ($row = mysqli_fetch_array($query)) {
	// 	echo "<option value='" . $row['id_ekstra'] . "'>" . $row['kegiatan'] . "</option>";
	// }
?>