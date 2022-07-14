<?php
session_start();
$username = $_SESSION['username'];
if (empty($_SESSION['username'])) {
	header("location:user/login.php");
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