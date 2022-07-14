<?php
header("Location: ../user/pesanan.php/pesan=success");
?>
<?php
include '../koneksi.php';
$id_pemesanan = $_GET['id_pemesanan'];
$query = mysqli_query($konek, "DELETE FROM `pesanan` WHERE `pesanan`.`id_pemesanan` = $id_pemesanan");
if ($query) {
    header("Location: ../user/pesanan.php/pesan=success");
} else {
    echo "Proses hapus gagal!";
}
