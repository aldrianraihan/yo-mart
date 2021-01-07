<?php
session_start();

include('config.php');
include 'header.php';

?>

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

<!-- inner page banner -->

<section class="banner_bottom proj py-5">
		<div class="wrap_view">
		<h1 class="heading text-center text-uppercase mb-5"> Checkout </h1>
			<div class="inner_sec">
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
						<?php $totalharga = 0; ?>
						<?php foreach ($_SESSION['keranjang'] as $id_menu => $jumlah):?>
						<!-- menampilkan menu yang diperluangkan berdasarkan id_menu-->
						<?php
						$ambil = $conn -> query("SELECT * FROM menu WHERE id_menu = '$id_menu'");
						$pecah = $ambil->fetch_assoc();
						$subharga = $pecah["harga"]*$jumlah;

						?>
						<tr>
							<td><?php echo $nomor; ?></td>
							<td><?php echo $pecah["nama_menu"]; ?></td>
							<td>Rp. <?php echo number_format($pecah["harga"]); ?></td>
							<td><?php echo $jumlah; ?></td>
							<td>Rp. <?php echo number_format($subharga); ?></td>
						</tr>
						<?php $nomor++; ?>
						<?php $totalharga+=$subharga; ?>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<th colspan = "4">Total Belanja</th>
						<th>Rp. <?php echo number_format($totalharga) ?></th>
					</tfoot>
				</table>
				<form method="POST">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nomor_pelangan"] ?>" class="form-control">
							</div>
						</div>
						<div class="col-md-4">
							<select class="form-control" name="id_ongkir">
								<option value="">--Pilih Ongkos Kirim--</option>
								<?php
								$ambil = $conn->query("SELECT * FROM ongkir");
								while($perongkir=$ambil->fetch_assoc()){
								 ?>
								<option value="<?php echo $perongkir["id_ongkir"]; ?>">
									<?php echo $perongkir['nama_kota']; ?>-
									Rp. <?php echo number_format($perongkir['tarif']); ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<div class = "col-md-10">
							<button type "checkout" name = "checkout" class = "btn btn-info">Detail Pembelian</a>
						</div>
					</div>
				</form>
				<?php
					if (isset($_POST["checkout"])) {
						$id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
						$id_ongkir = $_POST["id_ongkir"];
						$tanggal_pembelian = date("Y-m-d");

						$ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
						$arrayongkir = $ambil->fetch_assoc();
						$tarif = $arrayongkir['tarif'];

						$total_pembelian = $totalharga + $tarif;

						$conn->query("INSERT INTO pembelian (id_pelanggan,id_ongkir, tanggal_pembelian,total_pembelian) VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian')");
						//mendapatkan id_pembelian
						$id_pembelian_baru = $conn->insert_id;

						foreach($_SESSION["keranjang"] as $id_menu => $jumlah)
						{
							$conn->query("INSERT INTO detail_pembelian (id_pembelian,id_menu,jumlah) VALUES ('$id_pembelian_baru','$id_menu','$jumlah')");
						}

						echo "<script>alert('Pembelian Sukses');</script>";
						echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
					}
				?>
			</div>
		</div>
</section>


<?php
	include "footer.php";
?>
