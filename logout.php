<?php 
session_start();
unset($_SESSION['session']);
unset($_SESSION['nama_lengkap']);
//atau
session_destroy();

echo "<script>
	alert('Anda Berhasil Logout');
	document.location.href = 'index';
</script>";
// header("location: https://eraport.smksatyapraja2.id/");
?>