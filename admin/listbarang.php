<?php
  include "header.php";
  include 'config.php';
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <body>
                <center>
                <h1>List Barang</h1>
                  <form action="" method="post">
                    <table border="1" cellpadding="0" cellspacing="0">
                      <tr>
                        <th>No.</th>
                        <th>Nama Barang</th>
                        <th>Stock Barang</th>
                        <th>Harga Satuan</th>
                        <th>Deskripsi</th>
                        <th>Vendor</th>
                        <th>Action</th>
                      </tr>

                    <?php
                    $no = 1;
	                   $data = mysqli_query($conn,"SELECT * FROM barang ORDER BY id_vendor ASC");
	                    while($d = mysqli_fetch_array($data)){
                         ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d['nama_barang'];?></td>
                      <td><?php echo $d['stock_barang'];?></td>
                      <td><?php echo $d['harga_satuan'];?></td>
                      <td align="center">
                        <img src="../upload/<?php echo $d['gambarang']; ?>" width="200" length="100">
                      </td>
                      <td>
                        <?php
                          if ($d['id_vendor'] == '1') {
                            echo "Carrefour";
                          }elseif ($d['id_vendor'] == '2') {
                            echo "Alfamart";
                          }elseif ($d['id_vendor'] == '3') {
                            echo "Lotte";
                          }else {
                            echo "Hypermart";
                          }
                        ?>
                      </td>
                      <td>
                        <a href="edit.php?id=<?php echo $d['id_barang']; ?>">EDIT</a>  |
                        <a href="delete.php?id=<?php echo $d['id_barang']; ?>">HAPUS</a>
                      </td>
                    </tr>
                  <?php
                    }

                   ?>
                </table>
                </form>
                </center>
                </body>


<?php
  include "footer.php";
?>
