<?php 
if (isset($_POST['semester'])) {
	$semester = $_POST['semester'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  if ($semester) {
  	$_SESSION['semester'] = $semester;
    $_SESSION['kelas'] = $kelas;
    $_SESSION['komp_keahlian'] = $komp_keahlian;
    $_SESSION['pkelas'] = $pkelas;
  }
}
?>
<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
	    <li class="active"> <a href="guru"> > <i class="fas fa-folder"></i> <?= $_SESSION['kelas']." ". $_SESSION['komp_keahlian']." ".$_SESSION['pkelas']." > " ?> </a> <?= $_SESSION['semester']; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->