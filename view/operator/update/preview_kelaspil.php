<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<?php

if (isset($_POST['import-siswampp'])) {

$id_kelasmappil = $_POST['id_kelasmappil'];
$th_pelajaran = $_POST['th_pelajaran'];
$semester = $_POST['semester'];
$kode_mapel = $_POST['kode_mapel'];
$kode_mapelsub = $_POST['kode_mapelsub'];

$sql = mysqli_query($koneksi, "select * from tb_kelasmappil where id_kelasmappil = '$id_kelasmappil'");
$sub = mysqli_fetch_array($sql);

//kaitkan file genered maximal baris
	require_once('view/operator/id_max.php');
	//mengambil waktu sekarang
	$tgl_new = date('Ymd');
	//membuat nama_file xlsx
	$nama_file_new = 'siswa_pilihan' . $tgl_new . 'xlsx';

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
				<div class="card">
					<div class="card-header bg-danger">
						<h3 class="card-title">PREVIEW IMPORT DATA SISWA KELAS PILIHAN <?= $sub['nama_kelaspil']; ?></h3>
					</div>
					<div class="card-body">
						<form action="" method="post">
									<div class="form-group" hidden>
							<!-- Disini kita buat input type hidden yg isinya adalah nama file excel yg diupload
			        ini tujuannya agar ketika import, kita memilih file yang tepat (sesuai yg diupload) -->
			        		<input type='text' name='namafile' class="form-control" value='<?= $nama_file_new ?>'>
			        		<input type="text" name="id_kelasmappil" value="<?= $id_kelasmappil; ?>">
									</div>
									<table id="example1" class="table table-sm table-bordered table-striped">
										<thead>
											<tr>
												<th>NIS</th>
												<th>Nama</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$numrow = 1;
						        $kosong = 0;
						        foreach ($sheet as $row) {
						        	$nis = $row['A'];
						        	$nama = $row['B'];
						        	if($nis == '' && $nama == '') continue;

						        	if ($numrow > 1) {
						        		$nis_n = (!empty($nis))? "" : " style='background: #E07171;'";
						        		$nama_n = (!empty($nama))? "" : " style='background: #E07171;'";
						        		// Jika salah satu data ada yang kosong
						                if ($nis == '' or $nama == '') {
						                    $kosong++; // Tambah 1 variabel $kosong
						                } ?>
						                	<tr>
						                		<td <?= $nis_n; ?>>
						                			<input type="text" name="nis[]" class="form-control" value="<?= $nis; ?>" readonly>
						                		</td>
						                		<td <?= $nama_n; ?>>
						                			<input type="text" name="nama[]" class="form-control" value="<?= $nama; ?>">
						                		</td>
						                	</tr>
						   <?php }
						   				$numrow++; // Tambah 1 setiap kali looping
						        }
										?>
										</tbody>
									</table>
									<!-- Buat sebuah tombol untuk mengimport data ke database -->
			            <button type='submit' name='import' class='btn btn-primary'>Import</button>
			            <a href='?view=data_siswa_pilihan&id=<?= $id_kelasmappil; ?>' class='btn btn-primary'>Cencel</a>
						</form>
					</div>
				</div>
					
				<?php 
   }else { // Jika file yang diupload bukan File Excel 2007 (.xlsx)
        // Munculkan pesan validasi
        echo "<div class='card card-header bg-warning' style='color: red;margin-bottom: 10px;'>
                <h3 class='card-title text-danger'>Hanya File Excel 2007 (.xlsx) yang diperbolehkan <a href='?view=data_siswa_pilihan&id=".$id_kelasmappil."'>Kembali</a><h3>

            </div>";
    }

}else if(isset($_POST['import'])){
	$namafile = $_POST['namafile'];
	$id_kelasmappil = $_POST['id_kelasmappil'];
	$nis = $_POST['nis'];
	$nama = $_POST['nama'];

	$count = count($nis);
	$query = mysqli_query($koneksi, "select * from tb_kelasmappil where id_kelasmappil = '$id_kelasmappil'");
	$dt = mysqli_fetch_array($query);

	for ($i=0; $i < $count ; $i++) { 
		$cek = mysqli_query($koneksi, "select * from tb_ruangsiswa_mappil where id_kelasmappil = '$id_kelasmappil'  and th_pelajaran = '".$dt['th_pelajaran']."' and semester = '".$dt['semester']."' and kode_mapelsub = '".$dt['kode_mapelsub']."' and nis = '$nis[$i]'");
		$sqlc = mysqli_num_rows($cek);
		if ($sqlc > 0 ) {
			echo "<script>
			alert('Data siswa sudah ada');
			document.location.href = '?view=data_siswa_pilihan&id=".$id_kelasmappil."';
			</script>";
		}else{
			$list = mysqli_query($koneksi, "select x.nis, nama, x.kelas, x.jurusan, x.pemkelas from tb_siswa_kelas x inner join tb_siswa y on y.nis = x.nis where x.th_pelajaran = '".$dt['th_pelajaran']."' and x.nis = '$nis[$i]' and x.kelas = 'XI' group by x.nis asc");
			while ($in = mysqli_fetch_array($list)) {
				$inst = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('".$dt['th_pelajaran']."','".$in['nis']."','".$in['kelas']."','".$in['jurusan']."','".$in['pemkelas']."','".$dt['kode_mapel']."','".$dt['semester']."')");
			}

			$insert = mysqli_query($koneksi, "insert into tb_ruangsiswa_mappil values('', '".$dt['id_kelasmappil']."','".$dt['th_pelajaran']."','".$dt['semester']."','".$dt['kode_mapel']."','".$dt['kode_mapelsub']."','$nis[$i]')");

			if ($insert) {
				unlink('view/operator/file/' . $namafile);
				echo "<script>
				alert('DATA SISWA BERHASIL DIIMPORT');
				document.location.href = '?view=data_siswa_pilihan&id=".$id_kelasmappil."';
				</script>";
			}else{
				echo "<script>
				alert('DATA SISWA GAGAL DIIMPORT');
				document.location.href = '?view=data_siswa_pilihan&id=".$id_kelasmappil."';
				</script>";
			}

		}

	}

}
?>