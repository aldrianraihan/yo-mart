<?php
session_start();

$koneksi = new mysqli("localhost","root","","sistem_cafe");
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
						<!-- jk sudag login(pd session pelanggan) -->
						<?php if (isset($_SESSION["pelanggan"])): ?>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Logout</a>
						</li>
						<!-- selain itu belom login -->
						<?php else: ?>
						<li class="nav-item">
							<a class="nav-link active" href="login.php">Login</a>
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

<!-- inner page banner 
<section class="inner_banner">
	<div class="dot1">
	</div>
</section>-->
<br><br><br><br><br>
<section class="banner_bottom proj py-5">
		<div class="wrap_view">
		<h1 class="heading text-center text-uppercase mb-5"> Login Pelanggan </h1>
			<div class="inner_sec">
				<!--<ul class="portfolio-categ filter">
					<li class="port-filter all active">
						<a href="#">All</a>
					</li>
					<li class="cat-item-1">
						<a href="#" title="Category 1">Menu Favorit</a>
					</li>
					<li class="cat-item-2">
						<a href="#" title="Category 2">Menu Keluarga</a>
					</li>
					<li class="cat-item-3">
						<a href="#" title="Category 3">Menu Artis</a>
					</li>
					<li class="cat-item-4">
						<a href="#" title="Category 4">Menu Anak Sekolah</a>
					</li>
				</ul>-->
	<center>
			<form method = "POST">
					<table align="center" width="30%" border="0">
						<tr>
					    	<td><input type="text" name="email" class = "form-control" placeholder="Your Email" /></td>
							<td></td>
						</tr><br>
						<tr>
							<td><input type="password" name="password" class = "form-control" placeholder="Your Password" /></td>
							<td></td>
						</tr>
						<tr>
							<br><td align = "center"><button type="submit" class = "btn btn-info" name="login">Sign In</button></td>
						</tr>
						<tr>
							<td align = "center"><a href="register.php" >Sign Up Here</a></td>
						</tr>
					</table>
			</form>
	</center>
					<?php 
					    if(isset($_POST["login"]))
					    {
					    	$email = $_POST["email"];
					    	$password = $_POST["password"];

					    	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

					    	$akunyangcocok = $ambil->num_rows;

					    	if($akunyangcocok==1){
					    		//sudah login
					    		$akun = $ambil->fetch_assoc();
					    		$_SESSION["pelanggan"] = $akun;
					    		echo"<script>alert('Anda berhasil login');</script>";
					    		echo "<script>location='checkout.php'</script>";
					    	}
					    	else{
					    		//gagal login
					    		echo "<script>alert('Anda gagal login, periksa akun anda kembali');</script>";
					    		echo"<script>location='login.php</script>";
					    	}
					    }
					?>
<br><br><br><br><br><br><br>

				<!--end portfolio-area -->

					<div class="clearfix"></div>
			</div>

		</div>
</section>
<br><br><br><br><br><br>
<!-- inner page banner -->
	
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