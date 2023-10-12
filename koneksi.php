<?php 
// $host = "localhost";
// $username = "smkg6671_eraport";
// $password = "eraportsapra2";
// $db_name = "smkg6671_eraportsapra2";


$host = "localhost";
$username = "root";
$password = "";
$db_name = "db_rap";

$koneksi = mysqli_connect($host, $username, $password, $db_name) or die("Error Connection : " . mysqli_errno());

?>