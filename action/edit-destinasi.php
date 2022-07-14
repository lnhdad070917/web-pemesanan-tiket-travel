<?php
header("location:../admin/data.php?pesan=success");
?>
<?php
include "../koneksi.php";

$id_destinasi=$_POST['id_destinasi'];
$tempat = $_POST['nama'];
$durasi = $_POST['durasi'];
$promo = $_POST['promo'];
$fasilitas = $_POST['fasilitas'];
$extra = $_POST['extra'];
$harga = $_POST['harga'];

$query = mysqli_query($konek, "UPDATE `destinasi` SET `tempat` = '$tempat', `durasi` = '$durasi', `promo` = '$promo', `fasilitas` = '$fasilitas', `extra` = '$extra', `harga` = '$harga' WHERE `destinasi`.`id_destinasi` = $id_destinasi;")
or die(mysqli_error($konek));

if ($query) {
    header("location:../admin/data.php?pesan=success");
} else {
    echo "Proses input gagal, silahkan input kembali";
    echo "Silahkan klik <a href='formBarang.php'>disini</a>";
}
?>