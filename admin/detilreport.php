<?php
  include "header.php";
  include 'config.php';
  $id = $_GET['id'];
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <body>
                <center>
                <h1>Detil Report</h1>
                  <table border="1" cellpadding="0" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
        								<th>Nama Barang</th>
        								<th>Subharga</th>
        								<th>Jumlah Pembelian</th>
        								<th>total harga</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
	                    $data = mysqli_query($conn,"select * from checkout where no_tiket = '$id'");
                      $data2 = mysqli_query($conn,"SELECT a.no_tiket AS no_tiket, SUM(a.total_harga) AS total_harga, b.harga_ongkir as harga_ongkir FROM checkout AS a JOIN alamat AS b ON a.no_tiket = b.no_tiket WHERE a.no_tiket = '$id'");
                      $d2 = mysqli_fetch_array($data2);
	                    while($d = mysqli_fetch_array($data)){
                         ?>
                      <tr style="text-align:center">
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $d['nama_barang'];?></td>
                        <td><?php echo $d['harga_satuan'];?></td>
                        <td><?php echo $d['jumlah_pembelian'];?></td>
                        <td><?php echo $d['total_harga'];?></td>
                      </tr>
                    <?php
                      }
                     ?>
                     <tr style="text-align:center">
                       <td colspan="4">Total Harga</td>
                       <td><?php echo $d2['total_harga']; ?></td>
                     </tr>
                     <tr style="text-align:center">
                       <td colspan="4">Total Ongkir</td>
                       <td><?php echo $d2['harga_ongkir']; ?></td>
                     </tr>
                     <tr style="text-align:center">
                       <td colspan="4">Total Keseluruhan</td>
                       <td><?php echo intval($d2['harga_ongkir']) + intval($d2['total_harga']); ?></td>
                     </tr>
                    </tbody>
                </table>
                </center>
                </body>


<?php
  include "footer.php";
?>
