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
                <h1>List Category</h1>
                  <form action="" method="post">
                    <table border="1" cellpadding="0" cellspacing="0">
                      <tr>
                        <th>No.</th>
                        <th>Category</th>
                        <th>Gambar Category</th>
                        <th>Action</th>
                      </tr>

                    <?php
                    $no = 1;
	                   $data = mysqli_query($conn,"SELECT * FROM categories ORDER BY id_category ASC");
	                    while($d = mysqli_fetch_array($data)){
                         ?>
                    <tr>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $d['nama_category'];?></td>
                      <td align="center">
                        <img src="<?php echo $d['gambar_categories']; ?>" width="200" length="100">
                      </td>
                      <td>
                        <a href="editcategory.php?id=<?php echo $d['id_category']; ?>">EDIT</a>  |
                        <a href="deletecategory.php?id=<?php echo $d['id_category']; ?>">HAPUS</a>
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
