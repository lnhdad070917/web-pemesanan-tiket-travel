<?php
header("location:../admin/data.php?pesan=success");
?>
<?php
session_start();
$username = $_SESSION['username'];
if (empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
}
include "../koneksi.php";
$username = $_SESSION['username'];
$query = "SELECT * FROM akun WHERE username = '$username'";
$result = mysqli_query($konek, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_array($result);
    $_SESSION["nama"] = $user["nama"];
    $_SESSION["id_akun"] = $user["id_akun"];
    $_SESSION["email"] = $user["email"];
}
?>
<?php
include "../koneksi.php";
$id_agen = $_POST['id_agen'];
$nama_agen = $_POST['nama_agen'];
$nomorwa = $_POST['nomorwa'];
$nopol = $_POST['nopol'];
$status = $_POST['status'];

$query = mysqli_query($konek, "UPDATE `supir` SET `nama_agen` = '$nama_agen', `nomorwa` = '$nomorwa', `nopol` = '$nopol', `status` = '$status' WHERE `supir`.`id_agen` = $id_agen;")
    or die(mysqli_error($konek));

if ($query) {
    header("location:../admin/data.php?pesan=success");
} else {
    echo "Proses input gagal, silahkan input kembali";
    echo "Silahkan klik <a href='formBarang.php'>disini</a>";
}
?>