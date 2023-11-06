<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<?php 
$query = mysqli_query($koneksi, "select * from tb_mapelsub where kode_mapel = 'mpp' and kode_mapelsub = '".$_GET['kode_mapelsub']."'");
$data = mysqli_fetch_array($query);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">KELAS <a href=""><?= $data['nama_submapel'] ?></a></h3>
			</div>
			<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<a href="?view=mapel_pilihan" class="btn btn-outline-danger">Kembali</a>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            Buat kelas baru
          </button>
        </div>
				<div class="col-sm-6">
					
				</div>
			</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">BUAT KELAS BARU MAPEL : <?= $data['nama_submapel']; ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="" method="post">
        	<div class="form-group">
        		<label>Th. Pelajaran</label>
        		<select class="form-control-sm select2" style="width:100%;" name="th_pelajaran">
        			<option value="">--Pilih Th. Pelajaran--</option>
        			<option value="2023/2024">2023/2024</option>
        			<option value="2024/2025">2024/2025</option>
        			<option value="2025/2026">2025/2026</option>
        		</select>
        	</div>
        	<div class="form-group">
        		<select class="form-control-sm" style="width:100%;" name="semester">
        			<option value="">--Pilih Semester--</option>
        			<option value="Ganjil">Ganjil</option>
        			<option value="Genap">Genap</option>
        		</select>
        	</div>
        	<div class="form-group" hidden>
        		<input type="text" name="kode_mapelsub" value="<?= $data['kode_mapelsub']; ?>">
        		<input type="text" name="kode_mapel" value="<?= $data['kode_mapel']; ?>">
        	</div>
					<div class="form-group">
						<label>Masukan Nama Kelas</label>
						<div class="input-group control-group after-add-more">
	          <input type="text" name="nama_kelaspil[]" class="form-control" placeholder="Nama kelas" required>
	          <div class="input-group-btn"> 
	            <button class="btn btn-success add-more" type="button"><i class="fas fa-plus"></i> Tamabah</button>
	          </div>
	        </div>
					</div>
					<div class="action-buttons">
			        <button type="submit" name="buat" class="btn btn-primary">Buat</button>
			    </div>
				</form>	
				<!-- Copy Fields -->
        <div class="copy" hidden>
          <div class="control-group input-group" style="margin-top:10px">
            <input type="text" name="nama_kelaspil[]" class="form-control" placeholder="Nama kelas">
            <div class="input-group-btn"> 
              <button class="btn btn-danger remove" type="button"><i class="fas fa-trash"></i> Hapus</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php 
if (isset($_POST['buat'])) {
	$th_pelajaran = $_POST['th_pelajaran'];
	$semester = $_POST['semester'];
	$kode_mapelsub = $_POST['kode_mapelsub'];
	$kode_mapel = $_POST['kode_mapel'];
	$nama_kelas = $_POST['nama_kelaspil'];
	
		$con = count($nama_kelas);
		for ($i=0; $i < $con; $i++) { 

			$ubah_namekelas = strtoupper($nama_kelas[$i]);
			$cek = mysqli_query($koneksi, "select * from tb_kelasmappil where th_pelajaran = '".$th_pelajaran."' and semester = '".$semester."' and nama_kelaspil = '".$ubah_namekelas."'");
			$row = mysqli_num_rows($cek);
			if ($row > 0) {
				echo "<script>
				alert('Data Sudah ada');
				document.location.href = '?view=kelas_mapelpilihan&kode_mapelsub=".$kode_mapelsub."';
				</script>";
			}else{

				if ($th_pelajaran == '' && $ubah_namekelas[$i] == $ubah_namekelas) {
				echo "<script>
				alert('Th. Pelajaran BELUM DI PILIH');
				document.location.href = '?view=kelas_mapelpilihan&kode_mapelsub=".$kode_mapelsub."';
				</script>";
				}else if($semester == ''){
					echo "<script>
				alert('Semester BELUM DI PILIH');
				document.location.href = '?view=kelas_mapelpilihan&kode_mapelsub=".$kode_mapelsub."';
				</script>";
				}else{
					$insert = mysqli_query($koneksi," insert into tb_kelasmappil(id_kelasmappil, th_pelajaran, semester,kode_mapelsub, kode_mapel, nama_kelaspil) values('','$th_pelajaran','$semester','$kode_mapelsub','$kode_mapel','$ubah_namekelas')");
					if ($insert) {
						echo "<script>
						alert('KELAS BERHASIL DIBUAT');
						document.location.href = '?view=mapel_pilihan';
						</script>";
					}else{
						echo "<script>
						alert('KELAS GAGAL DIBUAT');
						document.location.href = '?view=kelas_mapelpilihan&kode_mapelsub=".$kode_mapelsub."';
						</script>";
					}
				}

			}
			
		}


}
?>