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

if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] != "admin") {
?>
    <script>
        alert('Anda tidak mempunyai akses ke halaman ini!');
        window.location.href = '<?= $base_url ?>';
    </script>
<?php
    return false;
}
if (isset($_SESSION['unique_user']) && $_SESSION['type_user'] == "pegawai") {
    ?>
        <script>
            alert('Anda tidak mempunyai akses ke halaman ini!');
            window.location.href = 'beranda_organisasi';
        </script>
    <?php
        return false;
    }


if($_GET['t_admin'] == 'beranda_admin'){
    $title = 'Beranda';

}else{
    $title = 'Beranda';

}


include 'views/layout/header.php';
include 'views/layout/navbar.php';
include 'views/layout/sidebar.php';

if($_GET['t_admin'] == 'beranda_admin'){
    include 'views/pages/admin/beranda.php';
}else{
    include 'views/pages/admin/beranda.php';
}


include 'views/layout/footer.php';
include 'views/layout/js.php';

?>