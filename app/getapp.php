<?php

if(isset($_SESSION['unique_user']) && $_SESSION['type_user'] == 'admin'){
    $query = $mysqli->query("SELECT * FROM admin WHERE id_admin = '$_SESSION[unique2_user]'");
    $d = $query->fetch_assoc();
    $nama = $d['nama'];
}else if(isset($_SESSION['unique_user']) && $_SESSION['type_user'] == 'pegawai'){
    $query = $mysqli->query("SELECT * FROM pegawai WHERE nip = '$_SESSION[unique2_user]'");
    $d = $query->fetch_assoc();
    $nip = $d['nip'];
    $nama_pegawai = $d['nama_pegawai'];
    $status = $d['status_pegawai'];
    $fb = $d['jmlh_fb'];
    $teman = $d['jmlh_pertemanan'];
    $grup = $d['jmlh_grup'];
    $anggota = $d['jmlh_anggota'];
    
}


?>