<?php
include "config.php";

#print_r($_POST);
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$id_vendor = $_POST['id_vendor'];
$stock_barang = intval($_POST['stock_barang']);
$new_stock = intval($_POST['new_stock']);
$new_harga = $_POST['new_harga'];
$sum = $stock_barang + $new_stock;

$queryupdate = mysqli_query($conn,"update barang set stock_barang = '$sum', harga_satuan = '$new_harga' where id_barang = $id_barang");

if ($queryupdate){
  echo "<script>
  alert('Data berhasil di update');
  window.location.href='addbarang.php';
  </script>";
}else{
  echo "<script>alert('Data gagal di update');
  history.go(-1);
  </script>";
}

?>
