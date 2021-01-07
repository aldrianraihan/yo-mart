<?php
session_start();

include '../config.php';
include 'header.php';

$querytiket = mysqli_query($conn,"select max(no_tiket) as no_tiket from checkout");
$data = mysqli_fetch_array($querytiket);
$no_tiket = intval($data['no_tiket']);
$no_tiket++;
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
		<h1 class="heading text-center text-uppercase mb-5">Keranjang</h1>
			<div class="inner_sec">
				<form class="" action="prosescekout.php" method="post">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Toko</th>
								<th>Nama Barang</th>
								<th>Jumlah Pembelian</th>
								<th>Subharga</th>
								<th>total harga</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$query = mysqli_query($conn, "SELECT * FROM keranjang where jumlah_pembelian <> ''");
								$query2 = mysqli_query($conn, "select SUM(harga_satuan * jumlah_pembelian) as hasil from keranjang");
								$query3 = mysqli_query($conn, "select * from alamat where no_tiket = '$no_tiket'");
								$data3 = mysqli_fetch_array($query3);
								$data2 = mysqli_fetch_array($query2);
								while($data = mysqli_fetch_array($query)){
									?>
										<tr>
											<td>
												<?php echo $no++; ?>
											</td>
											<td>
												<?php echo $data['vendor_name']; ?>
												<input type="text" name="id_vendor[]" value="<?php echo $data['id_vendor']; ?>" hidden>
											</td>
											<td>
												<?php echo $data['nama_barang']; ?>
												<input type="text" name="nama_barang[]" value="<?php echo $data['nama_barang']; ?>" hidden>
												<input type="text" name="id_barang[]" value="<?php echo $data['id_barang']; ?>" hidden>
											</td>
											<td>
												<?php echo $data['jumlah_pembelian']; ?>
												<input type="text" name="jumlah_pembelian[]" value="<?php echo $data['jumlah_pembelian']; ?>" hidden>
												<input type="text" name="jumlah_stok[]" value="<?php echo $data['jumlah_stok']; ?>" hidden>
											</td>
											<td>
												<?php echo $data['harga_satuan']; ?>
												<input type="text" name="harga_satuan[]" value="<?php echo $data['harga_satuan']; ?>" hidden>
											</td>
											<td>
												<?php echo intval($data['jumlah_pembelian']) * intval($data['harga_satuan']); ?>
												<input type="text" name="total_harga[]" value="<?php echo intval($data['jumlah_pembelian']) * intval($data['harga_satuan']); ?>" hidden>
											</td>
										</tr>
									<?php
								}
							?>
							<tr>
								<td colspan="5"><center>TOTAL HARGA</center></td>
								<td><?php echo $data2['hasil']; ?></td>
							</tr>
							<tr>
								<td colspan="5"><center>TOTAL ONGKIR</center></td>
								<td><?php echo $data3['harga_ongkir']; ?></td>
							</tr>
							<tr>
								<td colspan="5"><center>TOTAL KESELURUHAN</center></td>
								<td><?php echo intval($data2['hasil']) + intval($data3['harga_ongkir']); ?></td>
							</tr>
							<tr>
								<td colspan="6">
									<button type="submit" name="button">Check Out</button>
									<button><a href="vendors.php">Belanja Lagi</a></button>
									<button><a href="alamat.php">Alamat Pemesanan</a></button>
								</td>
							</tr>
						</tbody>
					</table>
				</form>
			</div>
		</div>
</section>

<?php
	include "footer.php";
?>
