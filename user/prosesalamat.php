<?php

include '../config.php';

#print_r($_POST);

$nama = $_POST['nama'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
if ($kota == 'jakarta') {
  $harga = '30000';
}elseif ($kota == 'bogor') {
  $harga = '50000';
}elseif ($kota == 'depok') {
  $harga = '50000';
}elseif ($kota == 'bekasi') {
  $harga = '60000';
}elseif ($kota == 'kab. Bogor') {
  $harga = '40000';
}else {
  $harga = '40000';
}

$querytiket = mysqli_query($conn,"select max(no_tiket) as no_tiket from checkout");
$data = mysqli_fetch_array($querytiket);
$no_tiket = intval($data['no_tiket']);
$no_tiket++;

$query = mysqli_query($conn,"INSERT INTO alamat(no_tiket, nama_penerima, kota, alamat, harga_ongkir) VALUES ('$no_tiket','$nama','$kota','$alamat','$harga')");
if ($query) {
  echo "<script>alert('data berhasil  di input');
  window.location.href='keranjang.php';
  </script>";
}else{
  echo "<script>alert('data gagal di input');
  history.go(-1);
  </script>";
}
?>
