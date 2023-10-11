<?php 
$host = "localhost";
$username = "root";
$password = "";
$db_name = "db_raport";

$koneksi = mysqli_connect($host, $username, $password, $db_name) or die("Error Connection : " . mysqli_errno());

?>