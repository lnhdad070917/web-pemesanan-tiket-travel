<?php
header("Location: ../admin/komen.php");
?>
<?php
include '../koneksi.php';
$id_komen = $_GET['id_komen'];
$query = mysqli_query($konek, "DELETE FROM komen WHERE id_komen = 
'$id_komen'");
if ($query) {
    header("Location: ../admin/komen.php");
} else {
    echo "Proses hapus gagal!";
}
