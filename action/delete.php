<?php
header("Location: ../admin/data.php");
?>
<?php
include '../koneksi.php';
$id_user = $_GET['id_user'];
$query = mysqli_query($konek, "DELETE FROM user WHERE id_user = 
'$id_user'");
if ($query) {
    header("Location: ../admin/data.php");
} else {
    echo "Proses hapus gagal!";
}
