<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['page'] ?: 'Dashboard'; ?></li>
	    <li> > Th. Pelajaran: <?= $_GET['th']." > Kelas: ".$_GET['kelas']." ".$_GET['jrs']." ".$_GET['pkelas']." > Kode Mapel: ".$_GET['kodmapel']; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<?php 
$query = mysqli_query($koneksi, "select * from tb_mapel where kode_mapel = '".$_GET['kodmapel']."' ");
$data = mysqli_fetch_array($query);
?>
<div class="card">
	<div class="card-header bg-warning">
		<h3 class="card-title">IMPORT PENILAIAN Mata Pelajaran : <b><u><?= $data['nama_mapel']; ?></ul></b></h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6 bg-dark card elevation-3 p-3">
				<div class="form-group">
					<a href="view/operator/file/export_penilaian.php?th=<?= $_GET['th']."&kelas=".$_GET['kelas']."&jrs=".$_GET['jrs']."&pkelas=".$_GET['pkelas']."&kodmapel=".$_GET['kodmapel']; ?>" target="_blank">Download Template Nilai</a>
				</div>
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Pilih Semester</label>
						<select class="form-control-sm select2" style="width:100%;" name="semester">
							<option value="kosong">-- Pilihan Semester--</option>
							<option value="Ganjil">Ganjil</option>
							<option value="Genap">Genap</option>
						</select>
					</div>
					<div class="form-group" hidden>
						<input type="text" name="th_pelajaran" value="<?= $_GET['th']; ?>">
						<input type="text" name="kelas" value="<?= $_GET['kelas']; ?>">
						<input type="text" name="komp_keahlian" value="<?= $_GET['jrs']; ?>">
						<input type="text" name="pkelas" value="<?= $_GET['pkelas']; ?>">
						<input type="text" name="kode_mapel" value="<?= $_GET['kodmapel']; ?>">
					</div>
					<div class="form-group">
						<label>Ambil file</label>
						<input type="file" name="file" class="form-control">
					</div>
					<div class="form-group">
						<a href="?page=home" class="btn btn-primary"><i class="fas fa-angle-left"></i> Kembali</a>
						<input type="submit" name="view_simpan_import" class="btn btn-primary" value="Mulai Import">
					</div>
				</form>
			</div>
			<!-- <div class="col-sm-6 bg-secondary card elevation-3">
				<form action="" method="post">
					<div class="form-group">
						<label>Semester</label>
						<select class="form-control-sm select2"style="width:100%;">
							<option value="Genap">Genap</option>
						</select>
					</div>
					<div class="form-group">
						<label>Ambil file</label>
						<input type="file" name="filenilai" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="simpan_genap" class="btn btn-primary">
					</div>
				</form>
			</div> -->
		</div>
	</div>
