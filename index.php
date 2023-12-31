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
      background-image: url('dist/img/gerbangsapra2.jpeg');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover;
    }
</style>
</head>
<body class="hold-transition login-page bg-image shadow-1-strong" style="background-image: url('dist/img/gerbangsapra2.jpeg'); background-repeat: no-repeat; background-attachment: fixed;  
      background-size: cover ; background-color: rgba(0, 0, 0, 0.6);
">
<div class="login-box">
  <!-- <img src="dist/img/logo_sapra2.png" alt="AdminLTE Logo" class="brand-image"
           style="opacity: .8" height="380px"> -->
  <div class="login-logo">
    <a href="index2.html" class="text-primary"><b>E-Raport SAPRA2</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card elevation-4">
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

$query = mysqli_query($koneksi, "select * from tb_users x inner join tb_rolsusers y on y.id_user = x.id_user inner join tb_levelusers z ON z.id_levelusers = y.id_levelusers where x.username = '$user' and x.password = '$pass'");

$data = mysqli_num_rows($query);
$users = mysqli_fetch_array($query);
if ($data > 0 ) { 
  if ($users['level'] == "operator") {
    $_SESSION['login'] = 'login';
    $_SESSION['session'] = "ADMINISTRATOR";
    $_SESSION['nipy'] = $users['nipy'];
    $_SESSION['nama_lengkap'] = $users['nama_lengkap'];
    echo "<script>
    alert('Anda Berhasil Login');
    document.location.href = 'admin';
    </script>";
    // header("location: https://eraport.smksatyapraja2.id/admin");
  }else if ($users['level'] == "guru") {
    $_SESSION['login'] = 'login';
    $_SESSION['session'] = "GURU";
    $_SESSION['nipy'] = $users['nipy'];
    $_SESSION['nama_lengkap'] = $users['nama_lengkap'];
    echo "<script>
    alert('Anda Berhasil Login');
    document.location.href = 'guru';
    </script>";
    // header("location: https://eraport.smksatyapraja2.id/guru");
  }else if($users['level'] == 'bk'){
    $_SESSION['login'] = 'login';
    $_SESSION['session'] = "GURU BK";
    $_SESSION['nipy'] = $users['nipy'];
    $_SESSION['nama_lengkap'] = $users['nama_lengkap'];
    echo "<script>
    alert('Anda Berhasil Login');
    document.location.href = 'bk';
    </script>";
  }else if($users['level'] == 'pembina'){
    $_SESSION['login'] = 'login';
    $_SESSION['session'] = "GURU Pembina";
    $_SESSION['nipy'] = $users['nipy'];
    $_SESSION['nama_lengkap'] = $users['nama_lengkap'];
    echo "<script>
    alert('Anda Berhasil Login');
    document.location.href = 'pembina';
    </script>";
  }else if ($users['level'] == "siswa"){
    $_SESSION['login'] = 'login';
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