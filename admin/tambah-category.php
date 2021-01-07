<?php
// koneksi database
include 'config.php';

#print_r($_POST);

$CategoryName = $_POST['CategoryName'];
$temp = $_FILES['file']['tmp_name'];
$name = $_FILES['file']['name'];
$size = $_FILES['file']['size'];
$type = $_FILES['file']['type'];
$ekstensi_file =array('jpg','jpeg','png');
$ekstensi = pathinfo($name, PATHINFO_EXTENSION);
$ekstensi_ok =in_array($ekstensi, $ekstensi_file);
$folder = "../upload/".$name;
$query = "insert into categories values ('','$CategoryName','$folder')";

$upload = move_uploaded_file($temp, $folder);
$insert = mysqli_query($conn, $query);

if ($insert && $upload) {
  echo "<script>alert('data berhasil di input');
  window.location.href='index.php';
  </script>";
}else {
  echo "<script>alert('data gagal di input');
  history.go(-1);
  </script>";
}
?>
