<?php
include 'config.php';
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM vendor WHERE id_vendor='$id'");

header("location:listvendor.php");
?>
