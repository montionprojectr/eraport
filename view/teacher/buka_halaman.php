<?php 
if (isset($_POST['semester'])) {
  $th_pelajaran = $_POST['th_pelajaran'];
	$semester = $_POST['semester'];
  $kelas = $_POST['kelas'];
  $komp_keahlian = $_POST['komp_keahlian'];
  $pkelas = $_POST['pkelas'];
  $penilaian = $_POST['penilaian'];
  if ($semester) {
    $_SESSION['th_pelajaran'] = $th_pelajaran;
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
        <span><?= $class;?></span>
      </li>
	    <li class="active">
        <i class="fas fa-angle-right"></i> 
        <span><?= $_SESSION['semester']; ?></span> 
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
      <select class="custom-select" name="penilaian" id="inputGroupSelect03">
        <?php 
        if ($_SESSION['penilaian'] == 'Formatif') { ?>
          <option>ULangan Harian 1</option>
          <option>ULangan Harian 2</option>
        <?php }else if($_SESSION['penilaian'] == 'Sumatif'){ ?>
          <option>Ulangan Tengah Semester 1</option>
          <option>ULangan Akhir Semester 1</option>
          <option>ULangan Tengah Semester 2</option>
          <option>ULangan Akhir Semester 2</option>
        <?php }else if($_SESSION['penilaian'] == 'Sumatif_Akhir'){ ?>
          <option>PTS</option>
          <option>Assesment Sumatif Akhir</option>
        <?php }
        ?>
      </select>
    </div>
  </div>
</div>

<!-- Penilaian -->
<div class="card" hidden>
  <div class="card-header bg-warning">
    <h3 class="card-title"><b><?= $class; ?></b></h3>
  </div>
  <div class="card-body">
  <form>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label>Input Capaian 1</label>
          <textarea class="form-control"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label>Input Capaian 2</label>
          <textarea class="form-control"></textarea>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="card card-body p-0">
          <table class="table table-striped">
            <thead class="bg-primary">
              <tr>
                <th style="width: 10px">No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th style="width: 40px">Nilai</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no =1;
              $array = array('3210001' => 'Muhammad', '3210002' => 'Irfa', '3210003' => 'Nufaiyal', '3210004' => 'Kharish', '3210005' => 'S.Kom');
              foreach ($array as $key => $val) { ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $key ?></td>
                  <td><?= $val ?></td>
                  <td>
                    <div class="form-group">
                      <input type="number" name="nilai" class="form-control-md">    
                    </div>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </form>
  </div>
</div>