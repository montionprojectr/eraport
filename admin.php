<?php 
session_start();
require_once('koneksi.php');
// Load file autoload.php
require 'vendor/autoload.php';

if (!isset($_SESSION['login'])) {
  header('location : https://eraport.smksatyapraja2.id/');
}

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
        <a href="admin" class="nav-link"><?= $_SESSION['session']; ?></a>
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
          <a href="admin" class="dropdown-item">
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
    <a href="admin" class="brand-link">
      <img src="dist/img/lrapor.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
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
          <a href="admin" class="d-block"><?= $_SESSION['nama_lengkap']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="?view=profil_sekolah" class="nav-link <?= $_GET['view'] == 'profil_sekolah' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-school"></i>
              <p>
                PROFIL SEKOLAH
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                USER
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin?view=guru" class="nav-link <?= $_GET['view'] == 'guru' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin?view=operator" class="nav-link <?= $_GET['view'] == 'operator' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Operator </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin?view=bk_page" class="nav-link <?= $_GET['view'] == 'bk_page' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BK </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin?view=pembina_page" class="nav-link <?= $_GET['view'] == 'pembina_page' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pembina </p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                KELAS & WALIKELAS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin?view=walikelas" class="nav-link <?= $_GET['view'] == 'walikelas' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Walikelas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="admin?view=mapel_page" class="nav-link <?= $_GET['view'] == 'mapel_page' ? 'active' : ''; ?>">
              <i class="nav-icon fas  fa-book"></i>
              <p>
                MATA PELAJARAN
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin?view=mapel_pilihan" class="nav-link <?= $_GET['view'] == 'mapel_pilihan' ? 'active' : ''; ?>">
              <i class="nav-icon fas  fa-book"></i>
              <p>
                MAPEL PILIHAN
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin?view=guru_mapel" class="nav-link <?= $_GET['view'] == 'guru_mapel' ? 'active' : ''; ?>">
              <i class="nav-icon fas  fa-sitemap"></i>
              <p>
                Guru Mapel
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="admin?view=siswa" class="nav-link <?= $_GET['view'] == 'siswa' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-child"></i>
              <p>
                DATA SISWA
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        <li class="nav-header">LAPORAN</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cloud"></i>
            <p>LEGER<i class="fas fa-angle-left right"></i></p>
          </a>
           <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin?view=pembagian" class="nav-link <?= $_GET['view'] == 'pembagian' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tanggal Raport</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin?view=leger" class="nav-link <?= $_GET['view'] == 'leger' ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nilai </p>
                </a>
              </li>
            </ul>
        </li>
        <li class="nav-item">
          <a href="?view=siswa_resign" class="nav-link <?= $_GET['view'] == 'siswa_resign' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>SISWA RESIGN</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="?view=siswa_pindahan" class="nav-link <?= $_GET['view'] == 'siswa_pindahan' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-table"></i>
            <p>SISWA PINDAHAN</p>
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
        <!-- Header -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php 
        $bg_breadcrumb = '';

        if (isset($_GET['view'])) {
          $view = $_GET['view'];
          switch ($view) {
            case 'operator':
              require_once('view/operator/operator_page.php');
              break;
            case 'guru':
              require_once('view/operator/teacher_page.php');
              break;
            case 'siswa':
              require_once('view/operator/siswa_page.php');
              break;
            case 'walikelas':
              require_once('view/operator/walikelas_page.php');
              break;
            case 'guru_mapel':
              require_once('view/operator/guru_mapel_page.php');
              break;
            case 'mapel_page':
              require_once('view/operator/mapel_page.php');
              break;
            case 'mapel_pilihan':
              require_once('view/operator/mapel_pilihan.php');
              break;
            case 'up_walikelas':
              require_once('view/operator/update/up_walikelas.php');
              break;
            case 'profil_sekolah':
              require_once('view/operator/profil_sekolah.php');
              break;
            case 'update_guru':
              require_once('view/operator/update/update_guru.php');
              break;
            case 'leger':
              require_once('view/operator/leger.php');
              break;
            case 'siswa_resign':
              require_once('view/operator/siswa_resign.php');
              break;
            case 'siswa_pindahan':
              require_once('view/operator/siswa_pindahan.php');
              break;
            case 'update_siswa':
              require_once('view/operator/update/update_siswa.php');
              break;
            case 'pembagian':
              require_once('view/operator/tanggal_raport.php');
              break;
            case 'update_pembagian':
              require_once('view/operator/update/update_tgl_bagiraport.php');
              break;
            case 'data_kelas':
              require_once('view/operator/home_kelas.php');
              break;
            case 'kelas_mapelpilihan':
              require_once('view/operator/kelas_mapelpilihan.php');
              break;
            case 'data_siswa_pilihan':
              require_once('view/operator/data_siswa_pilihan.php');
              break;
            case 'preview_kelaspil':
              require_once('view/operator/update/preview_kelaspil.php');
              break;
            case 'bk_page':
              require_once('view/operator/bk_page.php');
              break;
            case 'pembina_page':
              require_once('view/operator/pembina_page.php');
              break;
            
            default:
              require_once('view/error_404.php');
              break;
          }
        }else{
          require_once('view/operator/home.php');
        }
        ?>
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

