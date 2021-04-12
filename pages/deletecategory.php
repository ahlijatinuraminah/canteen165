<?php
if(isset($_GET['id'])){	
	require_once('./class/class.Category.php'); 		
	$objCategory = new Category(); 
	$objCategory->id = $_GET['id'];
	
	$objCategory->SelectOneCategory();
	if($objCategory->hasil == false){		
		echo '<script>window.history.back()</script>';	
	}else{
		$objCategory->DeleteCategory();
		echo "<script> alert('".$objCategory->message."'); </script>";
		echo "<script>window.location = 'index.php?p=categorylist'</script>";			
	}	
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>