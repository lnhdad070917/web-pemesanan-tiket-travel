<?php
header("location:../admin/data.php");
?>
<?php
include '../koneksi.php';

$id_user    =  $_POST['id_user'];
$nama       =  $_POST['nama'];
$email      =  $_POST['email'];
$jenkel     =  $_POST['jenkel'];
$paket      =  $_POST['paket'];
$tanggal    =  $_POST['tanggal'];
$pesan      =  $_POST['pesan'];

$query = mysqli_query($konek, "UPDATE user SET nama='$nama', email= '$email', jenkel= '$jenkel', paket= '$paket', tanggal= '$tanggal', pesan= '$pesan' WHERE id_user='$id_user'");
if ($query) {
    header("location:../admin/data.php");
} else {
    echo "Data gagal diubah";
}
