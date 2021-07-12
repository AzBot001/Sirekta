<?php
session_start();
include 'app/env.php';
include 'app/getapp.php';
include 'base_url.php';
include 'app/session.php';
if (!isset($_SESSION['unique_user'])) {
?>
    <script>
        alert('Anda harus login untuk mengakses halaman ini!');
        window.location.href = '<?= $base_url ?>';
    </script>
<?php
    return false;
}

if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] != "pegawai") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = '<?= $base_url ?>';
    </script>
<?php
    return false;
}
if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "admin") {
    ?>
        <script>
            alert('Anda tidak mempunyai akses ke halaman ini!');
            window.location.href = 'beranda_organisasi';
        </script>
    <?php
        return false;
    }


if($_GET['t_pegawai'] == 'beranda_pegawai'){
    $title = 'Beranda';

}
else if($_GET['t_pegawai'] == 'profil'){
    $title = 'Profil Pegawai';

}else{
    $title = 'Beranda';

}


include 'views/layout_pegawai/header.php';
include 'views/layout_pegawai/navbar.php';
include 'views/layout_pegawai/sidebar.php';


if($_GET['t_pegawai'] == 'beranda_pegawai'){
    include 'views/pages/pegawai/beranda.php';
}
else if($_GET['t_pegawai'] == 'profil'){
    include 'views/pages/pegawai/profil.php';
}else{
    include 'views/pages/pegawai/beranda.php';
}



include 'views/layout_pegawai/footer.php';
include 'views/layout_pegawai/js.php';

$query = $mysqli->query("SELECT * FROM pegawai WHERE nip = '$nip'");
$data = $query->fetch_assoc();

$status = $data['status_pegawai'];
$fb     = $data['jmlh_fb'];
$teman  = $data['jmlh_pertemanan'];
$grup   = $data['jmlh_grup'];
$anggota = $data['jmlh_anggota'];

if(empty($status) || $fb == 0 || $teman == 0 || $grup == 0 || $anggota == 0){
?>
<script type="text/javascript">
    $(function() {
        toastr.options = {
            "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "2000",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
        }
        Command: toastr["error"]("Data diri anda belum lengkap, silahkan lengkapi terlebih dahulu untuk membuka akses yang lain. <a href='profil'><b><u>Klik disini</u></b></a> untuk melengkapi data.", "PEMBERITAHUAN")
    });
  </script>
<?php
  }
?>
 


