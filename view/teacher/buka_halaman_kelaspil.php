<?php 
if (isset($_POST['semester'])) {
  $th_pelajaran = $_POST['th_pelajaran'];
  $semester = $_POST['semester'];
  $kode_mapel = $_POST['kode_mapel'];
  $kode_mapelsub = $_POST['kode_mapelsub'];
  $nipy = $_POST['nipy'];

  ?>
<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb">
      <li><a href="guru" class="pr-1"><i class="fas fa-home"></i> Home</a></li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span> Mata Pelajaran Pilihan</span>
      </li>
      <li class="active">
        <i class="fas fa-angle-right"></i> 
        <span> Th. Pelajaran : <?= $th_pelajaran; ?></span> 
      </li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span> Semester : <?= $semester; ?></span> 
      </li>
      <li>
        <i class="fas fa-angle-right"></i> 
        <span> Kode Mapel : <?= $kode_mapelsub; ?></span>
      </li>
    </ol>
  </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
  <?php 
  $query = mysqli_query($koneksi, "SELECT * FROM tb_guru_mapel X INNER JOIN tb_mapelsub Y ON y.kode_mapelsub = x.kode_mapelsub WHERE th_pelajaran = '$th_pelajaran' and nipy = '$nipy'");
  while ($data = mysqli_fetch_array($query)) { 
      $sql = mysqli_query($koneksi, "SELECT * FROM tb_kelasmappil where th_pelajaran = '".$data['th_pelajaran']."' and semester = '$semester' and nama_kelaspil = '".$data['komp']."'");
      while ($d =mysqli_fetch_array($sql)) {
       ?>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">KELAS : <?= $d['nama_kelaspil']; ?></h3>
        </div>
        <div class="card-body">
          
        </div>
      </div>
    </div>
  <?php } 
      }
  ?>
</div>
  <?php


}
?>