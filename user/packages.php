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

if(mysqli_num_rows($result)>0){
	$user = mysqli_fetch_array($result);
	$_SESSION["nama"] = $user ["nama"];
	$_SESSION["id_akun"]=$user["id_akun"];
	$_SESSION["email"]=$user["email"];
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

	<style type="text/css">
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
						Tour Packages
					</h1>
					<p class="text-white link-nav"><a href="index.php">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="packages.php"> Tour Packages</a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start hot-deal Area -->
	<section class="hot-deal-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Exclusive Trip</h1>
						<p></p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-10 active-hot-deal-carusel">
					<div class="single-carusel">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src="../img/packages/bali1.png" alt="">
						</div>
						<div class="price-detials">
							<a href="#" class="price-btn">Mulai <span>Rp7.5jt//orang</span></a>
						</div>
						<div class="details">
							<h4 class="text-white">Kuta Carnival</h4>
							<p class="text-white">
								Bali | Inndonesia
							</p>
						</div>
					</div>
					<div class="single-carusel">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src="../img/packages/papua.png" alt="">
						</div>
						<div class="price-detials">
							<a href="#" class="price-btn">Mulai <span>Rp8jt/orang</span></a>
						</div>
						<div class="details">
							<h4 class="text-white">Promo resort mewah Raja Ampat</h4>
							<p class="text-white">
								Papua | Indonesia
							</p>
						</div>
					</div>
					<div class="single-carusel">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src="../img/packages/merapi.png" alt="">
						</div>
						<div class="price-detials">
							<a href="#" class="price-btn">Mulai <span>Rp5jt/orang</span></a>
						</div>
						<div class="details">
							<h4 class="text-white">Lava Tour</h4>
							<p class="text-white">
								Magelang | Jawa Tengah
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End hot-deal Area -->


	<!-- Start destinations Area -->
	<section class="destinations-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-40 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Destinasi Populer</h1>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				include "../koneksi.php";
				$query = mysqli_query($konek, "SELECT * FROM destinasi");
				while ($data = mysqli_fetch_array($query)) {
				?>
					<div class="col-lg-4">
						<div class="single-destinations">
							<div class="thumb">
								<img src="../action/img/<?php echo $data['gambar'] ?>" alt="">
							</div>
							<div class="details">
								<h4><?php echo $data['tempat'] ?></h4>
								<p>
									<?php echo $data['tempat'] ?> | Indonesia
								</p>
								<ul class="package-list">
									<li class="d-flex justify-content-between align-items-center">
										<span>Durasi</span>
										<span><?php echo $data['durasi'] ?> Hari</span>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Promo</span>
										<span><?php echo $data['promo'] ?></span>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Fasilitas&nbsp;&nbsp;</span>
										<span><?php echo $data['fasilitas'] ?></span>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span>Extra</span>
										<span><?php echo $data['extra'] ?></span>
									</li>
									<li class="d-flex justify-content-between align-items-center">
										<span><?php echo "Rp. " . number_format($data['harga'], 2, ',', '.') ?> / orang</span>
										<a type="button" class="btn btn-warning" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal<?php echo $data['id_destinasi'] ?>" class="price-btn">PESAN</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div id="add_data_Modal<?php echo $data['id_destinasi'] ?>" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-header">
									<h3 class="center">
										<img src="../action/img/<?php echo $data['gambar'] ?>" alt="">
										Masukan Data Diri Anda
									</h3>
								</div>
								<div class="modal-body">
									<form class="form-validate form-horizontal" id="feedback_form" method="POST" action="../action/input-pesanan.php">
										<label for="cname_pembeli">Destinasi Anda</label>
										<input type="text" name="tempat" class="form-control" readonly value="<?php echo $data['tempat'] ?>" />
										<br />
										<label for="cname_pembeli">Harga</label>
										<input type="text" name="harga" class="form-control" readonly value="<?php echo $data['harga'] ?>" />
										<br />
										<label for="cname_pembeli">Nama Pemesan</label>
										<input type="text" name="nama_pemesan" class="form-control" />
										<br />
										<label for="cemail_pembeli">Email</label>
										<input type="text" name="email" class="form-control" />
										<br />
										<label for="cjk_pembeli">Waktu</label>
										<input type="date" name="waktu" class="form-control">
										<br />
										<label for="cjk_pembeli">Jumlah Hari</label>
										<input type="text" name="jml_hari" class="form-control">
										<br />
										<label for="cjk_pembeli">Alamat</label>
										<input type="text" name="alamat" class="form-control">
										<br />
										<label for="cjk_pembeli">Nomor HP/WA</label>
										<input type="text" name="nomorhp" class="form-control">
										<br />
										<label for="cjk_pembeli">Jumlah Orang</label>
										<input type="text" name="jml_orang" class="form-control">
										<br />
										<label for="cumur_pembeli">Pesan</label>
										<input type="text" name="pesan" class="form-control" />
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
			</div>
	</section>
	<!-- End destinations Area -->

	<!-- start footer Area -->
	<footer class="footer-area section-gap">
		<div class="container">

			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Travelista</h6>
						<p>
							Jl. Babarsari Jl. Tambak Bayan No.2, Janti,
							Caturtunggal, Kec. Depok, Kabupaten Sleman,
							Daerah Istimewa Yogyakarta 55281 <br><br>
							<strong>Telp:</strong> +6282 3305 4978<br>
							<strong>Email:</strong> support@travelista.com<br>
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