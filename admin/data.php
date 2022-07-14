<?php
session_start();
$username = $_SESSION['username'];
if ($_SESSION['level']==2) {
    header("location:login.php?pesan=bukan_admin");
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
<!doctype html>
<html lang="en">

<head>
    <title>Table 09</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">
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
                    <a href="#"><img src="img/logo.png" alt="" title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="data.php">Data</a></li>
                        <li><a href="akun.php">Account</a></li>
                        <li><a href="komen.php">Comment</a></li>
                        <li class="menu-has-children"><a href=""><?php echo "Hello, " . $_SESSION['nama']; ?></a>
                            <ul>
                                <li><a href="../action/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
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
                        Admin
                    </h1>
                    <p class="text-white link-nav"><span class="lnr lnr-arrow-right"></span> <a href="data.php"> Data</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start data Area -->
    <section class="ftco-section">
        <div class="container-fluid">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == "gagal") {
                echo "<div class='alert alert-danger'>Gagal</div><meta http-equiv=refresh content=1;url=pesanan.php>";
            } else if ($_GET['pesan'] == "success") {
                echo "<div class='alert alert-success'>Berhasil</div><meta http-equiv=refresh content=1;url=pesanan.php>";
            }
        }
        ?>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 style="text-align:center;">DATA Destinasi</h5>
                        </div>
                        <div class="card-body">
                            <a href="" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-success">+ Data Destinasi</a>
                            <div class="table-wrap">
                                <table class="table table-striped">
                                    <thead class="thead-dark" style="text-align: center;">
                                        <tr>
                                            <th class="icon_profile">Nama Tempat</th>
                                            <th class="icon_book_alt">Durasi</th>
                                            <th class="icon_calender">Promo</th>
                                            <th class="icon_cogs">Fasilitas</th>
                                            <th class="icon_cogs">Extra</th>
                                            <th class="icon_cogs">Harga</th>
                                            <th class="icon_cogs">Foto</th>
                                            <th class="icon_cogs">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi.php';
                                        $query = mysqli_query($konek, "SELECT * FROM destinasi");
                                        while ($data = mysqli_fetch_array($query)) { ?>
                                            <tr>
                                                <td> <?php echo $data['tempat']; ?> </td>
                                                <td> <?php echo $data['durasi']; ?> </td>
                                                <td> <?php echo $data['promo']; ?> </td>
                                                <td> <?php echo $data['fasilitas']; ?></td>
                                                <td> <?php echo $data['extra']; ?></td>
                                                <td> <?php echo $data['harga']; ?></td>
                                                <td> <img src="../action/img/<?php echo $data['gambar']; ?>" style="height: 5rem; weight:5 rem;"> <br><a class="btn btn-outline-warning" data-toggle="modal" data-target="#add_data_Modal2<?php echo $data['id_destinasi']; ?>">Edit foto</a> </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-warning" data-toggle="modal" data-target="#add_data_Modal1<?php echo $data['id_destinasi']; ?>">Edit</a>
                                                        <a class="btn btn-secondary" href="../action/delete-destinasi.php?id_destinasi=<?php echo $data['id_destinasi']; ?>" onclick="return confirm('Apakah anda yakin ingin mengahpus ini ?')">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div id="add_data_Modal1<?php echo $data['id_destinasi']; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-header">
                                                            <h3>Edit Destinasi</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../action/edit-destinasi.php" method="post" enctype="multipart/form-data">
                                                                <label>ID_DESTINASI</label>
                                                                <input type="text" name="id_destinasi" class="form-control" readonly value="<?php echo $data['id_destinasi']; ?>" />
                                                                <br />
                                                                <label>Nama Tempat</label>
                                                                <input type="text" name="nama" class="form-control" value="<?php echo $data['tempat']; ?>" />
                                                                <br />
                                                                <label>Durasi</label>
                                                                <input type="text" name="durasi" class="form-control" value="<?php echo $data['durasi']; ?>" />
                                                                <br />
                                                                <label>Promo</label>
                                                                <input type="text" name="promo" class="form-control" value="<?php echo $data['promo']; ?>">
                                                                <br />
                                                                <label>Fasilitas</label>
                                                                <input type="text" name="fasilitas" class="form-control" value="<?php echo $data['fasilitas']; ?>">
                                                                <br />
                                                                <label>Extra</label>
                                                                <input type="text" class="form-control" name="extra" value="<?php echo $data['extra']; ?>">
                                                                <br />
                                                                <label>Harga</label>
                                                                <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" />
                                                                <br />
                                                                <button class="btn btn-outline-success" type="submit">
                                                                    Submit
                                                                </button>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="add_data_Modal2<?php echo $data['id_destinasi']; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-header">
                                                            <h3>Edit Foto Destinasi</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../action/edit-destinasi.php" method="post" enctype="multipart/form-data">
                                                                <label>ID_DESTINASI</label>
                                                                <input type="text" name="id_destinasi" class="form-control" readonly value="<?php echo $data['id_destinasi']; ?>" />
                                                                <br />
                                                                <label>Nama Tempat</label>
                                                                <input type="text" name="nama" class="form-control" value="<?php echo $data['tempat']; ?>" />
                                                                <br />
                                                                <label>Foto</label>
                                                                <input type="file" name="gambar" class="form-control" value="<?php echo $data['gambar']; ?>" />
                                                                <br />
                                                                <button class="btn btn-outline-success" type="submit">
                                                                    Submit
                                                                </button>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div> <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 style="text-align: center;">SUPIR DAN NOPOL TRAVEL</h5>
                        </div>
                        <div class="card-body">
                            <a href="" class="btn btn-outline-success" data-toggle="modal" data-target="#add_data_Modal3"> + AGEN</a>
                            <div class="table-wrap">
                                <table class="table table-striped">
                                    <thead class="thead-dark" style="text-align: center;">
                                        <tr>
                                            <th scope="col">ID_Agen</th>
                                            <th scope="col">Nama Agen</th>
                                            <th scope="col">Nomor WA</th>
                                            <th scope="col">Nomor Polisi</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../koneksi.php';
                                        $query = mysqli_query($konek, "SELECT * FROM supir");
                                        while ($data = mysqli_fetch_array($query)) { ?>
                                            <tr style="text-align: center;">
                                                <td><?php echo $data['id_agen']; ?></td>
                                                <td><?php echo $data['nama_agen']; ?></td>
                                                <td><?php echo $data['nomorwa']; ?></td>
                                                <td><?php echo $data['nopol']; ?></td>
                                                <td>
                                                    <a href="" class="btn btn-warning" data-toggle="modal" data-target="#add_data_Modal4<?php echo $data['id_agen']; ?>">edit</a>
                                                    <a href="../action/delete-agen.php?id_agen=<?php echo $data['id_agen']; ?>" class="btn btn-secondary" onclick="return confirm('anda yakin ingin mengahpus agen ini ?')">hapus</a>
                                                </td>
                                            </tr>
                                            <div id="add_data_Modal4<?php echo $data['id_agen']; ?>" class="modal fade">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-header">
                                                            <h3>MASUKAN AGEN</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../action/edit-agen.php" method="post" enctype="multipart/form-data">
                                                                <label>ID Agen</label>
                                                                <input type="text" name="id_agen" class="form-control" value="<?php echo $data['id_agen']; ?>" />
                                                                <br />
                                                                <label>Nama Agen</label>
                                                                <input type="text" name="nama_agen" class="form-control" value="<?php echo $data['nama_agen']; ?>" />
                                                                <br />
                                                                <label>Nomor WA agen</label>
                                                                <input type="text" name="nomorwa" class="form-control" value="<?php echo $data['nomorwa']; ?>" />
                                                                <br />
                                                                <label>Nomor Polisi</label>
                                                                <input type="text" name="nopol" class="form-control" value="<?php echo $data['nopol']; ?>" />
                                                                <br />
                                                                <label>Status</label>
                                                                <select name="status" class="form-control">
                                                                    <option value="siap">ready</option>
                                                                    <option value="sibuk">Sibuk</option>
                                                                </select>
                                                                <br />
                                                                <button class="btn btn-outline-success" type="submit">
                                                                    Submit
                                                                </button>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                <div id="add_data_Modal3" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-header">
                                <h3>MASUKAN AGEN</h3>
                            </div>
                            <div class="modal-body">
                                <form action="../action/input-agen.php" method="post" enctype="multipart/form-data">
                                    <label>Nama Agen</label>
                                    <input type="text" name="nama_agen" class="form-control" />
                                    <br />
                                    <label>Nomor WA agen</label>
                                    <input type="text" name="nomorwa" class="form-control" />
                                    <br />
                                    <label>Nomor Polisi</label>
                                    <input type="text" name="nopol" class="form-control" />
                                    <br />
                                    <button class="btn btn-outline-success" type="submit">
                                        Submit
                                    </button>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="add_data_Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-header">
                    <h3>Masukan Destinasi Baru</h3>
                </div>
                <div class="modal-body">
                    <form action="../action/input-destinasi.php" method="post" enctype="multipart/form-data">
                        <label>Nama Tempat</label>
                        <input type="text" name="nama" class="form-control" />
                        <br />
                        <label>Durasi</label>
                        <input type="text" name="durasi" class="form-control" />
                        <br />
                        <label>Promo</label>
                        <input type="text" name="promo" class="form-control">
                        <br />
                        <label>Fasilitas</label>
                        <input type="text" name="fasilitas" class="form-control">
                        <br />
                        <label>Extra</label>
                        <input type="text" class="form-control" name="extra">
                        <br />
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" />
                        <br />
                        <label>Foto</label>
                        <input type="file" name="gambar" class="form-control" />
                        <br>
                        <button class="btn btn-outline-success" type="submit">
                            Submit
                        </button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- End data Area -->

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
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>