<?php
  include "header.php";
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                </head>
                <body>
                <center>
                <h1>Update Category</h1>
                <?php
                  include "config.php";
                  $id = $_GET['id'];
                  $query = mysqli_query($conn,"SELECT * FROM categories where id_category = $id");
                  while($d=mysqli_fetch_array($query)){
                    ?>
                    <form action="prosesupdatecategory.php" method="post" enctype='multipart/form-data'>
                      <table>
                        <tr>
                          <td>Category</td>
                          <td>:</td>
                          <td>
                            <input type="text" hidden name="id_category" value="<?php echo $d['id_category'] ; ?>">
                            <input type="text" name="nama_category" value="<?php echo $d['nama_category'] ; ?>">
                          </td>
                        </tr>
                        <tr>
                        <td>
                          Upload Gambar
                        </td>
                        <td>:</td>
                        <td>
                            <input type='file' name='file' required>
                        </td>
                      </tr>
                      <tr>
                        <td></td><td></td>
                        <td><br><p>(PDF, PNG, JPG, and Jpeg format)</p></br></td>
                        <tr>
                          <td>
                            <button type="submit" name="submit">Update Data</button>
                          </td>
                        </tr>
                      </table>
                    </form>
                    <?php
                  }
                  ?>
                  </center>
                  </body>


<?php
  include "footer.php";
?>
