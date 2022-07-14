<?php
header("location:../admin/data.php?pesan=success");
?>
<?php
include '../koneksi.php';
$id_destinasi = $_GET['id_destinasi'];
$query = mysqli_query($konek, "DELETE FROM destinasi WHERE id_destinasi = '$id_destinasi'");
if ($query) {
    header("Location: ../admin/data.php?pesan=success");
} else {
    echo "Proses hapus gagal!";
}
