<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb <?= $bg_breadcrumb;  ?>">
	    <li><a href="admin" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> > <?= ' Profil > ' . $_GET['view'] ?: 'Dashboard'; ?></li>
	  </ol>
  </div><!-- /.col -->
 
</div><!-- /.row -->

<?php 
$query = mysqli_query($koneksi, "select * from tb_sekolah");
$row = mysqli_fetch_array($query);
?>

<div class="card">
	<div class="card-header bg-danger">
		<h3 class="card-title">PROFIL SEKOLAH</h3>
	</div>
	<div class="card-body bg-dark">
		<form action="" method="post">
			<div class="row">
				<div class="col-sm-6">
					<!-- form-group -->
					<div class="form-group">
						<label>Nama Sekolah :</label>
						<input type="text" name="nama_sekolah" value="<?= $row['nama_sekolah'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>NPSN :</label>
						<input type="text" name="npsn" value="<?= $row['npsn'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>NSS :</label>
						<input type="text" name="nss" value="<?= $row['nss'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>Alamat :</label>
						<input type="text" name="alamat" value="<?= $row['alamat'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>Kelurahan :</label>
						<input type="text" name="kelurahan" value="<?= $row['kel'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>Kecamatan :</label>
						<input type="text" name="kecamatan" value="<?= $row['kec'] ?>" class="form-control bg-info">
					</div>
				</div>
				<div class="col-sm-6">
					<!-- form-group -->
					<div class="form-group">
						<label>Kabupaten :</label>
						<input type="text" name="kabupaten" value="<?= $row['kab'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>Provinsi :</label>
						<input type="text" name="provinsi" value="<?= $row['prov'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>Web Site :</label>
						<input type="text" name="website" value="<?= $row['web'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>Email :</label>
						<input type="text" name="email" value="<?= $row['email'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>Nama Kepala Sekolah :</label>
						<input type="text" name="nama_ks" value="<?= $row['nama_ks'] ?>" class="form-control bg-info">
					</div>
					<!-- form-group -->
					<div class="form-group">
						<label>NIPY :</label>
						<input type="text" name="nipy" value="<?= $row['nipy'] ?>" class="form-control bg-info">
					</div>	
				</div>
				<div class="col-sm-2">
					<div class="form-group">
						<button class="btn btn-primary" type="submit" name="simpan_perubahan"><i class="fas fa-save"></i> Simpan Perubahan</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php 

if(isset($_POST["simpan_perubahan"])){

 $nama_sekolah = $_POST["nama_sekolah"];
 $npsn = $_POST["npsn"];
 $nss = $_POST["nss"];
 $alamat = $_POST["alamat"];
 $kel = $_POST["kelurahan"];
 $kec = $_POST["kecamatan"];
 $kab = $_POST["kabupaten"];
 $prov = $_POST["provinsi"];
 $web = $_POST["website"];
 $email = $_POST["email"];
 $nama_ks = $_POST["nama_ks"];
 $nipy = $_POST["nipy"];


 
 $update = "UPDATE tb_sekolah SET  
 nama_sekolah='$nama_sekolah', 
 npsn='$npsn', 
 nss='$nss', 
 alamat='$alamat', 
 kel='$kel',
 kec='$kec', 
 kab='$kab', 
 prov='$prov', 
 web='$web', 
 email='$email', 
 nama_ks='$nama_ks', 
 nipy='$nipy' WHERE id_sekolah='1'";

 $up = mysqli_query($koneksi, $update);

	if ($up) {
		echo "<script>
		alert('DATA PERUBAHAN BERHASIL DISIMPAN');
		document.location.href = '?view=profil_sekolah';
		</script>";
	}else{
		echo "<script>
		alert('DATA PERUBAHAN GAGAL DISIMPAN');
		document.location.href = '?view=profil_sekolah';
		</script>";
	}
}

?>