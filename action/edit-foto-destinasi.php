<?php
header("location:../admin/data.php?pesan=success");
?>
<?php
include "../koneksi.php";
$id_destinasi=$_POST['id_destinasi'];
$direktori = "img/";
$gambar = $_FILES['gambar']['name'];
move_uploaded_file($_FILES['gambar']['tmp_name'],$direktori.$gambar);

$query = mysqli_query($konek, "UPDATE `destinasi` SET `gambar` = '$gambar' WHERE `destinasi`.`id_destinasi` = $id_destinasi;")
or die(mysqli_error($konek));

if ($query) {
    header("location:../admin/data.php?pesan=success");
} else {
    echo "Proses input gagal, silahkan input kembali";
    echo "Silahkan klik <a href='formBarang.php'>disini</a>";
}
?>