<?php
session_start();

include ('config.php');

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
	echo "<script>alert('Keranjang anda kosong, silahkan pilih menu terlebih dahulu');</script>";
	echo "<script>location='menu.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" type="images/png" href="images/odeta2.png">
<title>Odeta Resto</title>
	
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Cafe In Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->
	
	<!-- css files -->
	<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
	<link rel="stylesheet" href="css/fontawesome-all.css"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->

	<link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
	
	<!-- web-fonts -->
	<link href="//fonts.googleapis.com/css?family=Alegreya+Sans:100,100i,300,300i,400,400i,500,500i,700,700i,800,800i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<!-- //web-fonts -->
	
</head>

<body>

<!-- Navigation -->
<header>
	<div class="top-nav">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand text-uppercase" href="gallery.html">Odeta Resto</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center pr-md-4" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a class="nav-link" href="meja.php">Home <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="menu.php">Food Menu</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="keranjang.php">Keranjang</a>
						</li>
						<!-- jk sudah login(pd session pelanggan) -->
						<?php if (isset($_SESSION["pelanggan"])): ?>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>
						<!-- selain itu belom login -->
						<?php else: ?>
						<li class="nav-item">
							<a class="nav-link" href="login.php">Login</a>
						</li>
						<?php endif ?>
						
						<li class="nav-item">
							<a class="nav-link" href="checkout.php">Checkout</a>
						</li>
						<!--<li class="dropdown nav-item">
							<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Pages
								<b class="caret"></b>
							</a>
							<ul class="dropdown-menu agile_short_dropdown">
								<li>
									<a href="error.html">Error Page</a>
								</li>
								<li>
									<a href="typography.html">Typography</a>
								</li>
							</ul>
						</li>-->
						
						<!-- search -->
						<div class="search-bar-agileits">
							<div class="cd-main-header">
								<ul class="cd-header-buttons">
									<li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
								</ul>
								<!-- cd-header-buttons -->
							</div>
							<div id="cd-search" class="cd-search">
								<form action="#" method="post">
									<input name="Search" type="search" placeholder="Click enter after typing...">
								</form>
							</div>
						</div>
						<!-- search -->
						
					</ul>
				</div>
			</nav>
		</div>
	</div>
</header>
<!-- //Navigation -->

<!-- inner page banner -->
<section class="inner_banner">
	<div class="dot1">
	</div>
</section>
<!-- inner page banner -->

<section class="banner_bottom proj py-5">
		<div class="wrap_view">
		<h1 class="heading text-center text-uppercase mb-5"> Detail Pembelian </h1>
			<div class="inner_sec">
				<?php 
				$ambil = $conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan WHERE pembelian.id_pembelian = '$_GET[id]'");
				$detail = $ambil->fetch_assoc(); 

				?>
				<div class = "row">
					<div class = "col-md-4">
						<strong>Pelanggan</strong> <br>
						<p>
							Nama : <?php echo $detail['nama_pelanggan']; ?><br>
							Email : <?php echo $detail['email_pelanggan']; ?><br>
							Nomor : <?php echo $detail['nomor_pelangan']; ?> <br>
							Alamat : <?php echo $detail['alamat']; ?>
						</p>
					</div>
					<br>
					<div class = "col-md-4">
						<strong>Pembelian</strong>
						<p>
							ID Pembelian : <?php echo ($detail['id_pembelian']); ?><br>
							Tanggal : <?php echo ($detail['tanggal_pembelian']); ?><br>
							Total Harga : Rp. <?php echo number_format($detail['total_pembelian']); ?><br>
						</p>
					</div>
					<div class = "col-md-4">
						<strong>Ongkir</strong>
						<?php $ambil = $conn->query("SELECT * FROM pembelian JOIN ongkir ON pembelian.id_pelanggan = ongkir.id_ongkir WHERE pembelian.id_pembelian = '$_GET[id]'");
						$ongkir = $ambil->fetch_assoc(); ?>
						<p>
							Tujuan : <?php echo ($ongkir['nama_kota']); ?><br>
							Tarif Ongkir : Rp. <?php echo number_format(($ongkir['tarif'])); ?>
						</p>
					</div>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Menu</th>
							<th>Harga</th>
							<th>Jumlah</th>
							<th>Subharga</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor=1; ?>
						<!-- menampilkan menu yang diperluangkan berdasarkan id_menu-->
						<?php
						$ambil = $conn -> query("SELECT * FROM detail_pembelian JOIN menu ON detail_pembelian.id_menu=menu.id_menu WHERE detail_pembelian.id_pembelian='$_GET[id]'");
						?>
						<?php while($pecah=$ambil->fetch_assoc()){ ?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_menu"]; ?></td>
							<td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
							<td><?php echo $pecah["jumlah"]; ?></td>
							<td>Rp. <?php echo number_format($pecah["harga"] * $pecah["jumlah"]); ?></td>
						</tr>
						<?php $nomor++; ?>
						<?php } ?>
					</tbody>
				</table>

				<div class = "row">
					<div class = "col-md-7">
						<div class = "alert alert-info">
							<p>
								Silahkan anda melakukan pembayaran sebesar Rp.<?php echo number_format($detail['total_pembelian']); ?> <br>
								<strong>bisa dilakukan dengan COD (membayar langsung ke kurir)</strong> <br>
								
							</p>
			</div>
		</div>
</section>

<!-- footer -->	
<footer>
	<div class="container py-3">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				<p class="py-4">&copy; 2018 Odeta. All rights reserved.| Design by <a href="#" target="_blank">OdetaCompany</a></p>
			</div>
			<div class="col-lg-2 col-md-12 logo text-center">
				<a href="index.html">Odeta</a>
			</div>
			<div class="col-lg-5 col-md-12">
				<ul class="py-4">
					<li class="mx-2"><a href="meja.php">Home</a></li>
					<li class="mx-2"><a href="menu.php">Food menu</a></li>
					<li class="mx-2"><a href="keranjang.php">Keranjang</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- footer -->
		
<!-- js-scripts -->		

	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->	
	
	<!-- search-bar -->
	<script src="js/main.js"></script>
	<!-- //search-bar -->
	
	<!-- start-smoth-scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- start-smoth-scrolling -->

	<!-- jQuery-Photo-filter-lightbox-Gallery-plugin -->
	<script type="text/javascript" src="js/jquery-1.7.2.js"></script>
	<script src="js/jquery.quicksand.js" type="text/javascript"></script>
	<script src="js/script.js" type="text/javascript"></script>
	<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->
	
<!-- //js-scripts -->

</body>
</html>