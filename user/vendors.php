<?php
session_start();
//koneksi ke database
include "../config.php";
include "header.php";
?>

<!-- food slider -->
<section class="food-Slider py-5">
	<div class="container">
		<h2 class="heading text-center text-uppercase mb-5"> Our Vendors </h2>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row">
						<table>
							<tr>
								<td>
									<?php
										$query = mysqli_query($conn,"SELECT * FROM vendor ORDER BY id_vendor ASC");
										while ($data = mysqli_fetch_array($query)) {
											?>
											<a href="categories.php?id=<?php echo $data['id_vendor']; ?>">
												<img src="<?php echo $data['Gambar_Vendor']; ?>" style="width:200px;length:100px;">
											</a>
											<?php
										}
									?>
								</td>
							</tr>
						</table>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- //food slider -->

<!-- Newsletter -->
<section class="newsletter text-center py-5">
	<div class="container">

			<div class="social mt-5">
				<h4>Follow us</h4>
				<ul class="d-flex mt-3 justify-content-center">
					<li class="mx-2"><a href="#"><span class="fab fa-facebook"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-twitter-square"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fas fa-rss-square"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-linkedin"></span></a></li>
					<li class="mx-2"><a href="#"><span class="fab fa-google-plus-square"></span></a></li>
				</ul>
			</div>
		</div>

	</div>
</section>


<?php
	include "footer.php";
 ?>
