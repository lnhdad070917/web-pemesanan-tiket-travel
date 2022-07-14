<?php

$connect = mysqli_connect("localhost", "root", "", "travel");
if (!empty($_POST)) {
    $output = '';
    $nama = mysqli_real_escape_string($connect, $_POST["nama"]);
    $jenkel = mysqli_real_escape_string($connect, $_POST["jenkel"]);
    $paket = mysqli_real_escape_string($connect, $_POST["paket"]);
    $tanggal = mysqli_real_escape_string($connect, $_POST["tanggal"]);
    $pesan = mysqli_real_escape_string($connect, $_POST["pesan"]);
    $query = " INSERT INTO user(nama, jenkel, paket, tanggal, pesan) VALUES(' ','$nama', '$email', '$jenkel','$paket','$tanggal','$pesan')";
    if (mysqli_query($connect, $query)) {
        echo "berhasil";
    } else {
        $output .= mysqli_error($connect);
    }
    echo $output;
}
