<?php 
session_start();
unset($_SESSION['session']);
unset($_SESSION['nama_lengkap']);
//atau
session_destroy();
header("location: ../eraport");
?>