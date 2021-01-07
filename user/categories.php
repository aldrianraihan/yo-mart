<?php
session_start();
//koneksi ke database
include '../config.php';
include 'header.php';

$id = $_GET['id'];
?>

<section class="food-Slider py-5">
	<div class="container">
		<h2 class="heading text-center text-uppercase mb-5"> Categories </h2>
		<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row">
							<?php
								$query = mysqli_query($conn,"SELECT a.id_vendor AS id_vendor, b.vendor_name AS vendor_name, c.id_category AS id_category, c.nama_category AS nama_category, c.gambar_categories AS gambar_categories FROM barang AS a JOIN vendor AS b ON a.id_vendor = b.id_vendor JOIN categories AS c ON a.id_category = c.id_category WHERE a.id_vendor = '$id' GROUP BY a.id_vendor, c.id_category ORDER BY a.id_vendor, c.id_category");
								while ($data = mysqli_fetch_array($query)) {
									?>
									<a href="pilihbarang.php?id=<?php echo $id; ?>&id2=<?php echo $data['id_category']; ?>">
										<img src="<?php echo $data['gambar_categories']; ?>" style="margin-left:15px;width:200px;length:100px;">
									</a>
									<?php
								}
							?>
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
