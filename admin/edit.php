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
                <h1>Update Barang</h1>
                <?php
                  include "config.php";
                  $id = $_GET['id'];
                  $query = mysqli_query($conn,"SELECT * FROM barang as a join vendor as b on a.id_vendor = b.id_vendor where id_barang = $id");
                  while($d=mysqli_fetch_array($query)){
                    ?>
                    <form action="prosesupdate.php" method="post">
                      <table>
                        <tr>
                          <td>Nama Barang</td>
                          <td>:</td>
                          <td>
                            <input type="text" hidden name="id_barang" value="<?php echo $d['id_barang'] ; ?>">
                            <input type="text" readonly name="nama_barang" value="<?php echo $d['nama_barang'] ; ?>">
                          </td>
                        </tr>
                        <tr>
                          <td>Vendor</td>
                          <td>:</td>
                          <td>
                            <input type="text" hidden name="id_vendor" value="<?php echo $d['id_vendor'] ; ?>">
                            <input type="text" readonly name="vendor_name" value="<?php echo $d['vendor_name'] ; ?>">
                          </td>
                        </tr>
                        <tr>
                          <td>Stock Barang</td>
                          <td>:</td>
                          <td>
                            <input type="text" hidden name="stock_barang" value="<?php echo $d['stock_barang'] ; ?>">
                            <input type="text" name="new_stock" value="">
                          </td>
                        </tr>
                        <tr>
                          <td>Harga Barang</td>
                          <td>:</td>
                          <td>
                            <input type="text" name="new_harga" value="<?php echo $d['harga_satuan'] ; ?>">
                          </td>
                        </tr>
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
