<?php
header("location:../admin/admin.php?pesan=success");
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
$id_pesanan = $_POST['id_pemesanan'];


$query = mysqli_query($konek, "UPDATE `pesanan` SET `status` = 'ditolak' WHERE `pesanan`.`id_pemesanan` = $id_pesanan;")
    or die(mysqli_error($konek));

if ($query) {
    header("location:../admin/admin.php?pesan=success");
} else {
    echo "Proses input gagal, silahkan input kembali";
    echo "Silahkan klik <a href='formBarang.php'>disini</a>";
}
?>