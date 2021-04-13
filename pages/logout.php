<?php
	if (!isset($_SESSION)) {
	  session_start();
	}

	session_destroy();
	echo "<script>alert('Terima kasih, Anda berhasil logout')</script>";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
?>

