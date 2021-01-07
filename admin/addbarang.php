<?php
  include "header.php";
  include "config.php";
?>
        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Form Add Barang</h1>
            </div>
            <div id="content-wrapper">
              <div class="container-fluid">
                <body>
                  <form method="post" action="tambah-aksi.php" enctype='multipart/form-data'>
                    <div class="container">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th scope= >Category</th>
                            <td>
                              <select name = "category">
                                <option disabled selected> Pilih </option>
                                  <?php
                                  $queryCategory = mysqli_query($conn,"SELECT * from categories");
                                  while($dataCategory = mysqli_fetch_assoc($queryCategory)){
                                    ?>
                                      <option value="<?php echo $dataCategory['id_category']; ?>"><?php echo $dataCategory['nama_category']; ?></option>
                                    <?php
                                  }
                                  ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">Vendor</th>
                            <td>
                              <select name = "vendor">
                                <option disabled selected> Pilih </option>
                                  <?php
                                  $queryCategory = mysqli_query($conn,"SELECT * from vendor");
                                  while($dataCategory = mysqli_fetch_assoc($queryCategory)){
                                    ?>
                                      <option value="<?php echo $dataCategory['id_vendor']; ?>"><?php echo $dataCategory['vendor_name']; ?></option>
                                    <?php
                                  }
                                  ?>
                                </select>
                            </td>
                          </tr>
                          <tr>
                            <th scope= >Nama Item</th>
                            <td><input type="text"  name="Nama_Item"></input></td>
                          </tr>
                          <tr>
                            <th scope= >Quantity</th>
                            <td><input class="text"  name="Quantity"></input></td>
                          </tr>
                          <tr>
                            <th scope= >Harga Satuan</th>
                            <td><input class="text"  name="Harga_Satuan"></input></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td>
                                <input type='file' name='file' required>
                                <br><p>(PDF, PNG, JPG, and Jpeg format)</p></br>
                            </td>
                          </tr>
                          <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-primary">Submit</button></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </form>
                </body>
              </div>
            </div>
          </div>
        </div>


<?php
  include "footer.php";
?>
