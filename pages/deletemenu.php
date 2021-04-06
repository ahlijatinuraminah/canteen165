<?php
if(isset($_GET['id'])){	
	include "inc.koneksi.php";	
	$id = $_GET['id'];
	
	$sqlCek = "SELECT IDMenu FROM tblMenu WHERE IDMenu=$id";    
	$cek = mysql_query($sqlCek) or die(mysql_error());
	
	if(mysql_num_rows($cek) == 0){		
		echo '<script>window.history.back()</script>';	
	}else{
		$sqlDelete = "DELETE FROM tblmenu WHERE IDMenu=$id";
		$del = mysql_query($sqlDelete);		
		if($del){			
			echo "<script> alert('Data berhasil dihapus!'); </script>";
		}else{			
			echo "<script> alert('Proses gagal!'); </script>";
		}
		echo "<script>window.location = 'index.php?p=menulist'</script>";			
	}	
}else{		
	echo '<script>window.history.back()</script>';	
}
?>