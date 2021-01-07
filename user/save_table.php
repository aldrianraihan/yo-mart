<?php 
include "config.php";
						
							$nomeja = $_REQUEST['nomeja'];

							//membuat Query untuk menyimpan data
							$query = "INSERT INTO pesanan (nomeja) VALUES ('$nomeja');";

							$hasil = mysqli_query($conn,$query);
							if($hasil){
								$_SESSION["nomeja"] = $meja;
						        echo "<script>
							    alert('Selamat Datang di Odeta Resto');
							    location.href = 'meja.php';
							    </script>";
							}
					?>