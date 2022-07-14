<?php
header("location:../admin/data.php");
?>
<?php
include '../koneksi.php';

$id_user    =  $_POST['id_user'];
$id       =  $_POST['id'];

$query = mysqli_query($konek, "UPDATE user SET id='$id' WHERE id_user='$id_user'");
if ($query) {
    header("location:../admin/data.php");
} else {
    echo "Data gagal diubah";
}