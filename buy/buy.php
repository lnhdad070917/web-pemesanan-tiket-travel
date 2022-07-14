<!DOCTYPE html>
<html>

<head>
    <title> </title>
</head>

<body>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px 8px;

        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        .tengah {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .right {
            text-align: right;
        }

        .center {
            text-align: center;
        }

        .justify {
            text-align: justify;
        }
    </style>
    <?php
    // menampilkan data pegawai
    include '../koneksi.php';
    $data = mysqli_query($konek, "SELECT * FROM user ORDER BY id_user DESC LIMIT 1");
    while ($d = mysqli_fetch_array($data)) {
    ?>
        <h1 class="center">Destinasi yang anda Pilih</h1>
        <p class="center">Silahkan nikmati perjalanan anda, dan print tiket untuk dokumen persyaratan</p>
        <table cellpadding="4">
            <tr>
                <td> Pemesan dengan Id</td>
                <td> : <?php echo $d['id_user'] ?></td>
            </tr>
            <tr>
                <td> Nama </td>
                <td> : <?php echo $d['nama']; ?></td>
            </tr>
            <tr>
                <td> Email </td>
                <td> : <?php echo $d['email']; ?></td>
            </tr>
            <tr>
                <td> Jenis Kelamin </td>
                <td> : <?php echo $d['jenkel']; ?></td>
            </tr>
            <tr>
                <td> Paket </td>
                <td> : <?php echo $d['paket']; ?></td>
            </tr>
            <tr>
                <td> Tanggal </td>
                <td> : <?php echo $d['tanggal']; ?></td>
            </tr>
            <tr>
                <td> Pesan </td>
                <td> : <?php echo $d['pesan']; ?></td>
            </tr>
        </table>
    <?php
    }
    ?>
    <p class="center">Terimakasih atas kepercayaan anda telah memesan tiket perjalanan dari perusahaan kami. </p>
    <br />
    <p class="right">TRAVELISTA menemani perjalanan anda </p>
    <br /><br /><br /><br /><br />
    <script>
        window.print();
    </script>
</body>

</html>