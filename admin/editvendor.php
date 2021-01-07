<?php
  include "header.php";
?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="addbarang.php"><i class="fa fa-table fa-fw"></i> List Barang</a>
                        </li>
                        <li>
                            <a href="vendor.php"><i class="fa fa-edit fa-fw"></i> Add Vendor</a>
                        </li>
                        <li>
                            <a href="report.php"><i class="fa fa-edit fa-fw"></i> Report</a>
                        </li>
                        <li>

                            <!-- /.nav-second-level -->


                            <!-- /.nav-second-level -->


                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                </head>
                <body>
                <center>
                <h1>Update Vendor</h1>
                <?php
                  include "config.php";
                  $id = $_GET['id'];
                  $query = mysqli_query($conn,"SELECT * FROM vendor where id_vendor = $id");
                  while($d=mysqli_fetch_array($query)){
                    ?>
                    <form action="prosesupdatevendor.php" method="post" enctype='multipart/form-data'>
                      <table>
                        <tr>
                          <td>Nama Vendor</td>
                          <td>:</td>
                          <td>
                            <input type="text" hidden name="id_vendor" value="<?php echo $d['id_vendor'] ; ?>">
                            <input type="text" name="vendor_name" value="<?php echo $d['vendor_name'] ; ?>">
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
