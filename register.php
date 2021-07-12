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

include 'base_url.php';
include 'app/env.php';
include 'app/controller/post_register.php';
?>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
        <img height="50" src="public/dist/img/logo_dark.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"><br>
            <a href="#"><b>SIREKTA</b></a>
            <h6>Sistem Rekap Berita</h6>
        </div>
        <?php
        if (isset($_SESSION['msg_register'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="fas fa-check fe-16 mr-2"></span> <?= flash('msg_register'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_SESSION['msg_gagal'])) {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="fas fa-times fe-16 mr-2"></span> <?= flash('msg_gagal'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php
        }
        ?>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Daftar Akun</p>

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
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" name="simpan_anggota" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="mt-2">
                    Sudah memiliki akun? Login
                    <a href="<?= $base_url; ?>" class="text-center">Disini</a>
                </div>

            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
  <!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
</body>

</html>