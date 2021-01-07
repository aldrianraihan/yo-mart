<?php
session_start();

include '../config.php';
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
		<h1 class="heading text-center text-uppercase mb-5">Keranjang</h1>
			<div class="inner_sec">
				<form class="" action="prosesalamat.php" method="post">
					<table class="table table-bordered">
						<tr>
              <td>Nama Pemesan</td>
              <td>:</td>
              <td><input type="text" name="nama" value=""></td>
            </tr>
            <tr>
              <td>Kota/Kabupaten</td>
              <td>:</td>
              <td>
                <select class="" name="kota">
                  <?php
                    $query =  mysqli_query($conn, "select * from ongkir");
                    while ($data = mysqli_fetch_assoc($query)){
                      ?>
                        <option value="<?php echo $data['nama_daerah']; ?>"><?php echo $data['nama_daerah']; ?></option>
                      <?php
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr>
              <td>Alamat lengkap</td>
              <td>:</td>
              <td><input type="text" name="alamat" value=""></td>
            </tr>
            <tr>
              <td colspan="3">
                <button type="submit" name="button">Tambah Alamat</button>
              </td>
            </tr>
					</table>
				</form>
			</div>
		</div>
</section>

<?php
	include "footer.php";
?>
