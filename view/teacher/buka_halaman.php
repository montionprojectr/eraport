<?php 
if (isset($_POST['semester'])) {
  $th_pelajaran = $_POST['th_pelajaran'];
	$semester = $_POST['semester'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $penilaian = $_POST['jenis_penilaian'];
  $nama_mapel = $_POST['nama_mapel'];
  $kode_mapel = $_POST['kode_mapel'];
  if ($semester) {
    $_SESSION['th_pelajaran'] = $th_pelajaran;
  	$_SESSION['semester'] = $semester;
    $_SESSION['penilaian'] = $penilaian;
    $_SESSION['kelas'] = $kelas;
    $_SESSION['komp_keahlian'] = $komp_keahlian;
    $_SESSION['pkelas'] = $pkelas;
    $_SESSION['nama_mapel'] = $nama_mapel;
    $_SESSION['kode_mapel'] = $kode_mapel;
  }
}

$class = $_SESSION['kelas']. " " .$_SESSION['komp_keahlian']." ".$_SESSION['pkelas'];
?>
<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span><?= $class;?></span>
      </li>
	    <li class="active">
        <i class="fas fa-angle-right"></i> 
        <span>Semester : <?= $_SESSION['semester']; ?></span> 
      </li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span><?= $_SESSION['penilaian']; ?></span> 
      </li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span><?= "Tahun Pelajaran ".$_SESSION['th_pelajaran']; ?></span>
      </li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<div class="row">
  <div class="col-sm-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <a href="?page=home" class="btn btn-outline-primary bg-primary"><i class="fas fa-angle-left"></i> Kembali</a> 
      </div>
      <select class="custom-select" name="type_test" id="type_test">
        <option>Pilih Penilaian</option>
        <?php 
        if ($_SESSION['penilaian'] == 'Formatif') { ?>
          <option value="formatif">Formatif</option>
        <?php }else if($_SESSION['penilaian'] == 'Sumatif'){ ?>
          <option value="sumatif">Sumatif</option>
        <?php }else if($_SESSION['penilaian'] == 'Sumatif_Akhir'){ ?>
          <option value="asts">Sumatif Tengah Semester</option>
          <option value="asas">Sumatif Akhir Semester</option>
        <?php }
        ?>
      </select>
    </div>
    <div class="form-group" hidden>
      <input type="text" id="th_pelajaran" value="<?= $_SESSION['th_pelajaran']; ?>">
      <input type="text" id="semester" value="<?= $_SESSION['semester']; ?>">
      <input type="text" id="kelas" value="<?= $_SESSION['kelas']; ?>">
      <input type="text" id="komp_keahlian" value="<?= $_SESSION['komp_keahlian']; ?>">
      <input type="text" id="pkelas" value="<?= $_SESSION['pkelas']; ?>">
      <input type="text" id="nama_mapel" value="<?= $nama_mapel; ?>">
      <input type="text" id="kode_mapel" value="<?= $kode_mapel; ?>">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12" id="view_penilaian">
    <!-- isi view_penilaian.php -->
  </div>
</div>