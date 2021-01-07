<?php
session_start();

include '../config.php';
include 'header.php';

$id_vendor = $_GET['id'];
$id_category = $_GET['id2'];
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
		<h1 class="heading text-center text-uppercase mb-5">Pilih Barang</h1>
			<div class="inner_sec">
        <form class="" action="proseskeranjang.php" method="post">
          <table class="table table-bordered">
  					<thead>
  						<tr>
  							<th>No</th>
  							<th>Nama Barang</th>
								<th>Deskripsi</th>
  							<th>Jumlah Stock Barang</th>
  							<th>Subharga</th>
  							<th>Jumlah Pembelian</th>
  						</tr>
  					</thead>
  					<tbody>
              <?php
                $no=1;
                $query = mysqli_query($conn, "SELECT a.id_barang AS id_barang, a.nama_barang AS nama_barang, a.gambarang AS gambarang, a.stock_barang AS stock_barang, a.harga_satuan AS harga_satuan, a.id_vendor AS id_vendor, b.vendor_name AS vendor_name, a.id_category AS id_category FROM barang AS a JOIN vendor AS b ON a.id_vendor = b.id_vendor  WHERE a.id_vendor = '$id_vendor' AND a.id_category = '$id_category'");
                while($d = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $d['nama_barang'] ?></td>
										<td align="center">
											<img src="../upload/<?php echo $d['gambarang']; ?>" width="100" length="200">
										</td>
                    <td style="text-align: center;"><?php echo $d['stock_barang'] ?></td>
                    <td style="text-align: right;"><?php echo $d['harga_satuan'] ?></td>
                    <td style="text-align: center;">
											<input type="text" name="idbarang[]" value="<?php echo $d['id_barang'] ?>" hidden>
											<input type="text" name="namabarang[]" value="<?php echo $d['nama_barang'] ?>" hidden>
											<input type="text" name="stok[]" value="<?php echo $d['stock_barang'] ?>" hidden>
											<input type="text" name="hargasatuan[]" value="<?php echo $d['harga_satuan'] ?>" hidden>
											<input type="text" name="idvendor[]" value="<?php echo $da['id_vendor'] ?>" hidden>
											<input type="text" name="namavendor[]" value="<?php echo $d['vendor_name'] ?>" hidden>
											<input type="text" name="idcategory[]" value="<?php echo $d['id_category'] ?>" hidden>
											<input type="text" name="jumlahpembelian[]" value="">
										</td>
                  </tr>
                  <?php
                }
              ?>
              <tr>
                <td><button type="submit" name="submit">Submit</button></td>
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
