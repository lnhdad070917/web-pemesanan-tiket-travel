<?php
header("location: ../user/login.php?pesan=yuklogin");
?>
<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$email = $_POST['email'];
$tgl_lahir = $_POST['tgl_lahir'];
$nohp = $_POST['nohp'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($konek, "INSERT INTO akun VALUES ('','$nama', '$email', '$tgl_lahir', '$nohp', '$username', '$password', '2')")
    or die(mysqli_error($konek));

if ($query) {
    header("location: ../user/login.php?pesan=yuklogin");
} else {
    header("location: ../user/index.php?pesan=gagalbuat");
}
