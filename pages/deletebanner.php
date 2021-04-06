<?php
if(isset($_GET['id'])){	
	include "inc.koneksi.php";	
	$id = $_GET['id'];
	
	$sqlDelete = "DELETE FROM tblbanner WHERE IDBanner=$id";
	$del = mysql_query($sqlDelete);		
	if($del){			
		echo "<script> alert('Data berhasil dihapus!'); </script>";
	}else{			
		echo "<script> alert('Proses gagal!'); </script>";
	}
	echo "<script>window.location = 'index.php?p=bannerlist'</script>";			

}else{		
	echo '<script>window.history.back()</script>';	
}
?>