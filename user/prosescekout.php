<?php

include 'config.php';

#print_r($_POST);

$count = count($_POST['id_barang']);

$querytiket = mysqli_query($conn,"select max(no_tiket) as no_tiket from checkout");
$data = mysqli_fetch_array($querytiket);
$no_tiket = intval($data['no_tiket']);
$no_tiket++;

$sql = "INSERT INTO checkout(id_barang, no_tiket, nama_barang, jumlah_pembelian, harga_satuan, total_harga) VALUES ";
$query2 = "DELETE FROM keranjang";

for ($i=0; $i < $count; $i++) {
  $sql.="('".$_POST['id_barang'][$i]."','$no_tiket','".$_POST['nama_barang'][$i]."','".$_POST['jumlah_pembelian'][$i]."','".$_POST['harga_satuan'][$i]."','".$_POST['total_harga'][$i]."'),";
}

$query = rtrim($sql, ',');
$insert = mysqli_query($conn, $query);

if ($insert){
  mysqli_query($conn, $query2);
  for ($i=0; $i < $count; $i++) {
    $databarang[$i] = intval($_POST['jumlah_stok'][$i]) - intval($_POST['jumlah_pembelian'][$i] );
    $queryupdate = mysqli_query($conn,"update barang set stock_barang = '".$databarang[$i]."' where id_barang = '".$_POST['id_barang'][$i]."';");
  }
  echo "<script>alert('data berhasil di input');
  window.location.href='index.php';
  </script>";
}else{
  echo "<script>alert('data gagal di input');
  history.go(-1);
  </script>";
}
?>
