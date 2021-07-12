<?php
include 'app/flash.php';
if(isset($_POST['simpan_anggota'])){
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $pass = md5($_POST['password']);

    $query = $mysqli->query("SELECT * FROM pegawai WHERE nip = '$nip'");
    $cek_nip = mysqli_num_rows($query);

    if($cek_nip < 1 ){
        $insert = $mysqli->query("INSERT INTO pegawai(nip,nama_pegawai,pass) VALUES ('$nip','$nama','$pass')");
        flash('msg_register','Berhasil Mendaftar');
    }else{
        flash('msg_gagal','NIP Sudah Terdaftar');
    } 
}

?>