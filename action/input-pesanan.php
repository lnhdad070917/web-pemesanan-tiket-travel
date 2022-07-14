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
$akun = $_SESSION["id_akun"];
$tempat = $_POST['tempat'];
$nama_pemesan = $_POST['nama_pemesan'];
$email = $_POST['email'];
$waktu = $_POST['waktu'];
$jml_hari = $_POST['jml_hari'];
$alamat = $_POST['alamat'];
$jml_orang = $_POST['jml_orang'];
$harga1 = $_POST['harga'];
$harga = $jml_hari * $jml_orang * $harga1;
$pesan = $_POST['pesan'];
$nomorhp = $_POST['nomorhp'];

$query = mysqli_query($konek, "INSERT INTO `pesanan` (`id_pemesanan`, `id_akun`, `nama_pemesan`, `tempat`, `waktu`, `jml_hari`, `alamat`, `jml_orang`, `pesan`, `harga`, `email`, `nomorhp`, `status`) 
VALUES (NULL, '$akun', '$nama_pemesan', '$tempat', '$waktu', '$jml_hari', '$alamat', '$jml_orang', '$pesan', '$harga', '$email', '$nomorhp', 'bayar');")
    or die(mysqli_error($konek));

if ($query) {
    header("location:../user/pesanan.php?pesan=success");
} else {
    echo "Proses input gagal, silahkan input kembali";
    echo "Silahkan klik <a href='formBarang.php'>disini</a>";
}
?>