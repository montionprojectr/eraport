<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<?php 
if (isset($_GET['kelas']) && isset($_GET['jurusan']) && isset($_GET['pkelas']) && isset($_GET['thpel'])) {
	$kelas = $_GET['kelas'];
	$jurusan = $_GET['jurusan'];
	$pkelas = $_GET['pkelas'];
	$th_pelajaran = $_GET['thpel'];
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card collapsed-card">
			<div class="card-header bg-danger">
				<h3 class="card-title">UPDATE DATA SISWA</h3>
				<div class="card-tools">
		      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
		      </button>
		    </div>
			</div>
			<div class="card-body">
				<form action="?view=data_kelas" method="post">
					<div class="form-group" hidden>
						<input type="text" name="kelas" value="<?= $kelas; ?>">
						<input type="text" name="jurusan" value="<?= $jurusan; ?>">
						<input type="text" name="pkelas" value="<?= $pkelas; ?>">
						<input type="text" name="th_pelajaran" value="<?= $th_pelajaran; ?>">
					</div>
					<div class="form-group">
					<div class="select2-purple">
						<label>Pilih Kelas</label>
				      <select class="form-control-sm select2" multiple="multiple" data-placeholder="Select a Class" data-dropdown-css-class="select2-purple" style="width: 100%;" name="nis[]" required>
				      	<?php $no=1;
				      	$select = mysqli_query($koneksi, "select x.id, x.nis, x.kelas, x.jurusan, IF(x.pemkelas = '', '0','Ok') AS class, x.th_pelajaran, nama from tb_siswa_kelas x inner join tb_siswa y on y.nis = x.nis where x.kelas = '$kelas' and x.jurusan = '$jurusan' and x.th_pelajaran = '$th_pelajaran'");
				      	while ($d = mysqli_fetch_array($select)) { 
				      		if ($d['class'] == '0') {
				      			?>
						      		<option value="<?= $d['nis']; ?>"><?= $no++.", ".$d['nis'].", ".$d['nama']; ?></option>
						      	<?php		
				      		}else{

				      		}
				      	}
				      	?>
				      </select>		
					</div>
			    </div>
			    <div class="form-group">
			    	<button type="submit" name="simpan_datasiswa" class="btn btn-primary">SIMPAN DATA SISWA</button>
			    </div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-success">
				<h3 class="card-title"> DAFTAR SISWA Kelas <?= $kelas." ".$jurusan." ".$pkelas; ?>, Th. Pelajaran : <?= $th_pelajaran; ?></h3>
			</div>
			<div class="card-body">
				<table id="example1" class="table table-sm table-bordered table-striped">
					<thead>
						<tr>
							<th>NO</th>
							<th>NIS</th>
							<th>NAMA</th>
							<th>ALAMAT</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						$sql = mysqli_query($koneksi, "SELECT x.id, x.nis, x.kelas, x.jurusan, x.pemkelas, x.th_pelajaran, nama, alamat_siswa FROM tb_siswa_kelas X INNER JOIN tb_siswa Y ON y.nis = x.nis where x.kelas = '$kelas' and x.jurusan = '$jurusan' and x.pemkelas = '$pkelas' and x.th_pelajaran = '$th_pelajaran'");
						while ($data = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $data['nis']; ?></td>
								<td><?= $data['nama']; ?></td>
								<td><?= $data['alamat_siswa']; ?></td>
							</tr>
						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php }else if (isset($_POST['simpan_datasiswa'])) {
	$kelas = $_POST['kelas'];
	$jurusan = $_POST['jurusan'];
	$pkelas = $_POST['pkelas'];
	$th_pelajaran = $_POST['th_pelajaran'];
	$nis = $_POST['nis'];

	$count = count($nis);
	for ($i=0; $i < $count; $i++) { 
		$update = mysqli_query($koneksi, "update tb_siswa_kelas set pemkelas = '$pkelas' where nis = '$nis[$i]' and kelas = '$kelas' and jurusan = '$jurusan' and th_pelajaran = '$th_pelajaran'");

		$selec = mysqli_query($koneksi, "SELECT x.id, x.nis, x.kelas, x.jurusan, x.pemkelas, x.th_pelajaran, nama, alamat_siswa FROM tb_siswa_kelas X INNER JOIN tb_siswa Y ON y.nis = x.nis WHERE x.nis = '$nis[$i]' and x.kelas = '$kelas' AND x.jurusan = '$jurusan' AND x.pemkelas = '$pkelas' AND x.th_pelajaran = '$th_pelajaran'");
		$data = mysqli_fetch_array($selec);

		// triger insert tb_capaian dan tb_leger berdasarkan semester ganjil dan genap
		$sqlsm = mysqli_query($koneksi, "select * from tb_semester");
        while ($sm = mysqli_fetch_array($sqlsm)) {
        		//cek tb_capaian
        		$cekcp = mysqli_query($koneksi, "select * from tb_capaian where nis = '$nis[$i]' and semester = '".$sm['semester']."' and th_pelajaran = '$th_pelajaran'");
        		if ($ccp = mysqli_num_rows($cekcp) > 0) {
        			
        		}else{
        			//insert into tb_capaian berdasarkan semester ganjil dan genap
            $inser = mysqli_query($koneksi, "insert into tb_capaian(nis, semester, th_pelajaran) values('$nis[$i]','".$sm['semester']."','$th_pelajaran')");
        		}
        		//cek tb_leger
        		$cekleger = mysqli_query($koneksi, "select * from tb_leger where nis = '$nis[$i]' and kelas = '$kelas' and jurusan = '$jurusan' and pemkelas = '$pkelas' and th_pelajaran = '$th_pelajaran' and semester = '".$sm['semester']."'");

        		if ($ccl = mysqli_num_rows($cekleger) > 0) {
        			
        		}else{
        			//insert into tb_leger berdasarkan semester ganjil dan genap
            $leg = mysqli_query($koneksi, "insert into tb_leger(nis, nama, kelas, jurusan, pemkelas, th_pelajaran, semester) values('$nis[$i]','".$data['nama']."','$kelas','$jurusan','$pkelas','$th_pelajaran','".$sm['semester']."')");
        		}

        }

        if ($kelas == 'X') {
                
           $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel not like '%dd%' group by kode_mapel, semester");
           $da = mysqli_num_rows($sqla);
           while ($dt = mysqli_fetch_array($sqla)) {
                $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
           }

           //1. kondisi jika jurusan PPLG
           if ($jurusan == 'PPLG') {
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_pplg' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                        $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }
                      
            //2. kondisi jika jurusan TE
           }else if ($jurusan == 'TE') {
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_te' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                        $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");

                   }

            //3. kondisi jika jurusan TSM
           }else if ($jurusan == 'TSM') {
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_oto' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                       $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }

            //4. kondisi jika jurusan TKR
           }else if ($jurusan == 'TKR') {
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_oto' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                       $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }

            //5. kondisi jika jurusan TMI
           }else if ($jurusan == 'TMI') {
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'X' and kode_mapel = 'dd_tmi' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                       $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }

           }/*tutup kondisi $jurusan*/
        
        /*Tutup if($kelas == 'X')*/
        }else if($kelas == 'XI'){
            $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel not like '%kons%' and kode_mapel not like 'mpp' group by kode_mapel, semester");
            $da = mysqli_num_rows($sqla);
               while ($dt = mysqli_fetch_array($sqla)) {
                    $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
               }

            /*membuat kondisi jika $jurusan == PPLG */
            if ($jurusan == 'PPLG') {
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_pplg' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                        $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }
                
            }else if($jurusan == 'TE'){
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_te' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                        $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }
            }else if($jurusan == 'TSM'){
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_tsm' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                        $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }
            }else if($jurusan == 'TKR'){
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_tkr' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                        $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }
            }else if($jurusan == 'TMI'){
                $sqla = mysqli_query($koneksi, "select kelas, kode_mapel, semester from tb_mapel inner join tb_semester where kelas = 'XI' and kode_mapel = 'kons_tmi' group by semester");
                   $da = mysqli_num_rows($sqla);
                   while ($dt = mysqli_fetch_array($sqla)) {
                        $insert = mysqli_query($koneksi, "insert into tb_penilaian(th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester) values('$th_pelajaran','$nis[$i]', '$kelas','$jurusan','$pkelas','".$dt['kode_mapel']."','".$dt['semester']."')");
                   }
            }

        }else if($kelas == 'XII'){
        		
        }/*Tutup else if($kelas == 'XII')*/

	} /*tutup for count($nis).*/

	if ($update && $inser && $insert && $leg) {
		echo "<script>
		alert('DATA KELAS BERHASIL DIPERBARUI');
		document.location.href = '?view=data_kelas&kelas=".$kelas."&jurusan=".$jurusan."&pkelas=".$pkelas."&thpel=".$th_pelajaran."';
		</script>";
	}else{
		echo "<script>
		alert('DATA KELAS GAGAL DIPERBARUI');
		document.location.href = '?view=data_kelas&kelas=".$kelas."&jurusan=".$jurusan."&pkelas=".$pkelas."&thpel=".$th_pelajaran."';
		</script>";
	}
} 
?>