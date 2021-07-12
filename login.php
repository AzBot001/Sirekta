<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php
session_start();

include 'base_url.php';
include 'app/env.php';
include 'app/aksi_login.php';
if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "admin") {
  ?>
      <script>
          alert('Anda tidak mempunyai akses ke halaman ini!');
          window.location.href = 'beranda_admin';
      </script>
  <?php
      return false;
  } else if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "pegawai") {
  ?>
      <script>
          alert('Anda tidak mempunyai akses ke halaman ini!');
          window.location.href = 'beranda_pegawai';
      </script>
  <?php
      return false;
  }
?>

<body class="hold-transition login-page">
<div class="login-box">
  
  <div class="login-logo">
  <img height="50" src="public/dist/img/logo_dark.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"><br>
    <a href="#"><b>SIREKTA</b></a>
    <h6>Sistem Rekap Berita</h6>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Login</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="nip" class="form-control" placeholder="NIP">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="pass" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-2">Belum punya akun? Daftar  
        <a href="register" class="text-center"> disini</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
</body>
</html>
