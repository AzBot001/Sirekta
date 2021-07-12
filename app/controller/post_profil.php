<?php
include 'app/flash.php';

if(isset($_POST['ubah_profil'])){
    $nip = $_POST['nip'];
    $status = $_POST['status'];
    $nama = $_POST['nama'];
    $fb = $_POST['fb'];
    $teman = $_POST['teman'];
    $grup = $_POST['grup'];
    $anggota = $_POST['anggota'];

    $update = $mysqli->query("UPDATE pegawai SET status_pegawai = '$status', nama_pegawai = '$nama', jmlh_fb = '$fb', jmlh_pertemanan = '$teman', jmlh_grup = '$grup', jmlh_anggota = '$anggota' WHERE nip = '$nip'");
    echo "<script>
    alert('Berhasil Mengubah Data');
    window.location.href='profil';
     </script>";
}

?>