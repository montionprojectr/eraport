<?php 
session_start();
require_once("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Raport</title>
  <link rel="icon" href="dist/img/lrapor.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    body {
      background-image: url('dist/img');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover;
    }
</style>
</head>
<body class="hold-transition login-page bg-image">
<div class="login-box bg-warning elevation-1 card">
  <img src="dist/img/lrapor.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
  <div class="login-logo">
    <a href="index2.html"><b>E-Raport SAPRA2</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Masukan akun anda untuk mulai sesi</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <!-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> -->
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-info">
          <i class="fas fa-cog mr-2"></i> Profil Sekolah
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fas fa-users mr-2"></i> Lihat Data siswa
        </a>
      </div> -->
      <!-- /.social-auth-links -->

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
<?php 

if (isset($_POST['login'])) {
  $user = htmlspecialchars($_POST['user']); 
  $pass = htmlspecialchars($_POST['pass']);

$query = mysqli_query($koneksi, "select * from tb_users x inner join tb_rolsusers y on y.id_user = x.id_user inner join tb_levelusers z ON z.id_levelusers = y.id_leveluser where x.username = '$user' and x.password = '$pass'");

$data = mysqli_num_rows($query);
if ($data > 0 ) { 
  $users = mysqli_fetch_array($query);
  if ($users['level'] == "operator") {
    $_SESSION['session'] = "ADMINISTRATOR";
    $_SESSION['nama_lengkap'] = $users['nama_lengkap'];
    header("location: admin");
  }else if ($users['level'] == "guru") {
    $_SESSION['nama_lengkap'] = $users['nama_lengkap'];
    $_SESSION['session'] = "GURU";
    header("location: guru");
  }else if ($users['level'] == "siswa") {
    $_SESSION['nama_lengkap'] = $users['nama_lengkap'];
    $_SESSION['session'] = "SISWA";
    header("location: siswa");
  }
}else{
    echo "<script>
    alert('Username dan Password anda tidak terdaftar!');
    </script>";
  }

}
?>