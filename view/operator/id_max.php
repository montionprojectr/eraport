<?php 

$id = mysqli_query($koneksi, "select max(id_user) AS maxCode FROM tb_users");
$iduser = mysqli_fetch_array($id);
$use = $iduser['maxCode'];
$nO = (int) substr($use, 3, 4);
$nO++; 
$chars = "USE";
$use = $chars . sprintf("%04s", $nO);
	
?>
