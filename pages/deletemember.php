<?php
if(isset($_GET['id'])){	
	include "inc.koneksi.php";	
	$id = $_GET['id'];
	
	$sqlCek = "SELECT IDUser FROM tbluser WHERE IDUser=$id";    
	$cek = mysql_query($sqlCek) or die(mysql_error());
	
	if(mysql_num_rows($cek) == 0){		
		echo '<script>window.history.back()</script>';	
	}else{
		$sqlDelete = "DELETE FROM tbluser WHERE IDUser=$id";
		$del = mysql_query($sqlDelete);		
		if($del){			
			echo "<script> alert('Data berhasil dihapus!'); </script>";
		}else{			
			echo "<script> alert('Proses gagal!'); </script>";
		}
		echo "<script>window.location = 'index.php?p=memberlist'</script>";			
	}	
}else{		
	echo '<script>window.history.back()</script>';	
}
?>