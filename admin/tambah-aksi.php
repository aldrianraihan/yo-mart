<?php
// koneksi database
include 'config.php';

#print_r($_POST);

$category = $_POST['category'];
$vendor = $_POST['vendor'];
$Nama_Item = $_POST['Nama_Item'];
$Quantity = $_POST['Quantity'];
$Harga_Satuan = $_POST['Harga_Satuan'];
$temp = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$ekstensi_file =array('jpg','jpeg','png');
$ekstensi = pathinfo($name, PATHINFO_EXTENSION);
$ekstensi_ok =in_array($ekstensi, $ekstensi_file);
$folder = "../upload/".$name;
$query = "insert into barang values ('','$Nama_Item','$Quantity','$Harga_Satuan','$name','$vendor','$category')";

$upload = move_uploaded_file($temp, $folder);
$insert = mysqli_query($conn, $query);

if ($insert && $upload) {
  echo "<script>alert('data berhasil di input');
  window.location.href='addbarang.php';
  </script>";
}else {
  echo "<script>alert('data gagal di input');
  history.go(-1);
  </script>";
}

?>
