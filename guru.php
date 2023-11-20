<?php 
session_start();
include "koneksi.php";
// Load file autoload.php
require 'vendor/autoload.php';

if (!isset($_SESSION['login'])) {
  header('location : https://eraport.smksatyapraja2.id/');
}

unset($_SESSION['penilaian']);
$cek_guru = mysqli_query($koneksi, "select * from tb_users where nipy = '".$_SESSION['nipy']."'");
$guru = mysqli_fetch_array($cek_guru);


// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>e-Raport</title>
<link rel="icon" href="dist/img/lrapor.png">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
      <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
      <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-primary navbar-light">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="guru" class="nav-link"><?= $_SESSION['session']; ?></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="?page=profil_guru" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/boxed-bg.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Profil
                </h3>
                <p class="text-sm"><?= $_SESSION['nama_lengkap'] ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout" class="dropdown-item dropdown-footer"><i class="fab fa-pull-right"></i> Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-1">
    <!-- Brand Logo -->
    <a href="guru" class="brand-link">
      <img src="dist/img/lrapor.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-1"
           style="opacity: .8">
      <span class="brand-text font-weight-light">E-Raport SAPRA2</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/boxed-bg.jpg" class="img-circle elevation-1" alt="User Image">
        </div>
        <div class="info">
          <a href="?page=profil_guru" class="d-block"><?= $_SESSION['nama_lengkap']; ?></a>
          <a href="#" class="d-block"><?= $guru['nipy']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php 
          $query = mysqli_query($koneksi, "select * from tb_walikelas where nipy = '".$guru['nipy']."' group by th_pelajaran desc");
          $row = mysqli_num_rows($query);
          if ($row > 0) {
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>Riwayat Walikelas</p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <?php 
              while ($res = mysqli_fetch_array($query)) {
              ?>
              <li class="nav-item">
                <a href="?page=walikelas_page&id_walikelas=<?= $res['id_walikelas']; ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p><?= $res['th_pelajaran']; ?></p>
                </a>
              </li>
            <?php 
              } ?>
            </ul>
          </li>
          <?php 
          }
          ?>
        <!-- <li class="nav-header">PANDUAN</li>
        <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- isi -->
        <?php 
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          switch ($page) {
            case 'profil_guru':
              require_once('view/teacher/profil_guru_page.php');
              break;
            case 'buka_halaman':
              require_once('view/teacher/buka_halaman.php');
              break;
            case 'home':
              require_once('view/teacher/home.php');
              break;
            case 'walikelas':
              require_once("view/teacher/walikelas.php");
              break;
            case 'walikelas_page':
              require_once('view/teacher/walikelas_page.php');
              break;
            case 'import_penilaian':
              require_once('view/teacher/import_penilaian.php');
              break;
            case 'buka_halaman_kelaspil':
              require_once('view/teacher/buka_halaman_kelaspil.php');
              break;
            case 'import_penilaian_mappil':
              require_once('view/teacher/import_penilaian_mappil.php');
              break;
            case 'status':
              require_once('view/teacher/status.php');
              break;
            case 'leger':
              require_once('view/teacher/leger.php');
              break;
            case 'naik':
              require_once('view/teacher/naik.php');
              break;
            case 'ekskul_absen':
              require_once('view/teacher/ekskul_absen.php');
              break;
            case 'input_ekskul_absen':
              require_once('view/teacher/input_ekskul_absen.php');
              break;
            case 'cetak_nilaipil_keraport':
              require_once('view/teacher/cetak_nilaipil_keraport.php');
              break;
            
            default:
              require_once('view/error_404.php');
              break;
          }
        }else{
          require_once('view/teacher/home.php');
        }
        ?>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023-2024 <a href="https://smksatyapraja2.id">SMK SATYA PRAJA 2</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $("#examp").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
});
</script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
        type: 'POST',
        url: "view/teacher/th_pelajaran.php",
        cache: false, 
        success: function(msg){
          $("#th_pelajaran").html(msg);
        }
    });

    $("#th_pelajaran").change(function(){
    var th_pelajaran = $("#th_pelajaran").val();
    var nipy = $("#nipy").val();
      $.ajax({
        type: 'POST',
          url: "view/teacher/box_kelas.php",
          data: {th_pelajaran: th_pelajaran, nipy: nipy},
          cache: false,
          success: function(msg){
            $("#box_kelas").html(msg);
          }
      });
    });

    $("#type_test").change(function(){
    var type_test = $("#type_test").val();
    var th_pelajaran = $("#th_pelajaran").val();
    var semester = $("#semester").val();
    var kelas = $("#kelas").val();
    var komp_keahlian = $("#komp_keahlian").val();
    var pkelas = $("#pkelas").val();
    var nama_mapel = $('#nama_mapel').val();
    var kode_mapel = $('#kode_mapel').val();
      $.ajax({
        type: 'POST',
          url: "view/teacher/view_penilaian.php",
          data: {type_test: type_test, th_pelajaran: th_pelajaran, semester: semester,kelas: kelas, komp_keahlian: komp_keahlian, pkelas: pkelas, nama_mapel: nama_mapel, kode_mapel:kode_mapel},
          cache: false,
          success: function(msg){
            $("#view_penilaian").html(msg);
          }
      });
    });

  });
</script>
</body>
</html>
