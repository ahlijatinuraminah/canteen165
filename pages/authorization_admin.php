<?php
	if(session_status()!=PHP_SESSION_ACTIVE){
		session_start();
	}
	//cek apakah user sudah login
	if(!isset($_SESSION['IDUser'])){
		echo "<script> alert('Anda harus login untuk mengakses halaman ini'); </script>";	
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php?p=login">';
		die();
	}
	//cek role user apakah admin
	if($_SESSION['Role']!="admin"){
		echo "<script> alert('Anda tidak berhak mengakses halaman ini'); </script>";	
		echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
		die();
	}
?>