<?php
if(isset($_GET['id'])){	
	require_once('./class/class.Menu.php'); 		
	$objMenu = new Menu(); 
	$objMenu->id = $_GET['id'];
	
	$objMenu->SelectOneMenu();
	if($objMenu->hasil == false){		
		echo '<script>window.history.back()</script>';	
	}else{
		$objMenu->DeleteMenu();
		echo "<script> alert('".$objMenu->message."'); </script>";
		echo "<script>window.location = 'index.php?p=menulist'</script>";			
	}	
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>