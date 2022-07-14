<?php
session_start();
$username = $_SESSION['username'];
if (empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
}
include "../koneksi.php";
$username = $_SESSION['username'];
$query = "SELECT * FROM akun WHERE username = '$username'";
$result = mysqli_query($konek, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_array($result);
    $_SESSION["nama"] = $user["nama"];
    $_SESSION["id_akun"] = $user["id_akun"];
    $_SESSION["email"] = $user["email"];
}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Travel</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
			CSS
			============================================= -->
    <link rel="stylesheet" href="../css/linearicons.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <header id="header">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                        <div class="header-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="index.php"><img src="../img/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="packages.php">Packages</a></li>
                        <li><a href="pesanan.php">Pesanan</a></li>
                        <li class="menu-has-children"><a href=""><?php echo "Hello, " . $_SESSION['nama'] ?></a>
                            <ul>
                                <li><a href="../action/logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->

    <!-- start banner Area -->
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Pesanan
                    </h1>
                    <p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="pesanan.php"> pesanan</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start insurence-one Area -->
    <section class="insurence-one-area section-gap">
    <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<div class='alert alert-danger'>Gagal</div><meta http-equiv=refresh content=1;url=pesanan.php>";
            } else if ($_GET['pesan'] == "success") {
                echo "<div class='alert alert-success'>Berhasil</div><meta http-equiv=refresh content=1;url=pesanan.php>";
            }
        }
        ?>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 style="text-align:center;">DATA Pesanan</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-wrap">
                                    <table class="table table-striped" border="1px">
                                        <thead class="thead-dark" style="text-align: center;">
                                            <tr>
                                                <th scope="col">ID Pemesan</th>
                                                <th scope="col">Nama Pemesan</th>
                                                <th scope="col">Destinasi</th>
                                                <th scope="col">waktu</th>
                                                <th scope="col">Jumlah Hari</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">Jumlah Orang</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                include '../koneksi.php';
                                                $query = mysqli_query($konek, "SELECT * FROM pesanan WHERE id_akun='$_SESSION[id_akun]' and status='bayar'");
                                                while ($data = mysqli_fetch_array($query)) { ?>
                                            <tr>
                                                <td> <?php echo $data['id_pemesanan']; ?> </td>
                                                <td> <?php echo $data['nama_pemesan']; ?> </td>
                                                <td> <?php echo $data['tempat']; ?> </td>
                                                <td> <?php echo $data['waktu']; ?> </td>
                                                <td> <?php echo $data['jml_hari']; ?></td>
                                                <td> <?php echo $data['alamat']; ?></td>
                                                <td> <?php echo $data['jml_orang']; ?></td>
                                                <td> <?php echo "Rp. " . number_format($data['harga'], 2, ',', '.') ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-outline-danger" data-toggle="modal" data-target="#add_data_Modal<?php echo $data['id_pemesanan']; ?>">Bayar</a>
                                                        <a href="../action/delete-pesanan.php?id_pemesanan=<?php echo $data['id_pemesanan']; ?>" class="btn btn-warning">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div id="add_data_Modal<?php echo $data['id_pemesanan']; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-header">
                                                            <h3 class="center">
                                                                <img src="" alt="">
                                                                DESTINASI ANDA "<?php echo $data['tempat']; ?>"
                                                            </h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4 style="text-align: center;">SILAHKAN PILIH PEMBAYARAN ANDA</h4>
                                                            <h5 style="text-align: center; color:red;">SIMPAN BUKTI PEMBAYARAN ANDA !!!!!</h5>

                                                            <button class="accordion" type="click">BANK BCA</button>
                                                            <div class="panel">
                                                                <p style="text-align: center;">DALAM PENGEMBANGAN</p>
                                                            </div>

                                                            <button class="accordion" type="click">BANK MANDIRI</button>
                                                            <div class="panel">
                                                                <p style="text-align: center;">DALAM PENGEMBANGAN</p>
                                                            </div>

                                                            <button class="accordion" type="click">BANK BNI</button>
                                                            <div class="panel">
                                                                <p style="text-align: center;">DALAM PENGEMBANGAN</p>
                                                            </div>

                                                            <button class="accordion" type="click">BANK BRI</button>
                                                            <div class="panel">
                                                                <p style="text-align: center;">DALAM PENGEMBANGAN</p>
                                                            </div>

                                                            <button class="accordion" type="">DANA</button>
                                                            <div class="panel" style="text-align: center;">
                                                                <p>silahkan scan QR berikut : </p>
                                                                <img src="../img/qriss.png" style="height: 20rem; width: 20rem; text-align: center;">
                                                            </div>

                                                            <button class="accordion" type="">QRISS</button>
                                                            <div class="panel" style="text-align: center;">
                                                                <p>silahkan scan QR berikut : </p>
                                                                <img src="../img/qriss.png" style="height: 20rem; width: 20rem; text-align: center;">
                                                            </div>
                                                            <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="../action/bayar-pesanan.php">
                                                                <label>ID PESANAN </label>
                                                                <input type="text" name="id_pemesanan" class="form-control" readonly value="<?php echo $data['id_pemesanan']; ?>" />
                                                                <br />
                                                                <label>Nomor BANK/QRISS/DANA Dll (untuk pembayaran) </label>
                                                                <input type="text" name="nomor_bank" class="form-control" />
                                                                <br />
                                                                <label>Nama Pemilik </label>
                                                                <input type="text" name="pemilik_bank" class="form-control" />
                                                                <br />
                                                                <label>Agen yang tersedia </label>
                                                                <select name="id_agen" id="" class="form-control">
                                                                    <?php
                                                                    include "../koneksi.php";
                                                                    $query = mysqli_query($konek, "SELECT * FROM supir where status_agen='siap'");
                                                                    while ($data = mysqli_fetch_array($query)) {
                                                                        echo "<option value=$data[id_agen]>$data[nama_agen]</option>";
                                                                    }
                                                                    ?>

                                                                </select>
                                                                <br />
                                                                <button class="btn btn-outline-success" type="submit">
                                                                    Submit
                                                                </button>

                                                            </form>
                                                        </div>
                                                        <script>
                                                            var acc = document.getElementsByClassName("accordion");
                                                            var i;

                                                            for (i = 0; i < acc.length; i++) {
                                                                acc[i].addEventListener("click", function() {
                                                                    this.classList.toggle("active");
                                                                    var panel = this.nextElementSibling;
                                                                    if (panel.style.display === "block") {
                                                                        panel.style.display = "none";
                                                                    } else {
                                                                        panel.style.display = "block";
                                                                    }
                                                                });
                                                            }
                                                        </script>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div> <br>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 style="text-align:center;">DATA PESANAN DIBAYAR</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-wrap">
                                    <table class="table table-striped" border="1px">
                                        <thead class="thead-dark" style="text-align: center;">
                                            <tr>
                                                <th scope="col">ID Pemesan</th>
                                                <th scope="col">Nama Pemesan</th>
                                                <th scope="col">Destinasi</th>
                                                <th scope="col">waktu</th>
                                                <th scope="col">Alamat</th>
                                                <th scope="col">NOPOL Travel</th>
                                                <th scope="col">Agen</th>
                                                <th scope="col">WA Agen</th>
                                                <th scope="col">Status</ths>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                include '../koneksi.php';
                                                $query = mysqli_query($konek, "SELECT * FROM `pesanan` JOIN `supir` ON pesanan.id_agen=supir.id_agen WHERE id_akun = $_SESSION[id_akun];");
                                                while ($data = mysqli_fetch_array($query)) { ?>
                                            <tr>
                                                <td> <?php echo $data['id_pemesanan']; ?> </td>
                                                <td> <?php echo $data['nama_pemesan']; ?> </td>
                                                <td> <?php echo $data['tempat']; ?> </td>
                                                <td> <?php echo $data['waktu']; ?> </td>
                                                <td> <?php echo $data['alamat']; ?></td>
                                                <td> <?php echo $data['nopol']; ?></td>
                                                <td> <?php echo $data['nama_agen']; ?></td>
                                                <td> <?php echo $data['nomorhp']; ?></td>
                                                <td> <?php echo $data['status']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div> <br>
        </div>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                <h5 style="text-align:center;">CATATAN USER </h5>
                            </div>
                            <div class="card-body">
                                <p>1. status "bayar" = Anda belum melakukan pembayaran pada pesanan</p>
                                <p>2. status "diterima" = Pesanan anda diterima oleh admin dan tidak ada pelanggaran</p>
                                <p>3. status "ditolak" = Pesanan anda ditolak karena melakukan pelanggaran</p>
                                <p>4. status "proses" = Pesanan anda sedang menunggu persetujuan admin</p>
                            </div>
                        </div>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- End insurence-one Area -->

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">

            <div class="row">
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Travelista</h6>
                        <p>
                            Jalan Kota Pelajar,<br>
                            Gedung SI No 15,<br>
                            Yogyakarta, Indonesia <br><br>
                            <strong>Telp:</strong> +62-87843912000<br>
                            <strong>Email:</strong> travelia@travel.com<br>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Keunggulan Travelista</h6>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li><a href="#">Travel terbaik</a></li>
                                    <li><a href="#">Harga Terjangkau</a></li>
                                    <li><a href="#">Pelayanan Sangat Baik</a></li>
                                    <li><a href="#">Pelanggan Puas</a></li>
                                    <li><a href="#">Berpengalaman</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>
                            Untuk kerja sama silahkan hubungi email travelista@travel.com.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3  col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Sosial Media</h6>
                        <p>Temukan kami secara mudah jika kamu ingin tau hal menarik lainnya dengan mengunjungi sosial media kami.</p>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="../js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/easing.min.js"></script>
    <script src="../js/hoverIntent.js"></script>
    <script src="../js/superfish.min.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/jquery.nice-select.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/mail-script.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>