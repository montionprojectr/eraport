<?php 
session_start();
include "koneksi.php";

if (!isset($_SESSION['login'])) {
  header('location : https://eraport.smksatyapraja2.id/');
}

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
      <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-info navbar-light bg-danger">

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
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="?page=management_siswa" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Management Siswa
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Print
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=cover" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cover</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=raport" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Raport</p>
                </a>
              </li>
            </ul>
          </li>
        <li class="nav-header">PANDUAN</li>
        <li class="nav-item">
            <a href="https://adminlte.io/docs/3.0" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
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
            case 'management_siswa':
              require_once("view/teacher/management_siswa.php");
              break;
            case 'cover':
              require_once('view/teacher/cover.php');
              break;
            case 'raport':
              require_once('view/teacher/raport.php');
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
      <b>Version</b> 3.0.3
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
    var nama_lengkap = $("#nama_lengkap").val();
      $.ajax({
        type: 'POST',
          url: "view/teacher/box_kelas.php",
          data: {th_pelajaran: th_pelajaran, nama_lengkap: nama_lengkap},
          cache: false,
          success: function(msg){
            $("#box_kelas").html(msg);
          }
      });
    });
  });
</script>
</body>
</html>
