<?php
include "config.php";

#print_r($_POST);
$id_vendor = $_POST['id_vendor'];
$vendor_name = $_POST['vendor_name'];
$temp = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$ekstensi_file =array('jpg','jpeg','png');
$ekstensi = pathinfo($name, PATHINFO_EXTENSION);
$ekstensi_ok =in_array($ekstensi, $ekstensi_file);
$folder = "../upload/".$name;
$query = "UPDATE vendor SET vendor_name='$vendor_name', Gambar_Vendor= '$folder' WHERE id_vendor = '$id_vendor'";



$upload = move_uploaded_file($temp, $folder);
$insert = mysqli_query($conn, $query);

if ($insert && $upload) {
  echo "<script>alert('data berhasil di update');
  window.location.href='index.php';
  </script>";
}else {
  echo "<script>alert('data gagal di input');
  history.go(-1);
  </script>";
}

?>