<!-- Dynamic_form -->
<!-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> -->

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
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>

<!-- select kelas tanpa reload -->
<script type="text/javascript">
  $(document).ready(function(){

    $("#mapel").change(function(){
    var mapel = $("#mapel").val();
      $.ajax({
        type: 'POST',
          url: "view/operator/table_kelas.php",
          data: {mapel: mapel},
          cache: false,
          success: function(msg){
            $("#tampil_kelas").html(msg);
          }
      });
    });

    $("#th_pelajaran1").change(function(){
    var th_pelajaran = $("#th_pelajaran1").val();
      $.ajax({
        type: 'POST',
          url: "view/operator/table_walikelas.php",
          data: {th_pelajaran: th_pelajaran},
          cache: false,
          success: function(msg){
            $("#tampil_walikelas").html(msg);
          }
      });
    });

    $("#th_pelajaran2").change(function(){
    var th_pelajaran = $("#th_pelajaran2").val();
      $.ajax({
        type: 'POST',
          url: "view/operator/table_guru_mapel.php",
          data: {th_pelajaran: th_pelajaran},
          cache: false,
          success: function(msg){
            $("#tampil_guru_mapel").html(msg);
          }
      });
    });

    $.ajax({
        type: 'POST',
        url: "view/operator/input_ajax_gurumapel.php",
        cache: false, 
        success: function(msg){
          $("#kode_mapel").html(msg);
        }
    });

    $("#kode_mapel, #th_pelajaran1").change(function(){
      var kode_mapel = $("#kode_mapel").val();
      var th_pelajaran1 = $("#th_pelajaran1").val();
        $.ajax({
          type: 'POST',
            url: "view/operator/input_get_gurumapel.php",
            data: {kode_mapel: kode_mapel, th_pelajaran1: th_pelajaran1},
            cache: false,
            success: function(msg){
              $("#kelaskomp").html(msg);
            }
        });
      });

    $("#semester, #th_pelajarana, #kode_mapelsub").change(function(){
      var semester = $("#semester").val();
      var th_pelajarana = $("#th_pelajarana").val();
      var kode_mapelsub = $("#kode_mapelsub").val();
        $.ajax({
          type: 'POST',
            url: "view/operator/input_guru_mapelpil.php",
            data: {semester: semester, th_pelajarana: th_pelajarana, kode_mapelsub: kode_mapelsub},
            cache: false,
            success: function(msg){
              $("#nama_kelaspil").html(msg);
            }
        });
      });

    
    $("#semester, #th_pelajaran").change(function(){
      var th_pelajaran = $("#th_pelajaran").val();
      var semester = $("#semester").val();
        $.ajax({
          type: 'POST',
            url: "view/operator/get_table_kelaspil.php",
            data: {th_pelajaran: th_pelajaran, semester: semester},
            cache: false,
            success: function(msg){
              $("#show-tablekelas-pil").html(msg);
            }
        });
      });


  });
</script>
<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
</body>
</html>
