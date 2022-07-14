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
<?php if (isset($_GET['pesan'])) {
	if ($_GET['pesan'] == "gagalbuat") { ?>
		<script>
			alert("Yah gagal buat account, yuk bikin lagi!");
		</script>
<?php }
} ?>
<?php if (isset($_GET['pesan'])) {
	if ($_GET['pesan'] == "terkirim") { ?>
		<script>
			alert("Yasshhh komentarmu sudah terkirim!");
		</script>
<?php }
} ?>
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
					<a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
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
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-between">
				<div class="col-lg-6 col-md-6 banner-left">
					<h6 class="text-white">Teman travel kamu</h6>
					<h1 class="text-white">Travelista</h1>
					<p class="text-white">
						Travelista adalah perusahaan travel online terlengkap & paling menguntungkan dengan 3 tahun pengalaman serta kehadiran di berbagai daerah di Indonesia.
					</p>
					<a href="about.php" class="primary-btn text-uppercase">Selengkapnya</a>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start popular-destination Area -->
	<section class="popular-destination-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Popular Destinations</h1>
						<p>Destinasi yang sering dikunjungi oleh pelancong.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4">
					<div class="single-destination relative">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src="../img/packages/bromo.png" alt="">
						</div>
						<div class="desc">
							<h4>Gunung Bromo</h4>
							<p>Magelang | Jawa Tengah</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-destination relative">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src="../img/packages/bali.png" alt="">
						</div>
						<div class="desc">
							<h4>Pantai Pandawa</h4>
							<p>Kuta | Bali</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="single-destination relative">
						<div class="thumb relative">
							<div class="overlay overlay-bg"></div>
							<img class="img-fluid" src="../img/packages/lombok.png" alt="">
						</div>
						<div class="desc">
							<h4>Pulau Komodo</h4>
							<p>Nusa Tenggara Barat</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End popular-destination Area -->

	<!-- Start testimonial Area -->
	<section class="testimonial-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">
							Testimonial</h1>
						<p>Banyak pelanggan yang merasa puas dengan pelayanan kami.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="active-testimonial">
					<?php
					include '../koneksi.php';
					$query = mysqli_query($konek, "SELECT * FROM komen");
					while ($data = mysqli_fetch_array($query)) { ?>
						<div class="single-testimonial item d-flex flex-row">
							<div class="thumb">
								<img class="img-fluid" src="img/elements/user1.png" alt="">
							</div>
							<div class="desc">
								<p>
									<?php echo $data['isi']; ?>
								</p>
								<h4><?php echo $data['nama']; ?></h4>
								<div class="">
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	<!-- End testimonial Area -->


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