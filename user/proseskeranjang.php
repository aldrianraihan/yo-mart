<?php

include '../config.php';

#print_r($_POST);

$count = count($_POST['idbarang']);
for ($i=0; $i < $count; $i++) {
  if ($_POST['stok'][$i] < $_POST['jumlahpembelian'][$i]) {
    echo "<script>alert('jumlah pembelian ".$_POST['namabarang'][$i]." melebihi stock');
    history.go(-1);
    </script>";
  }else {
    if ($_POST['jumlahpembelian'][$i]  != '') {
      $sql = "INSERT INTO keranjang(id_barang, nama_barang, jumlah_stok, harga_satuan, jumlah_pembelian, id_vendor, vendor_name, id_category) VALUES ('".$_POST['idbarang'][$i]."','".$_POST['namabarang'][$i]."','".$_POST['stok'][$i]."','".$_POST['hargasatuan'][$i]."','".$_POST['jumlahpembelian'][$i]."','".$_POST['idvendor'][$i]."','".$_POST['namavendor'][$i]."','".$_POST['idcategory'][$i]."')";
      $insert = mysqli_query($conn, $sql);
      if ($insert) {
        echo "<script>alert('".$_POST['namabarang'][$i]." berhasil  di input');
        window.location.href='keranjang.php';
        </script>";
      }else{
        echo "<script>alert('data gagal di input');
        history.go(-1);
        </script>";
      }
    }
  }
}
/*
for ($i=0; $i < $count; $i++) {
  if ($_POST['stok'][$i] < $_POST['jumlahpembelian'][$i]) {
    echo "<script>alert('jumlah pembelian melebihi stock');
    history.go(-1);
    </script>";
  }else {
    $sql = "INSERT INTO keranjang(id_barang, nama_barang, jumlah_stok, harga_satuan, jumlah_pembelian, id_vendor, vendor_name, id_category) VALUES ";

    for ($i=0; $i < $count; $i++) {
      $sql.="('".$_POST['idbarang'][$i]."','".$_POST['namabarang'][$i]."','".$_POST['stok'][$i]."','".$_POST['hargasatuan'][$i]."','".$_POST['jumlahpembelian'][$i]."','".$_POST['idvendor'][$i]."','".$_POST['namavendor'][$i]."','".$_POST['idcategory'][$i]."'),";
    }

    $query = rtrim($sql, ',');
    #echo "$query";

    $insert = mysqli_query($conn, $query);

    if ($insert){
      echo "<script>alert('data berhasil di input');
      window.location.href='keranjang.php';
      </script>";
    }else{
      echo "<script>alert('data gagal di input');
      history.go(-1);
      </script>";
    }
  }
}
*/

?>
