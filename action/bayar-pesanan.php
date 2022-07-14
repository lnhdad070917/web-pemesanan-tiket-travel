<?php
header("location:../user/pesanan.php?pesan=success");
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
$nomor_bank = $_POST['nomor_bank'];
$pemilik_bank = $_POST['pemilik_bank'];
$id_agen = $_POST['id_agen'];

$query = mysqli_query($konek, "UPDATE `pesanan` SET `status` = 'proses',`nomor_bank` = '$nomor_bank', `pemilik_bank` = '$pemilik_bank', `id_agen` = '$id_agen' WHERE `pesanan`.`id_pemesanan` = $id_pesanan;")
    or die(mysqli_error($konek));

if ($query) {
    header("location:../user/pesanan.php?pesan=success");
} else {
    echo "Proses input gagal, silahkan input kembali";
    echo "Silahkan klik <a href='formBarang.php'>disini</a>";
}
?>