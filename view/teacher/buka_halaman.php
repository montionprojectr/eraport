<?php 
if (isset($_POST['semester'])) {
	$semester = $_POST['semester'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $penilaian = $_POST['penilaian'];
  if ($semester) {
  	$_SESSION['semester'] = $semester;
    $_SESSION['penilaian'] = $penilaian;
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
      <li><a href=""><i class="fas fa-angle-right"></i> <?= $_SESSION['kelas']; ?></a></li>
      <li><a href=""><i class="fas fa-angle-right"></i> <?= $_SESSION['komp_keahlian']; ?></a></li>
      <li><a href=""><i class="fa-angle-right"></i> <?= $_SESSION['pkelas']; ?></a></li>
	    <li class="active"> <a href="guru"> <i class="fas fa-angle-right"></i> <?= $_SESSION['kelas']." ". $_SESSION['komp_keahlian']." ".$_SESSION['pkelas']." > " ?> </a> <?= $_SESSION['semester']; ?></li>
      <li> > <?= $_SESSION['penilaian']; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->