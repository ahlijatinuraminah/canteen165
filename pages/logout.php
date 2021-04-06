<?php
	if (!isset($_SESSION)) {
	  session_start();
	}

	session_destroy();
	echo "<script>alert('Terima kasih, Anda Berhasil Logout')</script>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
?>

