<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, Code!</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "yuklogin") {
    ?>
            <script>
                alert("Berhasil bikin account, Silahkan Login!");
            </script>
    <?php }
    } ?>

    <div class="overlay"></div>
    <form action="../action/ceklogin.php" method="POST" class="box">
        <div class="header">
            <h3>Login Ke Akunmu</h3>
        </div>
        <div class="login-area">
            <input type="text" class="username" name="username" placeholder="Username">
            <input type="password" class="password" name="password" placeholder="Password">
            <a href="index2.php">create new account</a>
            <input type="submit" value="Login" class="submit">
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<p>Login gagal!</p>";
                } else if ($_GET['pesan'] == "logout") {
                    echo "<p>Berhasil Logout</p>";
                } else if ($_GET['pesan'] == "bukan_admin") {
                    echo "<p>Hey anda bukan admin :P</p>";
                } else if ($_GET['pesan'] == "belum_login") { ?>
                    <script>
                        alert("Anda harus login untuk membuka halaman tersebut!");
                    </script>
            <?php }
            }
            ?>
        </div>
    </form>
</body>

</html>