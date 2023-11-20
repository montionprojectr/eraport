<?php 
if (isset($_GET['id_kelasmappil'])) {
	$id_kelasmappil = $_GET['id_kelasmappil'];
	$query = mysqli_query($koneksi, "select * from tb_kelasmappil where id_kelasmappil = '$id_kelasmappil'");
  $dt = mysqli_fetch_array($query);
?>
<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="#" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= '' . $_GET['page'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->
<div class="card">
	<div class="card-header bg-primary">
		<h3 class="card-title">CETAK NILAI KELAS MAPEL PILIHAN KE RAPORT</h3>
	</div>
	<div class="card-body">
		<form action="view/teacher/proses/proses_input_nilai.php" method="post">
		<div class="form-group" hidden>
      <input type="text" name="th_pelajaran" value="<?= $dt['th_pelajaran']; ?>">
      <input type="text" name="semester" value="<?= $dt['semester']; ?>">
    </div>
			<table class="table table-sm table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Nis</th>
						<th>Nama</th>
						<th>Asal Kelas</th>
						<th>CPM</th>
						<th>CPP</th>
						<th>Suma1</th>
						<th>Suma2</th>
						<th>Suma3</th>
						<th>Suma4</th>
						<th>ASTS</th>
						<th>ASAS</th>
						<th>SUMATIF</th>
						<th>RERATA</th>
						<th>Nilai Raport</th>
						<th>Hasil</th>		
					</tr>
				</thead>
				<tbody>
					<?php 
					$no=1;
					$siswa = mysqli_query($koneksi, "SELECT * FROM tb_ruangsiswa_mappil X INNER JOIN tb_siswa Y ON y.nis = x.nis where id_kelasmappil = '$id_kelasmappil'");
					while ($data = mysqli_fetch_array($siswa)) { 
						$sql = mysqli_query($koneksi, "SELECT th_pelajaran, nis, kelas, komp_keahlian, pkelas, kode_mapel, semester, IF(cpm = '' , '0', 'Ok') AS mcpm, cpm, IF(cpp = '' , '0', 'Ok') AS mcpp, cpp, Formatif, Sumatif_1, Sumatif_2, Sumatif_3, Sumatif_4, ASTS, ASAS, @sum := FORMAT((Sumatif_1 + Sumatif_2 + Sumatif_3 + Sumatif_4)/4,1) AS suma, @us := FORMAT((ASTS + ASAS)/2,1) AS rerata, FORMAT((@sum + @us)/2,1) AS nilai_raport FROM tb_penilaian WHERE kelas = 'XI' AND kode_mapel = 'mpp' AND th_pelajaran = '".$data['th_pelajaran']."' AND semester = '".$data['semester']."' and nis = '".$data['nis']."'");
             $d = mysqli_fetch_array($sql);
             if ($show = mysqli_num_rows($sql) > 0) {
             	if ($d['suma'] >= '75') {
                    $bgs = 'table-success';
                }else if($d['suma'] <= '75'){
                  $bgs = 'bg-danger';
                }
                if ($d['rerata'] >= '75') {
                  $bgre = 'table-success';
                }else if($d['rerata'] <= '75'){
                  $bgre = 'bg-danger';
                }
                if($d['nilai_raport'] >= '75'){
                  $bg_td = 'bg-green';
                }else if($d['nilai_raport'] <= '75'){
                  $bg_td = 'bg-danger';
                }

                if ($d['mcpm'] == 'Ok') {
                  $bgcpm = 'bg-green';
                }else if ($d['mcpm'] == '0') {
                  $bgcpm = 'bg-danger';
                }

                if ($d['mcpp'] == 'Ok') {
                  $bgcpp = 'bg-green';
                }else if($d['mcpp'] == '0'){
                  $bgcpp = 'bg-danger';
                }
            ?>
						<tr>
							<td><?= $no++; ?></td>
							<td><?= $data['nis']; ?>
								<input type="text" name="nis[]" class="form-control form-control-sm" value="<?= $data['nis']; ?>" hidden>
							</td>
							<td><?= $data['nama']; ?>
								<input type="text" name="nama[]" class="form-control form-control-sm w-100" value="<?= $data['nama']; ?>" hidden>
							</td>
							<td>
								<?= $d['kelas']." ".$d['komp_keahlian']." ".$d['pkelas']; ?>
								<div class="form-group" hidden>
								<input type="text" name="kelas[]" class="form-control form-control-sm w-100" value="<?= $d['kelas']; ?>">
								<input type="text" name="komp_keahlian[]" class="form-control form-control-sm w-100" value="<?= $d['komp_keahlian']; ?>">
								<input type="text" name="pkelas[]" class="form-control form-control-sm w-100" value="<?= $d['pkelas']; ?>">
								<input type="text" name="kode_mapel" class="form-control form-control-sm w-100" value="<?= $d['kode_mapel']; ?>">		
								</div>
							</td>
							<td class="<?= $bgcpm; ?>"><?= $d['mcpm'] ?>
								<input type="text" name="cpm" value="<?= $d['cpm']; ?>" hidden>
							</td>
							<td class="<?= $bgcpp; ?>"><?= $d['mcpp'] ?>
								<input type="text" name="cpp" value="<?= $d['cpp']; ?>" hidden>
							</td>
							<td><?= $d['Sumatif_1']; ?></td>
							<td><?= $d['Sumatif_2']; ?></td>
							<td><?= $d['Sumatif_3']; ?></td>
							<td><?= $d['Sumatif_4']; ?></td>
							<td><?= $d['ASTS']; ?></td>
							<td><?= $d['ASAS']; ?></td>
							<td class="<?= $bgs; ?>"><?= $d['suma']; ?></td>
							<td class="<?= $bgre; ?>"><?= $d['rerata']; ?></td>
							<td class="<?= $bg_td; ?>"><?= $d['nilai_raport']; ?>
								<input type="number" name="nilai_raport[]" class="form-control form-control-sm" value="<?= $d['nilai_raport']; ?>" hidden> 
							</td>
							 <?php 
	              if ($data['kode_mapel'] == 'pabp') {
	                $kodem = 'pabp';
	              }else if ($data['kode_mapel'] == 'pkn') {
	                $kodem = 'pkn';
	              }else if ($data['kode_mapel'] == 'b_indo') {
	                $kodem = 'b_indo';
	              }else if ($data['kode_mapel'] == 'sejarah') {
	                $kodem = 'sejarah';
	              }else if ($data['kode_mapel'] == 'seni') {
	                $kodem = 'seni';
	              }else if ($data['kode_mapel'] == 'b_jawa') {
	                $kodem = 'b_jawa';
	              }else if ($data['kode_mapel'] == 'mtk') {
	                $kodem = 'mtk';
	              }else if ($data['kode_mapel'] == 'b_ing') {
	                $kodem = 'b_ing';
	              }else if ($data['kode_mapel'] == 'iftk') {
	                $kodem = 'informatika';
	              }else if ($data['kode_mapel'] == 'ipas') {
	                $kodem = 'projek';
	              }else if ($data['kode_mapel'] == 'dd_tmi' or $data['kode_mapel'] == 'dd_oto' or $data['kode_mapel'] == 'dd_te' or $data['kode_mapel'] == 'dd_pplg') {
	                $kodem = 'dasar';
	              }else if ($data['kode_mapel'] == 'pjok') {
	                $kodem = 'penjas';
	              }else if ($data['kode_mapel'] == 'b_arab') {
	                $kodem = 'b_arab';
	              }else if ($data['kode_mapel'] == 'kons_tmi' or $data['kode_mapel'] == 'kons_tsm' or $data['kode_mapel'] == 'kons_tkr' or $data['kode_mapel'] == 'kons_te' or $data['kode_mapel'] == 'kons_pplg') {
	                $kodem = 'dasar';
	              }else if($data['kode_mapel'] == 'pkk'){
	                $kodem = 'projek';
	              }else if($data['kode_mapel'] == 'mpp'){
	                $kodem = 'mapel_pilihan';
	              }
	              $quleg = mysqli_query($koneksi, "SELECT nis, nama, kelas, jurusan, pemkelas, ".$kodem." as mapel FROM tb_leger WHERE kelas = '".$d['kelas']."' AND jurusan = '".$d['komp_keahlian']."' AND pemkelas = '".$d['pkelas']."' AND semester = '".$d['semester']."' AND th_pelajaran = '".$d['th_pelajaran']."' and nis = '".$d['nis']."'");
	              $da = mysqli_fetch_array($quleg);
	              if ($da['mapel'] >= '75') {
	                $bgh = 'bg-green';
	              }else if($da['mapel'] <= '75'){
	                $bgh = 'bg-danger';
	              }
	              ?>
							<td class="<?= $bgh; ?>"><?= $da['mapel'];  ?>
								<input type="text" name="nama_mapel" value="<?= $kodem; ?>" hidden>
							</td>
						</tr>
					<?php }
					}
					?>
				</tbody>
			</table>
			<div class="form-group">
				<a href="?page=buka_halaman_kelaspil&id_kelasmappil=<?= $id_kelasmappil; ?>" class="btn btn-primary">Kembali</a>
				<button type="submit" name="sinkron" class="btn btn-primary">SINKRONISASI NILAI KE RAPORT</button>
			</div>
		</form>
	</div>
</div>
<?php 
}
?>