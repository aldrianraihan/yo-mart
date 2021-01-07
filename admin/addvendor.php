<?php
  include "header.php";
  include "config.php";
?>

        <div id="page-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">Form Add Vendor</h1>
            </div>
            <div id="content-wrapper">
              <div class="container-fluid">
                <body>
                  <form method="post" action="tambah-vendor.php" enctype='multipart/form-data'>
                    <div class="container">
                      <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th scope= >Vendor Name</th>
                            <td><input class="text"  name="VendorName"></input></td>
                          </tr>
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
