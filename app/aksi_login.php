<?php
include 'app/token.php';
if (isset($_POST['login'])) {
    if (empty($_POST['nip']) && empty($_POST['pass'])) {
    ?>
        <script>
            alert('Maaf masukkan NIP dan Password terlebih dahulu !');
            document.location.href = '<?= $base_url; ?>';
        </script>
    <?php
        return false;
    }
    
    $stmt_admin = $mysqli->prepare("SELECT id_admin, pass FROM admin WHERE username = ?");
    $stmt_pegawai = $mysqli->prepare("SELECT nip, nama_pegawai, pass FROM pegawai WHERE nip = ?");
   

    if ($stmt_admin || $stmt_pegawai) {
        $stmt_admin->bind_param('s', $_POST['nip']);
        $stmt_admin->execute();
        $stmt_admin->store_result();

        $stmt_pegawai->bind_param('s', $_POST['nip']);
        $stmt_pegawai->execute();
        $stmt_pegawai->store_result();

        if ($stmt_admin->num_rows > 0) {
            $stmt_admin->bind_result($id_admin, $pass);
            $stmt_admin->fetch();
            if (md5($_POST['pass'])==$pass) {
                session_regenerate_id();
                $token = getToken(10);
                $checkToken = "SELECT * FROM token WHERE nip='{$_POST['nip']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $stmt_log = $mysqli->prepare("UPDATE token SET token='$token' WHERE nip='{$_POST['nip']}'");
                    $stmt_log->execute();
                } else {
                    $stmt_log = $mysqli->prepare("INSERT INTO token (nip,token) VALUES ('{$_POST['nip']}','$token')");
                    $stmt_log->execute();
                }

                $_SESSION['unique_user'] = $_POST['nip'];
                $_SESSION['unique2_user'] = $id_admin;
                $_SESSION['token'] = $token;
                $_SESSION['type_user'] = "admin";
                ?>
                <script>
                    document.location.href = 'beranda_admin';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = '<?= $base_url; ?>';
                </script>
                <?php
            }
        } else if ($stmt_pegawai->num_rows > 0) {
            $stmt_pegawai->bind_result($nip, $nama_pegawai, $pass);
            $stmt_pegawai->fetch();
            if (md5($_POST['pass'])==$pass) {
                session_regenerate_id();

                $token = getToken(10);
                $checkToken = "SELECT * FROM token WHERE nip='{$_POST['nip']}'";
                $toCheckToken = $mysqli->prepare($checkToken);
                $toCheckToken->execute();
                $resultToken = $toCheckToken->get_result();
                $rowToken = mysqli_num_rows($resultToken);

                if ($rowToken > 0) {
                    $stmt_log = $mysqli->prepare("UPDATE token SET token='$token' WHERE nip='{$_POST['nip']}'");
                    $stmt_log->execute();
                } else {
                    $stmt_log = $mysqli->prepare("INSERT INTO token (nip,token) VALUES ('{$_POST['nip']}','$token')");
                    $stmt_log->execute();
                }

                $_SESSION['unique_user'] = $_POST['nip'];
                $_SESSION['unique2_user'] = $nip;
                $_SESSION['nama'] = $nama_pegawai;
                $_SESSION['token'] = $token;
                $_SESSION['type_user'] = "pegawai";
                ?>
                <script>
                    document.location.href = 'beranda_pegawai';
                </script>
                <?php
            } else {
                ?>
                <script>
                    alert('Password yang anda masukkan salah !');
                    document.location.href = '<?= $base_url; ?>';
                </script>
                <?php
            }
        }  else {
            ?>
            <script>
                alert('NIP yang anda masukkan salah !');
                document.location.href = '<?= $base_url; ?>';
            </script>
            <?php
        }
        $stmt_admin->close();
        $stmt_pegawai->close();
    }
}
?>