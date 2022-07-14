<?php
header("location:../admin/data.php?pesan=success");
?>
<?php
include "../koneksi.php";

$tempat = $_POST['nama'];
$durasi = $_POST['durasi'];
$promo = $_POST['promo'];
$fasilitas = $_POST['fasilitas'];
$extra = $_POST['extra'];
$harga = $_POST['harga'];
$direktori = "img/";
$gambar = $_FILES['gambar']['name'];
move_uploaded_file($_FILES['gambar']['tmp_name'],$direktori.$gambar);

$query = mysqli_query($konek, "INSERT INTO `destinasi` (`id_destinasi`, `tempat`, `durasi`, `promo`, `fasilitas`, `extra`, `harga`, `gambar`) 
VALUES (NULL, '$tempat', '$durasi', '$promo', '$fasilitas', '$extra', '$harga', '$gambar');")
or die(mysqli_error($konek));

if ($query) {
    header("location:../admin/data.php?pesan=success");
} else {
    echo "Proses input gagal, silahkan input kembali";
    echo "Silahkan klik <a href='formBarang.php'>disini</a>";
}
?>