<!-- footer -->
<footer>
	<div class="container py-3">
		<div class="row">
			<div class="col-lg-5 col-md-12">
				<p class="py-4">&copy; 2020 Yo-Mart. All rights reserved.| Design by <a href="#" target="_blank">Yo-Mart Company</a></p>
			</div>
			<div class="col-lg-0 col-md-0 logo text-center">
				<a href="index.html">Yo-Mart</a>
			</div>
			<div class="col-lg-5 col-md-12">
				<ul class="py-4">
					<li class="mx-2"><a href="meja.php">Home</a></li>
					<li class="mx-2"><a href="menu.php">Category</a></li>
					<li class="mx-2"><a href="keranjang.php">Keranjang</a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>
<!-- footer -->

<!-- js-scripts -->

	<!-- js -->
	<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->
	<!-- //js -->

	<!-- Banner Responsive slider -->
	<script src="../js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 3
			$("#slider3").responsiveSlides({
				auto: true,
				pager: false,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- // Banner Responsive slider -->

	<!-- stats -->
	<script src="../js/jquery.waypoints.min.js"></script>
	<script src="../js/jquery.countup.js"></script>
	<script>
		$('.counter').countUp();
	</script>
	<!-- //stats -->

	<!-- search-bar -->
	<script src="../js/main.js"></script>
	<!-- //search-bar -->

	<!-- start-smoth-scrolling -->
	<script src="../js/SmoothScroll.min.js"></script>
	<script type="text/javascript" src="../js/move-top.js"></script>
	<script type="text/javascript" src="../js/easing.js"></script>
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
	<script type="text/javascript" src="../js/jquery-1.7.2.js"></script>
	<script src="../js/jquery.quicksand.js" type="text/javascript"></script>
	<script src="../js/script.js" type="text/javascript"></script>
	<script src="../js/jquery.prettyPhoto.js" type="text/javascript"></script>
	<!-- //jQuery-Photo-filter-lightbox-Gallery-plugin -->

<!-- //js-scripts -->

</body>
</html>
