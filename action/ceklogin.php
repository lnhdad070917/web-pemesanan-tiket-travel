<?php
session_start();
include "../koneksi.php";

//menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

//menyeleksi data admin dengan username dan password yang sesuai
$query = mysqli_query($konek, "SELECT *FROM akun WHERE username='$username' and password='$password'")
    or die(mysqli_error($konek));

//menghitung jumlah datayang ditentukan
$row = mysqli_fetch_assoc($query);

if ($row['level'] == 1) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['level'] = $level;
    header("location:../admin/admin.php");
} else if ($row['level'] == 2) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['level'] = $level;
    header("location: ../user/index.php");
} else {
    header("location:../user/login.php?pesan=gagal");
}
