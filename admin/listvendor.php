<?php
  include "header.php";
  include 'config.php';
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                <title>Penggunaan Tag Tabel</title>
                </head>
                <body>
                <center>
                <h1>List Vendor</h1>
                  <form action="" method="post">
                    <table border="1" cellpadding="0" cellspacing="0">
                      <tr>
                        <th>No.</th>
                        <th>Nama Vendor</th>
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>

                    <?php
                    $no = 1;
	                   $data = mysqli_query($conn,"SELECT * FROM vendor ORDER BY id_vendor ASC");
	                    while($d = mysqli_fetch_array($data)){
                         ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d['vendor_name'];?></td>
                      <td align="center">
                        <img src="<?php echo $d['Gambar_Vendor']; ?>" width="200" length="100">
                      </td>
                      <td>
                        <a href="editvendor.php?id=<?php echo $d['id_vendor']; ?>">EDIT</a>  |
                        <a href="deletevendor.php?id=<?php echo $d['id_vendor']; ?>">HAPUS</a>
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