</div>
<?php 
if (isset($_POST['view_simpan_import'])) {
	$th_pelajaran = $_POST['th_pelajaran'];
	$kelas = $_POST['kelas'];
	$komp_keahlian = $_POST['komp_keahlian'];
	$pkelas = $_POST['pkelas'];
	$kode_mapel = $_POST['kode_mapel'];
	$semester = $_POST['semester'];

	//kaitkan file genered maximal baris
	// require_once('view/operator/id_max.php');
	//mengambil waktu sekarang
	$tgl_new = date('Ymd');
	//membuat nama_file xlsx
	$nama_file_new = 'data_penilaian' . $tgl_new . 'xls';

	//cek apakah nama file tersebut ada? jika ada di hapus atau unlink path
	if (is_file('view/operator/file/' . $nama_file_new)) 
		unlink('view/operator/file/' . $nama_file_new);
		// Ambil ekstensi filenya apa
	 $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $tmp_file = $_FILES['file']['tmp_name'];

    if ($ext == 'xlsx') {
    	 move_uploaded_file($tmp_file, 'view/operator/file/' . $nama_file_new);
    	 $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load('view/operator/file/' . $nama_file_new); // Load file yang tadi diupload ke folder tmp
        $sheet = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


				?>
			<form action="" method="post">
				<div class="card">
					<div class="card-header bg-warning">
						<h3 class="card-title">PRIVIEW BEFORE IMPOT EXCEL</h3>
					</div>
					<div class="card-body">
						<div class="form-group" hidden>
							<input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
							<input type="text" name="kelas" value="<?= $kelas; ?>">
							<input type="text" name="komp_keahlian" value="<?= $komp_keahlian; ?>">
							<input type="text" name="pkelas" value="<?= $pkelas; ?>">
							<input type="text" name="kode_mapel" value="<?= $kode_mapel; ?>">
							<input type="text" name="semester" value="<?= $semester; ?>">
						</div>
						<div class="form-group" hidden>
				<!-- Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
        ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload) -->
        		<input type='text' name='namafile' class="form-control" value='<?= $nama_file_new ?>'>
						</div>
						<table class="table table-sm table-bordered table-striped">
							<thead>
								<tr>
									<th width="100px">NIS</th>
									<th width="250px">NAMA</th>
									<th width="100px">KELAS</th>
									<th width="50px">Formatif</th>
									<th width="50px">Sumatif_1</th>
									<th width="50px">Sumatif_2</th>
									<th width="50px">Sumatif_3</th>
									<th width="50px">Sumatif_4</th>
									<th width="70px">ASTS</th>
									<th width="70px">ASAS</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$numrow = 1;
			        $kosong = 0;
			        foreach ($sheet as $row) {
			        	$nis = $row['A'];
			        	$nama = $row['B'];
			        	$kelas = $row['C'];
			        	$formatif = $row['D'];
			        	$sumatif_1 = $row['E'];
			        	$sumatif_2 = $row['F'];
			        	$sumatif_3 = $row['G'];
			        	$sumatif_4 = $row['H'];
			        	$asts = $row['I'];
			        	$asas = $row['J'];
			        	if($nis == '' && $nama == '' && $kelas == '' && $formatif == '' && $sumatif_1 == '' && $sumatif_2 == '' && $sumatif_3 == '' && $sumatif_4 == '' && $asts == '' && $asas == '') continue;

			        	if ($numrow > 1) {
			        		$nis_n = (!empty($nis))? "" : " style='background: #E07171;'";
			        		$nama_n = (!empty($nama))? "" : " style='background: #E07171;'";
			        		$kelas_n = (!empty($kelas))? "" : " style='background: #E07171;'";
			        		$formatif_n = (!empty($formatif))? "" : " style='background: #E07171;'";
			        		$sumatif1_n = (!empty($sumatif_1))? "" : " style='background: #E07171;'";
			        		$sumatif2_n = (!empty($sumatif_2))? "" : " style='background: #E07171;'";
			        		$sumatif3_n = (!empty($sumatif_3))? "" : " style='background: #E07171;'";
			        		$sumatif4_n = (!empty($sumatif_4))? "" : " style='background: #E07171;'";
			        		$asts_n = (!empty($asts))? "" : " style='background: #E07171;'";
			        		$asas_n = (!empty($asas))? "" : " style='background: #E07171;'";
			        		// Jika salah satu data ada yang kosong
			                if ($nis == '' or $nama == '' or $kelas == '' or $formatif == '' or $sumatif_1 == '' or $sumatif_2 == '' or $sumatif_3 == '' or $sumatif_4 == '' or $asts == '' or $asas == '') {
			                    $kosong++; // Tambah 1 variabel $kosong
			                } ?>
			                	<tr>
			                		<td <?= $nis_n; ?>>
			                			<input type="text" name="nis[]" class="form-control" value="<?= $nis; ?>" readonly>
			                		</td>
			                		<td <?= $nama_n; ?>>
			                			<input type="text" name="nama[]" class="form-control" value="<?= $nama; ?>" readonly>
			                		</td>
			                		<td <?= $kelas_n; ?>>
			                			<input type="text" name="class[]" class="form-control" value="<?= $kelas; ?>" readonly>
			                		</td>
			                		<td <?= $formatif_n ?>>
			                			<input type="number" name="formatif[]" class="form-control form-control-sm" value="<?= $formatif; ?>">
			                		</td>
			                		<td <?= $sumatif1_n; ?>>
			                			<input type="number" name="sumatif_1[]" class="form-control form-control-sm" value="<?= $sumatif_1; ?>">
			                		</td>
			                		<td <?= $sumatif2_n; ?>>
			                			<input type="number" name="sumatif_2[]" class="form-control form-control-sm" value="<?= $sumatif_2; ?>">
			                		</td>
			                		<td <?= $sumatif3_n; ?>>
			                			<input type="number" name="sumatif_3[]" class="form-control form-control-sm" value="<?= $sumatif_3; ?>">
			                		</td>
			                		<td <?= $sumatif4_n; ?>>
			                			<input type="number" name="sumatif_4[]" class="form-control form-control-sm" value="<?= $sumatif_4; ?>">
			                		</td>
			                		<td <?= $asts_n; ?>>
			                			<input type="number" name="asts[]" class="form-control form-control-sm" value="<?= $asts; ?>">
			                		</td>
			                		<td <?= $asas_n; ?>>
			                			<input type="number" name="asas[]" class="form-control form-control-sm" value="<?= $asas; ?>">
			                		</td>
			                	</tr>
			   <?php }
			   				$numrow++; // Tambah 1 setiap kali looping
			        }
							?>
							</tbody>
						</table>
						<div class="form-group">
							<!-- Buat sebuah tombol untuk mengimport data ke database -->
            <button type='submit' name='simpan_import' class='btn btn-primary'>Import</button>
            <a href='?view=guru' class='btn btn-primary'>Cencel</a>		
						</div>
					</div>
				</div>
			</form>
				<?php
    }else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
        // Munculkan pesan validasi
        echo "<div class='card card-header bg-warning' style='color: red;margin-bottom: 10px;'>
                <h3 class='card-title text-danger'>Hanya File Excel 2007 (.xlsx) yang diperbolehkan <a href='?view=guru'>Kembali</a><h3>

            </div>";
    }
	
}else if(isset($_POST['simpan_import'])){
	$namafile = $_POST['namafile'];
	$th_pelajaran = $_POST['th_pelajaran'];
	$kelas = $_POST['kelas'];
	$komp_keahlian = $_POST['komp_keahlian'];
	$pkelas = $_POST['pkelas'];
	$kode_mapel = $_POST['kode_mapel'];
	$semester = $_POST['semester'];
	$nis = $_POST['nis'];
	$formatif = $_POST['formatif'];
	$sumatif_1 = $_POST['sumatif_1'];
	$sumatif_2 = $_POST['sumatif_2'];
	$sumatif_3 = $_POST['sumatif_3'];
	$sumatif_4 = $_POST['sumatif_4'];
	$asts = $_POST['asts'];
	$asas = $_POST['asas'];
	$namafile = $_POST['namafile'];

	$count = count($nis);
	for ($i=0; $i < $count ; $i++) { 

		$query = mysqli_query($koneksi, "update tb_penilaian set Formatif = '$formatif[$i]', Sumatif_1 = '$sumatif_1[$i]', Sumatif_2 = '$sumatif_1[$i]', Sumatif_3 = '$sumatif_3[$i]', Sumatif_4 = '$sumatif_4[$i]', ASTS = '$asts[$i]', ASAS = '$asas[$i]' where nis = '$nis[$i]'and th_pelajaran = '$th_pelajaran' and kelas = '$kelas' and komp_keahlian = '$komp_keahlian' and pkelas = '$pkelas' and kode_mapel = '$kode_mapel' and semester = '$semester'");	
	}

	if ($query) {
		unlink('view/operator/file/' . $namafile);
		echo "<script>
		alert('DATA BERHASIL DIIMPORT');
		document.location.href = '';
		</script>";
	}else{
		echo "<script>
		alert('DATA GAGAL DIIMPORT');
		document.location.href = '';
		</script>";
	}

}
?>