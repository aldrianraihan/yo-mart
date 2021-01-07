<?php
//melakukan koneksi ke database
include ('config.php');
?>

<!DOCTYPE HTML>
<!--
	Overflow by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Odeta Resto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Header -->
			<section id="header">
				<header>
					<h1>Odeta Resto</h1>
					<p>Resto for fancy and healthy food</p>
				</header>
				<footer>
					<a href="#banner" class="button style2 scrolly-middle">Click! for your table number</a>
				</footer>
			</section>

		<!-- Banner -->
			<section id="banner">
				<header>
					<h2>Table Number</h2>
				</header>
				<form action = "save_table.php" method = "POST">
					<input type="text" style="text-align: center" class="form-control" name="nomeja" placeholder="click here.." >
					</div><br><br>
					<button type="submit" class="btn btn-info" name = "selesai">Selesai</button>
				</form>
			</section>

		<section id="footer">
			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
				<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
				<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
				<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
			</ul>
			<div class="copyright">
				<ul class="menu">
					<li>&copy; 2018 Odeta. All rights reserved.</li>
				</ul>
			</div>
		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
