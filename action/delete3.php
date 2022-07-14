<?php
header("Location: ../admin/akun.php");
?>
<?php
include '../koneksi.php';
$id_akun = $_GET['id_akun'];
$query = mysqli_query($konek, "DELETE FROM akun WHERE `akun`.`id_akun` = '$id_akun'");
if ($query) {
    header("Location: ../admin/akun.php");
} else {
    echo "Proses hapus gagal!";
}
