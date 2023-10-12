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

$class = $_SESSION['kelas']. " " .$_SESSION['komp_keahlian']." ".$_SESSION['pkelas'];
?>
<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
	    <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <?= $class;?>
      </li>
	    <li class="active"><i class="fas fa-angle-right"></i> <?= $_SESSION['semester']; ?></li>
      <li><i class="fas fa-angle-right"></i> <?= $_SESSION['penilaian']; ?></li>
	  </ol>
  </div><!-- /.col -->
</div><!-- /.row -->

<!-- Penilaian -->
<div class="card">
  <div class="card-header bg-warning">
    <h3 class="card-title"><b><?= $class; ?></b></h3>
  </div>
  <div class="card-body">
    
  </div>
</div>