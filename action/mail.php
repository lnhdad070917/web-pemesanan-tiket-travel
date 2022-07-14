<?php
header("location: ../user/index.php?pesan=terkirim");
?>
<?php
include '../koneksi.php';

$nama = $_POST['nama'];
$isi = $_POST['isi'];

$query = mysqli_query($konek, "INSERT INTO komen VALUES ('','$nama', '$isi')")
    or die(mysqli_error($konek));

if ($query) {
    header("location: ../user/index.php?pesan=terkirim");
} else {
    header("location: ../user/contact.php?pesan=gagal");
}
