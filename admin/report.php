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
                <h1>Report</h1>
                  <form action="" method="post">
                    <table border="1" cellpadding="0" cellspacing="0">
                      <tr>
                        <th>No.</th>
                        <th>No Tiket</th>
                        <th>Total Belanja</th>
                        <th>Action</th>
                      </tr>

                    <?php
                    $no = 1;
	                   $data = mysqli_query($conn,"SELECT no_tiket, SUM(total_harga) AS total_harga  FROM checkout GROUP BY no_tiket");
	                    while($d = mysqli_fetch_array($data)){
                         ?>
                    <tr style="text-align:center">
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d['no_tiket'];?></td>
                      <td><?php echo $d['total_harga'];?></td>
                      <td>
                        <a href="detilreport.php?id=<?php echo $d['no_tiket']; ?>">Detil</a>
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
